<?php $__env->startSection('content'); ?>
    <div class="col-md-12">
        <table class="table table-dark">
            <tr>
                <th>Name</th>
                <th>Admin</th>
                <th>Email</th>
                <th>Comments</th>
                <th>Register at</th>
                <th>Delete</th>
            </tr>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->admin); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e(count($user->comments)); ?></td>
                    <td><?php echo e($user->created_at->diffForHumans()); ?></td>
                    <td>
                        <?php echo Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]); ?>

                        <?php echo Form::submit('X', ['class'=>'btn btn-danger']); ?>

                        <?php echo Form::close(); ?>

                    </td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>