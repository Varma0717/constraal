<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display customer services and platform access
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        // Build services list based on user's active subscriptions
        $activeSubscription = $user->subscriptions()
            ->where('status', 'active')
            ->latest()
            ->first();

        $services = [
            [
                'name' => 'Constraal Platform Access',
                'status' => $activeSubscription ? 'Active' : 'Inactive',
                'icon' => 'globe',
                'description' => 'Full access to the Constraal platform'
            ],
            [
                'name' => 'Automation Services',
                'status' => $activeSubscription ? 'Enabled' : 'Disabled',
                'icon' => 'zap',
                'description' => 'Advanced automation capabilities'
            ],
            [
                'name' => 'API Access',
                'status' => $activeSubscription ? 'Active' : 'Inactive',
                'icon' => 'code',
                'description' => 'RESTful API for integrations'
            ],
        ];

        $accountTier = $user->subscriptions()
            ->where('status', 'active')
            ->latest()
            ->first()
            ?->plan()
            ?->first()
            ?->name ?? 'Free';

        return view('customer.services.index', [
            'services' => $services,
            'accountTier' => $accountTier,
        ]);
    }
}
