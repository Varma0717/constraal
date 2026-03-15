@extends('layouts.admin')

@section('title', 'Administrator Details')
@section('page-title', 'Administrator Details')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-body text-center">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px; font-size: 2rem;">
                    {{ substr($admin->name, 0, 1) }}
                </div>
                <h5>{{ $admin->name }}</h5>
                <p class="text-muted">{{ $admin->email }}</p>

                @if($admin->is_active)
                <span class="badge bg-success">Active</span>
                @else
                <span class="badge bg-danger">Inactive</span>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Assigned Roles</h6>
            </div>
            <div class="card-body">
                @forelse($admin->roles ?? [] as $role)
                <span class="badge bg-secondary me-1 mb-1">{{ $role->name }}</span>
                @empty
                <p class="text-muted mb-0">No roles assigned</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Account Information</h6>
                <a href="{{ route('admin.admins.edit', $admin) }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil me-1"></i> Edit
                </a>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th style="width: 180px;">ID</th>
                        <td>{{ $admin->id }}</td>
                    </tr>
                    <tr>
                        <th>Full Name</th>
                        <td>{{ $admin->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $admin->email }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($admin->is_active)
                            <span class="badge bg-success">Active</span>
                            @else
                            <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $admin->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Last Updated</th>
                        <td>{{ $admin->updated_at->format('M d, Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Recent Activity</h6>
            </div>
            <div class="card-body">
                @if(isset($admin->activities) && $admin->activities->count() > 0)
                <ul class="list-group list-group-flush">
                    @foreach($admin->activities->take(10) as $activity)
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{ $activity->action }}</span>
                        <small class="text-muted">{{ $activity->created_at->diffForHumans() }}</small>
                    </li>
                    @endforeach
                </ul>
                @else
                <p class="text-muted mb-0">No recent activity</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="mt-4">
    <a href="{{ route('admin.admins.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back to List
    </a>
</div>
@endsection