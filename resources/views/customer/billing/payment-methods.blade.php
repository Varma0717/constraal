@extends('customer.layouts.app')

@section('title', 'Payment Methods')
@section('page-title', 'Payment Methods')
@section('icon', 'bi-wallet2')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
                <h5 class="card-title mb-0">Your Payment Methods</h5>
            </div>
            <div class="card-body">
                @if($paymentMethods->count() > 0)
                <div class="list-group">
                    @foreach($paymentMethods as $method)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1">{{ $method->card_holder }}</h6>
                            <p class="text-muted mb-0" style="font-size: 0.9rem;">
                                <i class="bi bi-credit-card"></i> Visa ending in {{ $method->card_last_four }}
                            </p>
                            <small class="text-muted">Expires {{ $method->expiry }}</small>
                            @if($method->is_default)
                            <span class="badge bg-success ms-2">Default</span>
                            @endif
                        </div>
                        <div>
                            @if(!$method->is_default)
                            <form method="POST" action="{{ route('account.customer.billing.set-default-payment-method', $method) }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-primary">Set Default</button>
                            </form>
                            @endif
                            <form method="POST" action="{{ route('account.customer.billing.remove-payment-method', $method) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?');">Remove</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-muted text-center">No payment methods added</p>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
                <h5 class="card-title mb-0">Add Payment Method</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('account.customer.billing.add-payment-method') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Card Number</label>
                        <input type="text" class="form-control" name="card_number" placeholder="1234 5678 9012 3456" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Card Holder</label>
                        <input type="text" class="form-control" name="card_holder" placeholder="John Doe" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Expiry Date</label>
                            <input type="text" class="form-control" name="expiry" placeholder="MM/YY" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">CVV</label>
                            <input type="text" class="form-control" name="cvv" placeholder="123" required>
                        </div>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="set_default" id="setDefault">
                        <label class="form-check-label" for="setDefault">
                            Set as default
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-plus-circle"></i> Add Payment Method
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection