@extends('layouts.admin')

@section('title', 'Infrastructure Status')
@section('page-title', 'Infrastructure Status')

@section('content')
<div class="row mb-4">
    <!-- Service Status -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-activity"></i> Service Status</h5>
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $name => $info)
                        <tr>
                            <td>{{ $name }}</td>
                            <td>
                                <span class="badge bg-{{ $info['class'] }}">{{ $info['status'] }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-body text-center">
                <div class="portal-stat-value {{ $errorCount > 0 ? 'text-danger' : 'text-success' }}">{{ $errorCount }}</div>
                <div class="portal-stat-label">Error Count (Log)</div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h6 class="mb-3">Disk Usage</h6>
                <div class="progress mb-2" style="height: 20px">
                    <div class="progress-bar {{ $diskUsedPercent > 80 ? 'bg-danger' : ($diskUsedPercent > 60 ? 'bg-warning' : 'bg-success') }}" style="width: {{ $diskUsedPercent }}%;">
                        {{ $diskUsedPercent }}%
                    </div>
                </div>
                <small class="text-muted">{{ $diskUsed }} used of {{ $diskTotal }} ({{ $diskFree }} free)</small>
            </div>
        </div>
    </div>
</div>

<!-- System Info -->
<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0"><i class="bi bi-info-circle"></i> System Information</h5>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <tbody>
                @foreach($systemInfo as $key => $value)
                <tr>
                    <td class="fw-bold text-nowrap" style="min-width:200px">{{ ucwords(str_replace('_', ' ', $key)) }}</td>
                    <td>{{ $value }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Quick Actions -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="bi bi-lightning"></i> Quick Actions</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.infrastructure.clear-cache') }}" method="POST" class="d-inline" onsubmit="return confirm('Clear all caches?')">
            @csrf
            <button type="submit" class="btn btn-warning me-2">
                <i class="bi bi-arrow-repeat"></i> Clear All Caches
            </button>
        </form>

        <a href="{{ route('admin.infrastructure.monitoring') }}" class="btn btn-outline-primary me-2">
            <i class="bi bi-activity"></i> View Monitoring
        </a>

        <a href="{{ route('admin.infrastructure.backup') }}" class="btn btn-outline-secondary me-2">
            <i class="bi bi-cloud-download"></i> Backup
        </a>

        <a href="{{ route('admin.infrastructure.maintenance') }}" class="btn btn-outline-danger">
            <i class="bi bi-tools"></i> Maintenance Mode
        </a>
    </div>
</div>
@endsection