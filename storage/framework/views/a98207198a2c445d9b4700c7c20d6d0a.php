

<?php $__env->startSection('title', 'Infrastructure Status'); ?>
<?php $__env->startSection('page-title', 'Infrastructure Status'); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <!-- Service Status -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-activity"></i> Service Status</h5>
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($name); ?></td>
                            <td>
                                <span class="badge bg-<?php echo e($info['class']); ?>"><?php echo e($info['status']); ?></span>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-body text-center">
                <div class="portal-stat-value <?php echo e($errorCount > 0 ? 'text-danger' : 'text-success'); ?>"><?php echo e($errorCount); ?></div>
                <div class="portal-stat-label">Error Count (Log)</div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h6 class="mb-3">Disk Usage</h6>
                <div class="progress mb-2" style="height: 20px">
                    <div class="progress-bar <?php echo e($diskUsedPercent > 80 ? 'bg-danger' : ($diskUsedPercent > 60 ? 'bg-warning' : 'bg-success')); ?>" style="width: <?php echo e($diskUsedPercent); ?>%;">
                        <?php echo e($diskUsedPercent); ?>%
                    </div>
                </div>
                <small class="text-muted"><?php echo e($diskUsed); ?> used of <?php echo e($diskTotal); ?> (<?php echo e($diskFree); ?> free)</small>
            </div>
        </div>
    </div>
</div>

<!-- System Info -->
<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0"><i class="bi bi-info-circle"></i> System Information</h5>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <tbody>
                <?php $__currentLoopData = $systemInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="fw-bold text-nowrap" style="min-width:200px"><?php echo e(ucwords(str_replace('_', ' ', $key))); ?></td>
                    <td><?php echo e($value); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Quick Actions -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="bi bi-lightning"></i> Quick Actions</h5>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('admin.infrastructure.clear-cache')); ?>" method="POST" class="d-inline" onsubmit="return confirm('Clear all caches?')">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-warning me-2">
                <i class="bi bi-arrow-repeat"></i> Clear All Caches
            </button>
        </form>

        <a href="<?php echo e(route('admin.infrastructure.monitoring')); ?>" class="btn btn-outline-primary me-2">
            <i class="bi bi-activity"></i> View Monitoring
        </a>

        <a href="<?php echo e(route('admin.infrastructure.backup')); ?>" class="btn btn-outline-secondary me-2">
            <i class="bi bi-cloud-download"></i> Backup
        </a>

        <a href="<?php echo e(route('admin.infrastructure.maintenance')); ?>" class="btn btn-outline-danger">
            <i class="bi bi-tools"></i> Maintenance Mode
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/infrastructure/index.blade.php ENDPATH**/ ?>