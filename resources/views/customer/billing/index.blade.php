@extends('customer.layouts.app')

@section('title', 'Billing')
@section('page-title', 'Billing & Subscriptions')
@section('icon', 'bi-credit-card')

@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="stat-card">
            <div class="stat-label">Active Subscriptions</div>
            <div class="stat-value">{{ $activeSubscriptions }}</div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="stat-card">
            <div class="stat-label">Total Spent</div>
            <div class="stat-value">${{ number_format($totalSpent, 2) }}</div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Billing Links</h6>
                <div class="d-flex flex-column gap-2">
                    <a href="{{ route('account.customer.billing.subscriptions') }}" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-calendar-check"></i> View Subscriptions
                    </a>
                    <a href="{{ route('account.customer.billing.invoices') }}" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-file-earmark-text"></i> View Invoices
                    </a>
                    <a href="{{ route('account.customer.billing.payment-methods') }}" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-wallet2"></i> Payment Methods
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
                <h5 class="card-title mb-0">Recent Invoices</h5>
            </div>
            <div class="card-body p-0">
                @if($subscriptions->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead style="background-color: #f8f9fa;">
                            <tr>
                                <th>Plan</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Due Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subscriptions->take(5) as $subscription)
                            <tr>
                                <td>{{ $subscription->plan->name ?? 'Plan' }}</td>
                                <td>
                                    <span class="badge {{ $subscription->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ ucfirst($subscription->status) }}
                                    </span>
                                </td>
                                <td>${{ number_format($subscription->plan->price ?? 0, 2) }}</td>
                                <td>{{ $subscription->next_billing_date->format('M d, Y') ?? 'N/A' }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-sm" data-bs-toggle="tooltip" title="Manage">
                                        <i class="bi bi-gear"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-5">
                    <i class="bi bi-inbox" style="font-size: 2rem; color: #ccc;"></i>
                    <p class="text-muted mt-3">No subscriptions or invoices</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection