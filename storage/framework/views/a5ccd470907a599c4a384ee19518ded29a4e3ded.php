<?php $__env->startSection('title'); ?> Data Tables <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <!-- start page title -->
                    <div class="row">
<!--                 <?php $__env->startComponent('common-components.breadcrumb'); ?>
                     <?php $__env->slot('title'); ?> Pesquisa de Usuario  <?php $__env->endSlot(); ?>                     
                     <?php $__env->slot('li1'); ?> Lexa  <?php $__env->endSlot(); ?>
                     <?php $__env->slot('li2'); ?> Forms  <?php $__env->endSlot(); ?>
                     <?php $__env->slot('li3'); ?> Form Elements <?php $__env->endSlot(); ?>
                <?php if (isset($__componentOriginalca1ecd71c079b0986f63b19e32f1541d590c0929)): ?>
<?php $component = $__componentOriginalca1ecd71c079b0986f63b19e32f1541d590c0929; ?>
<?php unset($__componentOriginalca1ecd71c079b0986f63b19e32f1541d590c0929); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
 -->                
                   
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <!-- <h4 class="card-title">Pesquisar</h4>  -->
<!--                                     <form class="form-horizontal mt-4" method="POST" action="/pesquisar-pessoa/show"> 
                                        <?php echo csrf_field(); ?>
                                    <div class="row">
									   	<div class="col-md-4">
									    	<label for="nome" class="form-label">Nome</label>
									    	<input type="text" class="form-control" id="nome" name="nome">
									  	</div>
									  	<div class="col-md-4">
									    	<label for="cpf" class="form-label">Cpf</label>
									    	<input type="text" class="form-control" id="cpf" name="cpf">
									  	</div>
									  	<div class="col-md-4">
									    	<label for="identidade" class="form-label">Identidade</label>
									    	<input type="text" class="form-control" id="identidade" name="identidade">
									  	</div>
									</div>
									<div class="col-12 mt-3">
									    <button type="submit" class="btn btn-primary">Pesquisar</button>
								  	</div> -->
                                    <a href="/cad-pessoa">
                                        <input class="btn btn-primary" type="button" value="Incluir Pessoa">
                                        <!-- <button type="submit" class="btn btn-primary">Pesquisar</button> -->
                                    </a>
                                    <!-- <p class="card-title-desc">Here are examples of <code class="highlighter-rouge">.form-control</code> applied to each textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code class="highlighter-rouge">type</code>.</p>-->
                                </form>

                    <br><br><hr>
                        <h4 class="card-title">Lista de Pessoa</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Cpf</th>
                                                <th>Identidade</th>                                                
                                                <th>Email</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                          <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $results): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <tr>
                                                <td><?php echo e($results->id); ?></td>
                                                <td><?php echo e($results->nome); ?></td>
                                                <td><?php echo e($results->cpf); ?></td>
                                                <td><?php echo e($results->identidade); ?></td>
                                                <td><?php echo e($results->email); ?></td>
                                                 <td>
                                                    <a href="/pessoa/alterar/<?php echo e($results->id); ?>">
                                                        <input class="btn btn-warning" type="button" value="Alterar">
                                                    </a>
                                                    <a href="/pessoa/excluir/<?php echo e($results->id); ?>">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footerScript'); ?>
            <!-- Required datatable js -->
           <script src="<?php echo e(URL::asset('/libs/datatables/datatables.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('/libs/jszip/jszip.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('/libs/pdfmake/pdfmake.min.js')); ?>"></script>
           
            <!-- Datatable init js -->
             <script src="<?php echo e(URL::asset('/js/pages/datatables.init.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/angelus/resources/views//pessoa/pesquisar-pessoa.blade.php ENDPATH**/ ?>