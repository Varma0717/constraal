<?php use Illuminate\Support\Str; ?>


<?php $__env->startSection('title', 'Activity Logs'); ?>
<?php $__env->startSection('page-title', 'Activity Logs'); ?>

<?php $__env->startSection('content'); ?>
<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form action="<?php echo e(route('admin.logs.index')); ?>" method="GET" class="row g-3">
            <div class="col-md-3">
                <label for="action" class="form-label">Action Type</label>
                <select class="form-select" id="action" name="action">
                    <option value="">All Actions</option>
                    <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($action); ?>" <?php echo e(request('action') == $action ? 'selected' : ''); ?>><?php echo e($action); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-3">
                <label for="admin_id" class="form-label">Admin</label>
                <select class="form-select" id="admin_id" name="admin_id">
                    <option value="">All Admins</option>
                    <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($admin->id); ?>" <?php echo e(request('admin_id') == $admin->id ? 'selected' : ''); ?>><?php echo e($admin->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-2">
                <label for="from" class="form-label">From Date</label>
                <input type="date" class="form-control" id="from" name="from" value="<?php echo e(request('from')); ?>">
            </div>
            <div class="col-md-2">
                <label for="to" class="form-label">To Date</label>
                <input type="date" class="form-control" id="to" name="to" value="<?php echo e(request('to')); ?>">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary me-2">Filter</button>
                <a href="<?php echo e(route('admin.logs.index')); ?>" class="btn btn-outline-secondary">Reset</a>
            </div>
        </form>
    </div>
</div>

<!-- Quick Links -->
<div class="mb-4">
    <a href="<?php echo e(route('admin.logs.admin-actions')); ?>" class="btn btn-outline-primary me-2">Admin Actions</a>
    <a href="<?php echo e(route('admin.logs.user-actions')); ?>" class="btn btn-outline-info me-2">User Actions</a>
    <a href="<?php echo e(route('admin.logs.billing')); ?>" class="btn btn-outline-success me-2">Billing Logs</a>
    <a href="<?php echo e(route('admin.logs.security')); ?>" class="btn btn-outline-danger me-2">Security Logs</a>
    <a href="<?php echo e(route('admin.logs.export', request()->all())); ?>" class="btn btn-outline-secondary">
        <i class="bi bi-download"></i> Export CSV
    </a>
</div>

<!-- Logs Table -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">All Activity Logs</h5>
        <span class="badge bg-secondary"><?php echo e($logs->total()); ?> entries</span>
    </div>
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Admin</th>
                        <th>Action</th>
                        <th>Target</th>
                        <th>IP Address</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($log->id); ?></td>
                        <td><?php echo e($log->admin->name ?? 'System'); ?></td>
                        <td><code><?php echo e($log->action); ?></code></td>
                        <td><?php echo e(Str::limit($log->target, 30) ?? 'N/A'); ?></td>
                        <td><?php echo e($log->ip_address); ?></td>
                        <td><?php echo e($log->created_at->format('M d, Y H:i')); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.logs.show', $log)); ?>" class="btn btn-sm btn-outline-primary">View</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-4">No logs found</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($logs->hasPages()): ?>
    <div class="card-footer">
        <?php echo e($logs->appends(request()->query())->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/logs/index.blade.php ENDPATH**/ ?>