<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display customer dashboard
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        // Get customer data
        $subscriptions = $user->subscriptions()->where('status', 'active')->get();
        $activities = $user->activities()->latest()->take(5)->get();
        $notifications = $user->notifications()->latest()->take(5)->get();
        $accountStatus = $user->is_active ? 'Active' : 'Inactive';

        return view('customer.dashboard', [
            'user' => $user,
            'subscriptions' => $subscriptions,
            'activities' => $activities,
            'notifications' => $notifications,
            'accountStatus' => $accountStatus,
            'subscriptionCount' => $subscriptions->count(),
            'lastLogin' => $user->updated_at,
        ]);
    }
}
