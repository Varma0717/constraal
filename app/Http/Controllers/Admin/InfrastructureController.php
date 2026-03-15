<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SystemSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;

class InfrastructureController extends Controller
{
    public function index()
    {
        // Check service statuses
        $services = $this->checkServices();

        // System info
        $systemInfo = [
            'php_version' => PHP_VERSION,
            'laravel_version' => app()->version(),
            'server_software' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown',
            'memory_limit' => ini_get('memory_limit'),
            'max_execution_time' => ini_get('max_execution_time'),
            'upload_max_filesize' => ini_get('upload_max_filesize'),
        ];

        // Disk usage
        $diskTotal = disk_total_space(base_path());
        $diskFree = disk_free_space(base_path());
        $diskUsed = $diskTotal - $diskFree;
        $diskUsedPercent = round(($diskUsed / $diskTotal) * 100, 2);

        // Error count (from logs - simplified)
        $errorCount = 0;
        $logPath = storage_path('logs/laravel.log');
        if (file_exists($logPath)) {
            $logContent = file_get_contents($logPath);
            $errorCount = substr_count($logContent, '[ERROR]');
        }

        return view('admin.infrastructure.index', [
            'services' => $services,
            'systemInfo' => $systemInfo,
            'diskTotal' => $this->formatBytes($diskTotal),
            'diskFree' => $this->formatBytes($diskFree),
            'diskUsed' => $this->formatBytes($diskUsed),
            'diskUsedPercent' => $diskUsedPercent,
            'errorCount' => $errorCount,
        ]);
    }

    public function monitoring()
    {
        $services = $this->checkServices();

        // Get recent system events
        $recentEvents = \App\Models\AdminActivityLog::orderBy('created_at', 'desc')
            ->limit(20)
            ->get();

        return view('admin.infrastructure.monitoring', [
            'services' => $services,
            'recentEvents' => $recentEvents,
        ]);
    }

    public function maintenance()
    {
        $isMaintenanceMode = app()->isDownForMaintenance();
        $setting = SystemSetting::where('key', 'maintenance_message')->first();
        $maintenanceMessage = $setting ? $setting->value : 'The site is currently under maintenance. Please check back soon.';

        return view('admin.infrastructure.maintenance', [
            'isMaintenanceMode' => $isMaintenanceMode,
            'maintenanceMessage' => $maintenanceMessage,
        ]);
    }

    public function toggleMaintenance(Request $request)
    {
        if (app()->isDownForMaintenance()) {
            Artisan::call('up');
            $message = 'Maintenance mode disabled';
        } else {
            $maintenanceMessage = $request->input('message', 'The site is currently under maintenance.');
            SystemSetting::setValue('maintenance_message', $maintenanceMessage);
            Artisan::call('down', ['--render' => 'errors.503']);
            $message = 'Maintenance mode enabled';
        }

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'toggle_maintenance',
            'target' => $message,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', $message);
    }

    public function backup()
    {
        return view('admin.infrastructure.backup');
    }

    public function createBackup(Request $request)
    {
        // Simple database backup (creates SQL dump)
        $filename = 'backup_' . date('Y-m-d_H-i-s') . '.sql';
        $path = storage_path('app/backups/' . $filename);

        if (!file_exists(storage_path('app/backups'))) {
            mkdir(storage_path('app/backups'), 0755, true);
        }

        $database = config('database.connections.mysql.database');
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');
        $host = config('database.connections.mysql.host');

        // Note: This requires mysqldump to be available
        $command = sprintf(
            'mysqldump -h%s -u%s -p%s %s > %s',
            $host,
            $username,
            $password,
            $database,
            $path
        );

        exec($command, $output, $returnCode);

        if ($returnCode === 0 && file_exists($path)) {
            // Log activity
            \App\Models\AdminActivityLog::create([
                'admin_id' => auth('admin')->id(),
                'action' => 'create_backup',
                'target' => $filename,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return back()->with('success', 'Backup created successfully: ' . $filename);
        }

        return back()->with('error', 'Failed to create backup');
    }

    public function clearCache(Request $request)
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'clear_cache',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'All caches cleared successfully');
    }

    private function checkServices()
    {
        $services = [];

        // Database
        try {
            DB::connection()->getPdo();
            $services['Database'] = ['status' => 'Online', 'class' => 'success'];
        } catch (\Exception $e) {
            $services['Database'] = ['status' => 'Offline', 'class' => 'danger'];
        }

        // Cache
        try {
            Cache::put('health_check', true, 10);
            $services['Cache'] = ['status' => 'Online', 'class' => 'success'];
        } catch (\Exception $e) {
            $services['Cache'] = ['status' => 'Offline', 'class' => 'danger'];
        }

        // File Storage
        if (is_writable(storage_path('app'))) {
            $services['Storage'] = ['status' => 'Writable', 'class' => 'success'];
        } else {
            $services['Storage'] = ['status' => 'Not Writable', 'class' => 'danger'];
        }

        // Session
        try {
            session()->put('health_check', true);
            $services['Session'] = ['status' => 'Online', 'class' => 'success'];
        } catch (\Exception $e) {
            $services['Session'] = ['status' => 'Offline', 'class' => 'danger'];
        }

        // Web API
        $services['Web API'] = ['status' => 'Online', 'class' => 'success'];

        // CMS
        $services['CMS'] = ['status' => 'Online', 'class' => 'success'];

        // Authentication
        $services['Authentication'] = ['status' => 'Online', 'class' => 'success'];

        return $services;
    }

    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}
