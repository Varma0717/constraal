

<?php $__env->startSection('title', 'Payments'); ?>
<?php $__env->startSection('page-title', 'Payments'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">All Payments</h5>
    </div>
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Method</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($payment->id); ?></td>
                        <td><?php echo e($payment->user->name ?? 'N/A'); ?></td>
                        <td>$<?php echo e(number_format($payment->amount, 2)); ?></td>
                        <td>
                            <?php if($payment->status === 'completed'): ?>
                            <span class="badge bg-success">Completed</span>
                            <?php elseif($payment->status === 'pending'): ?>
                            <span class="badge bg-warning">Pending</span>
                            <?php elseif($payment->status === 'failed'): ?>
                            <span class="badge bg-danger">Failed</span>
                            <?php else: ?>
                            <span class="badge bg-secondary"><?php echo e(ucfirst($payment->status)); ?></span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e(ucfirst($payment->payment_method ?? 'N/A')); ?></td>
                        <td><?php echo e($payment->created_at->format('M d, Y H:i')); ?></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-primary">View</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-4">No payments found</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($payments->hasPages()): ?>
    <div class="card-footer">
        <?php echo e($payments->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/billing/payments.blade.php ENDPATH**/ ?>