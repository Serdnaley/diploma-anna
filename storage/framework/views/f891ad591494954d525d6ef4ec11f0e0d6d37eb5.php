<?php $__env->startSection('content'); ?>

    <div class="container">

        <div class="row align-items-center mt-5">
            <div class="col">
                <h1>All categories</h1>
            </div>
            <div class="col-auto">
                <a href="<?php echo e(route('category.create')); ?>" class="btn btn-link">
                    Create category
                </a>
            </div>
        </div>

        <hr>

        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="<?php echo e(route('category.show', ['category' => $category])); ?>">
                                <h5 class="card-title">
                                    <?php echo e($category->name); ?>

                                </h5>
                            </a>
                        </div>
                        <div>
                            <?php if(Gate::allows('update', $category)): ?>
                                <a href="<?php echo e(route('category.edit', ['category' => $category])); ?>" class="btn btn-link">
                                    Edit category
                                </a>
                            <?php endif; ?>
                            <a href="<?php echo e(route('category.show', ['category' => $category])); ?>" class="btn btn-primary">
                                View category
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <hr>

        <?php echo e($categories->links()); ?>


    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/diploma-3.loc/resources/views/category/index.blade.php ENDPATH**/ ?>