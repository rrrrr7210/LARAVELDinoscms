<?php $__env->startSection('content'); ?>
    <div class="col-md-12">
<table class="table table-dark">
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Weight</th>
            <th>Description</th>
            <th>Comments</th>
            <th>Image</th>
            <th>Created at</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($post->name); ?></td>
            <td><?php echo e($post->type); ?></td>
            <td><?php echo e($post->weight); ?></td>
            <td><?php echo e(str_limit($post->description, 50)); ?></td>
            <td><?php echo e(count($post->comments)); ?></td>
            <td><img src="<?php echo e($post->image ? $post->image->image_name : '/images/no.png'); ?>" width="50" height="35"></td>
            <td><?php echo e($post->created_at->diffForHumans()); ?></td>
            <td><a href="<?php echo e(route('admin.posts.edit', ['id' => $post->id])); ?>"><button class="btn btn-info">EDIT</button></a></td>
            <td>
                <?php echo Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]); ?>

                <?php echo Form::submit('X', ['class'=>'btn btn-danger']); ?>

                <?php echo Form::close(); ?>

            </td>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>