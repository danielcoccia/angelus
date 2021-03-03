<?php $__env->startSection('title'); ?> Data Tables <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">                                    
                             <!--        <form class="form-horizontal mt-4" method="POST" action="/pesquisar-entidade"> 
                                        <?php echo csrf_field(); ?>
                                    <div class="row">
									   	<div class="col-md-4">
									    	<label for="cnpj" class="form-label">Cnpj</label>
									    	<input type="text" class="form-control" id="cnpj" name="cnpj">
									  	</div>
									  	<div class="col-md-4">
									    	<label for="nome_fantasia" class="form-label">Nome Fansasia</label>
									    	<input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia">
									  	</div>									  	
									</div> -->									
                                    <a href="/cad-entidade">
                                        <input class="btn btn-primary" type="button" value="Incluir Entidade">
                                        <!-- <button type="submit" class="btn btn-primary">Pesquisar</button> -->
                                    </a>
							  	</div>
<!--                                 </form> -->

                    <br><br><hr>
                        <h4 class="card-title">Lista de Entidade</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Cnpj</th>
                                                <th>Nome Fantasia</th>
                                                <th>Email</th>
                                                <th>Contato</th>
                                                <th>Ação</th>

                                                                                                
                                            </tr>
                                        </thead>

                                        <tbody>
                                          <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $results): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <tr>
                                                <td><?php echo e($results->id); ?></td>
                                                <td><?php echo e($results->cnpj); ?></td>
                                                <td><?php echo e($results->nome_fantasia); ?></td>
                                                <td><?php echo e($results->email_contato); ?></td>
                                                <td><?php echo e($results->nome_contato); ?></td>
                                                 <td>
                                                    <a href="/entidade/alterar/<?php echo e($results->id); ?>">
                                                        <input class="btn btn-warning" type="button" value="Alterar">
                                                    </a>
                                                    <a href="/entidade/excluir/<?php echo e($results->id); ?>">
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
            <script src="<?php echo e(URL::asset('/libs/select2/select2.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('/js/pages/form-advanced.init.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/angelus/resources/views//entidade/gerenciar-entidade.blade.php ENDPATH**/ ?>