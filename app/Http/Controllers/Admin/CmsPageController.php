<?php

namespace App\Http\Controllers\Admin;

use App\Models\CmsPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CmsPageController extends Controller
{
    /**
     * Display a listing of CMS pages
     */
    public function index()
    {
        $pages = CmsPage::latest('updated_at')->paginate(15);
        return view('admin.cms.pages.index', compact('pages'));
    }

    /**
     * Show form for creating a new CMS page
     */
    public function create()
    {
        return view('admin.cms.pages.create');
    }

    /**
     * Store a newly created CMS page
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:cms_pages,slug',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'hero_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120',
            'hero_cta_text' => 'nullable|string|max:100',
            'hero_cta_url' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published,archived',
            'featured' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('hero_image')) {
            $validated['hero_image'] = $request->file('hero_image')
                ->store('hero-images', 'public');
        }

        if ($validated['status'] === 'published' && !$validated['published_at']) {
            $validated['published_at'] = now();
        }

        $page = CmsPage::create($validated);

        return redirect()->route('admin.cms.pages.edit', $page)
            ->with('success', 'Page created successfully');
    }

    /**
     * Show form for editing a CMS page
     */
    public function edit(CmsPage $page)
    {
        return view('admin.cms.pages.edit', compact('page'));
    }

    /**
     * Update the specified CMS page
     */
    public function update(Request $request, CmsPage $page)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:cms_pages,slug,' . $page->id,
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'hero_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120',
            'hero_cta_text' => 'nullable|string|max:100',
            'hero_cta_url' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published,archived',
            'featured' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('hero_image')) {
            // Delete old image if exists
            if ($page->hero_image) {
                \Storage::disk('public')->delete($page->hero_image);
            }
            $validated['hero_image'] = $request->file('hero_image')
                ->store('hero-images', 'public');
        }

        // Auto-set published_at if status is published
        if ($validated['status'] === 'published' && !$page->published_at) {
            $validated['published_at'] = now();
        }

        $page->update($validated);

        return redirect()->route('admin.cms.pages.edit', $page)
            ->with('success', 'Page updated successfully');
    }

    /**
     * Delete a CMS page
     */
    public function destroy(CmsPage $page)
    {
        $page->delete();

        return redirect()->route('admin.cms.pages.index')
            ->with('success', 'Page deleted successfully');
    }

    /**
     * Restore a soft-deleted page
     */
    public function restore($id)
    {
        $page = CmsPage::withTrashed()->findOrFail($id);
        $page->restore();

        return redirect()->route('admin.cms.pages.index')
            ->with('success', 'Page restored successfully');
    }

    /**
     * Force delete a page
     */
    public function forceDelete($id)
    {
        $page = CmsPage::withTrashed()->findOrFail($id);
        $page->forceDelete();

        return redirect()->route('admin.cms.pages.index')
            ->with('success', 'Page permanently deleted');
    }
}
