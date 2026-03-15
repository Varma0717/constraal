@extends('customer.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('icon', 'bi-speedometer2')

@section('content')
<div class="portal-grid portal-grid--stats">
    <div class="portal-card">
        <div class="portal-stat-label">Account Status</div>
        <div class="portal-stat-value">{{ $accountStatus }}</div>
        <span class="portal-badge">Active</span>
    </div>

    <div class="portal-card">
        <div class="portal-stat-label">Active Subscriptions</div>
        <div class="portal-stat-value">{{ $subscriptionCount }}</div>
        <a class="auth-link" href="{{ route('account.customer.billing.subscriptions') }}">View subscriptions</a>
    </div>

    <div class="portal-card">
        <div class="portal-stat-label">Last Login</div>
        <div class="portal-stat-value">{{ $lastLogin->diffForHumans() }}</div>
        <span class="portal-muted">Recent account access</span>
    </div>

    <div class="portal-card">
        <div class="portal-stat-label">Support Tickets</div>
        <div class="portal-stat-value">0</div>
        <a class="auth-link" href="{{ route('account.customer.support.index') }}">Open tickets</a>
    </div>
</div>

<div class="portal-grid portal-grid--split mt-8">
    <div class="portal-card">
        <div class="portal-card-header">
            <h5 class="portal-card-title">Recent Activity</h5>
        </div>
        @if($activities->count() > 0)
        <div class="portal-list">
            @foreach($activities as $activity)
            <div class="portal-list-item">
                <div class="portal-list-row">
                    <div>
                        <strong>{{ ucfirst(str_replace('_', ' ', $activity->action)) }}</strong>
                        <div class="portal-muted">{{ $activity->description }}</div>
                    </div>
                    <span class="portal-badge portal-badge--muted">
                        {{ $activity->created_at->diffForHumans() }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="portal-muted">No recent activity</div>
        @endif
    </div>

    <div class="portal-grid">
        <div class="portal-card">
            <div class="portal-card-header">
                <h5 class="portal-card-title">Quick Links</h5>
            </div>
            <div class="portal-link-list">
                <a href="{{ route('account.customer.profile.show') }}" class="portal-link-item">
                    <i class="bi bi-person"></i> View Profile
                </a>
                <a href="{{ route('account.customer.billing.subscriptions') }}" class="portal-link-item">
                    <i class="bi bi-calendar-check"></i> My Subscriptions
                </a>
                <a href="{{ route('account.customer.billing.invoices') }}" class="portal-link-item">
                    <i class="bi bi-file-earmark-text"></i> Invoices
                </a>
                <a href="{{ route('account.customer.support.index') }}" class="portal-link-item">
                    <i class="bi bi-chat-left-text"></i> Support
                </a>
                <a href="{{ route('account.customer.security.index') }}" class="portal-link-item">
                    <i class="bi bi-shield-lock"></i> Security Settings
                </a>
            </div>
        </div>

        <div class="portal-card">
            <div class="portal-card-header">
                <h5 class="portal-card-title">Notifications</h5>
            </div>
            @if($notifications->count() > 0)
            <div class="portal-list">
                @foreach($notifications->take(3) as $notification)
                <div class="portal-list-item">
                    <div class="portal-list-row">
                        <span class="portal-muted">{{ $notification->message }}</span>
                        <span class="portal-badge {{ $notification->is_read ? 'portal-badge--muted' : '' }}">
                            {{ $notification->is_read ? 'Read' : 'New' }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
            <a href="{{ route('account.customer.notifications.index') }}" class="portal-button portal-button--ghost mt-3">View All Notifications</a>
            @else
            <div class="portal-muted">No notifications</div>
            @endif
        </div>
    </div>
</div>
@endsection