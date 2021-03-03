

<?php $__env->startSection('title'); ?> Form Validation <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- start page title -->
                    <div class="row">
            <?php $__env->startComponent('common-components.breadcrumb'); ?>
                     <?php $__env->slot('title'); ?> Form Validation  <?php $__env->endSlot(); ?>                     
                     <?php $__env->slot('li1'); ?> Lexa  <?php $__env->endSlot(); ?>
                     <?php $__env->slot('li2'); ?> Forms  <?php $__env->endSlot(); ?>
                     <?php $__env->slot('li3'); ?> Form Validation <?php $__env->endSlot(); ?>
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
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Validation type</h4>
                                    <p class="card-title-desc">Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.</p>

                                    <form class="custom-validation" action="#">
                                        <div class="form-group">
                                            <label>Required</label>
                                            <input type="text" class="form-control" required placeholder="Type something" />
                                        </div>

                                        <div class="form-group">
                                            <label>Equal To</label>
                                            <div>
                                                <input type="password" id="pass2" class="form-control" required placeholder="Password" />
                                            </div>
                                            <div class="mt-2">
                                                <input type="password" class="form-control" required data-parsley-equalto="#pass2" placeholder="Re-Type Password" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>E-Mail</label>
                                            <div>
                                                <input type="email" class="form-control" required parsley-type="email" placeholder="Enter a valid e-mail" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>URL</label>
                                            <div>
                                                <input parsley-type="url" type="url" class="form-control" required placeholder="URL" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Digits</label>
                                            <div>
                                                <input data-parsley-type="digits" type="text" class="form-control" required placeholder="Enter only digits" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Number</label>
                                            <div>
                                                <input data-parsley-type="number" type="text" class="form-control" required placeholder="Enter only numbers" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Alphanumeric</label>
                                            <div>
                                                <input data-parsley-type="alphanum" type="text" class="form-control" required placeholder="Enter alphanumeric value" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Textarea</label>
                                            <div>
                                                <textarea required class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-secondary waves-effect">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Range validation</h4>
                                    <p class="card-title-desc">Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.</p>

                                    <form action="#" class="custom-validation">

                                        <div class="form-group">
                                            <label>Min Length</label>
                                            <div>
                                                <input type="text" class="form-control" required data-parsley-minlength="6" placeholder="Min 6 chars." />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Max Length</label>
                                            <div>
                                                <input type="text" class="form-control" required data-parsley-maxlength="6" placeholder="Max 6 chars." />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Range Length</label>
                                            <div>
                                                <input type="text" class="form-control" required data-parsley-length="[5,10]" placeholder="Text between 5 - 10 chars length" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Min Value</label>
                                            <div>
                                                <input type="text" class="form-control" required data-parsley-min="6" placeholder="Min value is 6" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Max Value</label>
                                            <div>
                                                <input type="text" class="form-control" required data-parsley-max="6" placeholder="Max value is 6" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Range Value</label>
                                            <div>
                                                <input class="form-control" required type="text range" min="6" max="100" placeholder="Number between 6 - 100" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Regular Exp</label>
                                            <div>
                                                <input type="text" class="form-control" required data-parsley-pattern="#[A-Fa-f0-9]{6}" placeholder="Hex. Color" />
                                            </div>
                                        </div>

                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-secondary waves-effect">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footerScript'); ?>
  <script src="<?php echo e(URL::asset('/libs/parsleyjs/parsleyjs.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('/js/pages/form-validation.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/LexaLaravel/resources/views/form/form-validation.blade.php ENDPATH**/ ?>