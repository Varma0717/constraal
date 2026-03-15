@extends('customer.layouts.app')

@section('title', 'Settings')
@section('page-title', 'Account Settings')
@section('icon', 'bi-gear')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
                <h5 class="card-title mb-0">General Settings</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('account.customer.settings.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label" for="theme">Theme</label>
                        <select class="form-select" id="theme" name="theme">
                            <option value="light" {{ (old('theme', $settings['theme'] ?? 'light') === 'light') ? 'selected' : '' }}>Light</option>
                            <option value="dark" {{ (old('theme', $settings['theme'] ?? 'light') === 'dark') ? 'selected' : '' }}>Dark</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="language">Language</label>
                        <select class="form-select" id="language" name="language">
                            <option value="en" {{ (old('language', $settings['language'] ?? 'en') === 'en') ? 'selected' : '' }}>English</option>
                            <option value="es" {{ (old('language', $settings['language'] ?? 'en') === 'es') ? 'selected' : '' }}>Spanish</option>
                            <option value="fr" {{ (old('language', $settings['language'] ?? 'en') === 'fr') ? 'selected' : '' }}>French</option>
                            <option value="de" {{ (old('language', $settings['language'] ?? 'en') === 'de') ? 'selected' : '' }}>German</option>
                        </select>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="email_notifications" id="emailNotifications" {{ ($settings['email_notifications'] ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="emailNotifications">
                            Receive email notifications
                        </label>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="sms_notifications" id="smsNotifications" {{ ($settings['sms_notifications'] ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="smsNotifications">
                            Receive SMS notifications
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Save Settings
                    </button>
                </form>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
                <h5 class="card-title mb-0">Email Preferences</h5>
            </div>
            <div class="card-body">
                <a href="{{ route('account.customer.settings.email-preferences') }}" class="btn btn-outline-primary">
                    <i class="bi bi-envelope"></i> Manage Email Preferences
                </a>
            </div>
        </div>
    </div>
</div>
@endsection