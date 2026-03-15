@extends('customer.layouts.app')

@section('title', 'Delete Account')
@section('page-title', 'Delete Account')
@section('icon', 'bi-trash')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card border-danger">
            <div class="card-header bg-danger text-white d-flex align-items-center gap-2">
                <i class="bi bi-exclamation-triangle"></i>
                <h5 class="card-title mb-0">Delete Account</h5>
            </div>
            <div class="card-body">
                <p class="text-danger mb-3">
                    <strong>Warning:</strong> Deleting your account is permanent and cannot be undone. All your data will be permanently deleted.
                </p>

                <ul class="mb-4">
                    <li>All personal information will be removed</li>
                    <li>All subscriptions will be cancelled</li>
                    <li>All payment information will be deleted</li>
                    <li>All support tickets will be closed</li>
                    <li>You will not be able to recover your account</li>
                </ul>

                <form method="POST" action="{{ route('account.customer.privacy.delete-account.post') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="password">Confirm Your Password</label>
                        <input
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="password"
                            name="password"
                            required>
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-check mb-4">
                        <input
                            class="form-check-input @error('confirmation') is-invalid @enderror"
                            type="checkbox"
                            name="confirmation"
                            id="confirmation"
                            value="on"
                            required>
                        <label class="form-check-label" for="confirmation">
                            I understand that this action is permanent and I want to delete my account
                        </label>
                        @error('confirmation')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i> Delete My Account
                        </button>
                        <a href="{{ route('account.customer.privacy.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection