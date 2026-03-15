@extends('customer.layouts.app')

@section('title', 'Notifications')
@section('page-title', 'Notifications')
@section('icon', 'bi-bell')

@section('content')
<div class="mb-3">
    <form method="POST" action="{{ route('account.customer.notifications.mark-all-read') }}" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-sm btn-outline-primary">
            <i class="bi bi-check-all"></i> Mark All as Read
        </button>
    </form>
    <a href="{{ route('account.customer.notifications.preferences') }}" class="btn btn-sm btn-outline-secondary">
        <i class="bi bi-gear"></i> Notification Preferences
    </a>
</div>

<div class="card">
    <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
        <h5 class="card-title mb-0">All Notifications</h5>
    </div>
    <div class="card-body p-0">
        @if($notifications->count() > 0)
        <div class="list-group list-group-flush">
            @foreach($notifications as $notification)
            <div class="list-group-item {{ !$notification->is_read ? 'bg-light' : '' }}">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="mb-1">{{ $notification->title ?? 'Notification' }}</h6>
                        <p class="mb-0" style="font-size: 0.9rem;">{{ $notification->message }}</p>
                        <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                    </div>
                    <div class="flex-shrink-0">
                        @if(!$notification->is_read)
                        <form method="POST" action="{{ route('account.customer.notifications.mark-read', $notification) }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-primary">Mark as read</button>
                        </form>
                        @endif
                        <form method="POST" action="{{ route('account.customer.notifications.destroy', $notification) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $notifications->links() }}
        @else
        <div class="text-center py-5">
            <i class="bi bi-bell-slash" style="font-size: 2rem; color: #ccc;"></i>
            <p class="text-muted mt-3">No notifications</p>
        </div>
        @endif
    </div>
</div>
@endsection