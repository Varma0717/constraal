

<?php $__env->startSection('title', 'CMS Pages'); ?>
<?php $__env->startSection('page-title', 'CMS Pages'); ?>
<?php $__env->startSection('icon', 'bi-layout-text-window'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-0">CMS Pages</h5>
            <small class="text-muted">Manage status, hero content, and page-level SEO content.</small>
        </div>
        <a href="<?php echo e(route('admin.cms.pages.create')); ?>" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Add New Page
        </a>
    </div>

    <?php if($pages->count()): ?>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Featured</th>
                    <th>Published</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($page->title); ?></td>
                    <td><code><?php echo e($page->slug); ?></code></td>
                    <td>
                        <?php if($page->status === 'published'): ?>
                        <span class="badge bg-success">Published</span>
                        <?php elseif($page->status === 'draft'): ?>
                        <span class="badge bg-warning">Draft</span>
                        <?php else: ?>
                        <span class="badge bg-secondary">Archived</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($page->featured ? 'Yes' : 'No'); ?></td>
                    <td><?php echo e($page->published_at ? $page->published_at->format('M d, Y') : '—'); ?></td>
                    <td class="text-end">
                        <div class="btn-group btn-group-sm">
                            <a href="<?php echo e(route('admin.cms.pages.edit', $page)); ?>" class="btn btn-outline-primary btn-sm">Edit</a>
                            <form method="POST" action="<?php echo e(route('admin.cms.pages.destroy', $page)); ?>" class="d-inline" onsubmit="return confirm('Delete this page?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
    <div class="card-body text-center text-muted py-4">
        No pages found. <a href="<?php echo e(route('admin.cms.pages.create')); ?>">Create the first one</a>
    </div>
    <?php endif; ?>
</div>

<div class="mt-3">
    <?php echo e($pages->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/admin/cms/pages/index.blade.php ENDPATH**/ ?>