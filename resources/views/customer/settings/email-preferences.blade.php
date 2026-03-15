@extends('customer.layouts.app')

@section('title', 'Email Preferences')
@section('page-title', 'Email Preferences')
@section('icon', 'bi-envelope')

@section('content')
<div class="row">
    <div class="col-lg-6 offset-lg-3">
        <div class="card">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
                <h5 class="card-title mb-0">Email Communication Preferences</h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-4">Control which emails you receive from Constraal.</p>

                <form method="POST" action="{{ route('account.customer.settings.update-email-preferences') }}">
                    @csrf

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="billing_emails"
                                name="billing_emails"
                                {{ ($preferences['billing_emails'] ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="billing_emails">
                                <strong>Billing & Invoices</strong>
                                <br><small class="text-muted">Payment confirmations, invoice reminders, and subscription changes.</small>
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="security_alerts"
                                name="security_alerts"
                                {{ ($preferences['security_alerts'] ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="security_alerts">
                                <strong>Security Alerts</strong>
                                <br><small class="text-muted">Login notifications, password changes, and suspicious activity alerts.</small>
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="updates"
                                name="updates"
                                {{ ($preferences['updates'] ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="updates">
                                <strong>Product Updates</strong>
                                <br><small class="text-muted">New features, product announcements, and platform updates.</small>
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="marketing"
                                name="marketing"
                                {{ ($preferences['marketing'] ?? false) ? 'checked' : '' }}>
                            <label class="form-check-label" for="marketing">
                                <strong>Marketing & Promotions</strong>
                                <br><small class="text-muted">Special offers, partnerships, and promotional content.</small>
                            </label>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Save Preferences
                        </button>
                        <a href="{{ route('account.customer.settings.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection