

<?php $__env->startSection('title', 'Subscriptions'); ?>
<?php $__env->startSection('page-title', 'Subscriptions'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">All Subscriptions</h5>
    </div>
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Plan</th>
                        <th>Status</th>
                        <th>Started</th>
                        <th>Ends At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($subscription->id); ?></td>
                        <td><?php echo e($subscription->user->name ?? 'N/A'); ?></td>
                        <td><?php echo e($subscription->plan->name ?? 'N/A'); ?></td>
                        <td>
                            <?php if($subscription->status === 'active'): ?>
                            <span class="badge bg-success">Active</span>
                            <?php elseif($subscription->status === 'cancelled'): ?>
                            <span class="badge bg-danger">Cancelled</span>
                            <?php elseif($subscription->status === 'expired'): ?>
                            <span class="badge bg-secondary">Expired</span>
                            <?php else: ?>
                            <span class="badge bg-warning"><?php echo e(ucfirst($subscription->status)); ?></span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($subscription->created_at->format('M d, Y')); ?></td>
                        <td><?php echo e($subscription->ends_at ? $subscription->ends_at->format('M d, Y') : 'N/A'); ?></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-primary">View</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-4">No subscriptions found</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($subscriptions->hasPages()): ?>
    <div class="card-footer">
        <?php echo e($subscriptions->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/billing/subscriptions.blade.php ENDPATH**/ ?>