<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApiKey;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiKeyController extends Controller
{
    public function index()
    {
        $apiKeys = ApiKey::with('admin')->paginate(20);
        return view('admin.api-keys.index', ['apiKeys' => $apiKeys]);
    }

    public function create()
    {
        return view('admin.api-keys.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'nullable|array',
        ]);

        $key = Str::random(64);

        ApiKey::create([
            'admin_id' => auth('admin')->id(),
            'name' => $validated['name'],
            'key' => hash('sha256', $key),
            'permissions' => json_encode($validated['permissions'] ?? []),
            'is_active' => true,
        ]);

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'create_api_key',
            'target' => 'API Key: ' . $validated['name'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.api-keys.index')
            ->with('success', 'API key created successfully')
            ->with('api_key', $key); // Show key once only
    }

    public function show(ApiKey $api_key)
    {
        return view('admin.api-keys.show', ['apiKey' => $api_key]);
    }

    public function edit(ApiKey $api_key)
    {
        return view('admin.api-keys.edit', ['apiKey' => $api_key]);
    }

    public function update(Request $request, ApiKey $api_key)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'nullable|array',
            'is_active' => 'boolean',
        ]);

        $api_key->update([
            'name' => $validated['name'],
            'permissions' => json_encode($validated['permissions'] ?? []),
            'is_active' => $validated['is_active'] ?? false,
        ]);

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'update_api_key',
            'target' => 'API Key: ' . $validated['name'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.api-keys.index')->with('success', 'API key updated successfully');
    }

    public function destroy(Request $request, ApiKey $api_key)
    {
        $api_key->delete();

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'revoke_api_key',
            'target' => 'API Key ID: ' . $api_key->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.api-keys.index')->with('success', 'API key revoked successfully');
    }

    public function revoke(Request $request, ApiKey $api_key)
    {
        $api_key->update(['is_active' => false]);

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'revoke_api_key',
            'target' => 'API Key: ' . $api_key->name,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'API key revoked successfully');
    }
}
