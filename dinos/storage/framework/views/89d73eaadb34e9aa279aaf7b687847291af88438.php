<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="">
                <div class="row">
                    <h2 class="col">Login</h2>
                    <a class="col text-center align-items-center" href="<?php echo e(route('register')); ?>"><i class="fa fa-forward p-3"></i></a>
                </div>
                    <form class="" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <input id="email" type="email" class="form-control form-control-lg mmm" placeholder="Email:" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <input id="password" type="password" class="form-control form-control-lg mmm" placeholder="Password:" name="password" required>
                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Emlékezz rám
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-success btn-block">
                                    Login
                                </button>
                            </div>
                            <div class="col">
                                <a class="btn btn-light" href="<?php echo e(route('password.request')); ?>">
                                    Password request
                                </a>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>