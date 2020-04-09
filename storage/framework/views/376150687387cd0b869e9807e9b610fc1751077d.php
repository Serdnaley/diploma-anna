<?php $__env->startSection('content'); ?>

    <div class="container">

        <div class="my-4">
            <a href="<?php echo e(route('topic.index')); ?>" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Back to list
            </a>
        </div>

        <div class="row align-items-center">
            <div class="col">
                <h1><?php echo e($topic->title); ?></h1>
            </div>
            <div class="col-auto">
                <a href="<?php echo e(route('topic.edit', ['topic' => $topic])); ?>" class="btn btn-primary">
                    Edit
                </a>
            </div>
        </div>

        <hr>

        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title"><?php echo e($topic->title); ?></h5>
                        <p class="card-text">
                            <span class="text-muted">Author:</span>
                            <a href="#"><?php echo e($topic->author->name); ?></a>
                            <span class="text-muted">&bull;</span>
                            <span class="text-muted">Category:</span>
                            <a href="#"><?php echo e($topic->category->name); ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/diploma-3.loc/resources/views/topic/show.blade.php ENDPATH**/ ?>