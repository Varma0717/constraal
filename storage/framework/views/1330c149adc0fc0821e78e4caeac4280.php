

<?php $__env->startSection('title', 'Edit API Key'); ?>
<?php $__env->startSection('page-title', 'Edit API Key'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit API Key</h5>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('admin.api-keys.update', $apiKey)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label for="name" class="form-label">Key Name *</label>
                <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" value="<?php echo e(old('name', $apiKey->name)); ?>" required>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <?php
            $permissions = is_array($apiKey->permissions) ? $apiKey->permissions : (json_decode($apiKey->permissions, true) ?? []);
            ?>

            <div class="mb-3">
                <label class="form-label">Permissions</label>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="read" id="perm_read" <?php echo e(in_array('read', $permissions) ? 'checked' : ''); ?>>
                            <label class="form-check-label" for="perm_read">Read</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="write" id="perm_write" <?php echo e(in_array('write', $permissions) ? 'checked' : ''); ?>>
                            <label class="form-check-label" for="perm_write">Write</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="delete" id="perm_delete" <?php echo e(in_array('delete', $permissions) ? 'checked' : ''); ?>>
                            <label class="form-check-label" for="perm_delete">Delete</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" <?php echo e(old('is_active', $apiKey->is_active) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update API Key</button>
                <a href="<?php echo e(route('admin.api-keys.index')); ?>" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/api-keys/edit.blade.php ENDPATH**/ ?>