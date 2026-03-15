

<?php $__env->startSection('title', 'Contact Messages'); ?>
<?php $__env->startSection('page-title', 'Contact Messages'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-0 d-inline">All Messages</h5>
            <?php if($unreadCount > 0): ?>
            <span class="badge bg-danger ms-2"><?php echo e($unreadCount); ?> unread</span>
            <?php endif; ?>
        </div>
        <?php if($unreadCount > 0): ?>
        <form action="<?php echo e(route('admin.contact-messages.mark-all-read')); ?>" method="POST" class="d-inline">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-sm btn-outline-primary">Mark All as Read</button>
        </form>
        <?php endif; ?>
    </div>
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr <?php if(!$message->is_read): ?> style="background: #f8f9fa; font-weight: 500;" <?php endif; ?>>
                        <td><?php echo e($message->id); ?></td>
                        <td><?php echo e($message->name); ?></td>
                        <td><?php echo e($message->email); ?></td>
                        <td><?php echo e(Str::limit($message->subject ?? 'No Subject', 30)); ?></td>
                        <td>
                            <?php if($message->is_read): ?>
                            <span class="badge bg-secondary">Read</span>
                            <?php else: ?>
                            <span class="badge bg-primary">Unread</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($message->created_at->format('M d, Y H:i')); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.contact-messages.show', $message)); ?>" class="btn btn-sm btn-outline-primary">View</a>
                            <form action="<?php echo e(route('admin.contact-messages.destroy', $message)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete this message?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-4">No messages found</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($messages->hasPages()): ?>
    <div class="card-footer">
        <?php echo e($messages->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/contact-messages/index.blade.php ENDPATH**/ ?>