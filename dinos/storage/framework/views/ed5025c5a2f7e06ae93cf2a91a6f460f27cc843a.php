<?php $__env->startSection('content'); ?>

    <div class="card-body col-md-4 fels rounded">
        <ul class="offset-sm-1 list-group">
            <li class="list-group-item" style="background-color: #6f42c1"><input type="text" id="search" placeholder="Search" name="search" ></li>
            <div id="eredmeny"></div>
        </ul>
    </div>
    <div class="card-body col-md-7 col-sm-3 post">
        <h2 class="card-title text-center"><?php echo e($post->name); ?></h2>
            <div class="d-flex p-3 head rounded">
            <img class="rounded" id="dinoImg" src="<?php echo e($post->image ? $post->image->image_name : '/images/no.png'); ?>"  height="40%" width="50%" alt="">
                <div class="offset-sm-1"><h3>Attributes :</h3>
                <h4>Type : <?php echo e($post->type); ?></h4>
                <h4>Weight : <?php echo e($post->weight); ?> tonne </h4></div>
            </div>
        <h4><?php echo e($post->description); ?></h4>
        <div>
        <div class="card-header col-md-12 comtitle rounded mt-5">
            <div class="row">
                <div class="col-md-9"><h3>COMMENTS</h3></div>
            </div>
            <?php if(auth()->guard()->check()): ?>
                <?php echo Form::open(['method' => 'POST', 'action' => 'CommentsController@store']); ?>


                <?php echo Form::textarea('content', null, ['class' => 'w-100', 'size' => '30x1']); ?>


                <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">

                <?php echo Form::submit('Add Comment', ['class' => 'btn btn-info font-weight-bold']); ?>


                <?php echo Form::close(); ?>

            <?php endif; ?>
        </div>
            <div class="com rounded ">
                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($comment->post_id === $post->id): ?>
                        <hr>
                        <div class="pr-2 ml-2">
                            <div class="float-right"><h6><?php echo e($comment->created_at->diffForhumans()); ?></h6></div>
                            <div class="row">
                                <div class="col-md-1 m-md-2"><h6 style="
                                <?php if(auth()->guard()->check()): ?>
                                    <?php echo e($comment->user->name == $user->name ? 'color: #6f42c1; font-weight: bold' : 'color: #5bc0de; font-weight: bold'); ?>

                                <?php endif; ?>
                                            "><?php echo e($comment->user->name); ?></h6></div>
                                <div class="col-md-9 ml-lg-5"><h4><?php echo e($comment->content); ?></h4></div>
                            </div>
                        </div>
                        <?php $__currentLoopData = $commentsreplies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentreply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($commentreply->comment_id === $comment->id): ?>

                                <div class="ml-lg-5">
                                    <hr>
                                    <div class="float-right"><h6><?php echo e($commentreply->created_at->diffForhumans()); ?></h6></div>
                                    <div class="row">
                                        <div class="col-md-1 m-md-2"><h6 style="
                                        <?php if(auth()->guard()->check()): ?>
                                            <?php echo e($commentreply->user->name == $user->name ? 'color: #6f42c1' : 'color: black'); ?>

                                        <?php endif; ?>
                                                    "><?php echo e($commentreply->user->name); ?></h6></div>
                                        <div class="col-md-9 ml-lg-5"><h5><?php echo e($commentreply->content); ?></h5></div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if(auth()->guard()->check()): ?>
                            <div class="ml-lg-5 mr-lg-5 pb-3">
                                <?php echo Form::open(['method' => 'POST', 'action' => 'RepliesController@store']); ?>


                                <input type="hidden" name="comment_id" value="<?php echo e($comment->id); ?>">

                               <div class="row">
                                   <?php echo Form::submit('Add Reply', ['class' => 'btn btn-info font-weight-bold mr-2']); ?>

                                   <?php echo Form::text('content', null, ['class' => 'comInput w-50 pl-5']); ?>

                               </div>

                                <?php echo Form::close(); ?>

                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>