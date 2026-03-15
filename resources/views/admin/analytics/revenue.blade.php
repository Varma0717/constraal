@extends('layouts.admin')

@section('title', 'Revenue Analytics')
@section('page-title', 'Revenue Analytics')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body text-center">
                <div style="font-size: 48px; font-weight: bold; color: #28a745;">${{ number_format($totalRevenue, 2) }}</div>
                <p class="text-muted mb-0">Total Revenue</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body text-center">
                <div style="font-size: 48px; font-weight: bold; color: #0d6efd;">${{ number_format($averageOrderValue ?? 0, 2) }}</div>
                <p class="text-muted mb-0">Average Order Value</p>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Monthly Revenue (Last 12 Months)</h5>
    </div>
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Revenue</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($monthlyRevenue as $row)
                    <tr>
                        <td>{{ \Carbon\Carbon::createFromDate($row->year, $row->month, 1)->format('F Y') }}</td>
                        <td>${{ number_format($row->total, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="text-center py-4">No revenue data available</td>
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