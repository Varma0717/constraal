<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BillingPlan;
use App\Models\Subscription;
use App\Models\Payment;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index()
    {
        $monthlyRevenue = Payment::whereMonth('created_at', now()->month)
            ->where('status', 'completed')
            ->sum('amount');

        $activeSubscriptions = Subscription::where('status', 'active')->count();
        $failedPayments = Payment::where('status', 'failed')->count();

        return view('admin.billing.index', [
            'monthlyRevenue' => $monthlyRevenue,
            'activeSubscriptions' => $activeSubscriptions,
            'failedPayments' => $failedPayments,
        ]);
    }

    public function subscriptions()
    {
        $subscriptions = Subscription::with('user', 'plan')->paginate(20);
        return view('admin.billing.subscriptions', ['subscriptions' => $subscriptions]);
    }

    public function payments()
    {
        $payments = Payment::with('user')->paginate(20);
        return view('admin.billing.payments', ['payments' => $payments]);
    }

    public function plans()
    {
        $plans = BillingPlan::paginate(20);
        return view('admin.billing.plans', ['plans' => $plans]);
    }

    public function createPlan()
    {
        return view('admin.billing.create-plan');
    }

    public function storePlan(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:billing_plans',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|size:3',
            'billing_period' => 'required|in:monthly,annual',
            'features' => 'nullable|json',
        ]);

        BillingPlan::create($validated);

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'create_billing_plan',
            'target' => 'Plan: ' . $validated['name'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.billing.plans')->with('success', 'Plan created successfully');
    }
}
