@extends('customer.layouts.app')

@section('title', 'Privacy & Data')
@section('page-title', 'Privacy & Data Management')
@section('icon', 'bi-lock')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card mb-4">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
                <h5 class="card-title mb-0">Data Management</h5>
            </div>
            <div class="card-body">
                <p class="mb-3">Download or manage your account data.</p>
                <form method="POST" action="{{ route('account.customer.privacy.download-data') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-download"></i> Download My Data
                    </button>
                </form>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
                <h5 class="card-title mb-0">Privacy Settings</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('account.customer.privacy.update-preferences') }}">
                    @csrf

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="data_collection" id="dataCollection" checked>
                        <label class="form-check-label" for="dataCollection">
                            Allow data collection for service improvement
                        </label>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="analytics" id="analytics" checked>
                        <label class="form-check-label" for="analytics">
                            Allow analytics tracking
                        </label>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="marketing" id="marketing">
                        <label class="form-check-label" for="marketing">
                            Allow marketing communications
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Privacy Settings</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
                <h5 class="card-title mb-0">Delete Account</h5>
            </div>
            <div class="card-body">
                <p class="text-danger mb-3">
                    <i class="bi bi-exclamation-triangle"></i>
                    <strong>Warning:</strong> Deleting your account is permanent and cannot be undone.
                </p>
                <a href="{{ route('account.customer.privacy.delete-account') }}" class="btn btn-danger">
                    <i class="bi bi-trash"></i> Delete My Account
                </a>
            </div>
        </div>
    </div>
</div>
@endsection