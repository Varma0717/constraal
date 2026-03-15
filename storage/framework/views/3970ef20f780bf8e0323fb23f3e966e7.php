

<?php $__env->startSection('title', 'Analytics'); ?>
<?php $__env->startSection('page-title', 'Analytics Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <!-- Traffic Metrics -->
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-header">
                <h6 class="mb-0"><i class="bi bi-people"></i> Visitors</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span>Today</span>
                    <strong><?php echo e(number_format($todayVisitors)); ?></strong>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>This Week</span>
                    <strong><?php echo e(number_format($weeklyVisitors)); ?></strong>
                </div>
                <div class="d-flex justify-content-between">
                    <span>This Month</span>
                    <strong><?php echo e(number_format($monthlyVisitors)); ?></strong>
                </div>
            </div>
        </div>
    </div>

    <!-- Signup Metrics -->
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-header">
                <h6 class="mb-0"><i class="bi bi-person-plus"></i> Signups</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span>Today</span>
                    <strong><?php echo e(number_format($signupsToday)); ?></strong>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>This Week</span>
                    <strong><?php echo e(number_format($signupsThisWeek)); ?></strong>
                </div>
                <div class="d-flex justify-content-between">
                    <span>This Month</span>
                    <strong><?php echo e(number_format($signupsThisMonth)); ?></strong>
                </div>
            </div>
        </div>
    </div>

    <!-- Revenue Metrics -->
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-header">
                <h6 class="mb-0"><i class="bi bi-currency-dollar"></i> Revenue</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span>Today</span>
                    <strong>$<?php echo e(number_format($revenueToday, 2)); ?></strong>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>This Week</span>
                    <strong>$<?php echo e(number_format($revenueThisWeek, 2)); ?></strong>
                </div>
                <div class="d-flex justify-content-between">
                    <span>This Month</span>
                    <strong>$<?php echo e(number_format($revenueThisMonth, 2)); ?></strong>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <!-- Subscription Stats -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0"><i class="bi bi-calendar-check"></i> Subscriptions</h6>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6">
                        <div style="font-size: 32px; font-weight: bold; color: #28a745;"><?php echo e($activeSubscriptions); ?></div>
                        <small class="text-muted">Active</small>
                    </div>
                    <div class="col-6">
                        <div style="font-size: 32px; font-weight: bold; color: #dc3545;"><?php echo e($cancelledThisMonth); ?></div>
                        <small class="text-muted">Cancelled This Month</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0"><i class="bi bi-link-45deg"></i> Reports</h6>
            </div>
            <div class="card-body">
                <a href="<?php echo e(route('admin.analytics.users')); ?>" class="btn btn-outline-primary me-2 mb-2">User Analytics</a>
                <a href="<?php echo e(route('admin.analytics.revenue')); ?>" class="btn btn-outline-success me-2 mb-2">Revenue Report</a>
                <a href="<?php echo e(route('admin.logs.index')); ?>" class="btn btn-outline-secondary mb-2">Activity Logs</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- User Growth Chart Data -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0"><i class="bi bi-graph-up-arrow"></i> User Growth (Last 30 Days)</h6>
            </div>
            <div class="card-body">
                <?php if(count($userGrowth) > 0): ?>
                <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-sm mb-0">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>New Users</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $userGrowth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(\Carbon\Carbon::parse($date)->format('M d, Y')); ?></td>
                                <td><?php echo e($count); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <p class="text-muted text-center mb-0">No data available</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Revenue Chart Data -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0"><i class="bi bi-cash-stack"></i> Revenue (Last 30 Days)</h6>
            </div>
            <div class="card-body">
                <?php if(count($revenueChart) > 0): ?>
                <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-sm mb-0">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $revenueChart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(\Carbon\Carbon::parse($date)->format('M d, Y')); ?></td>
                                <td>$<?php echo e(number_format($total, 2)); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <p class="text-muted text-center mb-0">No data available</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/analytics/index.blade.php ENDPATH**/ ?>