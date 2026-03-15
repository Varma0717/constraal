<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Constraal</title>
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
                <h1 class="auth-title">Admin Login</h1>
                <p class="auth-subtitle">Constraal administration console</p>
            </div>
        </div>

        <?php if($errors->any()): ?>
        <div class="auth-alert">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div><?php echo e($error); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>

        <form class="auth-form" method="POST" action="<?php echo e(route('admin.login.post')); ?>">
            <?php echo csrf_field(); ?>

            <div>
                <label for="email" class="auth-label">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="auth-input"
                    value="<?php echo e(old('email')); ?>"
                    required
                    autofocus>
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
                <label for="password" class="auth-label">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="auth-input"
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
            </div>

            <div class="auth-actions">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
                <a class="auth-link" href="<?php echo e(route('admin.password.reset')); ?>">Forgot password?</a>
            </div>

            <button type="submit" class="auth-button">Sign in</button>
        </form>
    </div>
</body>

</html><?php /**PATH /home/site/wwwroot/resources/views/admin/auth/login.blade.php ENDPATH**/ ?>