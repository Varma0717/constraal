<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Password — Admin — Constraal</title>
    <link rel="icon" type="image/png" href="{{ asset('images/constraal_favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/constraal_favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="auth-shell">
    <div class="auth-card">
        <div class="auth-brand">
            <img src="{{ asset('images/constraal_logo.png') }}" alt="Constraal">
            <div>
                <h1 class="auth-title">Confirm Password</h1>
                <p class="auth-subtitle">Please confirm your password before continuing</p>
            </div>
        </div>

        @if($errors->any())
        <div class="auth-alert">
            @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
        @endif

        <form class="auth-form" method="POST" action="{{ route('admin.password.confirm.post') }}">
            @csrf

            <div>
                <label for="password" class="auth-label">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="auth-input"
                    required
                    autofocus>
                @error('password')
                <div class="auth-error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="auth-button">Confirm Password</button>
        </form>
    </div>
</body>

</html>