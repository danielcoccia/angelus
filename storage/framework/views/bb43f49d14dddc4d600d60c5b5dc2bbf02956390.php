<?php $__env->startSection('title'); ?> Form Elements <?php $__env->stopSection(); ?>

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

                                    <h4 class="card-title">Cadastro de Entidade</h4>
                                    <hr>
                                    <!-- <p class="card-title-desc">Here are examples of <code class="highlighter-rouge">.form-control</code> applied to each textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code class="highlighter-rouge">type</code>.</p>-->
                                    <form class="form-horizontal mt-4" method="POST" action="/cad-pessoa/inserir"> 
                                    <?php echo csrf_field(); ?>
                                        <div class="form-group row">
                                            <label for="cnpj" class="col-sm-2 col-form-label">cnpj</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="cnpj" name="cnpj">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="nome_fantasia" class="col-sm-2 col-form-label">Nome Fantasia</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="" id="nome_fantasia" name="nome_fantasia">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="rz_social" class="col-sm-2 col-form-label">Razao Social </label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="" id="rz_social" name="rz_social">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="insc_estadual" class="col-sm-2 col-form-label">Inscricao Estadual</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="" id="insc_estadual" name="insc_estadual">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email_entidaed" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="email" value="" id="email_entidaed" name="email_entidaed">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="nome_contato" class="col-sm-2 col-form-label">Nome Contato</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="" id="nome_contato" name="nome_contato">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="site" class="col-sm-2 col-form-label">Site</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="" id="site" name="site">
                                            </div>
                                        </div>

                                        <h4>Edereço</h4><hr class="mt-10">
                                        <div class="row mt-10">
                                            <div class="col-md-4">
                                                <label for="cep" class="form-label">Cep</label>
                                                <input type="text" class="form-control cep-mask"  id="cep" name="cep">                                            

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
            <script src="<?php echo e(URL::asset('/js/pages/busca-cep.init.js')); ?>"></script>            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/angelus/resources/views/entidade/cad-entidade.blade.php ENDPATH**/ ?>