@extends('layouts.admin')

@section('title', 'Email Templates')
@section('page-title', 'Email Templates')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">All Email Templates</h5>
        <a href="{{ route('admin.email-templates.create') }}" class="btn btn-primary btn-sm">+ Create Template</a>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($templates as $template)
                <tr>
                    <td>{{ $template->id }}</td>
                    <td>{{ $template->name }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($template->subject, 50) }}</td>
                    <td>
                        @if($template->is_active)
                        <span class="admin-badge admin-badge--success">Active</span>
                        @else
                        <span class="admin-badge admin-badge--muted">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.email-templates.preview', $template) }}" class="btn btn-sm btn-outline-info" target="_blank">Preview</a>
                        <a href="{{ route('admin.email-templates.edit', $template) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('admin.email-templates.destroy', $template) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this template?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center" class="py-4">No email templates found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($templates->hasPages())
    <div class="px-3 py-2 border-top">
        {{ $templates->links() }}
    </div>
    @endif
</div>
@endsection