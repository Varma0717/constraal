

<?php $__env->startSection('title', 'API Keys'); ?>
<?php $__env->startSection('page-title', 'API Key Management'); ?>

<?php $__env->startSection('content'); ?>
<?php if(session('api_key')): ?>
<div class="alert alert-success">
    <strong>API Key Created!</strong>
    <span> Make sure to copy your API key now. You won't be able to see it again!</span>
    <div style="margin-top:0.75rem;">
        <code class="d-block p-2 bg-light rounded border mt-2" style="word-break:break-all; user-select:all;"><?php echo e(session('api_key')); ?></code>
    </div>
</div>
<?php endif; ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">API Keys</h5>
        <a href="<?php echo e(route('admin.api-keys.create')); ?>" class="btn btn-primary btn-sm">+ Create API Key</a>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Permissions</th>
                    <th>Status</th>
                    <th>Last Used</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $apiKeys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($key->id); ?></td>
                    <td><?php echo e($key->name); ?></td>
                    <td>
                        <?php
                        $perms = is_array($key->permissions) ? $key->permissions : (json_decode($key->permissions, true) ?? []);
                        ?>
                        <?php $__currentLoopData = $perms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="admin-badge" style="margin-right:0.25rem;"><?php echo e(ucfirst($perm)); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td>
                        <?php if($key->is_active): ?>
                        <span class="admin-badge admin-badge--success">Active</span>
                        <?php else: ?>
                        <span class="admin-badge admin-badge--danger">Revoked</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($key->last_used_at): ?>
                        <?php echo e($key->last_used_at->format('M d, Y')); ?>

                        <?php else: ?>
                        <span class="text-muted">Never</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($key->created_at->format('M d, Y')); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.api-keys.edit', $key)); ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <?php if($key->is_active): ?>
                        <form action="<?php echo e(route('admin.api-keys.revoke', $key)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Revoke this API key?')">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-sm btn-outline-info">Revoke</button>
                        </form>
                        <?php endif; ?>
                        <form action="<?php echo e(route('admin.api-keys.destroy', $key)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete this API key permanently?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7" class="text-center" class="py-4">No API keys found</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php if($apiKeys->hasPages()): ?>
    <div class="px-3 py-2 border-top">
        <?php echo e($apiKeys->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/api-keys/index.blade.php ENDPATH**/ ?>