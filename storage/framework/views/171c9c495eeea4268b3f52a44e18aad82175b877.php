<?php $__env->startSection('title', 'Email Confirmation'); ?>

<?php $__env->startSection('content'); ?>
 <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-4">
                                <a href="/" class="logo logo-admin"><img src="<?php echo e(URL::asset('/images/logo-dark.png')); ?>" height="30" alt="logo"></a>
                            </h3>
                            <div class="p-3">
                                <h4 class="text-muted font-size-18 mb-1 text-center">Security !</h4>
                                <p class="text-muted text-center">Reset Password</p>

                     <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    
                                <form class="form-horizontal mt-4" method="POST" action="<?php echo e(route('password.email')); ?>">
                                       <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="username">E-Mail Address</label>
                                         <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="Enter email">
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                     <div class="mt-4">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" id="register" type="submit"> <?php echo e(__('Send Password Reset Link')); ?></button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <p class="mb-0">By registering you agree to the Skote <a href="#" class="text-primary">Terms of Use</a></p>
                                    </div>
                                   </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Don't have an account ? <a href="/register" class="text-primary"> Signup Now </a></p>
                        <p>© <?php echo e(date('Y', strtotime('-2 year'))); ?> - <?php echo e(date('Y')); ?> Lexa. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/LexaLaravel/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>