@extends('customer.layouts.app')

@section('title', 'Orders')
@section('page-title', 'Purchase History')
@section('icon', 'bi-box')

@section('content')
<div class="card">
    <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
        <h5 class="card-title mb-0">Your Orders</h5>
    </div>
    <div class="card-body p-0">
        @if($orders->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead style="background-color: #f8f9fa;">
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td><strong>ORD-{{ $order->id }}</strong></td>
                        <td>{{ $order->description ?? 'Order' }}</td>
                        <td>${{ number_format($order->total ?? 0, 2) }}</td>
                        <td>{{ $order->created_at->format('M d, Y') }}</td>
                        <td>
                            <span class="badge {{ $order->status === 'completed' ? 'bg-success' : 'bg-warning' }}">
                                {{ ucfirst($order->status ?? 'processing') }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('account.customer.orders.show', $order) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $orders->links() }}
        @else
        <div class="text-center py-5">
            <i class="bi bi-inbox" style="font-size: 2rem; color: #ccc;"></i>
            <p class="text-muted mt-3">No orders found</p>
        </div>
        @endif
    </div>
</div>
@endsection