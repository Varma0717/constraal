

<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>
<?php $__env->startSection('icon', 'bi-speedometer2'); ?>

<?php $__env->startSection('content'); ?>
<div class="portal-grid portal-grid--stats">
    <div class="portal-card">
        <div class="portal-stat-label">Account Status</div>
        <div class="portal-stat-value"><?php echo e($accountStatus); ?></div>
        <span class="portal-badge">Active</span>
    </div>

    <div class="portal-card">
        <div class="portal-stat-label">Active Subscriptions</div>
        <div class="portal-stat-value"><?php echo e($subscriptionCount); ?></div>
        <a class="auth-link" href="<?php echo e(route('account.customer.billing.subscriptions')); ?>">View subscriptions</a>
    </div>

    <div class="portal-card">
        <div class="portal-stat-label">Last Login</div>
        <div class="portal-stat-value"><?php echo e($lastLogin->diffForHumans()); ?></div>
        <span class="portal-muted">Recent account access</span>
    </div>

    <div class="portal-card">
        <div class="portal-stat-label">Support Tickets</div>
        <div class="portal-stat-value">0</div>
        <a class="auth-link" href="<?php echo e(route('account.customer.support.index')); ?>">Open tickets</a>
    </div>
</div>

<div class="portal-grid portal-grid--split mt-8">
    <div class="portal-card">
        <div class="portal-card-header">
            <h5 class="portal-card-title">Recent Activity</h5>
        </div>
        <?php if($activities->count() > 0): ?>
        <div class="portal-list">
            <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="portal-list-item">
                <div class="portal-list-row">
                    <div>
                        <strong><?php echo e(ucfirst(str_replace('_', ' ', $activity->action))); ?></strong>
                        <div class="portal-muted"><?php echo e($activity->description); ?></div>
                    </div>
                    <span class="portal-badge portal-badge--muted">
                        <?php echo e($activity->created_at->diffForHumans()); ?>

                    </span>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php else: ?>
        <div class="portal-muted">No recent activity</div>
        <?php endif; ?>
    </div>

    <div class="portal-grid">
        <div class="portal-card">
            <div class="portal-card-header">
                <h5 class="portal-card-title">Quick Links</h5>
            </div>
            <div class="portal-link-list">
                <a href="<?php echo e(route('account.customer.profile.show')); ?>" class="portal-link-item">
                    <i class="bi bi-person"></i> View Profile
                </a>
                <a href="<?php echo e(route('account.customer.billing.subscriptions')); ?>" class="portal-link-item">
                    <i class="bi bi-calendar-check"></i> My Subscriptions
                </a>
                <a href="<?php echo e(route('account.customer.billing.invoices')); ?>" class="portal-link-item">
                    <i class="bi bi-file-earmark-text"></i> Invoices
                </a>
                <a href="<?php echo e(route('account.customer.support.index')); ?>" class="portal-link-item">
                    <i class="bi bi-chat-left-text"></i> Support
                </a>
                <a href="<?php echo e(route('account.customer.security.index')); ?>" class="portal-link-item">
                    <i class="bi bi-shield-lock"></i> Security Settings
                </a>
            </div>
        </div>

        <div class="portal-card">
            <div class="portal-card-header">
                <h5 class="portal-card-title">Notifications</h5>
            </div>
            <?php if($notifications->count() > 0): ?>
            <div class="portal-list">
                <?php $__currentLoopData = $notifications->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="portal-list-item">
                    <div class="portal-list-row">
                        <span class="portal-muted"><?php echo e($notification->message); ?></span>
                        <span class="portal-badge <?php echo e($notification->is_read ? 'portal-badge--muted' : ''); ?>">
                            <?php echo e($notification->is_read ? 'Read' : 'New'); ?>

                        </span>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <a href="<?php echo e(route('account.customer.notifications.index')); ?>" class="portal-button portal-button--ghost mt-3">View All Notifications</a>
            <?php else: ?>
            <div class="portal-muted">No notifications</div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/customer/dashboard.blade.php ENDPATH**/ ?>