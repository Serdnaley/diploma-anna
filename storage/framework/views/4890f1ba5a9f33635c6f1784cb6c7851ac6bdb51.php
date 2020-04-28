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
                <h1>Edit category</h1>
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
                        Are you sure want to delete "<?php echo e($category->title); ?>"?
                    </confirm-action>
                <?php endif; ?>
                <a href="<?php echo e(route('category.show', ['category' => $category])); ?>" class="btn btn-primary">
                    View category
                </a>
            </div>
        </div>

        <hr>

        <div class="card mb-3">
            <div class="card-body">
                <form action="<?php echo e(route('category.update', ['category' => $category])); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="form-group">
                        <label for="category-create-name">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="category-create-name"
                            name="name"
                            value="<?php echo e($category->name); ?>"
                            required
                        >
                    </div>

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0 pl-3">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/diploma-3.loc/resources/views/category/edit.blade.php ENDPATH**/ ?>