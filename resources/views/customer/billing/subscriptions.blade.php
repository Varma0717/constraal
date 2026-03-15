@extends('customer.layouts.app')

@section('title', 'Subscriptions')
@section('page-title', 'My Subscriptions')
@section('icon', 'bi-calendar-check')

@section('content')
<div class="card">
    <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
        <h5 class="card-title mb-0">Manage Subscriptions</h5>
    </div>
    <div class="card-body p-0">
        @if($subscriptions->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead style="background-color: #f8f9fa;">
                    <tr>
                        <th>Plan Name</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Billing Cycle</th>
                        <th>Next Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscriptions as $subscription)
                    <tr>
                        <td>
                            <span class="fw-600">{{ $subscription->plan->name ?? 'Unknown Plan' }}</span>
                        </td>
                        <td>
                            <span class="badge {{ $subscription->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($subscription->status) }}
                            </span>
                        </td>
                        <td>${{ number_format($subscription->plan->price ?? 0, 2) }}</td>
                        <td>{{ ucfirst($subscription->billing_cycle ?? 'monthly') }}</td>
                        <td>{{ $subscription->next_billing_date->format('M d, Y') ?? 'N/A' }}</td>
                        <td>
                            @if($subscription->status === 'active')
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#changeplanmodal" title="Change Plan">
                                <i class="bi bi-arrow-repeat"></i>
                            </button>
                            <form method="POST" action="{{ route('account.customer.billing.cancel', $subscription) }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?');" title="Cancel">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $subscriptions->links() }}
        @else
        <div class="text-center py-5">
            <i class="bi bi-calendar-x" style="font-size: 2rem; color: #ccc;"></i>
            <p class="text-muted mt-3">No active subscriptions</p>
        </div>
        @endif
    </div>
</div>
@endsection