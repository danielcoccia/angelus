<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> <?php echo $__env->yieldContent('title'); ?>  | Lexa - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(URL::asset('/images/favicon.ico')); ?>"> 
    
    <!-- Bootstrap Css -->
    <link href="<?php echo e(URL::asset('/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo e(URL::asset('/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo e(URL::asset('/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>

    <?php echo $__env->yieldContent('content'); ?>

    <!-- JAVASCRIPT -->
    <script src="<?php echo e(URL::asset('/libs/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/libs/bootstrap/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/libs/metismenu/metismenu.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/libs/simplebar/simplebar.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/libs/node-waves/node-waves.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/libs/jquery-sparkline/jquery-sparkline.min.js')); ?>"></script>
    <!-- App js -->
    <script src="<?php echo e(URL::asset('/js/app.min.js')); ?>"></script>
</body>

</html><?php /**PATH /var/www/html/LexaLaravel/resources/views/layouts/auth-master.blade.php ENDPATH**/ ?>