<?php $__env->startSection('title'); ?> Form Elements <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo e($result); ?>

 <!-- start page title -->
                    <div class="row">
                <!-- <?php $__env->startComponent('common-components.breadcrumb'); ?>
                     <?php $__env->slot('title'); ?> Cadastro de Usuario  <?php $__env->endSlot(); ?>                     
                     <?php $__env->slot('li1'); ?> Lexa  <?php $__env->endSlot(); ?>
                     <?php $__env->slot('li2'); ?> Forms  <?php $__env->endSlot(); ?>
                     <?php $__env->slot('li3'); ?> Form Elements <?php $__env->endSlot(); ?>
                <?php if (isset($__componentOriginalca1ecd71c079b0986f63b19e32f1541d590c0929)): ?>
<?php $component = $__componentOriginalca1ecd71c079b0986f63b19e32f1541d590c0929; ?>
<?php unset($__componentOriginalca1ecd71c079b0986f63b19e32f1541d590c0929); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?> -->
                
                   
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Cadastro Pagamaneo</h4>
                                    <hr>
                                    <!-- <p class="card-title-desc">Here are examples of <code class="highlighter-rouge">.form-control</code> applied to each textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code class="highlighter-rouge">type</code>.</p>-->
                                    <form class="form-horizontal mt-4" method="POST" action="/cad-pagamento/inserir"> 
                                    <?php echo csrf_field(); ?>
                                        <div class="form-group row">
                                            <label for="pagamento" class="col-sm-2 col-form-label">Novo  pagamento</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="" id="pagamento" name="pagamento">
                                            </div>
                                        </div>                                   
                                      

                                        <div class="col-12 mt-3" style="text-align: right;">
                                            <button type="submit" class="btn btn-primary">CADASTRAR</button>
                                            <button type="button" class="btn btn-primary">LIMPAR</button>                                        
                                        </div>
                                    </form>
                                    
                                    <br><br><hr>
                    <h4 class="card-title">Lista de Tipo de Pagamento</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Tipo</th>                                                
                                                <th>Ação</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $results): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <tr>
                                                <td><?php echo e($results->id); ?></td>
                                                <td><?php echo e($results->nome); ?></td>                                                
                                                 <td>
                                                    <input class="btn btn-warning" type="reset" value="Alterar">
                                                    <a href="/cad-pagamento/excluir/<?php echo e($results->id); ?>">
                                                        <input class="btn btn-danger" type="button" value="Excluir">
                                                    </a>                                                                                                        
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                  
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                        <!-- end col -->
                    </div>
                                    
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
}
}
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footerScript'); ?>
            <!-- Required datatable js -->
            <script src="<?php echo e(URL::asset('/libs/datatables/datatables.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('/libs/jszip/jszip.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('/libs/pdfmake/pdfmake.min.js')); ?>"></script>
           
            <!-- Datatable init js -->
            <script src="<?php echo e(URL::asset('/js/pages/datatables.init.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/angelus/resources/views//produtos/cad-pagamento.blade.php ENDPATH**/ ?>