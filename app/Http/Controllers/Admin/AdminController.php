<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\Inquiry;
use App\Models\Page;
use App\Models\CmsPage;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'users' => User::count(),
            'jobs' => Job::count(),
            'applications' => JobApplication::count(),
            'inquiries' => Inquiry::count(),
            'subscribers' => Subscriber::active()->count(),
            'cms_pages' => CmsPage::count(),
        ];

        $recentApplications = JobApplication::orderBy('created_at', 'desc')->limit(5)->get();
        $recentInquiries = Inquiry::orderBy('created_at', 'desc')->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recentApplications', 'recentInquiries'));
    }

    public function users()
    {
        $users = User::with('roles')->paginate(20);
        return view('admin.users', compact('users'));
    }

    public function jobs()
    {
        $jobs = Job::paginate(20);
        return view('admin.jobs', compact('jobs'));
    }

    public function jobsCreate()
    {
        return view('admin.jobs-create');
    }

    public function jobsStore(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'type' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'remote' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['remote'] = (bool) ($data['remote'] ?? false);
        $data['is_active'] = (bool) ($data['is_active'] ?? false);

        Job::create($data);

        return redirect()->route('admin.jobs')->with('status', 'Job created successfully.');
    }

    public function jobsEdit(Job $job)
    {
        return view('admin.jobs-edit', compact('job'));
    }

    public function jobsUpdate(Request $request, Job $job)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'type' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'remote' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['remote'] = (bool) ($data['remote'] ?? false);
        $data['is_active'] = (bool) ($data['is_active'] ?? false);

        $job->update($data);

        return redirect()->route('admin.jobs')->with('status', 'Job updated successfully.');
    }

    public function jobsDestroy(Job $job)
    {
        $job->delete();

        return redirect()->route('admin.jobs')->with('status', 'Job deleted successfully.');
    }

    public function applications()
    {
        $applications = JobApplication::with('job')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.applications', compact('applications'));
    }

    public function inquiries()
    {
        $inquiries = Inquiry::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.inquiries', compact('inquiries'));
    }

    public function pages()
    {
        $pages = Page::paginate(20);
        return view('admin.pages', compact('pages'));
    }

    public function pagesCreate()
    {
        return view('admin.pages-create');
    }

    public function pagesStore(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:pages,slug'],
            'content' => ['nullable', 'string'],
            'meta' => ['nullable', 'string'],
        ]);

        if (!empty($data['meta'])) {
            $decoded = json_decode($data['meta'], true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                return back()->withErrors(['meta' => 'Meta must be valid JSON.'])->withInput();
            }
            $data['meta'] = $decoded;
        } else {
            $data['meta'] = null;
        }

        Page::create($data);

        return redirect()->route('admin.pages')->with('status', 'Page created successfully.');
    }

    public function pagesEdit(Page $page)
    {
        return view('admin.pages-edit', compact('page'));
    }

    public function pagesUpdate(Request $request, Page $page)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:pages,slug,' . $page->id],
            'content' => ['nullable', 'string'],
            'meta' => ['nullable', 'string'],
        ]);

        if (!empty($data['meta'])) {
            $decoded = json_decode($data['meta'], true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                return back()->withErrors(['meta' => 'Meta must be valid JSON.'])->withInput();
            }
            $data['meta'] = $decoded;
        } else {
            $data['meta'] = null;
        }

        $page->update($data);

        return redirect()->route('admin.pages')->with('status', 'Page updated successfully.');
    }

    public function pagesDestroy(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.pages')->with('status', 'Page deleted successfully.');
    }
}
