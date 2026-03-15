

<?php $__env->startSection('title', 'Applications'); ?>
<?php $__env->startSection('page-title', 'Job Applications'); ?>
<?php $__env->startSection('icon', 'bi-file-person'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <div>
            <h5 class="mb-0">Job Applications</h5>
            <small class="text-muted">Review applicants submitted through the careers page.</small>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Candidate</th>
                    <th>Email</th>
                    <th>Job</th>
                    <th>Status</th>
                    <th>Submitted</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($application->name); ?></td>
                    <td><?php echo e($application->email); ?></td>
                    <td><?php echo e($application->job?->title ?? '—'); ?></td>
                    <td><span class="badge bg-primary"><?php echo e($application->status); ?></span></td>
                    <td><?php echo e($application->created_at?->format('M d, Y')); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">No applications yet.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    <?php echo e($applications->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/applications.blade.php ENDPATH**/ ?>