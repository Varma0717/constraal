

<?php $__env->startSection('title', 'Company — Constraal'); ?>

<?php $__env->startSection('page_header'); ?>
<div class="page-hero">
    <div class="site-container">
        <p class="text-sm font-semibold text-muted">Company</p>
        <h1>About Constraal</h1>
        <p class="mt-4 text-lg max-w-3xl">
            Constraal is a global robotics, automation, and intelligent appliance company building systems
            that operate quietly and reliably in the background of everyday life.
        </p>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Vision -->
<section>
    <div class="site-container">
        <h2>Vision</h2>
        <p class="text-muted mb-6">
            To build a world where robotics and intelligent systems enhance daily life so seamlessly
            they become an invisible but essential layer of modern living.
        </p>
    </div>
</section>

<!-- Mission -->
<section>
    <div class="site-container">
        <h2>Mission</h2>
        <p class="text-muted mb-6">
            To design and deliver reliable, intelligent automation systems that simplify tasks,
            improve efficiency, and elevate safety across homes and work environments.
        </p>
    </div>
</section>

<!-- Brand Pillars -->
<section class="section-muted">
    <div class="site-container">
        <h2 class="text-center">Brand Pillars</h2>
        <p class="text-center text-muted mb-8 max-w-3xl mx-auto">Five principles that guide every system we design.</p>
        <div class="pillars-grid-new">
            <article class="pillar-card-new">
                <span class="pillar-index">01</span>
                <h3>Reliability</h3>
                <p class="text-sm text-muted mt-3">Technology engineered for consistent real-world performance.</p>
            </article>
            <article class="pillar-card-new">
                <span class="pillar-index">02</span>
                <h3>Intelligence</h3>
                <p class="text-sm text-muted mt-3">Systems that adapt and optimize over time.</p>
            </article>
            <article class="pillar-card-new">
                <span class="pillar-index">03</span>
                <h3>Safety</h3>
                <p class="text-sm text-muted mt-3">Responsible automation built for human environments.</p>
            </article>
            <article class="pillar-card-new">
                <span class="pillar-index">04</span>
                <h3>Integration</h3>
                <p class="text-sm text-muted mt-3">A unified ecosystem, not isolated devices.</p>
            </article>
            <article class="pillar-card-new pillar-card-new--wide">
                <span class="pillar-index">05</span>
                <h3>Simplicity</h3>
                <p class="text-sm text-muted mt-3">Advanced systems designed to feel effortless.</p>
            </article>
        </div>
    </div>
</section>

<!-- Careers -->
<section>
    <div class="site-container">
        <h2>Careers</h2>
        <p class="text-muted mb-6">
            We're always looking for talented engineers and designers who share our passion for building systems that work reliably and serve people well.
        </p>
        <a href="<?php echo e(route('careers')); ?>" class="btn">View Open Positions</a>
    </div>
</section>

<!-- Press -->
<section>
    <div class="site-container">
        <h2>Press</h2>
        <p class="text-muted mb-6">
            For media inquiries, press kits, and brand assets, reach out to our communications team.
        </p>
        <a href="<?php echo e(route('contact')); ?>" class="btn btn-secondary">Press Inquiries</a>
    </div>
</section>

<!-- Contact -->
<section class="section-muted">
    <div class="site-container">
        <h2>Contact</h2>
        <p class="text-muted mb-6">
            General inquiries, partnership opportunities, or early interest — reach out and we'll respond promptly.
        </p>
        <a href="<?php echo e(route('contact')); ?>" class="btn">Get in Touch</a>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/about.blade.php ENDPATH**/ ?>