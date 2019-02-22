<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/js.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/file.js')); ?>" defer></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/css.css')); ?>" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-xl navbar-dark bg-info">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <?php if(Route::has('login')): ?>
            <div class="top-right links">
                <?php if(auth()->guard()->check()): ?>
                    <a class="reg" href="<?php echo e(route('logout')); ?>">Logout</a>
                <?php else: ?>
                    <a class="reg" href="<?php echo e(route('login')); ?>">Login</a>
                    <a class="reg" href="<?php echo e(route('register')); ?>">Register</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if(auth()->guard()->check()): ?>
        <?php if(Auth::user()->isAdmin()): ?>
            <a href="<?php echo e(route('admin.posts.create')); ?>"><button class="btn btn-success float-lg-right font-weight-bold">Add New Post</button></a>
            <a href="<?php echo e(route('admin.users.index')); ?>"><button class="btn btn-primary float-lg-right font-weight-bold">View All Users</button></a>
            <a href="<?php echo e(route('admin.posts.index')); ?>"><button class="btn btn-warning float-lg-right font-weight-bold">View All Posts</button></a>
            <a href="<?php echo e(route('admin.comments.index')); ?>"><button class="btn btn-secondary float-lg-right font-weight-bold">View All Comments</button></a>
        <?php endif; ?>
    <?php endif; ?>
    <a href="<?php echo e(route('index')); ?>"><button class="btn btn-dark float-lg-right font-weight-bold">HOME</button></a>

</nav>
    <div class="row rw">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

</body>
</html>