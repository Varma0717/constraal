<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    /**
     * Display account settings
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        $settings = [
            'email_notifications' => $user->notify_email ?? true,
            'sms_notifications' => $user->notify_sms ?? false,
            'theme' => $user->theme ?? 'light',
            'language' => $user->language ?? 'en',
        ];

        return view('customer.settings.index', [
            'user' => $user,
            'settings' => $settings,
        ]);
    }

    /**
     * Update account settings
     */
    public function update(Request $request)
    {
        $request->validate([
            'email_notifications' => 'boolean',
            'sms_notifications' => 'boolean',
            'theme' => 'in:light,dark',
            'language' => 'in:en,es,fr,de',
        ]);

        /** @var User $user */
        $user = Auth::user();
        $user->update([
            'notify_email' => $request->has('email_notifications'),
            'notify_sms' => $request->has('sms_notifications'),
            'theme' => $request->theme,
            'language' => $request->language,
        ]);

        $user->activities()->create([
            'action' => 'settings_updated',
            'description' => 'Account settings updated',
            'ip_address' => $request->ip(),
        ]);

        return back()->with('success', 'Settings updated successfully');
    }

    /**
     * Manage email preferences
     */
    public function emailPreferences()
    {
        /** @var User $user */
        $user = Auth::user();

        $preferences = [
            'billing_emails' => $user->notify_billing ?? true,
            'security_alerts' => $user->notify_security ?? true,
            'updates' => $user->notify_updates ?? true,
            'marketing' => $user->notify_marketing ?? false,
        ];

        return view('customer.settings.email-preferences', ['preferences' => $preferences]);
    }

    /**
     * Update email preferences
     */
    public function updateEmailPreferences(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $user->update([
            'notify_billing' => $request->has('billing_emails'),
            'notify_security' => $request->has('security_alerts'),
            'notify_updates' => $request->has('updates'),
            'notify_marketing' => $request->has('marketing'),
        ]);

        return back()->with('success', 'Email preferences updated');
    }
}
