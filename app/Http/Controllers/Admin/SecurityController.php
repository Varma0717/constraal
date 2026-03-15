<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoginAttempt;
use App\Models\BlockedIp;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function index()
    {
        $failedLogins = LoginAttempt::where('successful', false)->count();
        $blockedIpsCount = BlockedIp::count();

        return view('admin.security.index', [
            'failedLogins' => $failedLogins,
            'blockedIpsCount' => $blockedIpsCount,
        ]);
    }

    public function loginAttempts()
    {
        $attempts = LoginAttempt::orderBy('created_at', 'desc')->paginate(50);
        return view('admin.security.login-attempts', ['attempts' => $attempts]);
    }

    public function blockedIps()
    {
        $ips = BlockedIp::paginate(20);
        return view('admin.security.blocked-ips', ['ips' => $ips]);
    }

    public function blockIp(Request $request)
    {
        $validated = $request->validate([
            'ip_address' => 'required|ip',
            'reason' => 'nullable|string',
            'is_permanent' => 'boolean',
            'blocked_until' => 'nullable|date',
        ]);

        BlockedIp::create($validated);

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'block_ip',
            'target' => 'IP: ' . $validated['ip_address'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'IP address blocked successfully');
    }

    public function unblockIp(Request $request, $ip)
    {
        $blockedIp = BlockedIp::where('ip_address', $ip)->firstOrFail();
        $blockedIp->delete();

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'unblock_ip',
            'target' => 'IP: ' . $ip,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'IP address unblocked successfully');
    }
}
