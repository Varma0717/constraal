<?php use Illuminate\Support\Str; ?>


<?php $__env->startSection('title', 'Login Attempts'); ?>
<?php $__env->startSection('page-title', 'Login Attempts'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Login Attempts</h5>
    </div>
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>IP Address</th>
                        <th>Status</th>
                        <th>User Agent</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $attempts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attempt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($attempt->id); ?></td>
                        <td><?php echo e($attempt->email); ?></td>
                        <td><?php echo e($attempt->ip_address); ?></td>
                        <td>
                            <?php if($attempt->successful): ?>
                            <span class="badge bg-success">Success</span>
                            <?php else: ?>
                            <span class="badge bg-danger">Failed</span>
                            <?php endif; ?>
                        </td>
                        <td><small><?php echo e(Str::limit($attempt->user_agent, 50)); ?></small></td>
                        <td><?php echo e($attempt->created_at->format('M d, Y H:i')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center py-4">No login attempts found</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($attempts->hasPages()): ?>
    <div class="card-footer">
        <?php echo e($attempts->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/security/login-attempts.blade.php ENDPATH**/ ?>