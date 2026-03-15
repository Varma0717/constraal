

<?php $__env->startSection('title', 'Admin Dashboard'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>
<?php $__env->startSection('icon', 'bi-speedometer2'); ?>

<?php $__env->startSection('content'); ?>
<div class="portal-grid portal-grid--stats">
    <div class="portal-card">
        <div class="portal-stat-label">Total Users</div>
        <div class="portal-stat-value"><?php echo e($stats['users']); ?></div>
        <a class="portal-link-item" href="<?php echo e(route('admin.users.index')); ?>"><i class="bi bi-people"></i> Manage</a>
    </div>

    <div class="portal-card">
        <div class="portal-stat-label">Total Jobs</div>
        <div class="portal-stat-value"><?php echo e($stats['jobs']); ?></div>
        <a class="portal-link-item" href="<?php echo e(route('admin.jobs')); ?>"><i class="bi bi-briefcase"></i> Manage</a>
    </div>

    <div class="portal-card">
        <div class="portal-stat-label">Job Applications</div>
        <div class="portal-stat-value"><?php echo e($stats['applications']); ?></div>
        <a class="portal-link-item" href="<?php echo e(route('admin.applications')); ?>"><i class="bi bi-file-person"></i> View</a>
    </div>

    <div class="portal-card">
        <div class="portal-stat-label">Contact Inquiries</div>
        <div class="portal-stat-value"><?php echo e($stats['inquiries']); ?></div>
        <a class="portal-link-item" href="<?php echo e(route('admin.inquiries')); ?>"><i class="bi bi-question-circle"></i> View</a>
    </div>

    <div class="portal-card">
        <div class="portal-stat-label">Active Subscribers</div>
        <div class="portal-stat-value"><?php echo e($stats['subscribers']); ?></div>
        <a class="portal-link-item" href="<?php echo e(route('admin.subscribers.index')); ?>"><i class="bi bi-people-fill"></i> Manage</a>
    </div>

    <div class="portal-card">
        <div class="portal-stat-label">CMS Pages</div>
        <div class="portal-stat-value"><?php echo e($stats['cms_pages']); ?></div>
        <a class="portal-link-item" href="<?php echo e(route('admin.cms.pages.index')); ?>"><i class="bi bi-layout-text-window"></i> Manage</a>
    </div>
</div>

<div class="portal-grid portal-grid--split mt-4">
    <div class="portal-card">
        <div class="portal-card-header">
            <h5 class="portal-card-title">Recent Job Applications</h5>
        </div>
        <?php if(count($recentApplications) > 0): ?>
        <div class="portal-list">
            <?php $__currentLoopData = $recentApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="portal-list-item">
                <div class="portal-list-row">
                    <div>
                        <strong><?php echo e($app->name); ?></strong>
                        <div class="portal-muted"><?php echo e($app->email); ?></div>
                    </div>
                    <div class="text-end">
                        <span class="badge bg-primary"><?php echo e($app->status); ?></span>
                        <div class="portal-muted mt-1"><?php echo e($app->created_at->format('M d, Y')); ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php else: ?>
        <div class="p-3 portal-muted">No applications yet</div>
        <?php endif; ?>
    </div>

    <div class="portal-card">
        <div class="portal-card-header">
            <h5 class="portal-card-title">Recent Inquiries</h5>
        </div>
        <?php if(count($recentInquiries) > 0): ?>
        <div class="portal-list">
            <?php $__currentLoopData = $recentInquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="portal-list-item">
                <div class="portal-list-row">
                    <div>
                        <strong><?php echo e($inquiry->name); ?></strong>
                        <div class="portal-muted"><?php echo e($inquiry->email); ?></div>
                    </div>
                    <div class="text-end">
                        <span class="badge bg-success"><?php echo e($inquiry->type); ?></span>
                        <div class="portal-muted mt-1"><?php echo e($inquiry->created_at->format('M d, Y')); ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php else: ?>
        <div class="p-3 portal-muted">No inquiries yet</div>
        <?php endif; ?>
    </div>
</div>

<div class="portal-card mt-4">
    <div class="portal-card-header">
        <h5 class="portal-card-title">Quick Links</h5>
    </div>
    <div class="portal-link-list">
        <a href="<?php echo e(route('admin.users.index')); ?>" class="portal-link-item"><i class="bi bi-people"></i> Manage Users</a>
        <a href="<?php echo e(route('admin.pages')); ?>" class="portal-link-item"><i class="bi bi-file-earmark"></i> Manage Pages</a>
        <a href="<?php echo e(route('admin.jobs')); ?>" class="portal-link-item"><i class="bi bi-briefcase"></i> Manage Jobs</a>
        <a href="<?php echo e(route('admin.cms.pages.index')); ?>" class="portal-link-item"><i class="bi bi-layout-text-window"></i> CMS Pages</a>
        <a href="<?php echo e(route('admin.subscribers.index')); ?>" class="portal-link-item"><i class="bi bi-people-fill"></i> Subscribers</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>