<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Constraal</title>
    <link rel="icon" type="image/png" href="{{ asset('images/constraal_favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/constraal_favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="auth-shell">
    <a class="auth-back" href="{{ route('home') }}">Back to site</a>

    <div class="auth-card">
        <div class="auth-brand">
            <img src="{{ asset('images/constraal_logo.png') }}" alt="Constraal">
            <div>
                <h1 class="auth-title">Welcome back</h1>
                <p class="auth-subtitle">Access your Constraal account</p>
            </div>
        </div>

        @if($errors->any())
        <div class="auth-alert">
            {{ $errors->first() }}
        </div>
        @endif

        <form class="auth-form" method="POST" action="{{ route('account.customer.login.post') }}">
            @csrf

            <div>
                <label class="auth-label" for="email">Email Address</label>
                <input
                    type="email"
                    class="auth-input"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus>
                @error('email')
                <div class="auth-error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="auth-label" for="password">Password</label>
                <input
                    type="password"
                    class="auth-input"
                    id="password"
                    name="password"
                    required>
                @error('password')
                <div class="auth-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="auth-actions">
                <span></span>
                <a class="auth-link" href="{{ route('account.customer.reset-password') }}">Forgot password?</a>
            </div>

            <button type="submit" class="auth-button">Sign in</button>
        </form>

        <p class="auth-meta">No account yet? <a class="auth-link" href="{{ route('account.customer.signup') }}">Create one</a></p>
    </div>
</body>

</html>