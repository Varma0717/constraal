<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Constraal</title>
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
                <h1 class="auth-title">Admin Login</h1>
                <p class="auth-subtitle">Constraal administration console</p>
            </div>
        </div>

        @if ($errors->any())
        <div class="auth-alert">
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
        @endif

        <form class="auth-form" method="POST" action="{{ route('admin.login.post') }}">
            @csrf

            <div>
                <label for="email" class="auth-label">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="auth-input"
                    value="{{ old('email') }}"
                    required
                    autofocus>
                @error('email')
                <div class="auth-error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password" class="auth-label">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="auth-input"
                    required>
                @error('password')
                <div class="auth-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="auth-actions">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
                <a class="auth-link" href="{{ route('admin.password.reset') }}">Forgot password?</a>
            </div>

            <button type="submit" class="auth-button">Sign in</button>
        </form>
    </div>
</body>

</html>