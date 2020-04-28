<?php $__env->startSection('content'); ?>

    <div class="container">

        <div class="my-4">
            <a href="<?php echo e(route('category.index')); ?>" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Back to list
            </a>
        </div>

        <div class="row align-items-center">
            <div class="col">
                <h1>Category: <?php echo e($category->name); ?></h1>
            </div>
            <div class="col-auto">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $category)): ?>
                    <confirm-action
                        @confirm="$refs['form-category-delete'].submit()"
                        confirm-button-text="Delete"
                        confirm-button-class="btn btn-danger"
                    >
                        <div class="btn btn-link text-danger" slot="reference">
                            Delete category
                        </div>
                        Are you sure want to delete "<?php echo e($category->name); ?>"?
                    </confirm-action>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $category)): ?>
                    <a href="<?php echo e(route('category.edit', ['category' => $category])); ?>" class="btn btn-primary">
                        Edit category
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <hr>

        <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('topic.list-item', ['topic' => $topic], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <form
            action="<?php echo e(route('category.destroy', ['category' => $category])); ?>"
            method="POST"
            class="d-none"
            ref="form-category-delete"
        >
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
        </form>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/diploma-3.loc/resources/views/category/show.blade.php ENDPATH**/ ?>