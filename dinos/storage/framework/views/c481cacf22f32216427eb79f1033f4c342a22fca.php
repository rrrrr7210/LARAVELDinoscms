<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div>
                <h2>Registration</h2>

                    <form class="" method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <input id="name" type="text" class="form-control form-control-lg mmm" placeholder="Name:" name="name" value="<?php echo e(old('name')); ?>" required autofocus>
                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <input id="email" type="email" class="form-control form-control-lg mmm" placeholder="Email:" name="email" value="<?php echo e(old('email')); ?>" required>
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

                        <div class="form-group<?php echo e($errors->has('password-confirm') ? ' has-error' : ''); ?>">
                            <input id="password-confirm" type="password" class="form-control form-control-lg mmm" placeholder="Confirm Password:" name="password_confirmation" required>
                        </div>




                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">
                                    Regisztráció
                                </button>
                            </div>
                            <div class="col">
                                <a class="btn btn-light" href="<?php echo e(route('login')); ?>">
                                    Jelentkezz be
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