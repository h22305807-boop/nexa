<link href="<?php echo e(asset(main_root())); ?>/toastr/toastr.min.css" rel="stylesheet"/>
<script src="<?php echo e(asset(main_root())); ?>/toastr/jquery.min.js"></script>
<script src="<?php echo e(asset(main_root())); ?>/toastr/toastr.js"></script>
<script>
    <?php if(Session::has('message')): ?>
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.success("<?php echo e(session('message')); ?>");
    <?php endif; ?>
        <?php if(Session::has('success')): ?>
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.success("<?php echo e(session('success')); ?>");
    <?php endif; ?>

        <?php if(Session::has('error')): ?>
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.error("<?php echo e(session('error')); ?>");
    <?php endif; ?>

        <?php if(Session::has('status')): ?>
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.success("<?php echo e(session('status')); ?>");
    <?php endif; ?>

        <?php if(Session::has('info')): ?>
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.info("<?php echo e(session('info')); ?>");
    <?php endif; ?>

        <?php if(Session::has('warning')): ?>
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.warning("<?php echo e(session('warning')); ?>");
    <?php endif; ?>

    <?php if(Session::has('errors')): ?>
    <?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    toastr.error("<?php echo e($error); ?>");
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php endif; ?>

        toastr.options = {
        "closeButton": true,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
<?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/admin/partials/message.blade.php ENDPATH**/ ?>