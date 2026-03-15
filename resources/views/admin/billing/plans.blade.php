@extends('layouts.admin')

@section('title', 'Billing Plans')
@section('page-title', 'Billing Plans')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">All Plans</h5>
        <a href="{{ route('admin.billing.plans.create') }}" class="btn btn-primary">
            <i class="bi bi-plus"></i> Create Plan
        </a>
    </div>
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Billing Period</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($plans as $plan)
                    <tr>
                        <td>{{ $plan->id }}</td>
                        <td>{{ $plan->name }}</td>
                        <td>${{ number_format($plan->price, 2) }} {{ $plan->currency ?? 'USD' }}</td>
                        <td>{{ ucfirst($plan->billing_period) }}</td>
                        <td>
                            @if($plan->is_active ?? true)
                            <span class="badge bg-success">Active</span>
                            @else
                            <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $plan->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">No billing plans found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($plans->hasPages())
    <div class="card-footer">
        {{ $plans->links() }}
    </div>
    @endif
</div>
@endsection