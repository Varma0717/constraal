@php use Illuminate\Support\Str; @endphp
@extends('layouts.admin')

@section('title', 'System Monitoring')
@section('page-title', 'System Monitoring')

@section('content')
<div class="row mb-4">
    <!-- Service Status -->
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-heart-pulse"></i> Live Service Status</h5>
            </div>
            <div class="card-body">
                @foreach($services as $name => $info)
                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                    <span>{{ $name }}</span>
                    <span class="badge bg-{{ $info['class'] }}">{{ $info['status'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Summary -->
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-speedometer2"></i> Health Summary</h5>
            </div>
            <div class="card-body text-center">
                @php
                $onlineCount = collect($services)->filter(fn($s) => $s['class'] === 'success')->count();
                $totalServices = count($services);
                $healthPercent = round(($onlineCount / $totalServices) * 100);
                @endphp

                <div class="portal-stat-value {{ $healthPercent == 100 ? 'text-success' : ($healthPercent >= 80 ? 'text-warning' : 'text-danger') }}" style="font-size: 72px;">
                    {{ $healthPercent }}%
                </div>
                <div class="portal-stat-label">System Health</div>
                <p class="mt-2">
                    <span class="badge bg-success">{{ $onlineCount }} Online</span>
                    <span class="badge bg-danger">{{ $totalServices - $onlineCount }} Issues</span>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="bi bi-clock-history"></i> Recent System Activity</h5>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Admin</th>
                    <th>Action</th>
                    <th>Target</th>
                    <th>IP Address</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentEvents as $event)
                <tr>
                    <td>{{ $event->admin->name ?? 'System' }}</td>
                    <td><code>{{ $event->action }}</code></td>
                    <td>{{ Str::limit($event->target, 30) ?? 'N/A' }}</td>
                    <td>{{ $event->ip_address }}</td>
                    <td>{{ $event->created_at->diffForHumans() }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4">No recent activity</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('admin.infrastructure.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back to Status
    </a>
    <a href="{{ route('admin.logs.index') }}" class="btn btn-outline-primary">
        <i class="bi bi-journal-text"></i> View All Logs
    </a>
</div>
@endsection