<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Constraal Admin') - Constraal Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --bs-primary: #0d6efd;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .sidebar {
            background-color: #2d3748;
            min-height: 100vh;
            padding: 20px 0;
            position: fixed;
            width: 250px;
            left: 0;
            top: 0;
        }

        .sidebar a {
            color: #cbd5e0;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            font-size: 14px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #4a5568;
            color: #fff;
            border-left: 3px solid #0d6efd;
            padding-left: 17px;
        }

        .sidebar-header {
            padding: 20px;
            color: #fff;
            font-weight: bold;
            font-size: 18px;
            border-bottom: 1px solid #4a5568;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            background-color: #f7fafc;
            min-height: 100vh;
        }

        .navbar-admin {
            background-color: #fff;
            border-bottom: 1px solid #e2e8f0;
            padding: 15px 0;
            margin-bottom: 30px;
        }

        .card {
            border: none;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .stat-card {
            padding: 20px;
            border-radius: 8px;
            color: #fff;
        }

        .stat-card.primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .stat-card.success {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .stat-card.warning {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }

        .stat-card.info {
            background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);
        }
    </style>
    @yield('styles')
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <i class="bi bi-speedometer2"></i> Constraal Admin
        </div>
        <nav>
            <a href="{{ route('admin.dashboard') }}" class="@if(Request::routeIs('admin.dashboard')) active @endif">
                <i class="bi bi-house-fill"></i> Dashboard
            </a>
            <hr style="border-color: #4a5568; margin: 0;">

            <!-- Users Section -->
            <div style="padding: 10px 0; color: #a0aec0; font-size: 12px; text-transform: uppercase; padding-left: 20px; margin-top: 10px; font-weight: bold;">
                <i class="bi bi-people"></i> Users
            </div>
            <a href="{{ route('admin.users.index') }}" class="@if(Request::routeIs('admin.users.*')) active @endif">
                <i class="bi bi-person"></i> Users
            </a>
            <a href="{{ route('admin.admins.index') }}" class="@if(Request::routeIs('admin.admins.*')) active @endif">
                <i class="bi bi-shield-lock"></i> Admins
            </a>

            <!-- Billing Section -->
            <div style="padding: 10px 0; color: #a0aec0; font-size: 12px; text-transform: uppercase; padding-left: 20px; margin-top: 10px; font-weight: bold;">
                <i class="bi bi-credit-card"></i> Billing
            </div>
            <a href="{{ route('admin.billing.index') }}" class="@if(Request::routeIs('admin.billing.index')) active @endif">
                <i class="bi bi-cash-stack"></i> Overview
            </a>
            <a href="{{ route('admin.billing.subscriptions') }}" class="@if(Request::routeIs('admin.billing.subscriptions')) active @endif">
                <i class="bi bi-calendar-check"></i> Subscriptions
            </a>
            <a href="{{ route('admin.billing.payments') }}" class="@if(Request::routeIs('admin.billing.payments')) active @endif">
                <i class="bi bi-cash-coin"></i> Payments
            </a>
            <a href="{{ route('admin.billing.plans') }}" class="@if(Request::routeIs('admin.billing.plans*')) active @endif">
                <i class="bi bi-card-list"></i> Plans
            </a>

            <!-- Content Section -->
            <div style="padding: 10px 0; color: #a0aec0; font-size: 12px; text-transform: uppercase; padding-left: 20px; margin-top: 10px; font-weight: bold;">
                <i class="bi bi-file-earmark-text"></i> Content
            </div>
            <a href="{{ route('admin.pages') }}" class="@if(Request::routeIs('admin.pages*')) active @endif">
                <i class="bi bi-file-earmark"></i> Pages
            </a>
            <a href="{{ route('admin.cms.pages.index') }}" class="@if(Request::routeIs('admin.cms.*')) active @endif">
                <i class="bi bi-layout-text-window"></i> CMS Pages
            </a>
            <a href="{{ route('admin.media.index') }}" class="@if(Request::routeIs('admin.media.*')) active @endif">
                <i class="bi bi-images"></i> Media
            </a>
            <a href="{{ route('admin.navigation.index') }}" class="@if(Request::routeIs('admin.navigation.*')) active @endif">
                <i class="bi bi-menu-button-wide"></i> Navigation
            </a>
            <a href="{{ route('admin.announcements.index') }}" class="@if(Request::routeIs('admin.announcements.*')) active @endif">
                <i class="bi bi-megaphone"></i> Announcements
            </a>
            <a href="{{ route('admin.email-templates.index') }}" class="@if(Request::routeIs('admin.email-templates.*')) active @endif">
                <i class="bi bi-envelope"></i> Email Templates
            </a>

            <!-- Jobs & Applications -->
            <div style="padding: 10px 0; color: #a0aec0; font-size: 12px; text-transform: uppercase; padding-left: 20px; margin-top: 10px; font-weight: bold;">
                <i class="bi bi-briefcase"></i> Jobs
            </div>
            <a href="{{ route('admin.jobs') }}" class="@if(Request::routeIs('admin.jobs*')) active @endif">
                <i class="bi bi-briefcase"></i> Job Listings
            </a>
            <a href="{{ route('admin.applications') }}" class="@if(Request::routeIs('admin.applications*')) active @endif">
                <i class="bi bi-file-person"></i> Applications
            </a>

            <!-- Infrastructure Section -->
            <div style="padding: 10px 0; color: #a0aec0; font-size: 12px; text-transform: uppercase; padding-left: 20px; margin-top: 10px; font-weight: bold;">
                <i class="bi bi-server"></i> Infrastructure
            </div>
            <a href="{{ route('admin.infrastructure.index') }}" class="@if(Request::routeIs('admin.infrastructure.index')) active @endif">
                <i class="bi bi-hdd-rack"></i> Status
            </a>
            <a href="{{ route('admin.infrastructure.monitoring') }}" class="@if(Request::routeIs('admin.infrastructure.monitoring')) active @endif">
                <i class="bi bi-activity"></i> Monitoring
            </a>
            <a href="{{ route('admin.infrastructure.backup') }}" class="@if(Request::routeIs('admin.infrastructure.backup')) active @endif">
                <i class="bi bi-cloud-download"></i> Backup
            </a>

            <!-- Analytics Section -->
            <div style="padding: 10px 0; color: #a0aec0; font-size: 12px; text-transform: uppercase; padding-left: 20px; margin-top: 10px; font-weight: bold;">
                <i class="bi bi-bar-chart"></i> Analytics
            </div>
            <a href="{{ route('admin.analytics.index') }}" class="@if(Request::routeIs('admin.analytics.*')) active @endif">
                <i class="bi bi-graph-up"></i> Analytics
            </a>

            <!-- Security Section -->
            <div style="padding: 10px 0; color: #a0aec0; font-size: 12px; text-transform: uppercase; padding-left: 20px; margin-top: 10px; font-weight: bold;">
                <i class="bi bi-shield"></i> Security
            </div>
            <a href="{{ route('admin.security.index') }}" class="@if(Request::routeIs('admin.security.index')) active @endif">
                <i class="bi bi-lock"></i> Overview
            </a>
            <a href="{{ route('admin.security.login-attempts') }}" class="@if(Request::routeIs('admin.security.login-attempts')) active @endif">
                <i class="bi bi-clock-history"></i> Login Attempts
            </a>
            <a href="{{ route('admin.security.blocked-ips') }}" class="@if(Request::routeIs('admin.security.blocked-ips')) active @endif">
                <i class="bi bi-ban"></i> Blocked IPs
            </a>
            <a href="{{ route('admin.logs.index') }}" class="@if(Request::routeIs('admin.logs.*')) active @endif">
                <i class="bi bi-journal-text"></i> Logs
            </a>

            <!-- API Management Section -->
            <div style="padding: 10px 0; color: #a0aec0; font-size: 12px; text-transform: uppercase; padding-left: 20px; margin-top: 10px; font-weight: bold;">
                <i class="bi bi-code-slash"></i> API
            </div>
            <a href="{{ route('admin.api-keys.index') }}" class="@if(Request::routeIs('admin.api-keys.*')) active @endif">
                <i class="bi bi-key"></i> API Keys
            </a>

            <!-- Contact Messages Section -->
            <div style="padding: 10px 0; color: #a0aec0; font-size: 12px; text-transform: uppercase; padding-left: 20px; margin-top: 10px; font-weight: bold;">
                <i class="bi bi-chat"></i> Messages
            </div>
            <a href="{{ route('admin.contact-messages.index') }}" class="@if(Request::routeIs('admin.contact-messages.*')) active @endif">
                <i class="bi bi-envelope-open"></i> Contact Messages
            </a>
            <a href="{{ route('admin.inquiries') }}" class="@if(Request::routeIs('admin.inquiries')) active @endif">
                <i class="bi bi-question-circle"></i> Inquiries
            </a>
            <a href="{{ route('admin.subscribers.index') }}" class="@if(Request::routeIs('admin.subscribers.*')) active @endif">
                <i class="bi bi-people-fill"></i> Subscribers
            </a>

            <!-- Settings Section -->
            <div style="padding: 10px 0; color: #a0aec0; font-size: 12px; text-transform: uppercase; padding-left: 20px; margin-top: 10px; font-weight: bold;">
                <i class="bi bi-gear"></i> Settings
            </div>
            <a href="{{ route('admin.settings.index') }}" class="@if(Request::routeIs('admin.settings.index')) active @endif">
                <i class="bi bi-sliders"></i> System Settings
            </a>
            <a href="{{ route('admin.settings.feature-flags') }}" class="@if(Request::routeIs('admin.settings.feature-flags')) active @endif">
                <i class="bi bi-toggles"></i> Feature Flags
            </a>
            <a href="{{ route('admin.infrastructure.maintenance') }}" class="@if(Request::routeIs('admin.infrastructure.maintenance')) active @endif">
                <i class="bi bi-tools"></i> Maintenance Mode
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <div class="navbar-admin d-flex justify-content-between align-items-center">
            <div>
                <h4 style="margin: 0;">@yield('page-title', 'Dashboard')</h4>
            </div>
            <div class="dropdown">
                <button class="btn btn-link dropdown-toggle text-dark" type="button" id="adminMenu" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle"></i> {{ Auth::guard('admin')->user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminMenu">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST" action="{{ route('admin.logout') }}" style="margin: 0;">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Alerts -->
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if (session('status'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <!-- Content -->
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>