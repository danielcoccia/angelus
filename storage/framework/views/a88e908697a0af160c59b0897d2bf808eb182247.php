<?php $__env->startSection('title'); ?> Form Elements <?php $__env->stopSection(); ?>

<?php $__env->startSection('headerCss'); ?>
    <link href="<?php echo e(URL::asset('/libs/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>




 <!-- start page title -->
                    <div class="row">
<!--                 <?php $__env->startComponent('common-components.breadcrumb'); ?>
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

                                    <h4 class="card-title">Cadastro de Item</h4>
                                    <hr>
                                    <!-- <p class="card-title-desc">Here are examples of <code class="highlighter-rouge">.form-control</code> applied to each textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code class="highlighter-rouge">type</code>.</p>-->
                                    <form class="form-horizontal mt-4" method="POST" action="/cad-item-material/inserir"> 
                                    <?php echo csrf_field(); ?>
                                        <div class="form-group row">
                                            <label for="nome_item" class="col-sm-2 col-form-label">Nome Item*</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" required="required" type="text" id="nome_item" name="nome_item">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="categoria_item" class="col-sm-2 col-form-label">Categoria</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" id="categoria_item" name="categoria_item">
                                                    <option value="">Selecione</option>
                                                    <?php $__currentLoopData = $resultCategoria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resultCategorias): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($resultCategorias->id); ?>"><?php echo e($resultCategorias->nome); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="val_minimo" class="col-sm-2 col-form-label">Valor Minimo*</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="val_minimo" name="val_minimo">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="val_medio" class="col-sm-2 col-form-label">Valor Medio</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="val_medio" name="val_medio">                                                
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="val_maximo" class="col-sm-2 col-form-label">Valor Máximo</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="" id="val_maximo" name="val_maximo">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="item_composicao" class="col-sm-2 col-form-label">Item Composição</label>
                                            <div class="col-sm-10">
                                                <input  type="checkbox"  id="item_composicao" name="item_composicao">                                                                                                 
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="item_ativo" class="col-sm-2 col-form-label">Ativo</label>
                                            <div class="col-sm-10">
                                                <input  type="checkbox" value="" id="item_ativo" name="item_ativo">
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3" style="text-align: right;">
                                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                                            <button type="button" class="btn btn-primary">Limpar</button>
                                        </div>
                                    </form>           
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footerScript'); ?>
            <script src="<?php echo e(URL::asset('/js/pages/mascaras.init.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('/js/pages/busca-cep.init.js')); ?>"></script>            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
            <script src="<?php echo e(URL::asset('/libs/select2/select2.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('/js/pages/form-advanced.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/angelus/resources/views/item/incluir-item-catalogo.blade.php ENDPATH**/ ?>