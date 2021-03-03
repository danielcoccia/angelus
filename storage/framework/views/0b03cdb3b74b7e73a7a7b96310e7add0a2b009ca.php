

<?php $__env->startSection('title'); ?> Timeline <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- start page title -->
                    <div class="row">

                 <?php $__env->startComponent('common-components.breadcrumb'); ?>
                     <?php $__env->slot('title'); ?> Timeline <?php $__env->endSlot(); ?>                     
                     <?php $__env->slot('li1'); ?> Lexa  <?php $__env->endSlot(); ?>
                     <?php $__env->slot('li2'); ?> Pages  <?php $__env->endSlot(); ?>
                     <?php $__env->slot('li3'); ?> Timeline <?php $__env->endSlot(); ?>
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

                                    <section id="cd-timeline" class="cd-container" dir="ltr">
                                        <div class="cd-timeline-block timeline-right">
                                            <div class="cd-timeline-img bg-success">
                                                <i class="mdi mdi-adjust"></i>
                                            </div>
                                            <!-- cd-timeline-img -->

                                            <div class="cd-timeline-content">
                                                <h3>Timeline Event One</h3>
                                                <p class="mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
                                                <span class="cd-date">May 23</span>
                                            </div>
                                            <!-- cd-timeline-content -->
                                        </div>
                                        <!-- cd-timeline-block -->

                                        <div class="cd-timeline-block timeline-left">
                                            <div class="cd-timeline-img bg-danger">
                                                <i class="mdi mdi-adjust"></i>
                                            </div>
                                            <!-- cd-timeline-img -->

                                            <div class="cd-timeline-content">
                                                <h3>Timeline Event Two</h3>
                                                <p class="mb-4 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium</p>
                                                <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light m-t-5">See more detail</button>

                                                <span class="cd-date">May 30</span>
                                            </div>
                                            <!-- cd-timeline-content -->
                                        </div>
                                        <!-- cd-timeline-block -->

                                        <div class="cd-timeline-block timeline-right">
                                            <div class="cd-timeline-img bg-info">
                                                <i class="mdi mdi-adjust"></i>
                                            </div>
                                            <!-- cd-timeline-img -->

                                            <div class="cd-timeline-content">
                                                <h3>Timeline Event Three</h3>
                                                <p class="mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati, quisquam id molestias eaque error assumenda delectus. Odit, itaque, deserunt corporis vero ipsum nisi eius odio natus ullam provident pariatur temporibus quia eos repellat ... <a href="#" class="text-primary">Read more</a></p>
                                                <span class="cd-date">Jun 05</span>
                                            </div>
                                            <!-- cd-timeline-content -->
                                        </div>
                                        <!-- cd-timeline-block -->

                                        <div class="cd-timeline-block timeline-left">
                                            <div class="cd-timeline-img bg-pink">
                                                <i class="mdi mdi-adjust"></i>
                                            </div>
                                            <!-- cd-timeline-img -->

                                            <div class="cd-timeline-content">
                                                <h3>Timeline Event Four</h3>
                                                <p class="mb-4 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut.</p>
                                                <img src="<?php echo e(URL::asset('/images/small/img-1.jpg')); ?>" alt="" class="rounded" width="120">
                                                <img src="<?php echo e(URL::asset('/images/small/img-2.jpg')); ?>" alt="" class="rounded" width="120">
                                                <span class="cd-date">Jun 14</span>
                                            </div>
                                            <!-- cd-timeline-content -->
                                        </div>
                                        <!-- cd-timeline-block -->

                                        <div class="cd-timeline-block timeline-right">
                                            <div class="cd-timeline-img bg-warning">
                                                <i class="mdi mdi-adjust"></i>
                                            </div>
                                            <!-- cd-timeline-img -->

                                            <div class="cd-timeline-content">
                                                <h3>Timeline Event Five</h3>
                                                <p class="mb-4 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum.</p>
                                                <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">See more detail</button>
                                                <span class="cd-date">Jun 18</span>
                                            </div>
                                            <!-- cd-timeline-content -->
                                        </div>
                                        <!-- cd-timeline-block -->

                                        <div class="cd-timeline-block">

                                            <div class="cd-timeline-img bg-primary d-xl-none">
                                                <i class="mdi mdi-adjust"></i>
                                            </div>
                                            <!-- cd-timeline-img -->
                                            <div class="cd-timeline-content">
                                                <h3>Timeline Event End</h3>
                                                <p class="mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati, quisquam id molestias eaque asperiores voluptatibus cupiditate error assumenda delectus odit similique earum voluptatem doloremque dolorem ipsam quae rerum quis. Deserunt corporis vero ipsum nisi eius odio natus ullam provident pariatur temporibus quia eos repellat consequuntur.</p>
                                                <span class="cd-date">Jun 30</span>
                                            </div>
                                            <!-- cd-timeline-content -->
                                        </div>
                                        <!-- cd-timeline-block -->
                                    </section>
                                    <!-- cd-timeline -->

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/LexaLaravel/resources/views/pages/pages-timeline.blade.php ENDPATH**/ ?>