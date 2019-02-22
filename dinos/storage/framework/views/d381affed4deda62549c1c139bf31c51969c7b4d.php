<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/js.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/css.css')); ?>" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-xl navbar-dark bg-info p-sm-3">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <?php if(Route::has('login')): ?>
            <div class="top-right links">
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(url('/home')); ?>">Home</a>
                <?php else: ?>
                    <a class="reg" href="<?php echo e(route('login')); ?>">Login</a>
                    <a class="reg" href="<?php echo e(route('register')); ?>">Register</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</nav>
<div class="row rw">
    <?php echo $__env->yieldContent('content'); ?>
</div>
</body>
</html>