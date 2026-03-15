<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminManagementController extends Controller
{
    public function index()
    {
        $admins = Admin::with('roles')->paginate(20);
        return view('admin.admins.index', ['admins' => $admins]);
    }

    public function create()
    {
        $roles = AdminRole::all();
        return view('admin.admins.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:admins',
            'password' => 'required|string|min:8',
            'roles' => 'required|array',
        ]);

        $admin = Admin::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_active' => true,
        ]);

        $admin->roles()->attach($validated['roles']);

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'create_admin',
            'target' => 'Admin ' . $admin->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.admins.show', $admin)->with('success', 'Admin created successfully');
    }

    public function show(Admin $admin)
    {
        $admin->load('roles');
        return view('admin.admins.show', ['admin' => $admin]);
    }

    public function edit(Admin $admin)
    {
        $admin->load('roles');
        $roles = AdminRole::all();
        return view('admin.admins.edit', ['admin' => $admin, 'roles' => $roles]);
    }

    public function update(Request $request, Admin $admin)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'roles' => 'required|array',
            'is_active' => 'boolean',
        ]);

        $admin->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'is_active' => $validated['is_active'] ?? false,
        ]);

        $admin->roles()->sync($validated['roles']);

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'update_admin',
            'target' => 'Admin ' . $admin->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.admins.show', $admin)->with('success', 'Admin updated successfully');
    }

    public function destroy(Request $request, Admin $admin)
    {
        // Prevent deleting yourself
        if ($admin->id === auth('admin')->id()) {
            return back()->withErrors(['Cannot delete your own admin account']);
        }

        $admin->delete();

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'delete_admin',
            'target' => 'Admin ' . $admin->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.admins.index')->with('success', 'Admin deleted successfully');
    }
}
