<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\AdminActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Visitor/Traffic metrics from activity logs (login-based approximation)
        $todayVisitors = \App\Models\ActivityLog::whereDate('created_at', today())->distinct('ip_address')->count('ip_address');
        $weeklyVisitors = \App\Models\ActivityLog::whereBetween('created_at', [now()->startOfWeek(), now()])->distinct('ip_address')->count('ip_address');
        $monthlyVisitors = \App\Models\ActivityLog::whereMonth('created_at', now()->month)->distinct('ip_address')->count('ip_address');

        // User signup metrics
        $signupsToday = User::whereDate('created_at', today())->count();
        $signupsThisWeek = User::whereBetween('created_at', [now()->startOfWeek(), now()])->count();
        $signupsThisMonth = User::whereMonth('created_at', now()->month)->count();

        // Revenue metrics
        $revenueToday = Payment::whereDate('created_at', today())->where('status', 'completed')->sum('amount');
        $revenueThisWeek = Payment::whereBetween('created_at', [now()->startOfWeek(), now()])->where('status', 'completed')->sum('amount');
        $revenueThisMonth = Payment::whereMonth('created_at', now()->month)->where('status', 'completed')->sum('amount');

        // Subscription metrics
        $activeSubscriptions = Subscription::where('status', 'active')->count();
        $cancelledThisMonth = Subscription::where('status', 'cancelled')->whereMonth('updated_at', now()->month)->count();

        // User growth chart data (last 30 days)
        $userGrowth = User::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->pluck('count', 'date')
            ->toArray();

        // Revenue chart data (last 30 days)
        $revenueChart = Payment::select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(amount) as total'))
            ->where('status', 'completed')
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->pluck('total', 'date')
            ->toArray();

        return view('admin.analytics.index', [
            'todayVisitors' => $todayVisitors,
            'weeklyVisitors' => $weeklyVisitors,
            'monthlyVisitors' => $monthlyVisitors,
            'signupsToday' => $signupsToday,
            'signupsThisWeek' => $signupsThisWeek,
            'signupsThisMonth' => $signupsThisMonth,
            'revenueToday' => $revenueToday,
            'revenueThisWeek' => $revenueThisWeek,
            'revenueThisMonth' => $revenueThisMonth,
            'activeSubscriptions' => $activeSubscriptions,
            'cancelledThisMonth' => $cancelledThisMonth,
            'userGrowth' => $userGrowth,
            'revenueChart' => $revenueChart,
        ]);
    }

    public function users()
    {
        $users = User::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->where('created_at', '>=', now()->subDays(90))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $totalUsers = User::count();
        $activeUsers = $totalUsers;

        return view('admin.analytics.users', [
            'users' => $users,
            'totalUsers' => $totalUsers,
            'activeUsers' => $activeUsers,
        ]);
    }

    public function revenue()
    {
        $monthlyRevenue = Payment::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(amount) as total')
        )
            ->where('status', 'completed')
            ->where('created_at', '>=', now()->subMonths(12))
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        $totalRevenue = Payment::where('status', 'completed')->sum('amount');
        $averageOrderValue = Payment::where('status', 'completed')->avg('amount');

        return view('admin.analytics.revenue', [
            'monthlyRevenue' => $monthlyRevenue,
            'totalRevenue' => $totalRevenue,
            'averageOrderValue' => $averageOrderValue,
        ]);
    }
}
