<?php $__env->startSection('content'); ?>

    <div class="container">

        <div class="row align-items-center">
            <div class="col">
                <h1>All topics</h1>
            </div>
            <div class="col-auto">
                <a href="<?php echo e(route('topic.create')); ?>" class="btn btn-primary">
                    Create topic
                </a>
            </div>
        </div>

        <hr>

        <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title"><?php echo e($topic->title); ?></h5>
                        <p class="card-text">
                            <span class="text-muted">Author:</span>
                            <a href="<?php echo e(route('user.show', ['user' => $topic->author])); ?>">
                                <?php echo e($topic->author->name); ?>

                            </a>
                            <span class="text-muted">&bull;</span>
                            <span class="text-muted">Category:</span>
                            <a href="<?php echo e(route('topic_category.show', ['topic_category' => $topic->category])); ?>">
                                <?php echo e($topic->category->name); ?>

                            </a>
                        </p>
                    </div>
                    <a href="<?php echo e(route('topic.show', ['topic' => $topic])); ?>" class="btn btn-link">
                        Show more
                    </a>
                </div>
            </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/diploma-3.loc/resources/views/news/index.blade.php ENDPATH**/ ?>