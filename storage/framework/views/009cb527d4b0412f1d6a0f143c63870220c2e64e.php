<?php $__env->startSection('title'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <a href="/item-composicao-incluir">
                                            <input class="btn btn-primary" type="button" value="Incluir Composição de Item do Catalogo">
                                    </a>
                    <br><br><hr>
                        <h4 class="card-title">Lista de Itens de Composição</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nome</th>
                                                <th>Categoria</th>
                                                <th>Valor Mínimo</th>
                                                <th>Valor Medio</th>
                                                <th>Valor Máximo</th>
                                                <th>Item Composição</th>
                                                <th>Ativo</th>                           
                                            </tr>
                                        </thead>

                                        <tbody>
                                          <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $results): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <tr>
                                                <td><?php echo e($results->id); ?></td>
                                                <td><?php echo e($results->nome); ?></td>
                                                <td><?php echo e($results->nome_categoria); ?></td>
                                                <td><?php echo e($results->valor_minimo); ?></td>
                                                <td><?php echo e($results->valor_medio); ?></td>
                                                <td><?php echo e($results->valor_maximo); ?></td>                                                
                                                <td><?php echo e($results->composicao ? 'sim' : 'não'); ?></td>
                                                <td><?php echo e($results->ativo ? 'sim' : 'não'); ?></td>
                                                <td>
<!--                                                     <a href="/item-catalogo/alterar/<?php echo e($results->id); ?>">
                                                        <input class="btn btn-warning" type="button" value="Alterar">
                                                    </a>
                                                    <a href="/item-catalogo/excluir/<?php echo e($results->id); ?>">
                                                        <input class="btn btn-danger" type="button" value="Excluir">
                                                    </a> -->
                                                    <a href="/item-composicao/incluir/<?php echo e($results->id); ?>">
                                                        <input class="btn btn-primary" type="button" value="incluir">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footerScript'); ?>
            <!-- Required datatable js -->
           <script src="<?php echo e(URL::asset('/libs/datatables/datatables.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('/libs/jszip/jszip.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('/libs/pdfmake/pdfmake.min.js')); ?>"></script>
           
            <!-- Datatable init js -->
            <script src="<?php echo e(URL::asset('/js/pages/datatables.init.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('/libs/select2/select2.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('/js/pages/form-advanced.init.js')); ?>"></script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/angelus/resources/views/composicaoItem/gerenciar-composicao-item.blade.php ENDPATH**/ ?>