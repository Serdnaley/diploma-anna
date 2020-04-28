<div class="card mb-3">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div>
                <a href="<?php echo e(route('topic.show', ['topic' => $topic])); ?>">
                    <h5 class="card-title">
                        <?php echo e($topic->title); ?>

                    </h5>
                </a>
                <p class="card-text">
                    <span title="<?php echo e($topic->created_at->format('d.m.Y H:i:s')); ?>">
                        <?php echo e($topic->created_at->format('j F, Y')); ?>

                    </span>
                    <span class="text-muted">by</span>
                    <a href="<?php echo e(route('user.show', ['user' => $topic->author])); ?>">
                        <?php echo e($topic->author->name); ?>

                    </a>
                    <span class="text-muted mx-2">&bull;</span>
                    <span class="text-muted">Category:</span>
                    <a href="<?php echo e(route('category.show', ['category' => $topic->category])); ?>">
                        <?php echo e($topic->category->name); ?>

                    </a>
                </p>
            </div>
            <div>
                <?php if(Gate::allows('update', $topic)): ?>
                    <a href="<?php echo e(route('topic.edit', ['topic' => $topic])); ?>" class="btn btn-link">
                        Edit topic
                    </a>
                <?php endif; ?>
                <a href="<?php echo e(route('topic.show', ['topic' => $topic])); ?>" class="btn btn-primary">
                    View topic
                </a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Applications/MAMP/htdocs/diploma-3.loc/resources/views/topic/list-item.blade.php ENDPATH**/ ?>