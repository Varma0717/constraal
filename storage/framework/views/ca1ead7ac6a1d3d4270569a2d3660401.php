

<?php $__env->startSection('title', 'Subscribers'); ?>
<?php $__env->startSection('page-title', 'Subscribers'); ?>
<?php $__env->startSection('icon', 'bi-people-fill'); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="portal-stat-label">Total</div>
                <div class="portal-stat-value"><?php echo e($subscribers->total()); ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="portal-stat-label">Active</div>
                <div class="portal-stat-value"><?php echo e(\App\Models\Subscriber::active()->count()); ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="portal-stat-label">Verified</div>
                <div class="portal-stat-value"><?php echo e(\App\Models\Subscriber::verified()->count()); ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="portal-stat-label">Unsubscribed</div>
                <div class="portal-stat-value"><?php echo e(\App\Models\Subscriber::whereNotNull('unsubscribed_at')->count()); ?></div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-0">Newsletter Subscribers</h5>
            <small class="text-muted">Manage verification, unsubscribe actions, and exports.</small>
        </div>
        <a href="<?php echo e(route('admin.subscribers.export')); ?>" class="btn btn-primary btn-sm">
            <i class="bi bi-download me-1"></i> Export CSV
        </a>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Source</th>
                    <th>Status</th>
                    <th>Subscribed</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $subscribers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscriber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($subscriber->name ?: '—'); ?></td>
                    <td><?php echo e($subscriber->email); ?></td>
                    <td><?php echo e($subscriber->source); ?></td>
                    <td>
                        <?php if($subscriber->unsubscribed_at): ?>
                        <span class="badge bg-secondary">Unsubscribed</span>
                        <?php elseif($subscriber->verified_at): ?>
                        <span class="badge bg-success">Verified</span>
                        <?php else: ?>
                        <span class="badge bg-warning">Pending</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($subscriber->created_at?->format('M d, Y')); ?></td>
                    <td class="text-end">
                        <div class="btn-group btn-group-sm">
                            <a href="<?php echo e(route('admin.subscribers.show', $subscriber)); ?>" class="btn btn-outline-primary btn-sm">View</a>
                            <?php if(!$subscriber->verified_at): ?>
                            <form action="<?php echo e(route('admin.subscribers.verify', $subscriber)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-outline-success btn-sm">Verify</button>
                            </form>
                            <?php endif; ?>
                            <?php if(!$subscriber->unsubscribed_at): ?>
                            <form action="<?php echo e(route('admin.subscribers.unsubscribe', $subscriber)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-outline-warning btn-sm">Unsub</button>
                            </form>
                            <?php endif; ?>
                            <form action="<?php echo e(route('admin.subscribers.destroy', $subscriber)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete this subscriber?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">No subscribers found.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    <?php echo e($subscribers->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/subscribers/index.blade.php ENDPATH**/ ?>