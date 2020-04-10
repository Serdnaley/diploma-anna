<?php $__env->startSection('content'); ?>

    <div class="container">

        <div class="my-4">
            <a href="<?php echo e(route('topic.show', ['topic' => $topic])); ?>" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Back to topic
            </a>
        </div>

        <div class="row align-items-center">
            <div class="col">
                <h1>Edit comment</h1>
            </div>
        </div>

        <hr>

        <form action="<?php echo e(route('comment.update', ['comment' => $comment])); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <input type="hidden" name="topic_id" value="<?php echo e($topic->id); ?>">

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <textarea
                            name="text"
                            class="form-control"
                            placeholder="Write your comment here..."
                            cols="10"
                            rows="5"
                            required
                        ><?php echo e($comment->text); ?></textarea>
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check"></i>
                        Save
                    </button>
                </div>
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

        </form>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/diploma-3.loc/resources/views/comment/edit.blade.php ENDPATH**/ ?>