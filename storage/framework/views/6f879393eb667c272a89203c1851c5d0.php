<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin'); ?> — Constraal</title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/constraal_favicon.png')); ?>">
    <link rel="apple-touch-icon" href="<?php echo e(asset('images/constraal_favicon.png')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>

<body class="portal-body">
    <div class="portal-shell">
        <aside class="portal-sidebar">
            <div class="portal-brand">
                <img src="<?php echo e(asset('images/constraal_logo.png')); ?>" alt="Constraal">
                <div>
                    <div>Constraal</div>
                    <div class="text-xs text-muted">Admin Console</div>
                </div>
            </div>

            <nav class="portal-nav">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Users</div>
                    <a href="<?php echo e(route('admin.users.index')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.users.*') ? 'active' : ''); ?>">
                        <i class="bi bi-people"></i>
                        <span>Users</span>
                    </a>
                    <a href="<?php echo e(route('admin.admins.index')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.admins.*') ? 'active' : ''); ?>">
                        <i class="bi bi-shield-lock"></i>
                        <span>Admins</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Billing</div>
                    <a href="<?php echo e(route('admin.billing.index')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.billing.index') ? 'active' : ''); ?>">
                        <i class="bi bi-credit-card"></i>
                        <span>Overview</span>
                    </a>
                    <a href="<?php echo e(route('admin.billing.subscriptions')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.billing.subscriptions') ? 'active' : ''); ?>">
                        <i class="bi bi-calendar-check"></i>
                        <span>Subscriptions</span>
                    </a>
                    <a href="<?php echo e(route('admin.billing.payments')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.billing.payments') ? 'active' : ''); ?>">
                        <i class="bi bi-cash-coin"></i>
                        <span>Payments</span>
                    </a>
                    <a href="<?php echo e(route('admin.billing.plans')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.billing.plans*') ? 'active' : ''); ?>">
                        <i class="bi bi-card-list"></i>
                        <span>Plans</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Content</div>
                    <a href="<?php echo e(route('admin.pages')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.pages*') && !request()->routeIs('admin.cms.*') ? 'active' : ''); ?>">
                        <i class="bi bi-file-earmark"></i>
                        <span>Pages</span>
                    </a>
                    <a href="<?php echo e(route('admin.cms.pages.index')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.cms.*') ? 'active' : ''); ?>">
                        <i class="bi bi-layout-text-window"></i>
                        <span>CMS Pages</span>
                    </a>
                    <a href="<?php echo e(route('admin.media.index')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.media.*') ? 'active' : ''); ?>">
                        <i class="bi bi-images"></i>
                        <span>Media</span>
                    </a>
                    <a href="<?php echo e(route('admin.navigation.index')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.navigation.*') ? 'active' : ''); ?>">
                        <i class="bi bi-menu-button-wide"></i>
                        <span>Navigation</span>
                    </a>
                    <a href="<?php echo e(route('admin.announcements.index')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.announcements.*') ? 'active' : ''); ?>">
                        <i class="bi bi-megaphone"></i>
                        <span>Announcements</span>
                    </a>
                    <a href="<?php echo e(route('admin.email-templates.index')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.email-templates.*') ? 'active' : ''); ?>">
                        <i class="bi bi-envelope"></i>
                        <span>Email Templates</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Jobs</div>
                    <a href="<?php echo e(route('admin.jobs')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.jobs*') ? 'active' : ''); ?>">
                        <i class="bi bi-briefcase"></i>
                        <span>Job Listings</span>
                    </a>
                    <a href="<?php echo e(route('admin.applications')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.applications*') ? 'active' : ''); ?>">
                        <i class="bi bi-file-person"></i>
                        <span>Applications</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Infrastructure</div>
                    <a href="<?php echo e(route('admin.infrastructure.index')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.infrastructure.index') ? 'active' : ''); ?>">
                        <i class="bi bi-hdd-rack"></i>
                        <span>Status</span>
                    </a>
                    <a href="<?php echo e(route('admin.infrastructure.monitoring')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.infrastructure.monitoring') ? 'active' : ''); ?>">
                        <i class="bi bi-activity"></i>
                        <span>Monitoring</span>
                    </a>
                    <a href="<?php echo e(route('admin.infrastructure.backup')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.infrastructure.backup') ? 'active' : ''); ?>">
                        <i class="bi bi-cloud-download"></i>
                        <span>Backup</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Analytics</div>
                    <a href="<?php echo e(route('admin.analytics.index')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.analytics.*') ? 'active' : ''); ?>">
                        <i class="bi bi-graph-up"></i>
                        <span>Analytics</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Security</div>
                    <a href="<?php echo e(route('admin.security.index')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.security.index') ? 'active' : ''); ?>">
                        <i class="bi bi-lock"></i>
                        <span>Overview</span>
                    </a>
                    <a href="<?php echo e(route('admin.security.login-attempts')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.security.login-attempts') ? 'active' : ''); ?>">
                        <i class="bi bi-clock-history"></i>
                        <span>Login Attempts</span>
                    </a>
                    <a href="<?php echo e(route('admin.security.blocked-ips')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.security.blocked-ips') ? 'active' : ''); ?>">
                        <i class="bi bi-ban"></i>
                        <span>Blocked IPs</span>
                    </a>
                    <a href="<?php echo e(route('admin.logs.index')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.logs.*') ? 'active' : ''); ?>">
                        <i class="bi bi-journal-text"></i>
                        <span>Logs</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">API</div>
                    <a href="<?php echo e(route('admin.api-keys.index')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.api-keys.*') ? 'active' : ''); ?>">
                        <i class="bi bi-key"></i>
                        <span>API Keys</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Messages</div>
                    <a href="<?php echo e(route('admin.contact-messages.index')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.contact-messages.*') ? 'active' : ''); ?>">
                        <i class="bi bi-envelope-open"></i>
                        <span>Contact Messages</span>
                    </a>
                    <a href="<?php echo e(route('admin.inquiries')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.inquiries') ? 'active' : ''); ?>">
                        <i class="bi bi-question-circle"></i>
                        <span>Inquiries</span>
                    </a>
                    <a href="<?php echo e(route('admin.subscribers.index')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.subscribers.*') ? 'active' : ''); ?>">
                        <i class="bi bi-people-fill"></i>
                        <span>Subscribers</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Settings</div>
                    <a href="<?php echo e(route('admin.settings.index')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.settings.index') ? 'active' : ''); ?>">
                        <i class="bi bi-sliders"></i>
                        <span>System Settings</span>
                    </a>
                    <a href="<?php echo e(route('admin.settings.feature-flags')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.settings.feature-flags') ? 'active' : ''); ?>">
                        <i class="bi bi-toggles"></i>
                        <span>Feature Flags</span>
                    </a>
                    <a href="<?php echo e(route('admin.infrastructure.maintenance')); ?>" class="portal-link <?php echo e(request()->routeIs('admin.infrastructure.maintenance') ? 'active' : ''); ?>">
                        <i class="bi bi-tools"></i>
                        <span>Maintenance</span>
                    </a>
                </div>
            </nav>

            <form method="POST" action="<?php echo e(route('admin.logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="portal-link portal-link-button">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span>
                </button>
            </form>
        </aside>

        <div class="portal-main">
            <?php if($errors->any()): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Errors:</strong>
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <?php if(session('status')): ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?php echo e(session('status')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo e(session('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <div class="portal-header">
                <h1 class="portal-title">
                    <i class="bi <?php echo $__env->yieldContent('icon', 'bi-speedometer2'); ?>"></i>
                    <?php echo $__env->yieldContent('page-title', 'Dashboard'); ?>
                </h1>
                <div class="portal-actions">
                    <span class="portal-muted"><?php echo e(auth('admin')->user()->name ?? 'Admin'); ?></span>
                </div>
            </div>

            <div class="portal-content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html><?php /**PATH /home/site/wwwroot/resources/views/layouts/admin.blade.php ENDPATH**/ ?>