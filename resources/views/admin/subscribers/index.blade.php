@extends('layouts.admin')

@section('title', 'Subscribers')
@section('page-title', 'Subscribers')
@section('icon', 'bi-people-fill')

@section('content')
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="portal-stat-label">Total</div>
                <div class="portal-stat-value">{{ $subscribers->total() }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="portal-stat-label">Active</div>
                <div class="portal-stat-value">{{ \App\Models\Subscriber::active()->count() }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="portal-stat-label">Verified</div>
                <div class="portal-stat-value">{{ \App\Models\Subscriber::verified()->count() }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="portal-stat-label">Unsubscribed</div>
                <div class="portal-stat-value">{{ \App\Models\Subscriber::whereNotNull('unsubscribed_at')->count() }}</div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-0">Newsletter Subscribers</h5>
            <small class="text-muted">Manage verification, unsubscribe actions, and exports.</small>
        </div>
        <a href="{{ route('admin.subscribers.export') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-download me-1"></i> Export CSV
        </a>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Source</th>
                    <th>Status</th>
                    <th>Subscribed</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($subscribers as $subscriber)
                <tr>
                    <td>{{ $subscriber->name ?: '—' }}</td>
                    <td>{{ $subscriber->email }}</td>
                    <td>{{ $subscriber->source }}</td>
                    <td>
                        @if($subscriber->unsubscribed_at)
                        <span class="badge bg-secondary">Unsubscribed</span>
                        @elseif($subscriber->verified_at)
                        <span class="badge bg-success">Verified</span>
                        @else
                        <span class="badge bg-warning">Pending</span>
                        @endif
                    </td>
                    <td>{{ $subscriber->created_at?->format('M d, Y') }}</td>
                    <td class="text-end">
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('admin.subscribers.show', $subscriber) }}" class="btn btn-outline-primary btn-sm">View</a>
                            @if(!$subscriber->verified_at)
                            <form action="{{ route('admin.subscribers.verify', $subscriber) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-success btn-sm">Verify</button>
                            </form>
                            @endif
                            @if(!$subscriber->unsubscribed_at)
                            <form action="{{ route('admin.subscribers.unsubscribe', $subscriber) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-warning btn-sm">Unsub</button>
                            </form>
                            @endif
                            <form action="{{ route('admin.subscribers.destroy', $subscriber) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this subscriber?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">No subscribers found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $subscribers->links() }}
</div>
@endsection
