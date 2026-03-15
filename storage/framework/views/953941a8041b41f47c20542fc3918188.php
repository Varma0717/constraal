

<?php $__env->startSection('title', 'Billing Plans'); ?>
<?php $__env->startSection('page-title', 'Billing Plans'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">All Plans</h5>
        <a href="<?php echo e(route('admin.billing.plans.create')); ?>" class="btn btn-primary">
            <i class="bi bi-plus"></i> Create Plan
        </a>
    </div>
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Billing Period</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($plan->id); ?></td>
                        <td><?php echo e($plan->name); ?></td>
                        <td>$<?php echo e(number_format($plan->price, 2)); ?> <?php echo e($plan->currency ?? 'USD'); ?></td>
                        <td><?php echo e(ucfirst($plan->billing_period)); ?></td>
                        <td>
                            <?php if($plan->is_active ?? true): ?>
                            <span class="badge bg-success">Active</span>
                            <?php else: ?>
                            <span class="badge bg-secondary">Inactive</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($plan->created_at->format('M d, Y')); ?></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-4">No billing plans found</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($plans->hasPages()): ?>
    <div class="card-footer">
        <?php echo e($plans->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/billing/plans.blade.php ENDPATH**/ ?>