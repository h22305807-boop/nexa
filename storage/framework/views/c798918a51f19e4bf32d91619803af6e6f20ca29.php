<script src="<?php echo e(asset('public/assets')); ?>/toast.js"></script>
<script>
    <?php if(session()->has('success')): ?>
    message('<?php echo e(session()->get('success')); ?>')
    <?php endif; ?>

    <?php if(session()->has('error')): ?>
    message('<?php echo e(session()->get('error')); ?>')
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            message('<?php echo e($error); ?>')
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</script>


































<?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/alert-message.blade.php ENDPATH**/ ?>