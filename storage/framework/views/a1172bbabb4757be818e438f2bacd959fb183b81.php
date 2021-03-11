<?php $__env->startSection('title'); ?> Dashboard <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
     
    <div class="row">
        Sistema Angelus
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footerScript'); ?>
<!--Morris Chart-->
            <script src="<?php echo e(URL::asset('/libs/morris.js/morris.js.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('/libs/raphael/raphael.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('/js/pages/dashboard.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/angelus/resources/views/dashboard/index.blade.php ENDPATH**/ ?>