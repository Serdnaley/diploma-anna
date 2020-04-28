<?php $__env->startSection('content'); ?>

    <div class="container">

        <div class="my-4">
            <a href="<?php echo e(route('user.index')); ?>" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Back to list
            </a>
        </div>

        <div class="row align-items-center">
            <div class="col">
                <h1><?php echo e($user->name); ?></h1>
            </div>
            <div class="col-auto">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $user)): ?>
                    <confirm-action
                        @confirm="$refs['form-user-delete'].submit()"
                        confirm-button-text="Delete"
                        confirm-button-class="btn btn-danger"
                    >
                        <div class="btn btn-link text-danger" slot="reference">
                            Delete user
                        </div>
                        Are you sure want to delete "<?php echo e($user->name); ?>"?
                    </confirm-action>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
                    <a href="<?php echo e(route('user.edit', ['user' => $user])); ?>" class="btn btn-primary">
                        Edit user
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <hr>

        <div class="card-text d-flex align-items-center">
            <div class="d-flex">
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
            </div>
        </div>

        <form
            action="<?php echo e(route('user.destroy', ['user' => $user])); ?>"
            method="POST"
            class="d-none"
            ref="form-user-delete"
        >
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
        </form>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/diploma-3.loc/resources/views/user/show.blade.php ENDPATH**/ ?>