

<?php $__env->startSection('title', 'Pages'); ?>
<?php $__env->startSection('page-title', 'Pages'); ?>
<?php $__env->startSection('icon', 'bi-file-earmark'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-0">Managed Pages</h5>
            <small class="text-muted">Content entries stored in the database.</small>
        </div>
        <a href="<?php echo e(route('admin.pages.create')); ?>" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Create Page
        </a>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Updated</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($page->title); ?></td>
                    <td><code><?php echo e($page->slug); ?></code></td>
                    <td><?php echo e($page->updated_at?->format('M d, Y')); ?></td>
                    <td class="text-end">
                        <div class="btn-group btn-group-sm">
                            <a href="<?php echo e(route('admin.pages.edit', $page)); ?>" class="btn btn-outline-primary btn-sm">Edit</a>
                            <form action="<?php echo e(route('admin.pages.destroy', $page)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete this page?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4" class="text-center text-muted py-4">No pages found. Create your first page.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    <?php echo e($pages->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/pages.blade.php ENDPATH**/ ?>