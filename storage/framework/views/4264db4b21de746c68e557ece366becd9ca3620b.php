

<?php $__env->startSection('title'); ?> Calendar <?php $__env->stopSection(); ?>

<?php $__env->startSection('headerCss'); ?>
<!-- Plugin css -->
<link href="<?php echo e(URL::asset('/libs/fullcalendar/fullcalendar.min.css')); ?>" rel="stylesheet" type="text/css" />  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <!-- start page title -->
                    <div class="row">

                <?php $__env->startComponent('common-components.breadcrumb'); ?>
                     <?php $__env->slot('title'); ?> Calender  <?php $__env->endSlot(); ?>                     
                     <?php $__env->slot('li1'); ?> Lexa  <?php $__env->endSlot(); ?>
                     <?php $__env->slot('li2'); ?> Calender  <?php $__env->endSlot(); ?>
                     <?php $__env->slot('li3'); ?> Calender  <?php $__env->endSlot(); ?>
                <?php if (isset($__componentOriginalca1ecd71c079b0986f63b19e32f1541d590c0929)): ?>
<?php $component = $__componentOriginalca1ecd71c079b0986f63b19e32f1541d590c0929; ?>
<?php unset($__componentOriginalca1ecd71c079b0986f63b19e32f1541d590c0929); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

                <?php $__env->startComponent('common-components.chart'); ?>
                     <?php $__env->slot('chart1_id'); ?> header-chart-1  <?php $__env->endSlot(); ?>                     
                     <?php $__env->slot('chart1_title'); ?> Balance $ 2,317  <?php $__env->endSlot(); ?>
                     <?php $__env->slot('chart2_id'); ?> header-chart-2  <?php $__env->endSlot(); ?>                     
                     <?php $__env->slot('chart3_title'); ?> Item Sold 1230  <?php $__env->endSlot(); ?>
                <?php if (isset($__componentOriginalfa6d97ca636dc084ddb9468400bbb392b431a64f)): ?>
<?php $component = $__componentOriginalfa6d97ca636dc084ddb9468400bbb392b431a64f; ?>
<?php unset($__componentOriginalfa6d97ca636dc084ddb9468400bbb392b431a64f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id='calendar'></div>

                                    <div style='clear:both'></div>
                                </div>
                            </div>
                        </div>
                    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footerScript'); ?>
            <!-- plugin js -->
            <script src="<?php echo e(URL::asset('/libs/moment/moment.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('/libs/jquery-ui/jquery-ui.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('/libs/fullcalendar/fullcalendar.min.js')); ?>"></script>

            <!-- Calendar init -->
            <script src="<?php echo e(URL::asset('/js/pages/calendar.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/LexaLaravel/resources/views/calendar/calendar.blade.php ENDPATH**/ ?>