<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavigationMenu;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function index()
    {
        $items = NavigationMenu::orderBy('order')->paginate(20);
        return view('admin.navigation.index', ['items' => $items]);
    }

    public function create()
    {
        $parents = NavigationMenu::whereNull('parent_id')->get();
        return view('admin.navigation.create', ['parents' => $parents]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'url' => 'required|string|max:500',
            'parent_id' => 'nullable|exists:navigation_menu,id',
            'order' => 'nullable|integer',
            'is_visible' => 'boolean',
        ]);

        $validated['is_visible'] = $validated['is_visible'] ?? true;
        $validated['order'] = $validated['order'] ?? NavigationMenu::max('order') + 1;

        NavigationMenu::create($validated);

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'create_menu_item',
            'target' => 'Menu: ' . $validated['label'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.navigation.index')->with('success', 'Menu item created successfully');
    }

    public function edit(NavigationMenu $navigation)
    {
        $parents = NavigationMenu::whereNull('parent_id')->where('id', '!=', $navigation->id)->get();
        return view('admin.navigation.edit', ['item' => $navigation, 'parents' => $parents]);
    }

    public function update(Request $request, NavigationMenu $navigation)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'url' => 'required|string|max:500',
            'parent_id' => 'nullable|exists:navigation_menu,id',
            'order' => 'nullable|integer',
            'is_visible' => 'boolean',
        ]);

        $validated['is_visible'] = $validated['is_visible'] ?? false;

        $navigation->update($validated);

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'update_menu_item',
            'target' => 'Menu: ' . $validated['label'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.navigation.index')->with('success', 'Menu item updated successfully');
    }

    public function destroy(Request $request, NavigationMenu $navigation)
    {
        $navigation->delete();

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'delete_menu_item',
            'target' => 'Menu ID: ' . $navigation->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.navigation.index')->with('success', 'Menu item deleted successfully');
    }

    public function reorder(Request $request)
    {
        $validated = $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:navigation_menu,id',
            'items.*.order' => 'required|integer',
        ]);

        foreach ($validated['items'] as $item) {
            NavigationMenu::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }
}
