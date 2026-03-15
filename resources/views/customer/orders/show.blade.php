@extends('customer.layouts.app')

@section('title', 'Order Detail')
@section('page-title', 'Order #' . ($order->order_number ?? 'ORD-' . $order->id))
@section('icon', 'bi-box')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card mb-4">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Order Details</h5>
                    <span class="badge {{ $order->status === 'completed' ? 'bg-success' : ($order->status === 'cancelled' ? 'bg-danger' : 'bg-warning') }}">
                        {{ ucfirst($order->status ?? 'processing') }}
                    </span>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="text-muted">Order Number</h6>
                        <p><strong>{{ $order->order_number ?? 'ORD-' . $order->id }}</strong></p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Order Date</h6>
                        <p>{{ $order->created_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="text-muted">Total Amount</h6>
                        <p class="h4">${{ number_format($order->total_amount ?? 0, 2) }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Last Updated</h6>
                        <p>{{ $order->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>

                <hr>

                <h6 class="mb-3">Order Items</h6>
                @php
                $items = is_array($order->items) ? $order->items : json_decode($order->items ?? '[]', true);
                @endphp

                @if(!empty($items))
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th class="text-center">Qty</th>
                                <th class="text-end">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>{{ $item['name'] ?? 'Item' }}</td>
                                <td class="text-center">{{ $item['quantity'] ?? 1 }}</td>
                                <td class="text-end">${{ number_format($item['price'] ?? 0, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">Total</th>
                                <th class="text-end">${{ number_format($order->total_amount ?? 0, 2) }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                @else
                <p class="text-muted">No detailed item breakdown available.</p>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>{{ $order->description ?? 'Order' }}</td>
                                <td class="text-end">${{ number_format($order->total_amount ?? 0, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('account.customer.orders.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back to Orders
            </a>
            <a href="{{ route('account.customer.orders.download-invoice', $order) }}" class="btn btn-primary">
                <i class="bi bi-download"></i> Download Invoice
            </a>
        </div>
    </div>
</div>
@endsection