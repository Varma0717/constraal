

<?php $__env->startSection('title', 'Security'); ?>
<?php $__env->startSection('page-title', 'Security Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Failed Login Attempts (30 days)</h6>
                <div style="font-size: 32px; font-weight: bold; color: #f5576c;"><?php echo e($failedLogins); ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Blocked IP Addresses</h6>
                <div style="font-size: 32px; font-weight: bold; color: #f59e0b;"><?php echo e($blockedIpsCount); ?></div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header border-bottom d-flex justify-content-around">
        <a href="<?php echo e(route('admin.security.login-attempts')); ?>" class="card-link">Login Attempts</a>
        <a href="<?php echo e(route('admin.security.blocked-ips')); ?>" class="card-link">Blocked IPs</a>
    </div>
    <div class="card-body">
        <p style="text-align: center; color: #999;">Select a section from above to view details</p>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/security/index.blade.php ENDPATH**/ ?>