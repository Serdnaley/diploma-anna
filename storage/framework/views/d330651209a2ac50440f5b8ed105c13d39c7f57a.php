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
                <h1>Edit topic</h1>
            </div>
            <div class="col-auto">
                    <confirm-action
                        @confirm="$refs['form-topic-delete'].submit()"
                        confirm-button-text="Delete"
                        confirm-button-class="btn btn-danger"
                    >
                        <div class="btn btn-link text-danger" slot="reference">
                            Delete topic
                        </div>
                        Are you sure want to delete "<?php echo e($topic->title); ?>"?
                    </confirm-action>
                <a href="<?php echo e(route('topic.show', ['topic' => $topic])); ?>" class="btn btn-primary">
                    View topic
                </a>
            </div>
        </div>

        <hr>

        <div class="card mb-3">
            <div class="card-body">
                <form action="<?php echo e(route('topic.update', ['topic' => $topic])); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="form-group">
                        <label for="topic-create-title">Title</label>
                        <input type="text" class="form-control" id="topic-create-title" name="title"
                               value="<?php echo e($topic->title); ?>">
                    </div>

                    <div class="form-group">
                        <label for="topic-create-category">Category</label>
                        <select class="form-control" id="topic-create-category" name="category_id">
                            <?php $__currentLoopData = $topic_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    value="<?php echo e($category->id); ?>" <?php echo e($topic->category_id === $category->id ? 'selected' : ''); ?>>
                                    <?php echo e($category->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
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
            action="<?php echo e(route('topic.destroy', ['topic' => $topic])); ?>"
            method="POST"
            class="d-none"
            ref="form-topic-delete"
        >
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
        </form>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/diploma-3.loc/resources/views/topic/edit.blade.php ENDPATH**/ ?>