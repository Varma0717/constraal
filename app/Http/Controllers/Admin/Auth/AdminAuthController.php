<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetMail;
use App\Models\Admin;
use App\Models\AdminActivityLog;
use App\Models\BlockedIp;
use App\Models\LoginAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Throwable;

class AdminAuthController extends Controller
{
    /**
     * Show admin login form
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Handle admin login
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Email must be valid',
            'password.required' => 'Password is required',
        ]);

        $ip = $request->ip();

        try {
            // Check if IP is blocked
            $blockedIp = BlockedIp::where('ip_address', $ip)->first();
            if ($blockedIp && $blockedIp->isActive()) {
                return back()->withErrors([
                    'email' => 'Your IP address has been blocked. Please contact support.',
                ]);
            }

            // Check login attempts
            $recentFailures = LoginAttempt::byEmail($validated['email'])
                ->failed()
                ->recent(15)
                ->count();
        } catch (Throwable $exception) {
            Log::error('Admin login pre-check failed due to database issue.', [
                'message' => $exception->getMessage(),
                'ip_address' => $ip,
                'email' => $validated['email'],
            ]);

            return back()->withErrors([
                'email' => 'Login is temporarily unavailable. Please try again shortly.',
            ]);
        }

        if ($recentFailures >= 5) {
            $this->recordLoginAttemptSafely([
                'email' => $validated['email'],
                'ip_address' => $ip,
                'successful' => false,
                'reason' => 'Too many failed attempts',
            ]);

            return back()->withErrors([
                'email' => 'Too many login attempts. Please try again later.',
            ]);
        }

        // Attempt login
        try {
            $admin = Admin::where('email', $validated['email'])->first();
        } catch (Throwable $exception) {
            Log::error('Admin lookup failed during login.', [
                'message' => $exception->getMessage(),
                'ip_address' => $ip,
                'email' => $validated['email'],
            ]);

            return back()->withErrors([
                'email' => 'Login is temporarily unavailable. Please try again shortly.',
            ]);
        }

        if (!$admin || !Hash::check($validated['password'], $admin->password)) {
            $this->recordLoginAttemptSafely([
                'email' => $validated['email'],
                'ip_address' => $ip,
                'successful' => false,
                'reason' => 'Invalid credentials',
            ]);

            if ($admin) {
                $admin->recordFailedLogin();
            }

            throw ValidationException::withMessages([
                'email' => 'Invalid email or password',
            ]);
        }

        // Check if admin is active
        if (!$admin->is_active) {
            $this->recordLoginAttemptSafely([
                'email' => $validated['email'],
                'ip_address' => $ip,
                'successful' => false,
                'reason' => 'Account inactive',
            ]);

            return back()->withErrors([
                'email' => 'This admin account is inactive.',
            ]);
        }

        // Check if admin is locked
        if ($admin->isLocked()) {
            $this->recordLoginAttemptSafely([
                'email' => $validated['email'],
                'ip_address' => $ip,
                'successful' => false,
                'reason' => 'Account locked',
            ]);

            return back()->withErrors([
                'email' => 'Your account is locked due to multiple failed login attempts. Please try again later.',
            ]);
        }

        // Record successful login
        $admin->recordSuccessfulLogin($ip);

        $this->recordLoginAttemptSafely([
            'email' => $validated['email'],
            'ip_address' => $ip,
            'successful' => true,
        ]);

        // Log activity
        $this->recordAdminActivitySafely([
            'admin_id' => $admin->id,
            'action' => 'login',
            'ip_address' => $ip,
            'user_agent' => $request->userAgent(),
        ]);

        Auth::guard('admin')->login($admin, $request->filled('remember'));

        return redirect()->route('admin.dashboard');
    }

    /**
     * Handle admin logout
     */
    public function logout(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        // Log activity
        if ($admin) {
            $this->recordAdminActivitySafely([
                'admin_id' => $admin->id,
                'action' => 'logout',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        }

        Auth::guard('admin')->logout();
        $request->session()->invalidate();

        return redirect()->route('admin.login');
    }

    /**
     * Show password reset form
     */
    public function showResetForm()
    {
        return view('admin.auth.reset-password');
    }

    /**
     * Handle password reset
     */
    public function resetPassword(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
        ]);

        $admin = Admin::where('email', $validated['email'])->first();

        if (!$admin) {
            return back()->with('status', 'If an account exists, a password reset link has been sent.');
        }

        // Generate reset token and send email
        $token = \Illuminate\Support\Str::random(64);
        \Illuminate\Support\Facades\DB::table('password_resets')->where('email', $admin->email)->delete();
        \Illuminate\Support\Facades\DB::table('password_resets')->insert([
            'email' => $admin->email,
            'token' => Hash::make($token),
            'created_at' => now(),
        ]);

        $resetUrl = url('/admin/password-reset/confirm?token=' . $token . '&email=' . urlencode($admin->email));

        try {
            Mail::to($admin->email)->send(new PasswordResetMail($resetUrl, $admin->name, 'admin'));
        } catch (\Exception $e) {
            // Log error but don't reveal it to user
            \Illuminate\Support\Facades\Log::error('Admin password reset email failed: ' . $e->getMessage());
        }

        return back()->with('status', 'If an account exists, a password reset link has been sent.');
    }

