<?php $__env->startSection('content'); ?>
                    
                   


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">OK teste</h4>
                                   

                                    <div id="gmaps-markers" class="gmaps"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                       
                    </div>
                 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footerScript'); ?>
 <!-- google maps api -->
            <script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script>

            <!-- Gmaps file -->
            <script src="<?php echo e(URL::asset('/libs/gmaps/gmaps.min.js')); ?>"></script>

            <!-- demo codes -->
            <script src="<?php echo e(URL::asset('/js/pages/gmaps.init.js')); ?>"></script>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/LexaLaravel/resources/views/errors/teste.blade.php ENDPATH**/ ?>