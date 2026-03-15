

<?php $__env->startSection('title', 'Blocked IPs'); ?>
<?php $__env->startSection('page-title', 'Blocked IPs'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Block IP Address</h5>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.security.block-ip')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3">
                        <label for="ip_address" class="form-label">IP Address *</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['ip_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ip_address" name="ip_address" placeholder="192.168.1.1" required>
                        <?php $__errorArgs = ['ip_address'];
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

                    <div class="mb-3">
                        <label for="reason" class="form-label">Reason</label>
                        <textarea class="form-control" id="reason" name="reason" rows="2"></textarea>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_permanent" name="is_permanent" value="1">
                            <label class="form-check-label" for="is_permanent">
                                Permanent Block
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="blocked_until" class="form-label">Block Until (if not permanent)</label>
                        <input type="datetime-local" class="form-control" id="blocked_until" name="blocked_until">
                    </div>

                    <button type="submit" class="btn btn-danger w-100">Block IP</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Blocked IP Addresses</h5>
            </div>
            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>IP Address</th>
                                <th>Reason</th>
                                <th>Blocked Until</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $ips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($ip->ip_address); ?></td>
                                <td><?php echo e($ip->reason ?? 'No reason provided'); ?></td>
                                <td>
                                    <?php if($ip->is_permanent): ?>
                                    <span class="badge bg-danger">Permanent</span>
                                    <?php elseif($ip->blocked_until): ?>
                                    <?php echo e($ip->blocked_until->format('M d, Y H:i')); ?>

                                    <?php else: ?>
                                    N/A
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <form action="<?php echo e(route('admin.security.unblock-ip', $ip->ip_address)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to unblock this IP?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-outline-success">Unblock</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="text-center py-4">No blocked IPs</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php if($ips->hasPages()): ?>
            <div class="card-footer">
                <?php echo e($ips->links()); ?>

            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/security/blocked-ips.blade.php ENDPATH**/ ?>