

<?php $__env->startSection('title', 'Email Templates'); ?>
<?php $__env->startSection('page-title', 'Email Templates'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">All Email Templates</h5>
        <a href="<?php echo e(route('admin.email-templates.create')); ?>" class="btn btn-primary btn-sm">+ Create Template</a>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($template->id); ?></td>
                    <td><?php echo e($template->name); ?></td>
                    <td><?php echo e(\Illuminate\Support\Str::limit($template->subject, 50)); ?></td>
                    <td>
                        <?php if($template->is_active): ?>
                        <span class="admin-badge admin-badge--success">Active</span>
                        <?php else: ?>
                        <span class="admin-badge admin-badge--muted">Inactive</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('admin.email-templates.preview', $template)); ?>" class="btn btn-sm btn-outline-info" target="_blank">Preview</a>
                        <a href="<?php echo e(route('admin.email-templates.edit', $template)); ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="<?php echo e(route('admin.email-templates.destroy', $template)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete this template?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center" class="py-4">No email templates found</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php if($templates->hasPages()): ?>
    <div class="px-3 py-2 border-top">
        <?php echo e($templates->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/email-templates/index.blade.php ENDPATH**/ ?>