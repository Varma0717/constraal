<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminActivityLog;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $query = AdminActivityLog::with('admin')->orderBy('created_at', 'desc');

        // Filter by action type
        if ($request->has('action') && $request->action) {
            $query->where('action', $request->action);
        }

        // Filter by admin
        if ($request->has('admin_id') && $request->admin_id) {
            $query->where('admin_id', $request->admin_id);
        }

        // Filter by date range
        if ($request->has('from') && $request->from) {
            $query->whereDate('created_at', '>=', $request->from);
        }
        if ($request->has('to') && $request->to) {
            $query->whereDate('created_at', '<=', $request->to);
        }

        $logs = $query->paginate(50);

        // Get unique actions for filter dropdown
        $actions = AdminActivityLog::distinct()->pluck('action');

        // Get admins for filter dropdown
        $admins = \App\Models\Admin::select('id', 'name')->get();

        return view('admin.logs.index', [
            'logs' => $logs,
            'actions' => $actions,
            'admins' => $admins,
        ]);
    }

    public function show(AdminActivityLog $log)
    {
        return view('admin.logs.show', ['log' => $log]);
    }

    public function adminActions(Request $request)
    {
        $query = AdminActivityLog::with('admin')
            ->whereNotNull('admin_id')
            ->orderBy('created_at', 'desc');

        if ($request->has('admin_id') && $request->admin_id) {
            $query->where('admin_id', $request->admin_id);
        }

        $logs = $query->paginate(50);

        return view('admin.logs.admin-actions', ['logs' => $logs]);
    }

    public function userActions(Request $request)
    {
        // For user activity, we'd need a separate user activity tracking system
        // For now, show activity related to users
        $logs = AdminActivityLog::with('admin')
            ->where('action', 'like', '%user%')
            ->orderBy('created_at', 'desc')
            ->paginate(50);

        return view('admin.logs.user-actions', ['logs' => $logs]);
    }

    public function billingLogs(Request $request)
    {
        $logs = AdminActivityLog::with('admin')
            ->where(function ($q) {
                $q->where('action', 'like', '%payment%')
                    ->orWhere('action', 'like', '%subscription%')
                    ->orWhere('action', 'like', '%billing%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(50);

        return view('admin.logs.billing', ['logs' => $logs]);
    }

    public function securityLogs(Request $request)
    {
        $logs = AdminActivityLog::with('admin')
            ->where(function ($q) {
                $q->where('action', 'like', '%login%')
                    ->orWhere('action', 'like', '%logout%')
                    ->orWhere('action', 'like', '%block%')
                    ->orWhere('action', 'like', '%security%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(50);

        return view('admin.logs.security', ['logs' => $logs]);
    }

    public function export(Request $request)
    {
        $query = AdminActivityLog::with('admin')->orderBy('created_at', 'desc');

        if ($request->has('from') && $request->from) {
            $query->whereDate('created_at', '>=', $request->from);
        }
        if ($request->has('to') && $request->to) {
            $query->whereDate('created_at', '<=', $request->to);
        }

        $logs = $query->get();

        $filename = 'logs_export_' . date('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () use ($logs) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Admin', 'Action', 'Target', 'IP Address', 'User Agent', 'Created At']);

            foreach ($logs as $log) {
                fputcsv($file, [
                    $log->id,
                    $log->admin ? $log->admin->name : 'System',
                    $log->action,
                    $log->target,
                    $log->ip_address,
                    $log->user_agent,
                    $log->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
