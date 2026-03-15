@extends('layouts.admin')

@section('title', 'User Analytics')
@section('page-title', 'User Analytics')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body text-center">
                <div style="font-size: 48px; font-weight: bold; color: #0d6efd;">{{ number_format($totalUsers) }}</div>
                <p class="text-muted mb-0">Total Users</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body text-center">
                <div style="font-size: 48px; font-weight: bold; color: #28a745;">{{ number_format($activeUsers) }}</div>
                <p class="text-muted mb-0">Active Users</p>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">User Signups (Last 90 Days)</h5>
    </div>
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>New Users</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $row)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($row->date)->format('M d, Y') }}</td>
                        <td>{{ $row->count }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="text-center py-4">No data available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('admin.analytics.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back to Analytics
    </a>
</div>
@endsection