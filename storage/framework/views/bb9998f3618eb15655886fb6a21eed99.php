<html>

<body>
    <h2>New inquiry received</h2>
    <p><strong>Type:</strong> <?php echo e($inquiry->type); ?></p>
    <p><strong>Name:</strong> <?php echo e($inquiry->name); ?></p>
    <p><strong>Email:</strong> <?php echo e($inquiry->email); ?></p>
    <p><strong>Message:</strong></p>
    <p><?php echo nl2br(e($inquiry->message)); ?></p>
</body>

</html><?php /**PATH /home/site/wwwroot/resources/views/emails/inquiry_received.blade.php ENDPATH**/ ?>