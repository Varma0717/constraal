@extends('layouts.admin')

@section('title', 'Billing')
@section('page-title', 'Billing Management')

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Monthly Revenue</h6>
                <div style="font-size: 28px; font-weight: bold; color: #667eea;">${{ number_format($monthlyRevenue, 2) }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Active Subscriptions</h6>
                <div style="font-size: 28px; font-weight: bold; color: #2ecc71;">{{ $activeSubscriptions }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Failed Payments</h6>
                <div style="font-size: 28px; font-weight: bold; color: #f5576c;">{{ $failedPayments }}</div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header border-bottom d-flex justify-content-around">
        <a href="{{ route('admin.billing.subscriptions') }}" class="card-link">Subscriptions</a>
        <a href="{{ route('admin.billing.payments') }}" class="card-link">Payments</a>
        <a href="{{ route('admin.billing.plans') }}" class="card-link">Plans</a>
    </div>
    <div class="card-body">
        <p style="text-align: center; color: #999;">Select a section from above to view details</p>
    </div>
</div>
@endsection