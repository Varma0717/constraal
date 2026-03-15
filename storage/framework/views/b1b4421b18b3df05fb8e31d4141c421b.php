<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account — Constraal</title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/constraal_favicon.png')); ?>">
    <link rel="apple-touch-icon" href="<?php echo e(asset('images/constraal_favicon.png')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>

<body class="auth-shell">
    <a class="auth-back" href="<?php echo e(route('home')); ?>">Back to site</a>

    <div class="auth-card">
        <div class="auth-brand">
            <img src="<?php echo e(asset('images/constraal_logo.png')); ?>" alt="Constraal">
            <div>
                <h1 class="auth-title">Create account</h1>
                <p class="auth-subtitle">Join Constraal today</p>
            </div>
        </div>

        <?php if($errors->any()): ?>
        <div class="auth-alert">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div><?php echo e($error); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>

        <form class="auth-form" method="POST" action="<?php echo e(route('account.customer.signup.post')); ?>">
            <?php echo csrf_field(); ?>

            <div>
                <label class="auth-label" for="name">Full Name</label>
                <input
                    type="text"
                    class="auth-input"
                    id="name"
                    name="name"
                    value="<?php echo e(old('name')); ?>"
                    required>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="auth-error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label class="auth-label" for="email">Email Address</label>
                <input
                    type="email"
                    class="auth-input"
                    id="email"
                    name="email"
                    value="<?php echo e(old('email')); ?>"
                    required>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="auth-error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label class="auth-label" for="password">Password</label>
                <input
                    type="password"
                    class="auth-input"
                    id="password"
                    name="password"
                    required>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="auth-error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <div class="portal-muted">At least 8 characters.</div>
            </div>

            <div>
                <label class="auth-label" for="password_confirmation">Confirm Password</label>
                <input
                    type="password"
                    class="auth-input"
                    id="password_confirmation"
                    name="password_confirmation"
                    required>
                <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="auth-error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <button type="submit" class="auth-button">Create account</button>
        </form>

        <p class="auth-meta">Already have an account? <a class="auth-link" href="<?php echo e(route('account.customer.login')); ?>">Sign in here</a></p>
    </div>
</body>

</html><?php /**PATH /home/site/wwwroot/resources/views/customer/auth/signup.blade.php ENDPATH**/ ?>