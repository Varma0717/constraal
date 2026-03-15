

<?php $__env->startSection('title', '403 Forbidden'); ?>

<?php $__env->startSection('content'); ?>
<div style="text-align: center; padding: 60px 20px;">
    <div style="font-size: 48px; color: #f5576c; margin-bottom: 20px;">
        <i class="bi bi-exclamation-triangle"></i>
    </div>
    <h2 style="margin-bottom: 15px;">Access Forbidden</h2>
    <p style="color: #666; margin-bottom: 30px;">You don't have permission to access this resource.</p>
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-primary">
        <i class="bi bi-house"></i> Go to Dashboard
    </a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/errors/forbidden.blade.php ENDPATH**/ ?>