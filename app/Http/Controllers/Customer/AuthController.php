<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Throwable;

class AuthController extends Controller
{
    /**
     * Show customer login form
     */
    public function showLogin()
    {
        try {
            if (Auth::check()) {
                return redirect()->route('account.customer.dashboard');
            }
        } catch (Throwable $exception) {
            Log::warning('Customer auth check failed on login page.', [
                'message' => $exception->getMessage(),
                'ip_address' => request()->ip(),
            ]);
        }

        return view('customer.auth.login');
    }

    /**
     * Handle customer login
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        try {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                /** @var User|null $user */
                $user = Auth::user();
                if ($user) {
                    try {
                        $user->activities()->create([
                            'action' => 'logged_in',
                            'description' => 'User logged in',
                            'ip_address' => $request->ip(),
                            'user_agent' => $request->userAgent(),
                        ]);
                    } catch (Throwable $exception) {
                        Log::warning('Failed to store customer login activity.', [
                            'message' => $exception->getMessage(),
                            'user_id' => $user->id,
                        ]);
                    }
                }

                return redirect()->route('account.customer.dashboard');
            }
        } catch (Throwable $exception) {
            Log::error('Customer login failed due to database issue.', [
                'message' => $exception->getMessage(),
                'ip_address' => $request->ip(),
                'email' => $credentials['email'] ?? null,
            ]);

            return back()->withErrors([
                'email' => 'Login is temporarily unavailable. Please try again shortly.',
            ])->withInput();
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    /**
     * Show customer signup form
     */
    public function showSignup()
    {
        try {
            if (Auth::check()) {
                return redirect()->route('account.customer.dashboard');
            }
        } catch (Throwable $exception) {
            Log::warning('Customer auth check failed on signup page.', [
                'message' => $exception->getMessage(),
                'ip_address' => request()->ip(),
            ]);
        }

        return view('customer.auth.signup');
    }

    /**
     * Handle customer signup
     */
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_active' => true,
        ]);

        Auth::login($user);

        // Log activity
        $user->activities()->create([
            'action' => 'account_created',
            'description' => 'Account created',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('account.customer.dashboard')->with('success', 'Welcome to Constraal!');
    }

    /**
     * Handle customer logout
     */
    public function logout(Request $request)
    {
        // Log activity before logout
        if (Auth::check()) {
            /** @var User $user */
            $user = Auth::user();
            $user->activities()->create([
                'action' => 'logged_out',
                'description' => 'User logged out',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('account.customer.login')->with('success', 'You have been logged out');
    }

    /**
     * Show password reset form
     */
    public function showResetPassword()
    {
        return view('customer.auth.reset-password');
    }

    /**
     * Handle password reset
     */
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Generate reset token
            $token = Str::random(64);
            DB::table('password_resets')->where('email', $user->email)->delete();
            DB::table('password_resets')->insert([
                'email' => $user->email,
                'token' => Hash::make($token),
                'created_at' => now(),
            ]);

            $resetUrl = url('/account/reset-password/confirm?token=' . $token . '&email=' . urlencode($user->email));

            try {
                Mail::to($user->email)->send(new PasswordResetMail($resetUrl, $user->name, 'customer'));
            } catch (\Exception $e) {
                Log::error('Customer password reset email failed: ' . $e->getMessage());
            }

            // Log activity
            $user->activities()->create([
                'action' => 'password_reset_requested',
                'description' => 'Password reset requested',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        }

        // Always show success to prevent email enumeration
        return back()->with('success', 'If an account with that email exists, a password reset link has been sent.');
    }

    /**
     * Show new password form (from email link)
     */
    public function showNewPassword(Request $request)
    {
        return view('customer.auth.new-password', [
            'token' => $request->token,
            'email' => $request->email,
        ]);
    }

    /**
     * Handle new password submission
     */
    public function setNewPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $reset = DB::table('password_resets')->where('email', $request->email)->first();

        if (!$reset || !Hash::check($request->token, $reset->token)) {
            return back()->withErrors(['email' => 'Invalid or expired reset token.'])->withInput();
        }

        // Check if token is expired (60 minutes)
        if (now()->diffInMinutes($reset->created_at) > 60) {
            DB::table('password_resets')->where('email', $request->email)->delete();
            return back()->withErrors(['email' => 'This reset link has expired. Please request a new one.'])->withInput();
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'User not found.'])->withInput();
        }

        $user->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where('email', $request->email)->delete();

        $user->activities()->create([
            'action' => 'password_reset_completed',
            'description' => 'Password was reset via email link',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('account.customer.login')->with('success', 'Password reset successfully. You can now log in with your new password.');
    }
}
