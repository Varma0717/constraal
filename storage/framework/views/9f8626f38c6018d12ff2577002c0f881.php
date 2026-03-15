

<?php $__env->startSection('title', 'Inquiries'); ?>
<?php $__env->startSection('page-title', 'Contact Inquiries'); ?>
<?php $__env->startSection('icon', 'bi-question-circle'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <div>
            <h5 class="mb-0">Inquiries</h5>
            <small class="text-muted">Messages submitted through the contact form.</small>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Received</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $inquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($inquiry->name); ?></td>
                    <td><?php echo e($inquiry->email); ?></td>
                    <td><span class="badge bg-success"><?php echo e($inquiry->type); ?></span></td>
                    <td><?php echo e($inquiry->created_at?->format('M d, Y')); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4" class="text-center text-muted py-4">No inquiries yet.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    <?php echo e($inquiries->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/inquiries.blade.php ENDPATH**/ ?>