<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Constraal is building the intelligence layer for the future home — reliable, safe, and scalable systems for home environments and industrial automation.">
    <title><?php echo $__env->yieldContent('title', 'Constraal'); ?> — Intelligent Systems</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/constraal_favicon.png')); ?>">
    <link rel="apple-touch-icon" href="<?php echo e(asset('images/constraal_favicon.png')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="text-slate-900 font-sans antialiased">
    <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main>
        <!-- Page Hero (optional) -->
        <?php if (! empty(trim($__env->yieldContent('page_header')))): ?>
        <?php echo $__env->yieldContent('page_header'); ?>
        <?php endif; ?>

        <!-- Main Content -->
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>

</html><?php /**PATH /home/site/wwwroot/resources/views/layouts/app.blade.php ENDPATH**/ ?>