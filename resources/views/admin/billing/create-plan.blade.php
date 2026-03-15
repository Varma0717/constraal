@extends('layouts.admin')

@section('title', 'Create Billing Plan')
@section('page-title', 'Create Billing Plan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Create New Plan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.billing.plans.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Plan Name *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="price" class="form-label">Price *</label>
                    <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" required>
                    @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="currency" class="form-label">Currency *</label>
                    <select class="form-select @error('currency') is-invalid @enderror" id="currency" name="currency" required>
                        <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD</option>
                        <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>EUR</option>
                        <option value="GBP" {{ old('currency') == 'GBP' ? 'selected' : '' }}>GBP</option>
                    </select>
                    @error('currency')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="billing_period" class="form-label">Billing Period *</label>
                    <select class="form-select @error('billing_period') is-invalid @enderror" id="billing_period" name="billing_period" required>
                        <option value="monthly" {{ old('billing_period') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                        <option value="annual" {{ old('billing_period') == 'annual' ? 'selected' : '' }}>Annual</option>
                    </select>
                    @error('billing_period')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="features" class="form-label">Features (JSON)</label>
                <textarea class="form-control @error('features') is-invalid @enderror" id="features" name="features" rows="4" placeholder='["Feature 1", "Feature 2"]'>{{ old('features') }}</textarea>
                @error('features')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Create Plan</button>
                <a href="{{ route('admin.billing.plans') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection