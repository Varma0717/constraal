<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set New Password — Admin — Constraal</title>
    <link rel="icon" type="image/png" href="{{ asset('images/constraal_favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/constraal_favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="auth-shell">
    <a class="auth-back" href="{{ route('admin.login') }}">Back to login</a>

    <div class="auth-card">
        <div class="auth-brand">
            <img src="{{ asset('images/constraal_logo.png') }}" alt="Constraal">
            <div>
                <h1 class="auth-title">Set New Password</h1>
                <p class="auth-subtitle">Admin password reset</p>
            </div>
        </div>

        @if($errors->any())
        <div class="auth-alert">
            @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
        @endif

        <form class="auth-form" method="POST" action="{{ route('admin.password.reset.confirm.post') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <div>
                <label for="password" class="auth-label">New Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="auth-input"
                    placeholder="Minimum 8 characters"
                    required
                    autofocus>
                @error('password')
                <div class="auth-error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="auth-label">Confirm New Password</label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    class="auth-input"
                    required>
            </div>

            <button type="submit" class="auth-button">Set New Password</button>
        </form>
    </div>
</body>

</html>