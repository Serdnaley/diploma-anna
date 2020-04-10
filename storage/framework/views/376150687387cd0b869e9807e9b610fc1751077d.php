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
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $topic)): ?>
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
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $topic)): ?>
                    <a href="<?php echo e(route('topic.edit', ['topic' => $topic])); ?>" class="btn btn-primary">
                        Edit topic
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <hr>

        <div class="card-text d-flex align-items-center">
            <div class="d-flex">
                <div class="user-avatar user-avatar--<?php echo e($topic->author->color); ?>">
                    <div class="user-avatar__initials">
                        <?php echo e($topic->author->initials); ?>

                    </div>
                </div>
                <div class="user-avatar__name">
                    <div class="color-<?php echo e($topic->author->color); ?>">
                        <?php echo e($topic->author->name); ?>

                    </div>
                    <small class="mt-1">at <?php echo e($topic->created_at->format('j F, Y')); ?></small>
                </div>
            </div>
            <span class="text-muted mx-3">&bull;</span>
            <div>
                <span class="text-muted">Category:</span>
                <a href="#"><?php echo e($topic->category->name); ?></a>
            </div>
        </div>

        <hr>

        <?php if($comments->isEmpty()): ?>
            <p class="text-muted">Your comment will be first :)</p>
        <?php endif; ?>

        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="media mb-3">
                <div class="user-avatar user-avatar--<?php echo e($comment->author->color); ?> mt-1">
                    <div class="user-avatar__initials">
                        <?php echo e($comment->author->initials); ?>

                    </div>
                </div>
                <div class="media-body ml-3">
                    <div class="card">
                        <div class="card-body pt-3">
                            <div class="row">
                                <div class="col">
                                    <h6 class="card-title color-<?php echo e($comment->author->color); ?>">
                                        <?php echo e($comment->author->name); ?>

                                    </h6>
                                </div>
                                <div class="col-auto">
                                    <a href="<?php echo e(route('comment.edit', ['comment' => $comment])); ?>">
                                        Edit
                                    </a>
                                    <span class="text-secondary mx-2">&bull;</span>
                                    <confirm-action
                                        @confirm="function () {
                                            $refs['form-topic-delete'].setAttribute(
                                                'action',
                                                '<?php echo e(route('comment.destroy', ['comment' => $comment])); ?>'
                                            );
                                            $refs['form-topic-delete'].submit();
                                        }"
                                        confirm-button-text="Delete"
                                        confirm-button-class="btn btn-danger"
                                    >
                                        <a href="#" class="text-danger" slot="reference">
                                            Delete
                                        </a>
                                        Are you sure want to delete comment of <?php echo e($comment->author->name); ?>?
                                    </confirm-action>
                                </div>
                            </div>
                            <?php echo e($comment->text); ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <hr>

        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h5 class="card-title">Comment topic</h5>
            </div>
        </div>

        <form action="<?php echo e(route('comment.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('POST'); ?>

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
                        ></textarea>
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">
                        Submit
                        <i class="fas fa-arrow-up"></i>
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

        <form
            method="POST"
            class="d-none"
            ref="form-comment-delete"
        >
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
        </form>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/diploma-3.loc/resources/views/topic/show.blade.php ENDPATH**/ ?>