<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password — Constraal</title>
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
                <h1 class="auth-title">Reset Password</h1>
                <p class="auth-subtitle">Enter your email to receive a reset link</p>
            </div>
        </div>

        @if(session('success'))
        <div class="auth-alert" style="background-color: #d4edda; color: #155724; border-color: #c3e6cb;">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="auth-alert">
            {{ session('error') }}
        </div>
        @endif

        @if($errors->any())
        <div class="auth-alert">
            {{ $errors->first() }}
        </div>
        @endif

        <form class="auth-form" method="POST" action="{{ route('account.customer.reset-password.post') }}">
            @csrf

            <div>
                <label class="auth-label" for="email">Email Address</label>
                <input
                    type="email"
                    class="auth-input"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your registered email"
                    required
                    autofocus>
                @error('email')
                <div class="auth-error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="auth-button">Send Reset Link</button>
        </form>

        <p class="auth-meta">Remember your password? <a class="auth-link" href="{{ route('account.customer.login') }}">Sign in</a></p>
    </div>
</body>

</html>