    /**
     * Show confirm password form
     */
    public function showConfirmPassword()
    {
        return view('admin.auth.confirm-password');
    }

    /**
     * Show confirm reset password form (from email link)
     */
    public function showConfirmResetForm(Request $request)
    {
        return view('admin.auth.confirm-reset-password', [
            'token' => $request->token,
            'email' => $request->email,
        ]);
    }

    /**
     * Handle confirmed password reset (set new password)
     */
    public function confirmResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $reset = \Illuminate\Support\Facades\DB::table('password_resets')->where('email', $request->email)->first();

        if (!$reset || !Hash::check($request->token, $reset->token)) {
            return back()->withErrors(['email' => 'Invalid or expired reset token.'])->withInput();
        }

        // Check if token is expired (60 minutes)
        if (now()->diffInMinutes($reset->created_at) > 60) {
            \Illuminate\Support\Facades\DB::table('password_resets')->where('email', $request->email)->delete();
            return back()->withErrors(['email' => 'This reset link has expired. Please request a new one.'])->withInput();
        }

        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return back()->withErrors(['email' => 'Admin not found.'])->withInput();
        }

        $admin->update(['password' => Hash::make($request->password)]);
        \Illuminate\Support\Facades\DB::table('password_resets')->where('email', $request->email)->delete();

        $this->recordAdminActivitySafely([
            'admin_id' => $admin->id,
            'action' => 'password_reset',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.login')->with('status', 'Password reset successfully. You can now log in.');
    }

    /**
     * Confirm password
     */
    public function confirmPassword(Request $request)
    {
        $request->validate(['password' => 'required|string']);

        if (!Hash::check($request->password, $request->user('admin')->password)) {
            throw ValidationException::withMessages([
                'password' => 'The password does not match our records.',
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended();
    }

    private function recordLoginAttemptSafely(array $payload): void
    {
        try {
            LoginAttempt::create($payload);
        } catch (Throwable $exception) {
            Log::warning('Login attempt could not be stored.', [
                'message' => $exception->getMessage(),
                'email' => $payload['email'] ?? null,
                'ip_address' => $payload['ip_address'] ?? null,
            ]);
        }
    }

    private function recordAdminActivitySafely(array $payload): void
    {
        try {
            AdminActivityLog::create($payload);
        } catch (Throwable $exception) {
            Log::warning('Admin activity log write failed.', [
                'message' => $exception->getMessage(),
                'admin_id' => $payload['admin_id'] ?? null,
                'action' => $payload['action'] ?? null,
            ]);
        }
    }
}
