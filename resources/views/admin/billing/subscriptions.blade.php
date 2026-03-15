@extends('layouts.admin')

@section('title', 'Subscriptions')
@section('page-title', 'Subscriptions')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">All Subscriptions</h5>
    </div>
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Plan</th>
                        <th>Status</th>
                        <th>Started</th>
                        <th>Ends At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subscriptions as $subscription)
                    <tr>
                        <td>{{ $subscription->id }}</td>
                        <td>{{ $subscription->user->name ?? 'N/A' }}</td>
                        <td>{{ $subscription->plan->name ?? 'N/A' }}</td>
                        <td>
                            @if($subscription->status === 'active')
                            <span class="badge bg-success">Active</span>
                            @elseif($subscription->status === 'cancelled')
                            <span class="badge bg-danger">Cancelled</span>
                            @elseif($subscription->status === 'expired')
                            <span class="badge bg-secondary">Expired</span>
                            @else
                            <span class="badge bg-warning">{{ ucfirst($subscription->status) }}</span>
                            @endif
                        </td>
                        <td>{{ $subscription->created_at->format('M d, Y') }}</td>
                        <td>{{ $subscription->ends_at ? $subscription->ends_at->format('M d, Y') : 'N/A' }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-primary">View</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">No subscriptions found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($subscriptions->hasPages())
    <div class="card-footer">
        {{ $subscriptions->links() }}
    </div>
    @endif
</div>
@endsection