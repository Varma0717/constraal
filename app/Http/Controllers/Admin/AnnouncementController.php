<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.announcements.index', ['announcements' => $announcements]);
    }

    public function create()
    {
        return view('admin.announcements.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_active' => 'boolean',
            'published_at' => 'nullable|date',
            'expires_at' => 'nullable|date|after:published_at',
        ]);

        $validated['is_active'] = $validated['is_active'] ?? true;
        $validated['admin_id'] = auth('admin')->id();

        Announcement::create($validated);

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'create_announcement',
            'target' => 'Announcement: ' . $validated['title'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement created successfully');
    }

    public function edit(Announcement $announcement)
    {
        return view('admin.announcements.edit', ['announcement' => $announcement]);
    }

    public function update(Request $request, Announcement $announcement)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_active' => 'boolean',
            'published_at' => 'nullable|date',
            'expires_at' => 'nullable|date|after:published_at',
        ]);

        $validated['is_active'] = $validated['is_active'] ?? false;

        $announcement->update($validated);

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'update_announcement',
            'target' => 'Announcement: ' . $validated['title'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement updated successfully');
    }

    public function destroy(Request $request, Announcement $announcement)
    {
        $announcement->delete();

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'delete_announcement',
            'target' => 'Announcement ID: ' . $announcement->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement deleted successfully');
    }
}
