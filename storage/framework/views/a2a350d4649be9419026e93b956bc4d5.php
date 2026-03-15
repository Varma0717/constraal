

<?php $__env->startSection('title', 'Announcements'); ?>
<?php $__env->startSection('page-title', 'Announcements'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">All Announcements</h5>
        <a href="<?php echo e(route('admin.announcements.create')); ?>" class="btn btn-primary btn-sm">+ Create Announcement</a>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Schedule</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($announcement->id); ?></td>
                    <td><?php echo e($announcement->title); ?></td>
                    <td>
                        <?php if($announcement->is_active): ?>
                        <span class="admin-badge admin-badge--success">Active</span>
                        <?php else: ?>
                        <span class="admin-badge admin-badge--muted">Inactive</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($announcement->published_at && $announcement->expires_at): ?>
                        <?php echo e($announcement->published_at->format('M d')); ?> — <?php echo e($announcement->expires_at->format('M d, Y')); ?>

                        <?php elseif($announcement->published_at): ?>
                        From <?php echo e($announcement->published_at->format('M d, Y')); ?>

                        <?php elseif($announcement->expires_at): ?>
                        Until <?php echo e($announcement->expires_at->format('M d, Y')); ?>

                        <?php else: ?>
                        Always
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($announcement->created_at->format('M d, Y')); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.announcements.edit', $announcement)); ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="<?php echo e(route('admin.announcements.destroy', $announcement)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete this announcement?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center" class="py-4">No announcements found</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php if($announcements->hasPages()): ?>
    <div class="px-3 py-2 border-top">
        <?php echo e($announcements->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/announcements/index.blade.php ENDPATH**/ ?>