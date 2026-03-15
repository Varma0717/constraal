

<?php $__env->startSection('title', 'Feature Flags'); ?>
<?php $__env->startSection('page-title', 'Feature Flags'); ?>
<?php $__env->startSection('icon', 'bi-flag'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Feature Flags</h5>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addFeatureModal">
            <i class="bi bi-plus-lg me-1"></i> Add Feature Flag
        </button>
    </div>
    <div class="card-body">
        <p class="text-muted mb-4">Control which features are enabled or disabled across the application.</p>

        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Feature</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Last Updated</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $flags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <code><?php echo e($flag->name); ?></code>
                        </td>
                        <td><?php echo e($flag->description); ?></td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input feature-toggle" type="checkbox"
                                    data-feature="<?php echo e($flag->id); ?>"
                                    <?php echo e($flag->is_enabled ? 'checked' : ''); ?>>
                            </div>
                        </td>
                        <td><?php echo e($flag->updated_at?->diffForHumans()); ?></td>
                        <td>
                            <button class="btn btn-sm btn-outline-danger" onclick="deleteFeature(<?php echo e((int)$flag->id); ?>)">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            <i class="bi bi-flag d-block mb-2" style="font-size:1.5rem;"></i>
                            No feature flags configured
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <hr class="my-4">

        <h6>Default Feature Flags</h6>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card border mb-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <strong>User Registration</strong>
                            <p class="mb-0 text-muted small">Allow new users to register</p>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border mb-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Email Verification</strong>
                            <p class="mb-0 text-muted small">Require email verification</p>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border mb-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Job Applications</strong>
                            <p class="mb-0 text-muted small">Allow job applications submission</p>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border mb-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Contact Form</strong>
                            <p class="mb-0 text-muted small">Enable contact form submissions</p>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Feature Modal -->
<div class="modal fade" id="addFeatureModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Feature Flag</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?php echo e(route('admin.settings.feature-flags.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="feature_name" class="form-label">Feature Name</label>
                        <input type="text" class="form-control" id="feature_name" name="name" placeholder="e.g., enable_dark_mode" required>
                        <small class="text-muted">Use snake_case for names</small>
                    </div>

                    <div class="mb-3">
                        <label for="feature_description" class="form-label">Description</label>
                        <textarea class="form-control" id="feature_description" name="description" rows="2" required></textarea>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="feature_enabled" name="is_enabled" value="1">
                        <label class="form-check-label" for="feature_enabled">Enabled by default</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Feature Flag</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    document.querySelectorAll('.feature-toggle').forEach(toggle => {
        toggle.addEventListener('change', function() {
            const flagId = this.dataset.feature;

            fetch(`/admin/settings/feature-flags/${flagId}/toggle`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Feature toggled successfully');
                    }
                })
                .catch(() => {
                    this.checked = !this.checked;
                    alert('Failed to toggle feature flag.');
                });
        });
    });

    function deleteFeature(id) {
        if (confirm('Are you sure you want to delete this feature flag?')) {
            fetch(`/admin/settings/feature-flags/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) window.location.reload();
                })
                .catch(() => alert('Failed to delete feature flag.'));
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/settings/feature-flags.blade.php ENDPATH**/ ?>