<?php $__env->startSection('nav'); ?>
    <!-- navigation hidden -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="welcome-screen">
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title main-logo m-b-md">
                    <span>C</span>
                    <span>a</span>
                    <span>t</span>
                    <span>'o'</span>
                    <span>b</span>
                    <span>o</span>
                    <span>o</span>
                    <span>k</span>
                </div>

                <?php if(auth()->guard()->check()): ?>
                <div class="alert alert-info">
                    Welcome, <?php echo e(\Auth::user()->name); ?>

                </div>
                <?php endif; ?>

                <div class="links">
                    <?php if(Route::has('login')): ?>
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(route('topic.index')); ?>">Go to topics</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>">Login</a>

                            <?php if(Route::has('register')): ?>
                                <a href="<?php echo e(route('register')); ?>">Register</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <p class="text-center">
            Created by <a href="https://www.instagram.com/littlewarmtalks/" target="_blank">Anormous Human</a>
        </p>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/diploma-3.loc/resources/views/welcome.blade.php ENDPATH**/ ?>