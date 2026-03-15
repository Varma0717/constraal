@extends('customer.layouts.app')

@section('title', 'Notification Preferences')
@section('page-title', 'Notification Preferences')
@section('icon', 'bi-bell')

@section('content')
<div class="row">
    <div class="col-lg-6 offset-lg-3">
        <div class="card">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
                <h5 class="card-title mb-0">Manage Notification Preferences</h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-4">Choose which notifications you'd like to receive.</p>

                <form method="POST" action="{{ route('account.customer.notifications.update-preferences') }}">
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
                                <strong>Billing Notifications</strong>
                                <br><small class="text-muted">Receive emails about invoices, payments, and subscription changes.</small>
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
                                <br><small class="text-muted">Get notified about login attempts, password changes, and security events.</small>
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="platform_updates"
                                name="platform_updates"
                                {{ ($preferences['platform_updates'] ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="platform_updates">
                                <strong>Platform Updates</strong>
                                <br><small class="text-muted">Stay informed about new features, improvements, and maintenance.</small>
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="marketing_emails"
                                name="marketing_emails"
                                {{ ($preferences['marketing_emails'] ?? false) ? 'checked' : '' }}>
                            <label class="form-check-label" for="marketing_emails">
                                <strong>Marketing Emails</strong>
                                <br><small class="text-muted">Receive promotions, special offers, and partnership opportunities.</small>
                            </label>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Save Preferences
                        </button>
                        <a href="{{ route('account.customer.notifications.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection