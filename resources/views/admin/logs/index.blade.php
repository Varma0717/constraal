@php use Illuminate\Support\Str; @endphp
@extends('layouts.admin')

@section('title', 'Activity Logs')
@section('page-title', 'Activity Logs')

@section('content')
<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('admin.logs.index') }}" method="GET" class="row g-3">
            <div class="col-md-3">
                <label for="action" class="form-label">Action Type</label>
                <select class="form-select" id="action" name="action">
                    <option value="">All Actions</option>
                    @foreach($actions as $action)
                    <option value="{{ $action }}" {{ request('action') == $action ? 'selected' : '' }}>{{ $action }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="admin_id" class="form-label">Admin</label>
                <select class="form-select" id="admin_id" name="admin_id">
                    <option value="">All Admins</option>
                    @foreach($admins as $admin)
                    <option value="{{ $admin->id }}" {{ request('admin_id') == $admin->id ? 'selected' : '' }}>{{ $admin->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="from" class="form-label">From Date</label>
                <input type="date" class="form-control" id="from" name="from" value="{{ request('from') }}">
            </div>
            <div class="col-md-2">
                <label for="to" class="form-label">To Date</label>
                <input type="date" class="form-control" id="to" name="to" value="{{ request('to') }}">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary me-2">Filter</button>
                <a href="{{ route('admin.logs.index') }}" class="btn btn-outline-secondary">Reset</a>
            </div>
        </form>
    </div>
</div>

<!-- Quick Links -->
<div class="mb-4">
    <a href="{{ route('admin.logs.admin-actions') }}" class="btn btn-outline-primary me-2">Admin Actions</a>
    <a href="{{ route('admin.logs.user-actions') }}" class="btn btn-outline-info me-2">User Actions</a>
    <a href="{{ route('admin.logs.billing') }}" class="btn btn-outline-success me-2">Billing Logs</a>
    <a href="{{ route('admin.logs.security') }}" class="btn btn-outline-danger me-2">Security Logs</a>
    <a href="{{ route('admin.logs.export', request()->all()) }}" class="btn btn-outline-secondary">
        <i class="bi bi-download"></i> Export CSV
    </a>
</div>

<!-- Logs Table -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">All Activity Logs</h5>
        <span class="badge bg-secondary">{{ $logs->total() }} entries</span>
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
                        <th>Actions</th>
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
                        <td>
                            <a href="{{ route('admin.logs.show', $log) }}" class="btn btn-sm btn-outline-primary">View</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">No logs found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($logs->hasPages())
    <div class="card-footer">
        {{ $logs->appends(request()->query())->links() }}
    </div>
    @endif
</div>
@endsection