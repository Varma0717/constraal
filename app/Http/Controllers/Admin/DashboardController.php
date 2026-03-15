<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CmsPage;
use App\Models\Inquiry;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = Cache::remember('admin_dashboard_stats', now()->addSeconds(60), function () {
            return [
                'users' => User::count(),
                'jobs' => Job::count(),
                'applications' => JobApplication::count(),
                'inquiries' => Inquiry::count(),
                'subscribers' => Subscriber::active()->count(),
                'cms_pages' => CmsPage::count(),
            ];
        });

        $recentApplications = Cache::remember('admin_dashboard_recent_applications', now()->addSeconds(60), function () {
            return JobApplication::orderBy('created_at', 'desc')->limit(5)->get();
        });

        $recentInquiries = Cache::remember('admin_dashboard_recent_inquiries', now()->addSeconds(60), function () {
            return Inquiry::orderBy('created_at', 'desc')->limit(5)->get();
        });

        return view('admin.dashboard', compact('stats', 'recentApplications', 'recentInquiries'));
    }
}
