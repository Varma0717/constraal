<?php use Illuminate\Support\Str; ?>


<?php $__env->startSection('title', 'System Monitoring'); ?>
<?php $__env->startSection('page-title', 'System Monitoring'); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <!-- Service Status -->
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-heart-pulse"></i> Live Service Status</h5>
            </div>
            <div class="card-body">
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                    <span><?php echo e($name); ?></span>
                    <span class="badge bg-<?php echo e($info['class']); ?>"><?php echo e($info['status']); ?></span>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <!-- Summary -->
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-speedometer2"></i> Health Summary</h5>
            </div>
            <div class="card-body text-center">
                <?php
                $onlineCount = collect($services)->filter(fn($s) => $s['class'] === 'success')->count();
                $totalServices = count($services);
                $healthPercent = round(($onlineCount / $totalServices) * 100);
                ?>

                <div class="portal-stat-value <?php echo e($healthPercent == 100 ? 'text-success' : ($healthPercent >= 80 ? 'text-warning' : 'text-danger')); ?>" style="font-size: 72px;">
                    <?php echo e($healthPercent); ?>%
                </div>
                <div class="portal-stat-label">System Health</div>
                <p class="mt-2">
                    <span class="badge bg-success"><?php echo e($onlineCount); ?> Online</span>
                    <span class="badge bg-danger"><?php echo e($totalServices - $onlineCount); ?> Issues</span>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="bi bi-clock-history"></i> Recent System Activity</h5>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Admin</th>
                    <th>Action</th>
                    <th>Target</th>
                    <th>IP Address</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $recentEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($event->admin->name ?? 'System'); ?></td>
                    <td><code><?php echo e($event->action); ?></code></td>
                    <td><?php echo e(Str::limit($event->target, 30) ?? 'N/A'); ?></td>
                    <td><?php echo e($event->ip_address); ?></td>
                    <td><?php echo e($event->created_at->diffForHumans()); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center py-4">No recent activity</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    <a href="<?php echo e(route('admin.infrastructure.index')); ?>" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back to Status
    </a>
    <a href="<?php echo e(route('admin.logs.index')); ?>" class="btn btn-outline-primary">
        <i class="bi bi-journal-text"></i> View All Logs
    </a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/infrastructure/monitoring.blade.php ENDPATH**/ ?>