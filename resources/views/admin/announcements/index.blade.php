@extends('layouts.admin')

@section('title', 'Announcements')
@section('page-title', 'Announcements')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">All Announcements</h5>
        <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary btn-sm">+ Create Announcement</a>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Schedule</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($announcements as $announcement)
                <tr>
                    <td>{{ $announcement->id }}</td>
                    <td>{{ $announcement->title }}</td>
                    <td>
                        @if($announcement->is_active)
                        <span class="admin-badge admin-badge--success">Active</span>
                        @else
                        <span class="admin-badge admin-badge--muted">Inactive</span>
                        @endif
                    </td>
                    <td>
                        @if($announcement->published_at && $announcement->expires_at)
                        {{ $announcement->published_at->format('M d') }} — {{ $announcement->expires_at->format('M d, Y') }}
                        @elseif($announcement->published_at)
                        From {{ $announcement->published_at->format('M d, Y') }}
                        @elseif($announcement->expires_at)
                        Until {{ $announcement->expires_at->format('M d, Y') }}
                        @else
                        Always
                        @endif
                    </td>
                    <td>{{ $announcement->created_at->format('M d, Y') }}</td>
                    <td>
                        <a href="{{ route('admin.announcements.edit', $announcement) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('admin.announcements.destroy', $announcement) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this announcement?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center" class="py-4">No announcements found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($announcements->hasPages())
    <div class="px-3 py-2 border-top">
        {{ $announcements->links() }}
    </div>
    @endif
</div>
@endsection