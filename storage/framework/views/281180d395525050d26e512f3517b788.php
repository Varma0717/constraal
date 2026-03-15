

<?php $__env->startSection('title', 'Billing'); ?>
<?php $__env->startSection('page-title', 'Billing Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Monthly Revenue</h6>
                <div style="font-size: 28px; font-weight: bold; color: #667eea;">$<?php echo e(number_format($monthlyRevenue, 2)); ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Active Subscriptions</h6>
                <div style="font-size: 28px; font-weight: bold; color: #2ecc71;"><?php echo e($activeSubscriptions); ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Failed Payments</h6>
                <div style="font-size: 28px; font-weight: bold; color: #f5576c;"><?php echo e($failedPayments); ?></div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header border-bottom d-flex justify-content-around">
        <a href="<?php echo e(route('admin.billing.subscriptions')); ?>" class="card-link">Subscriptions</a>
        <a href="<?php echo e(route('admin.billing.payments')); ?>" class="card-link">Payments</a>
        <a href="<?php echo e(route('admin.billing.plans')); ?>" class="card-link">Plans</a>
    </div>
    <div class="card-body">
        <p style="text-align: center; color: #999;">Select a section from above to view details</p>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/billing/index.blade.php ENDPATH**/ ?>