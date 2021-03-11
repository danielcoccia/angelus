<?php $__env->startSection('title'); ?> Data Tables <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row"> 
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Usuario<i class="mdi mdi-account-badge"></i></h4>
                    <hr>
                    <div class="card-body"> 
                        <p>Nome:<strong> <?php echo e($result[0]->nome); ?></strong></p>
                        <p>Cpf: <strong> <?php echo e($result[0]->cpf); ?></strong> </p>
                        <p>Identidade:<strong>  <?php echo e($result[0]->identidade); ?></strong> </p>
                        <p>Data de Nascimento:<strong>  <?php echo e($result[0]->data_nascimento); ?></strong> </p>
                        <p>Email: <strong> <?php echo e($result[0]->email); ?></strong> </p>
                    </div>

                <form class="form-horizontal mt-4" method="POST" action="/cad-usuario/inserir"> 
                <?php echo csrf_field(); ?>
                <input type="hidden" name="idPessoa" value="<?php echo e($result[0]->id); ?>">
                    <div class="table-responsive">                                
                        <table class="table table-bordered table-striped mb-0">
                            <tr>
                                <td>
                                    Ativo
                                </td>
                                <td>
                                    <input type="checkbox" id="ativo" name="ativo" switch="bool" checked />
                                    <label for="ativo" data-on-label="Sim" data-off-label="Não"></label>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Bloqueado
                                </td>
                                <td>
                                    <input type="checkbox" id="bloqueado" name="bloqueado" switch="bool" checked />
                                    <label for="bloqueado" data-on-label="Sim" data-off-label="Não"></label>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card" >
                
                    <div class="card-body" >
                        <div class="row"> 
                            <div class="col-sm">
                              <h4 class="card-title">Configurar Perfis <i class="ion mdi mdi-account-network " ></i></h4> 
                            </div>                            
                        </div>

                        <hr>
                        <div>
                            <div class="table-responsive">                                
                                <table class="table table-bordered table-striped mb-0">
                                    <?php $__currentLoopData = $resultPerfil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resultPerfils): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($resultPerfils->nome); ?>

                                        </td>
                                        <td>
                                            <input type="checkbox" id="<?php echo e($resultPerfils->nome); ?>" name="<?php echo e($resultPerfils->nome); ?>" value="<?php echo e($resultPerfils->id); ?>" />
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div><br><br>

                                    <h4 class="card-title">Configurar Estoque <i class="mdi mdi-view-sequential" ></i> </h4>
                                    <hr>    
                                <div class="table-responsive">                            
                                <table class="table table-bordered table-striped mb-0">
                                  <?php $__currentLoopData = $resultEstoque; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resultEstoques): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($resultEstoques->nome); ?>

                                        </td>
                                        <td>
                                            <input type="checkbox" id="<?php echo e($resultEstoques->nome); ?>" name="<?php echo e($resultEstoques->nome); ?>" value="<?php echo e($resultEstoques->id); ?>">                                            
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>                        
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/angelus/resources/views//usuario/configurar-usuario.blade.php ENDPATH**/ ?>