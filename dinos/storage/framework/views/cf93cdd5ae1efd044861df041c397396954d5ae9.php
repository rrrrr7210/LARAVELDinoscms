<?php $__env->startSection('content'); ?>
    <div class="col-md-12">
        <table class="table table-dark">
            <tr>
                <th>User</th>
                <th>Content</th>
                <th>Comment replies</th>
                <th>Created at</th>
                <th>Delete</th>
            </tr>
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($comment->user->name); ?></td>
                    <td><?php echo e($comment->content); ?></td>
                    <td><?php echo e(count($comment->replies)); ?></td>
                    <td><?php echo e($comment->created_at->diffForHumans()); ?></td>
                    <td>
                        <?php echo Form::open(['method'=>'DELETE', 'action'=>['AdminCommentsController@destroy', $comment->id]]); ?>

                        <?php echo Form::submit('X', ['class'=>'btn btn-danger']); ?>

                        <?php echo Form::close(); ?>

                    </td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>