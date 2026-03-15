<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SecurityController extends Controller
{
    /**
     * Display security settings
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        $loginActivity = $user->activities()
            ->where('action', 'logged_in')
            ->latest()
            ->take(10)
            ->get();

        return view('customer.security.index', [
            'user' => $user,
            'loginActivity' => $loginActivity,
            'twoFactorEnabled' => $user->two_factor_enabled ?? false,
        ]);
    }

    /**
     * Show change password form
     */
    public function showChangePassword()
    {
        return view('customer.security.change-password');
    }

    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        /** @var User $user */
        $user = Auth::user();

        if (!\Illuminate\Support\Facades\Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->update(['password' => \Illuminate\Support\Facades\Hash::make($request->password)]);

        $user->activities()->create([
            'action' => 'password_changed',
            'description' => 'Password changed from security page',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'Password updated successfully');
    }

    /**
     * Enable Two-Factor Authentication
     */
    public function enableTwoFactor(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $user->update(['two_factor_enabled' => true]);

        $user->activities()->create([
            'action' => 'two_factor_enabled',
            'description' => 'Two-factor authentication enabled',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'Two-factor authentication enabled');
    }

    /**
     * Disable Two-Factor Authentication
     */
    public function disableTwoFactor(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $user->update(['two_factor_enabled' => false]);

        $user->activities()->create([
            'action' => 'two_factor_disabled',
            'description' => 'Two-factor authentication disabled',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'Two-factor authentication disabled');
    }

    /**
     * Log out other sessions
     */
    public function logoutOtherSessions(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        // Delete all sessions for this user except the current one
        if (config('session.driver') === 'database') {
            DB::table('sessions')
                ->where('user_id', $user->id)
                ->where('id', '!=', $request->session()->getId())
                ->delete();
        }

        // Regenerate session token for added security
        $request->session()->regenerate();

        $user->activities()->create([
            'action' => 'other_sessions_logout',
            'description' => 'All other sessions logged out',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'All other sessions have been logged out');
    }
}
