<?php $__env->startSection('content'); ?>

    <div class="container">

        <div class="row align-items-center mt-5">
            <div class="col">
                <h1>All users</h1>
            </div>
            <div class="col-auto">
                <a href="<?php echo e(route('user.create')); ?>" class="btn btn-link">
                    Create user
                </a>
            </div>
        </div>

        <hr>

        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="d-flex mb-3" href="<?php echo e(route('user.show', ['user' => $user])); ?>">
                <div class="user-avatar user-avatar--<?php echo e($user->color); ?>">
                    <div class="user-avatar__initials">
                        <?php echo e($user->initials); ?>

                    </div>
                </div>
                <div class="user-avatar__name">
                    <div class="color-<?php echo e($user->color); ?>">
                        <?php echo e($user->name); ?>

                    </div>
                    <small class="mt-1">at <?php echo e($user->created_at->format('j F, Y')); ?></small>
                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <hr>

        <?php echo e($users->links()); ?>


    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/diploma-3.loc/resources/views/user/index.blade.php ENDPATH**/ ?>