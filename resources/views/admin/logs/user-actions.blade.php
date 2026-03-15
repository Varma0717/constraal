@extends('layouts.admin')

@section('title', 'User Actions Log')
@section('page-title', 'User Actions Log')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">User-Related Actions</h5>
    </div>
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Admin</th>
                        <th>Action</th>
                        <th>Target</th>
                        <th>IP Address</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                    <tr>
                        <td>{{ $log->id }}</td>
                        <td>{{ $log->admin->name ?? 'System' }}</td>
                        <td><code>{{ $log->action }}</code></td>
                        <td>{{ Str::limit($log->target, 30) ?? 'N/A' }}</td>
                        <td>{{ $log->ip_address }}</td>
                        <td>{{ $log->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">No user actions found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($logs->hasPages())
    <div class="card-footer">
        {{ $logs->links() }}
    </div>
    @endif
</div>

<div class="mt-3">
    <a href="{{ route('admin.logs.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back to All Logs
    </a>
</div>
@endsection