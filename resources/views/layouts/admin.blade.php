<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Constraal</title>
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
                    <div class="text-xs text-muted">Admin Console</div>
                </div>
            </div>

            <nav class="portal-nav">
                <a href="{{ route('admin.dashboard') }}" class="portal-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Users</div>
                    <a href="{{ route('admin.users.index') }}" class="portal-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <i class="bi bi-people"></i>
                        <span>Users</span>
                    </a>
                    <a href="{{ route('admin.admins.index') }}" class="portal-link {{ request()->routeIs('admin.admins.*') ? 'active' : '' }}">
                        <i class="bi bi-shield-lock"></i>
                        <span>Admins</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Billing</div>
                    <a href="{{ route('admin.billing.index') }}" class="portal-link {{ request()->routeIs('admin.billing.index') ? 'active' : '' }}">
                        <i class="bi bi-credit-card"></i>
                        <span>Overview</span>
                    </a>
                    <a href="{{ route('admin.billing.subscriptions') }}" class="portal-link {{ request()->routeIs('admin.billing.subscriptions') ? 'active' : '' }}">
                        <i class="bi bi-calendar-check"></i>
                        <span>Subscriptions</span>
                    </a>
                    <a href="{{ route('admin.billing.payments') }}" class="portal-link {{ request()->routeIs('admin.billing.payments') ? 'active' : '' }}">
                        <i class="bi bi-cash-coin"></i>
                        <span>Payments</span>
                    </a>
                    <a href="{{ route('admin.billing.plans') }}" class="portal-link {{ request()->routeIs('admin.billing.plans*') ? 'active' : '' }}">
                        <i class="bi bi-card-list"></i>
                        <span>Plans</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Content</div>
                    <a href="{{ route('admin.pages') }}" class="portal-link {{ request()->routeIs('admin.pages*') && !request()->routeIs('admin.cms.*') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark"></i>
                        <span>Pages</span>
                    </a>
                    <a href="{{ route('admin.cms.pages.index') }}" class="portal-link {{ request()->routeIs('admin.cms.*') ? 'active' : '' }}">
                        <i class="bi bi-layout-text-window"></i>
                        <span>CMS Pages</span>
                    </a>
                    <a href="{{ route('admin.media.index') }}" class="portal-link {{ request()->routeIs('admin.media.*') ? 'active' : '' }}">
                        <i class="bi bi-images"></i>
                        <span>Media</span>
                    </a>
                    <a href="{{ route('admin.navigation.index') }}" class="portal-link {{ request()->routeIs('admin.navigation.*') ? 'active' : '' }}">
                        <i class="bi bi-menu-button-wide"></i>
                        <span>Navigation</span>
                    </a>
                    <a href="{{ route('admin.announcements.index') }}" class="portal-link {{ request()->routeIs('admin.announcements.*') ? 'active' : '' }}">
                        <i class="bi bi-megaphone"></i>
                        <span>Announcements</span>
                    </a>
                    <a href="{{ route('admin.email-templates.index') }}" class="portal-link {{ request()->routeIs('admin.email-templates.*') ? 'active' : '' }}">
                        <i class="bi bi-envelope"></i>
                        <span>Email Templates</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Jobs</div>
                    <a href="{{ route('admin.jobs') }}" class="portal-link {{ request()->routeIs('admin.jobs*') ? 'active' : '' }}">
                        <i class="bi bi-briefcase"></i>
                        <span>Job Listings</span>
                    </a>
                    <a href="{{ route('admin.applications') }}" class="portal-link {{ request()->routeIs('admin.applications*') ? 'active' : '' }}">
                        <i class="bi bi-file-person"></i>
                        <span>Applications</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Infrastructure</div>
                    <a href="{{ route('admin.infrastructure.index') }}" class="portal-link {{ request()->routeIs('admin.infrastructure.index') ? 'active' : '' }}">
                        <i class="bi bi-hdd-rack"></i>
                        <span>Status</span>
                    </a>
                    <a href="{{ route('admin.infrastructure.monitoring') }}" class="portal-link {{ request()->routeIs('admin.infrastructure.monitoring') ? 'active' : '' }}">
                        <i class="bi bi-activity"></i>
                        <span>Monitoring</span>
                    </a>
                    <a href="{{ route('admin.infrastructure.backup') }}" class="portal-link {{ request()->routeIs('admin.infrastructure.backup') ? 'active' : '' }}">
                        <i class="bi bi-cloud-download"></i>
                        <span>Backup</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Analytics</div>
                    <a href="{{ route('admin.analytics.index') }}" class="portal-link {{ request()->routeIs('admin.analytics.*') ? 'active' : '' }}">
                        <i class="bi bi-graph-up"></i>
                        <span>Analytics</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Security</div>
                    <a href="{{ route('admin.security.index') }}" class="portal-link {{ request()->routeIs('admin.security.index') ? 'active' : '' }}">
                        <i class="bi bi-lock"></i>
                        <span>Overview</span>
                    </a>
                    <a href="{{ route('admin.security.login-attempts') }}" class="portal-link {{ request()->routeIs('admin.security.login-attempts') ? 'active' : '' }}">
                        <i class="bi bi-clock-history"></i>
                        <span>Login Attempts</span>
                    </a>
                    <a href="{{ route('admin.security.blocked-ips') }}" class="portal-link {{ request()->routeIs('admin.security.blocked-ips') ? 'active' : '' }}">
                        <i class="bi bi-ban"></i>
                        <span>Blocked IPs</span>
                    </a>
                    <a href="{{ route('admin.logs.index') }}" class="portal-link {{ request()->routeIs('admin.logs.*') ? 'active' : '' }}">
                        <i class="bi bi-journal-text"></i>
                        <span>Logs</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">API</div>
                    <a href="{{ route('admin.api-keys.index') }}" class="portal-link {{ request()->routeIs('admin.api-keys.*') ? 'active' : '' }}">
                        <i class="bi bi-key"></i>
                        <span>API Keys</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Messages</div>
                    <a href="{{ route('admin.contact-messages.index') }}" class="portal-link {{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}">
                        <i class="bi bi-envelope-open"></i>
                        <span>Contact Messages</span>
                    </a>
                    <a href="{{ route('admin.inquiries') }}" class="portal-link {{ request()->routeIs('admin.inquiries') ? 'active' : '' }}">
                        <i class="bi bi-question-circle"></i>
                        <span>Inquiries</span>
                    </a>
                    <a href="{{ route('admin.subscribers.index') }}" class="portal-link {{ request()->routeIs('admin.subscribers.*') ? 'active' : '' }}">
                        <i class="bi bi-people-fill"></i>
                        <span>Subscribers</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Settings</div>
                    <a href="{{ route('admin.settings.index') }}" class="portal-link {{ request()->routeIs('admin.settings.index') ? 'active' : '' }}">
                        <i class="bi bi-sliders"></i>
                        <span>System Settings</span>
                    </a>
                    <a href="{{ route('admin.settings.feature-flags') }}" class="portal-link {{ request()->routeIs('admin.settings.feature-flags') ? 'active' : '' }}">
                        <i class="bi bi-toggles"></i>
                        <span>Feature Flags</span>
                    </a>
                    <a href="{{ route('admin.infrastructure.maintenance') }}" class="portal-link {{ request()->routeIs('admin.infrastructure.maintenance') ? 'active' : '' }}">
                        <i class="bi bi-tools"></i>
                        <span>Maintenance</span>
                    </a>
                </div>
            </nav>

            <form method="POST" action="{{ route('admin.logout') }}">
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

            @if(session('status'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('status') }}
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
                    <span class="portal-muted">{{ auth('admin')->user()->name ?? 'Admin' }}</span>
                </div>
            </div>

            <div class="portal-content">
                @yield('content')
            </div>

            @if(auth('admin')->check() && auth('admin')->user()->hasPermission('manage_settings'))
            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1080;">
                <form method="POST" action="{{ route('admin.infrastructure.clear-cache') }}" onsubmit="return confirm('Clear Laravel caches now?');">
                    @csrf
                    <button type="submit" class="btn btn-dark shadow-sm">
                        <i class="bi bi-lightning-charge me-1"></i>
                        Clear Caches
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>