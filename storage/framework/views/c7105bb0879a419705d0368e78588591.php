

<?php $__env->startSection('title', 'Media Management'); ?>
<?php $__env->startSection('page-title', 'Media Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Upload File</h5>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.media.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3">
                        <label for="file" class="form-label">Select File *</label>
                        <input type="file" class="form-control <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="file" name="file" required>
                        <small class="text-muted">Max file size: 10MB</small>
                        <?php $__errorArgs = ['file'];
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

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-upload"></i> Upload
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Media Library</h5>
                <span class="badge bg-secondary"><?php echo e($media->total()); ?> files</span>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <?php $__empty_1 = true; $__currentLoopData = $media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body p-2">
                                <?php if($file->type === 'image'): ?>
                                <img src="<?php echo e(asset('storage/' . $file->file_path)); ?>" alt="<?php echo e($file->name); ?>" class="img-fluid rounded mb-2" style="max-height: 150px; width: 100%; object-fit: cover;">
                                <?php else: ?>
                                <div class="d-flex align-items-center justify-content-center bg-light rounded mb-2" style="height: 150px;">
                                    <?php if($file->type === 'video'): ?>
                                    <i class="bi bi-camera-video" style="font-size: 48px;"></i>
                                    <?php else: ?>
                                    <i class="bi bi-file-earmark" style="font-size: 48px;"></i>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                                <p class="mb-1 small text-truncate" title="<?php echo e($file->name); ?>"><?php echo e($file->name); ?></p>
                                <p class="mb-2 text-muted small"><?php echo e(number_format($file->file_size / 1024, 2)); ?> KB</p>
                                <div class="d-flex gap-1">
                                    <a href="<?php echo e(asset('storage/' . $file->file_path)); ?>" target="_blank" class="btn btn-sm btn-outline-primary flex-fill">View</a>
                                    <form action="<?php echo e(route('admin.media.destroy', $file)); ?>" method="POST" onsubmit="return confirm('Delete this file?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-images" style="font-size: 48px; color: #ccc;"></i>
                        <p class="text-muted mt-2">No media files uploaded yet</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if($media->hasPages()): ?>
            <div class="card-footer">
                <?php echo e($media->links()); ?>

            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/media/index.blade.php ENDPATH**/ ?>