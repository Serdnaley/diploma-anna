<?php $__env->startSection('content'); ?>

    <div class="container">

        <div class="row align-items-center mt-5">
            <div class="col">
                <h1>All topics</h1>
            </div>
            <div class="col-auto">
                <a href="<?php echo e(route('topic.create')); ?>" class="btn btn-link">
                    Create topic
                </a>
            </div>
        </div>

        <hr>

        <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('topic.list-item', ['topic' => $topic], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <hr>

        <?php echo e($topics->links()); ?>


    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/diploma-3.loc/resources/views/topic/index.blade.php ENDPATH**/ ?>