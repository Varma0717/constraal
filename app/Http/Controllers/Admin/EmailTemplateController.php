<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    public function index()
    {
        $templates = EmailTemplate::paginate(20);
        return view('admin.email-templates.index', ['templates' => $templates]);
    }

    public function create()
    {
        return view('admin.email-templates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:email_templates',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $validated['is_active'] ?? true;

        EmailTemplate::create($validated);

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'create_email_template',
            'target' => 'Template: ' . $validated['name'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.email-templates.index')->with('success', 'Email template created successfully');
    }

    public function edit(EmailTemplate $email_template)
    {
        return view('admin.email-templates.edit', ['template' => $email_template]);
    }

    public function update(Request $request, EmailTemplate $email_template)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:email_templates,name,' . $email_template->id,
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $validated['is_active'] ?? false;

        $email_template->update($validated);

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'update_email_template',
            'target' => 'Template: ' . $validated['name'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.email-templates.index')->with('success', 'Email template updated successfully');
    }

    public function destroy(Request $request, EmailTemplate $email_template)
    {
        $email_template->delete();

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'delete_email_template',
            'target' => 'Template ID: ' . $email_template->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.email-templates.index')->with('success', 'Email template deleted successfully');
    }

    public function preview(EmailTemplate $email_template)
    {
        return view('admin.email-templates.preview', ['template' => $email_template]);
    }
}
