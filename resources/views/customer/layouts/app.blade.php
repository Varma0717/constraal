<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Account') — Constraal</title>
    <link rel="icon" type="image/png" href="{{ asset('images/constraal_favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/constraal_favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="portal-body">
    <div class="portal-shell">
        <aside class="portal-sidebar">
            <div class="portal-brand">
                <img src="{{ asset('images/constraal_logo.png') }}" alt="Constraal">
                <div>
                    <div>Constraal</div>
                    <div class="text-xs text-muted">Customer Portal</div>
                </div>
            </div>

            <nav class="portal-nav">
                <a href="{{ route('account.customer.dashboard') }}" class="portal-link {{ request()->routeIs('account.customer.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Account</div>
                    <a href="{{ route('account.customer.profile.show') }}" class="portal-link {{ request()->routeIs('account.customer.profile.*') ? 'active' : '' }}">
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                    </a>
                    <a href="{{ route('account.customer.security.index') }}" class="portal-link {{ request()->routeIs('account.customer.security.*') ? 'active' : '' }}">
                        <i class="bi bi-shield-lock"></i>
                        <span>Security</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Billing</div>
                    <a href="{{ route('account.customer.billing.index') }}" class="portal-link {{ request()->routeIs('account.customer.billing.index') ? 'active' : '' }}">
                        <i class="bi bi-credit-card"></i>
                        <span>Billing</span>
                    </a>
                    <a href="{{ route('account.customer.billing.subscriptions') }}" class="portal-link {{ request()->routeIs('account.customer.billing.subscriptions') ? 'active' : '' }}">
                        <i class="bi bi-calendar-check"></i>
                        <span>Subscriptions</span>
                    </a>
                    <a href="{{ route('account.customer.billing.payment-methods') }}" class="portal-link {{ request()->routeIs('account.customer.billing.payment-methods') ? 'active' : '' }}">
                        <i class="bi bi-wallet2"></i>
                        <span>Payment Methods</span>
                    </a>
                    <a href="{{ route('account.customer.billing.invoices') }}" class="portal-link {{ request()->routeIs('account.customer.billing.invoices') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-text"></i>
                        <span>Invoices</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Services</div>
                    <a href="{{ route('account.customer.orders.index') }}" class="portal-link {{ request()->routeIs('account.customer.orders.*') ? 'active' : '' }}">
                        <i class="bi bi-box"></i>
                        <span>Orders</span>
                    </a>
                    <a href="{{ route('account.customer.services.index') }}" class="portal-link {{ request()->routeIs('account.customer.services.index') ? 'active' : '' }}">
                        <i class="bi bi-puzzle"></i>
                        <span>Services</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Support</div>
                    <a href="{{ route('account.customer.support.index') }}" class="portal-link {{ request()->routeIs('account.customer.support.*') ? 'active' : '' }}">
                        <i class="bi bi-chat-left-text"></i>
                        <span>Support</span>
                    </a>
                    <a href="{{ route('account.customer.notifications.index') }}" class="portal-link {{ request()->routeIs('account.customer.notifications.*') ? 'active' : '' }}">
                        <i class="bi bi-bell"></i>
                        <span>Notifications</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Settings</div>
                    <a href="{{ route('account.customer.activity.index') }}" class="portal-link {{ request()->routeIs('account.customer.activity.index') ? 'active' : '' }}">
                        <i class="bi bi-clock-history"></i>
                        <span>Activity</span>
                    </a>
                    <a href="{{ route('account.customer.settings.index') }}" class="portal-link {{ request()->routeIs('account.customer.settings.*') ? 'active' : '' }}">
                        <i class="bi bi-gear"></i>
                        <span>Settings</span>
                    </a>
                    <a href="{{ route('account.customer.privacy.index') }}" class="portal-link {{ request()->routeIs('account.customer.privacy.*') ? 'active' : '' }}">
                        <i class="bi bi-lock"></i>
                        <span>Privacy</span>
                    </a>
                </div>
            </nav>

            <form method="POST" action="{{ route('account.customer.logout') }}">
                @csrf
                <button type="submit" class="portal-link portal-link-button">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span>
                </button>
            </form>
        </aside>

        <div class="portal-main">
            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Errors:</strong>
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <div class="portal-header">
                <h1 class="portal-title">
                    <i class="bi @yield('icon', 'bi-speedometer2')"></i>
                    @yield('page-title', 'Dashboard')
                </h1>
                <div class="portal-actions">
                    <span class="portal-muted">{{ auth()->user()->name ?? 'User' }}</span>
                </div>
            </div>

            <div class="portal-content">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>