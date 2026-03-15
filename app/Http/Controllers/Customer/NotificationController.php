<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display notifications center
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        $notifications = $user->notifications()->paginate(15);

        return view('customer.notifications.index', ['notifications' => $notifications]);
    }

    /**
     * Mark notification as read
     */
    public function markAsRead(Request $request, $id)
    {
        /** @var User $user */
        $user = Auth::user();
        $notification = $user->notifications()->findOrFail($id);
        $notification->update(['is_read' => true]);

        return back()->with('success', 'Notification marked as read');
    }

    /**
     * Mark all notifications as read
     */
    public function markAllAsRead(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $user->notifications()->update(['is_read' => true]);

        return back()->with('success', 'All notifications marked as read');
    }

    /**
     * Delete notification
     */
    public function destroy(Request $request, $id)
    {
        /** @var User $user */
        $user = Auth::user();
        $notification = $user->notifications()->findOrFail($id);
        $notification->delete();

        return back()->with('success', 'Notification deleted');
    }

    /**
     * Manage notification preferences
     */
    public function preferences()
    {
        /** @var User $user */
        $user = Auth::user();

        $preferences = [
            'billing_emails' => $user->notify_billing ?? true,
            'security_alerts' => $user->notify_security ?? true,
            'platform_updates' => $user->notify_updates ?? true,
            'marketing_emails' => $user->notify_marketing ?? false,
        ];

        return view('customer.notifications.preferences', ['preferences' => $preferences]);
    }

    /**
     * Update notification preferences
     */
    public function updatePreferences(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $user->update([
            'notify_billing' => $request->has('billing_emails'),
            'notify_security' => $request->has('security_alerts'),
            'notify_updates' => $request->has('platform_updates'),
            'notify_marketing' => $request->has('marketing_emails'),
        ]);

        return back()->with('success', 'Notification preferences updated');
    }
}
