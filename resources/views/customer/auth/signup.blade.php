<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account — Constraal</title>
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
                <h1 class="auth-title">Create account</h1>
                <p class="auth-subtitle">Join Constraal today</p>
            </div>
        </div>

        @if($errors->any())
        <div class="auth-alert">
            @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
        @endif

        <form class="auth-form" method="POST" action="{{ route('account.customer.signup.post') }}">
            @csrf

            <div>
                <label class="auth-label" for="name">Full Name</label>
                <input
                    type="text"
                    class="auth-input"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required>
                @error('name')
                <div class="auth-error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="auth-label" for="email">Email Address</label>
                <input
                    type="email"
                    class="auth-input"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required>
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
                <div class="portal-muted">At least 8 characters.</div>
            </div>

            <div>
                <label class="auth-label" for="password_confirmation">Confirm Password</label>
                <input
                    type="password"
                    class="auth-input"
                    id="password_confirmation"
                    name="password_confirmation"
                    required>
                @error('password_confirmation')
                <div class="auth-error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="auth-button">Create account</button>
        </form>

        <p class="auth-meta">Already have an account? <a class="auth-link" href="{{ route('account.customer.login') }}">Sign in here</a></p>
    </div>
</body>

</html>