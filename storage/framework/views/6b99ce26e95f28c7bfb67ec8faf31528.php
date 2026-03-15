

<?php $__env->startSection('title', 'Navigation Management'); ?>
<?php $__env->startSection('page-title', 'Navigation Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Menu Items</h5>
        <a href="<?php echo e(route('admin.navigation.create')); ?>" class="btn btn-primary btn-sm">+ Add Menu Item</a>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Label</th>
                    <th>URL</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($item->order); ?></td>
                    <td>
                        <?php if($item->parent_id): ?>
                        <span class="text-muted">— </span>
                        <?php endif; ?>
                        <?php echo e($item->label); ?>

                    </td>
                    <td><code><?php echo e($item->url); ?></code></td>
                    <td>
                        <?php if($item->is_visible): ?>
                        <span class="admin-badge admin-badge--success">Visible</span>
                        <?php else: ?>
                        <span class="admin-badge admin-badge--muted">Hidden</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('admin.navigation.edit', $item)); ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="<?php echo e(route('admin.navigation.destroy', $item)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete this menu item?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center" class="py-4">No menu items found</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php if($items->hasPages()): ?>
    <div class="px-3 py-2 border-top">
        <?php echo e($items->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/navigation/index.blade.php ENDPATH**/ ?>