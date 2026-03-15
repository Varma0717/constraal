<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set New Password — Constraal</title>
    <link rel="icon" type="image/png" href="{{ asset('images/constraal_favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/constraal_favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="auth-shell">
    <a class="auth-back" href="{{ route('account.customer.login') }}">Back to login</a>

    <div class="auth-card">
        <div class="auth-brand">
            <img src="{{ asset('images/constraal_logo.png') }}" alt="Constraal">
            <div>
                <h1 class="auth-title">Set New Password</h1>
                <p class="auth-subtitle">Enter your new password below</p>
            </div>
        </div>

        @if($errors->any())
        <div class="auth-alert">
            {{ $errors->first() }}
        </div>
        @endif

        <form class="auth-form" method="POST" action="{{ route('account.customer.reset-password.confirm.post') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <div>
                <label class="auth-label" for="password">New Password</label>
                <input
                    type="password"
                    class="auth-input"
                    id="password"
                    name="password"
                    placeholder="Minimum 8 characters"
                    required
                    autofocus>
                @error('password')
                <div class="auth-error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="auth-label" for="password_confirmation">Confirm New Password</label>
                <input
                    type="password"
                    class="auth-input"
                    id="password_confirmation"
                    name="password_confirmation"
                    required>
            </div>

            <button type="submit" class="auth-button">Set New Password</button>
        </form>
    </div>
</body>

</html>