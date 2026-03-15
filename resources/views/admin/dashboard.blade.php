@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')
@section('icon', 'bi-speedometer2')

@section('content')
<div class="portal-grid portal-grid--stats">
    <div class="portal-card">
        <div class="portal-stat-label">Total Users</div>
        <div class="portal-stat-value">{{ $stats['users'] }}</div>
        <a class="portal-link-item" href="{{ route('admin.users.index') }}"><i class="bi bi-people"></i> Manage</a>
    </div>

    <div class="portal-card">
        <div class="portal-stat-label">Total Jobs</div>
        <div class="portal-stat-value">{{ $stats['jobs'] }}</div>
        <a class="portal-link-item" href="{{ route('admin.jobs') }}"><i class="bi bi-briefcase"></i> Manage</a>
    </div>

    <div class="portal-card">
        <div class="portal-stat-label">Job Applications</div>
        <div class="portal-stat-value">{{ $stats['applications'] }}</div>
        <a class="portal-link-item" href="{{ route('admin.applications') }}"><i class="bi bi-file-person"></i> View</a>
    </div>

    <div class="portal-card">
        <div class="portal-stat-label">Contact Inquiries</div>
        <div class="portal-stat-value">{{ $stats['inquiries'] }}</div>
        <a class="portal-link-item" href="{{ route('admin.inquiries') }}"><i class="bi bi-question-circle"></i> View</a>
    </div>

    <div class="portal-card">
        <div class="portal-stat-label">Active Subscribers</div>
        <div class="portal-stat-value">{{ $stats['subscribers'] }}</div>
        <a class="portal-link-item" href="{{ route('admin.subscribers.index') }}"><i class="bi bi-people-fill"></i> Manage</a>
    </div>

    <div class="portal-card">
        <div class="portal-stat-label">CMS Pages</div>
        <div class="portal-stat-value">{{ $stats['cms_pages'] }}</div>
        <a class="portal-link-item" href="{{ route('admin.cms.pages.index') }}"><i class="bi bi-layout-text-window"></i> Manage</a>
    </div>
</div>

<div class="portal-grid portal-grid--split mt-4">
    <div class="portal-card">
        <div class="portal-card-header">
            <h5 class="portal-card-title">Recent Job Applications</h5>
        </div>
        @if(count($recentApplications) > 0)
        <div class="portal-list">
            @foreach($recentApplications as $app)
            <div class="portal-list-item">
                <div class="portal-list-row">
                    <div>
                        <strong>{{ $app->name }}</strong>
                        <div class="portal-muted">{{ $app->email }}</div>
                    </div>
                    <div class="text-end">
                        <span class="badge bg-primary">{{ $app->status }}</span>
                        <div class="portal-muted mt-1">{{ $app->created_at->format('M d, Y') }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="p-3 portal-muted">No applications yet</div>
        @endif
    </div>

    <div class="portal-card">
        <div class="portal-card-header">
            <h5 class="portal-card-title">Recent Inquiries</h5>
        </div>
        @if(count($recentInquiries) > 0)
        <div class="portal-list">
            @foreach($recentInquiries as $inquiry)
            <div class="portal-list-item">
                <div class="portal-list-row">
                    <div>
                        <strong>{{ $inquiry->name }}</strong>
                        <div class="portal-muted">{{ $inquiry->email }}</div>
                    </div>
                    <div class="text-end">
                        <span class="badge bg-success">{{ $inquiry->type }}</span>
                        <div class="portal-muted mt-1">{{ $inquiry->created_at->format('M d, Y') }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="p-3 portal-muted">No inquiries yet</div>
        @endif
    </div>
</div>

<div class="portal-card mt-4">
    <div class="portal-card-header">
        <h5 class="portal-card-title">Quick Links</h5>
    </div>
    <div class="portal-link-list">
        <a href="{{ route('admin.users.index') }}" class="portal-link-item"><i class="bi bi-people"></i> Manage Users</a>
        <a href="{{ route('admin.pages') }}" class="portal-link-item"><i class="bi bi-file-earmark"></i> Manage Pages</a>
        <a href="{{ route('admin.jobs') }}" class="portal-link-item"><i class="bi bi-briefcase"></i> Manage Jobs</a>
        <a href="{{ route('admin.cms.pages.index') }}" class="portal-link-item"><i class="bi bi-layout-text-window"></i> CMS Pages</a>
        <a href="{{ route('admin.subscribers.index') }}" class="portal-link-item"><i class="bi bi-people-fill"></i> Subscribers</a>
    </div>
</div>
@endsection