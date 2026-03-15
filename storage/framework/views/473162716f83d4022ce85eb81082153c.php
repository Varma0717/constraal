

<?php $__env->startSection('title', 'Contact Constraal'); ?>

<?php $__env->startSection('page_header'); ?>
<div class="page-hero">
    <div class="site-container">
        <p class="text-sm font-semibold text-muted">Contact</p>
        <h1>Get In Touch</h1>
        <p class="mt-4 text-lg max-w-3xl">
            General inquiries, partnership opportunities, press, or early interest—reach out and we’ll respond promptly.
        </p>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section>
    <div class="site-container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="section-card p-8">
                <h2>Send us a message</h2>
                <form method="POST" action="<?php echo e(route('contact.submit')); ?>" class="mt-6 space-y-6">
                    <?php echo csrf_field(); ?>
                    <!-- Honeypot field -->
                    <input type="text" name="hp_name" style="display:none" tabindex="-1" autocomplete="off">

                    <div>
                        <label for="name" class="block text-sm font-medium mb-2">Full Name</label>
                        <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-accent" required>
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-accent" required>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label for="company" class="block text-sm font-medium mb-2">Company (Optional)</label>
                        <input type="text" id="company" name="company" value="<?php echo e(old('company')); ?>" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-accent">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-medium mb-2">Phone (Optional)</label>
                            <input type="text" id="phone" name="phone" value="<?php echo e(old('phone')); ?>" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-accent" placeholder="+1 555 123 4567">
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                            <label for="country" class="block text-sm font-medium mb-2">Country/Region (Optional)</label>
                            <input type="text" id="country" name="country" value="<?php echo e(old('country')); ?>" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-accent" placeholder="United States">
                            <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div>
                        <label for="inquiry_type" class="block text-sm font-medium mb-2">Inquiry Type</label>
                        <select id="inquiry_type" name="inquiry_type" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-accent" required>
                            <option value="">Select an option</option>
                            <option value="general" <?php echo e(old('inquiry_type') === 'general' ? 'selected' : ''); ?>>General Inquiry</option>
                            <option value="partnership" <?php echo e(old('inquiry_type') === 'partnership' ? 'selected' : ''); ?>>Partnership Opportunity</option>
                            <option value="press" <?php echo e(old('inquiry_type') === 'press' ? 'selected' : ''); ?>>Press & Media</option>
                            <option value="early_interest" <?php echo e(old('inquiry_type') === 'early_interest' ? 'selected' : ''); ?>>Early Interest</option>
                        </select>
                        <?php $__errorArgs = ['inquiry_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label for="preferred_contact" class="block text-sm font-medium mb-2">Preferred Contact Method (Optional)</label>
                        <select id="preferred_contact" name="preferred_contact" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-accent">
                            <option value="">No preference</option>
                            <option value="email" <?php echo e(old('preferred_contact') === 'email' ? 'selected' : ''); ?>>Email</option>
                            <option value="phone" <?php echo e(old('preferred_contact') === 'phone' ? 'selected' : ''); ?>>Phone</option>
                        </select>
                        <?php $__errorArgs = ['preferred_contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label for="use_case" class="block text-sm font-medium mb-2">Project Context (Optional)</label>
                        <textarea id="use_case" name="use_case" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-accent" placeholder="Tell us what you’re trying to build or solve."><?php echo e(old('use_case')); ?></textarea>
                        <?php $__errorArgs = ['use_case'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium mb-2">Message</label>
                        <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-accent" required><?php echo e(old('message')); ?></textarea>
                        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <?php if(session('status')): ?>
                    <div class="p-4 bg-green-50 border border-green-200 rounded text-green-800">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>

                    <button type="submit" class="btn w-full">Send Message</button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="space-y-6">
                <div class="section-card p-8">
                    <h2>Other ways to reach us</h2>
                    <div class="mt-6 space-y-6">
                        <div>
                            <h3 class="font-semibold mb-2">General Inquiries</h3>
                            <p class="text-muted">hello@constraal.example</p>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-2">Partnerships</h3>
                            <p class="text-muted">partnerships@constraal.example</p>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-2">Career Opportunities</h3>
                            <p class="text-muted">careers@constraal.example</p>
                            <a href="<?php echo e(route('careers')); ?>" class="text-accent hover:text-accent transition-colors">View open positions →</a>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-2">Press & Media</h3>
                            <p class="text-muted">press@constraal.example</p>
                        </div>
                    </div>
                </div>

                <div class="section-card p-8">
                    <h2>Early Updates</h2>
                    <p class="text-muted mb-4">
                        Join the early interest list for research updates and platform milestones.
                    </p>
                    <p class="text-sm text-muted">
                        Select “Early Interest” in the form to subscribe.
                    </p>
                </div>

                <div class="section-card p-8">
                    <h3 class="font-semibold mb-4">Office Hours</h3>
                    <p class="text-muted text-sm">Monday – Friday, 9:00 AM – 5:00 PM PT</p>
                    <p class="text-muted text-sm">We typically respond within 24 business hours.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/site/wwwroot/resources/views/contact.blade.php ENDPATH**/ ?>