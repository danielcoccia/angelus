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

                                    <h4 class="card-title">Cadastro de Pessoa</h4>
                                    <hr>
                                    <!-- <p class="card-title-desc">Here are examples of <code class="highlighter-rouge">.form-control</code> applied to each textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code class="highlighter-rouge">type</code>.</p>-->
                                    <form class="form-horizontal mt-4" method="POST" action="/cad-pessoa/inserir"> 
                                    <?php echo csrf_field(); ?>
                                        <div class="form-group row">
                                            <label for="nome" class="col-sm-2 col-form-label">Nome*</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" required="required" type="text" id="nome" name="nome">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="identidade" class="col-sm-2 col-form-label">Identidade*</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" maxlength="11" required="required" type="text" value="" id="identidade" name="identidade">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="cpf" class="col-sm-2 col-form-label">Cpf*</label>
                                            <div class="col-sm-10">
                                                <input class="form-control cpf-mascara" required="required" placeholder="Ex.: 000.000.000-00" type="text" value="" id="cpf" name="cpf">
                                                <!-- <input type="text" class="form-control " placeholder="Ex.: 000.000.000-00"> -->
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email*</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="email" value="" id="emial" name="email">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="genero" class="col-sm-2 col-form-label">Genero*</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" required="required"  id="genero" name="genero">
                                                    <option value="">Selecione</option>
                                                    <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $results): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($results->id); ?>"><?php echo e($results->nome); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="dt_nascimento" class="col-sm-2 col-form-label">Data Nascimento</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="date" value="" id="dt_nascimento" name="dt_nascimento">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="entidade" class="col-sm-2 col-form-label">Entidade</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" id="entidade" name="entidade">
                                                    <option value="">Selecione</option>
                                                    <?php $__currentLoopData = $resultEntidade; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resultEntidades): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($resultEntidades->id); ?>"><?php echo e($resultEntidades->nome); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="celular" class="col-sm-2 col-form-label">celular</label>
                                            <div class="col-sm-10">
                                                <input class="form-control mascara_celular" placeholder="Ex.: (99) 99999-9999" type="text" value="" id="celular" name="celular">
                                            </div>
                                        </div>

                                        <h4>Edereço</h4><hr class="mt-10">
                                        <div class="row mt-10">
                                            <div class="col-md-4">
                                                <label for="cep" class="form-label">Cep</label>
                                                <input type="text" class="form-control cep-mask" required="required" id="cep" name="cep" placeholder="Ex.:00000-000">
                                            </div>                                            
                                        </div>

                                        <div class="row">
                                             <div class="col-md-4">
                                                <label for="estado" class="form-label">Estado</label>
                                                <input type="text" class="form-control" id="estado" name="estado">
                                            </div>
                                             <div class="col-md-4">
                                                <label for="cidade" class="form-label">Cidade</label>
                                                <input type="text" class="form-control" id="cidade" name="cidade">
                                            </div>  
                                            <div class="col-md-4">
                                                <label for="bairro" class="form-label">Bairro</label>
                                                <input type="text" class="form-control" id="bairro" name="bairro">
                                            </div>                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="logradouro" class="form-label">Logradouro</label>
                                                <input type="text" class="form-control" id="logradouro" name="logradouro">
                                            </div>                                                                             
                                            <div class="col-md-4">
                                                <label for="numero" class="form-label">numero</label>
                                                <input type="text" class="form-control" id="numero" name="numero">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="complemento" class="form-label">complemento</label>
                                                <input type="text" class="form-control" id="complemento" name="complemento">
                                            </div>
                                            <input type="hidden"  id="ibge" name="ibge" value="">
                                            <input type="hidden"  id="gia" name="gia" value="">
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


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/angelus/resources/views//pessoa/cad-pessoa.blade.php ENDPATH**/ ?>