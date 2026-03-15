@extends('customer.layouts.app')

@section('title', 'Services')
@section('page-title', 'My Services')
@section('icon', 'bi-puzzle')

@section('content')
<div class="row">
    @foreach($services as $service)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h5 class="card-title">{{ $service['name'] }}</h5>
                    <span class="badge bg-success">{{ $service['status'] }}</span>
                </div>
                <p class="card-text text-muted">{{ $service['description'] }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="card mt-4">
    <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
        <h5 class="card-title mb-0">Account Information</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <p class="text-muted mb-1">Account Tier</p>
                <p class="h6">{{ $accountTier }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <p class="text-muted mb-1">Services Available</p>
                <p class="h6">{{ count($services) }} Services</p>
            </div>
        </div>
    </div>
</div>
@endsection