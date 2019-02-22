<?php $__env->startSection('content'); ?>

        <div class="card-body col-md-4 fels rounded">
            <ul class="offset-sm-1 list-group">
                <li class="list-group-item" style="background-color: #6f42c1"><input type="text" id="search" placeholder="Search" name="search" ></li>
                <div id="eredmeny"></div>
            </ul>
        </div>
        <div class="card-body col-md-8 ht rounded">

        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>