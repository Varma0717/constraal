<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Account'); ?> — Constraal</title>
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
                    <div class="text-xs text-muted">Customer Portal</div>
                </div>
            </div>

            <nav class="portal-nav">
                <a href="<?php echo e(route('account.customer.dashboard')); ?>" class="portal-link <?php echo e(request()->routeIs('account.customer.dashboard') ? 'active' : ''); ?>">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Account</div>
                    <a href="<?php echo e(route('account.customer.profile.show')); ?>" class="portal-link <?php echo e(request()->routeIs('account.customer.profile.*') ? 'active' : ''); ?>">
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                    </a>
                    <a href="<?php echo e(route('account.customer.security.index')); ?>" class="portal-link <?php echo e(request()->routeIs('account.customer.security.*') ? 'active' : ''); ?>">
                        <i class="bi bi-shield-lock"></i>
                        <span>Security</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Billing</div>
                    <a href="<?php echo e(route('account.customer.billing.index')); ?>" class="portal-link <?php echo e(request()->routeIs('account.customer.billing.index') ? 'active' : ''); ?>">
                        <i class="bi bi-credit-card"></i>
                        <span>Billing</span>
                    </a>
                    <a href="<?php echo e(route('account.customer.billing.subscriptions')); ?>" class="portal-link <?php echo e(request()->routeIs('account.customer.billing.subscriptions') ? 'active' : ''); ?>">
                        <i class="bi bi-calendar-check"></i>
                        <span>Subscriptions</span>
                    </a>
                    <a href="<?php echo e(route('account.customer.billing.payment-methods')); ?>" class="portal-link <?php echo e(request()->routeIs('account.customer.billing.payment-methods') ? 'active' : ''); ?>">
                        <i class="bi bi-wallet2"></i>
                        <span>Payment Methods</span>
                    </a>
                    <a href="<?php echo e(route('account.customer.billing.invoices')); ?>" class="portal-link <?php echo e(request()->routeIs('account.customer.billing.invoices') ? 'active' : ''); ?>">
                        <i class="bi bi-file-earmark-text"></i>
                        <span>Invoices</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Services</div>
                    <a href="<?php echo e(route('account.customer.orders.index')); ?>" class="portal-link <?php echo e(request()->routeIs('account.customer.orders.*') ? 'active' : ''); ?>">
                        <i class="bi bi-box"></i>
                        <span>Orders</span>
                    </a>
                    <a href="<?php echo e(route('account.customer.services.index')); ?>" class="portal-link <?php echo e(request()->routeIs('account.customer.services.index') ? 'active' : ''); ?>">
                        <i class="bi bi-puzzle"></i>
                        <span>Services</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Support</div>
                    <a href="<?php echo e(route('account.customer.support.index')); ?>" class="portal-link <?php echo e(request()->routeIs('account.customer.support.*') ? 'active' : ''); ?>">
                        <i class="bi bi-chat-left-text"></i>
                        <span>Support</span>
                    </a>
                    <a href="<?php echo e(route('account.customer.notifications.index')); ?>" class="portal-link <?php echo e(request()->routeIs('account.customer.notifications.*') ? 'active' : ''); ?>">
                        <i class="bi bi-bell"></i>
                        <span>Notifications</span>
                    </a>
                </div>

                <div class="portal-nav-section">
                    <div class="portal-nav-title">Settings</div>
                    <a href="<?php echo e(route('account.customer.activity.index')); ?>" class="portal-link <?php echo e(request()->routeIs('account.customer.activity.index') ? 'active' : ''); ?>">
                        <i class="bi bi-clock-history"></i>
                        <span>Activity</span>
                    </a>
                    <a href="<?php echo e(route('account.customer.settings.index')); ?>" class="portal-link <?php echo e(request()->routeIs('account.customer.settings.*') ? 'active' : ''); ?>">
                        <i class="bi bi-gear"></i>
                        <span>Settings</span>
                    </a>
                    <a href="<?php echo e(route('account.customer.privacy.index')); ?>" class="portal-link <?php echo e(request()->routeIs('account.customer.privacy.*') ? 'active' : ''); ?>">
                        <i class="bi bi-lock"></i>
                        <span>Privacy</span>
                    </a>
                </div>
            </nav>

            <form method="POST" action="<?php echo e(route('account.customer.logout')); ?>">
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
                    <span class="portal-muted"><?php echo e(auth()->user()->name ?? 'User'); ?></span>
                </div>
            </div>

            <div class="portal-content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html><?php /**PATH /home/site/wwwroot/resources/views/customer/layouts/app.blade.php ENDPATH**/ ?>