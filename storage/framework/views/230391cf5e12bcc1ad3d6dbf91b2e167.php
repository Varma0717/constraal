<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Constraal</title>
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
                <h1 class="auth-title">Welcome back</h1>
                <p class="auth-subtitle">Access your Constraal account</p>
            </div>
        </div>

        <?php if($errors->any()): ?>
        <div class="auth-alert">
            <?php echo e($errors->first()); ?>

        </div>
        <?php endif; ?>

        <form class="auth-form" method="POST" action="<?php echo e(route('account.customer.login.post')); ?>">
            <?php echo csrf_field(); ?>

            <div>
                <label class="auth-label" for="email">Email Address</label>
                <input
                    type="email"
                    class="auth-input"
                    id="email"
                    name="email"
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
            </div>

            <div class="auth-actions">
                <span></span>
                <a class="auth-link" href="<?php echo e(route('account.customer.reset-password')); ?>">Forgot password?</a>
            </div>

            <button type="submit" class="auth-button">Sign in</button>
        </form>

        <p class="auth-meta">No account yet? <a class="auth-link" href="<?php echo e(route('account.customer.signup')); ?>">Create one</a></p>
    </div>
</body>

</html><?php /**PATH /home/site/wwwroot/resources/views/customer/auth/login.blade.php ENDPATH**/ ?>