<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password — Admin — Constraal</title>
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
                <h1 class="auth-title">Reset Password</h1>
                <p class="auth-subtitle">Admin password recovery</p>
            </div>
        </div>

        @if(session('status'))
        <div class="auth-alert" style="background-color: #d4edda; color: #155724; border-color: #c3e6cb;">
            {{ session('status') }}
        </div>
        @endif

        @if($errors->any())
        <div class="auth-alert">
            @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
        @endif

        <form class="auth-form" method="POST" action="{{ route('admin.password.reset.post') }}">
            @csrf

            <div>
                <label for="email" class="auth-label">Admin Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="auth-input"
                    value="{{ old('email') }}"
                    placeholder="Enter your admin email"
                    required
                    autofocus>
                @error('email')
                <div class="auth-error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="auth-button">Send Reset Link</button>
        </form>

        <p class="auth-meta"><a class="auth-link" href="{{ route('admin.login') }}">Back to Admin Login</a></p>
    </div>
</body>

</html>