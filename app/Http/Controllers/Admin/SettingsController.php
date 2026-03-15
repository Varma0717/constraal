<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SystemSetting;
use App\Models\FeatureFlag;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = SystemSetting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings.index', ['settings' => $settings]);
    }

    public function update(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if ($key !== '_token') {
                SystemSetting::setValue($key, $value);
            }
        }

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'update_settings',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'Settings updated successfully');
    }

    public function featureFlags()
    {
        $flags = FeatureFlag::all();
        return view('admin.settings.feature-flags', ['flags' => $flags]);
    }

    public function toggleFeatureFlag(Request $request, FeatureFlag $flag)
    {
        $flag->update(['is_enabled' => !$flag->is_enabled]);

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'toggle_feature_flag',
            'target' => 'Flag: ' . $flag->name,
            'description' => $flag->is_enabled ? 'Enabled' : 'Disabled',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'is_enabled' => $flag->is_enabled]);
        }

        return back()->with('success', 'Feature flag toggled successfully');
    }

    public function storeFeatureFlag(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:feature_flags,name',
            'description' => 'required|string',
        ]);

        FeatureFlag::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_enabled' => $request->boolean('is_enabled'),
        ]);

        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'create_feature_flag',
            'target' => 'Flag: ' . $request->name,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'Feature flag created successfully');
    }

    public function destroyFeatureFlag(Request $request, FeatureFlag $flag)
    {
        $name = $flag->name;
        $flag->delete();

        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'delete_feature_flag',
            'target' => 'Flag: ' . $name,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        if ($request->expectsJson()) {
            return response()->json(['success' => true]);
        }

        return back()->with('success', 'Feature flag deleted successfully');
    }
}
