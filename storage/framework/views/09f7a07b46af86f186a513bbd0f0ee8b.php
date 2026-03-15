

<?php $__env->startSection('title', 'System Settings'); ?>
<?php $__env->startSection('page-title', 'System Settings'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">System Settings</h5>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('admin.settings.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <h6 class="text-muted mb-3">General Settings</h6>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="site_name" class="form-label">Site Name</label>
                    <input type="text" class="form-control" id="site_name" name="site_name" value="<?php echo e($settings['site_name'] ?? 'Constraal'); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="site_tagline" class="form-label">Tagline</label>
                    <input type="text" class="form-control" id="site_tagline" name="site_tagline" value="<?php echo e($settings['site_tagline'] ?? ''); ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="support_email" class="form-label">Support Email</label>
                    <input type="email" class="form-control" id="support_email" name="support_email" value="<?php echo e($settings['support_email'] ?? ''); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="contact_phone" class="form-label">Contact Phone</label>
                    <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="<?php echo e($settings['contact_phone'] ?? ''); ?>">
                </div>
            </div>

            <hr class="my-4">
            <h6 class="text-muted mb-3">Company Information</h6>

            <div class="mb-3">
                <label for="company_name" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo e($settings['company_name'] ?? ''); ?>">
            </div>

            <div class="mb-3">
                <label for="company_address" class="form-label">Company Address</label>
                <textarea class="form-control" id="company_address" name="company_address" rows="2"><?php echo e($settings['company_address'] ?? ''); ?></textarea>
            </div>

            <hr class="my-4">
            <h6 class="text-muted mb-3">Social Media Links</h6>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="social_facebook" class="form-label">Facebook URL</label>
                    <input type="url" class="form-control" id="social_facebook" name="social_facebook" value="<?php echo e($settings['social_facebook'] ?? ''); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="social_twitter" class="form-label">Twitter URL</label>
                    <input type="url" class="form-control" id="social_twitter" name="social_twitter" value="<?php echo e($settings['social_twitter'] ?? ''); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="social_linkedin" class="form-label">LinkedIn URL</label>
                    <input type="url" class="form-control" id="social_linkedin" name="social_linkedin" value="<?php echo e($settings['social_linkedin'] ?? ''); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="social_instagram" class="form-label">Instagram URL</label>
                    <input type="url" class="form-control" id="social_instagram" name="social_instagram" value="<?php echo e($settings['social_instagram'] ?? ''); ?>">
                </div>
            </div>

            <hr class="my-4">

            <button type="submit" class="btn btn-primary">Save Settings</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/settings/index.blade.php ENDPATH**/ ?>