@extends('layouts.admin')

@section('title', 'CMS Pages')
@section('page-title', 'CMS Pages')
@section('icon', 'bi-layout-text-window')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-0">CMS Pages</h5>
            <small class="text-muted">Manage status, hero content, and page-level SEO content.</small>
        </div>
        <a href="{{ route('admin.cms.pages.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Add New Page
        </a>
    </div>

    @if($pages->count())
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Featured</th>
                    <th>Published</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                <tr>
                    <td>{{ $page->title }}</td>
                    <td><code>{{ $page->slug }}</code></td>
                    <td>
                        @if($page->status === 'published')
                        <span class="badge bg-success">Published</span>
                        @elseif($page->status === 'draft')
                        <span class="badge bg-warning">Draft</span>
                        @else
                        <span class="badge bg-secondary">Archived</span>
                        @endif
                    </td>
                    <td>{{ $page->featured ? 'Yes' : 'No' }}</td>
                    <td>{{ $page->published_at ? $page->published_at->format('M d, Y') : '—' }}</td>
                    <td class="text-end">
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('admin.cms.pages.edit', $page) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                            <form method="POST" action="{{ route('admin.cms.pages.destroy', $page) }}" class="d-inline" onsubmit="return confirm('Delete this page?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="card-body text-center text-muted py-4">
        No pages found. <a href="{{ route('admin.cms.pages.create') }}">Create the first one</a>
    </div>
    @endif
</div>

<div class="mt-3">
    {{ $pages->links() }}
</div>
@endsection
