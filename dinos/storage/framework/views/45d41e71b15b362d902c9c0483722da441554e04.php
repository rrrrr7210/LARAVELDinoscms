<?php $__env->startSection('content'); ?>
    <div class="card-body text-center col-md-5 mt-5" id="image_preview">
        <div id="message"></div>
        <img class="mt-5 rounded" id="previewing" src="<?php echo e(asset('images/no.png')); ?>" width="300" height="240" />
    </div>
    <div class="card-body text-center col-md-6 ml-lg-5">
        <h1>Create Post</h1>
        <div>
            <?php echo Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store', 'files' => true]); ?>

            <div class="form-group d-inline-block">
                <?php echo Form::text('name', null, ['class' => 'form-control text-center', 'placeholder' => 'Name:']); ?>

            </div>
            <div class="form-group d-inline-block">
                <?php echo Form::label('type', 'Type:'); ?>

                <?php echo Form::select('type', array('Omnivores' => 'Omnivores', 'Herbivores' => 'Herbivores', 'Carnivores' => 'Carnivores'), 0, ['class' => 'form-control text-center']); ?>

            </div>
            <div class="form-group d-inline-block">
                <?php echo Form::text('weight', null, ['class' => 'form-control text-center', 'placeholder' => 'Weight(Tonne):']); ?>

            </div>
            <div class="form-group d-inline-block">
                <?php echo Form::textarea('description', null, ['class' => 'form-control']); ?>

            </div>
            <div class="form-group d-inline-block">
                <?php echo Form::label('file', 'Image:'); ?>

                <?php echo Form::file('file', null, ['class' => 'form-control']); ?>

            </div>

            <div class="form-group d-inline-block">
                <?php echo Form::submit('Create Post', ['class' => 'btn btn-success m-md-2', 'name' => 'upload']); ?>

            </div>
            <?php echo Form::close(); ?>


        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>