

<?php $__env->startSection('title', 'Users'); ?>
<?php $__env->startSection('page-title', 'User Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h6 class="mb-0">Users</h6>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><strong><?php echo e($user->name); ?></strong></td>
                    <td><?php echo e($user->email); ?></td>
                    <td>
                        <?php if($user->email_verified_at): ?>
                        <span class="admin-badge">Verified</span>
                        <?php else: ?>
                        <span class="admin-badge admin-badge--warning">Unverified</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($user->created_at->format('M d, Y')); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.users.show', $user)); ?>" class="admin-button admin-button--ghost">
                            View
                        </a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center py-4">No users found</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="card-body">
        <?php echo e($users->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/users/index.blade.php ENDPATH**/ ?>