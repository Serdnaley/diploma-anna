<?php $__env->startSection('nav'); ?>
    <!-- navigation hidden -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="welcome-screen">
        <div class="position-ref full-height">

            <div class="content">

                <div class="logo">
                    <?php echo $__env->make('components.cat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="divider"></div>

                <div class="right">

                    <?php if(auth()->guard()->check()): ?>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="title"
                            viewBox="0 0 500px 128px"
                        >
                            <text y="64">Welcome,</text>
                            <text y="128"><?php echo e(\Auth::user()->name); ?></text>
                        </svg>
                    <?php endif; ?>

                    <div class="links">
                        <?php if(Route::has('login')): ?>
                            <?php if(auth()->guard()->check()): ?>
                                <a href="<?php echo e(route('topic.index')); ?>">Start</a>
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

        </div>
        <p class="footer-text">
            Created with LOVE by <a href="https://www.instagram.com/littlewarmtalks/" target="_blank">Anormous Human</a>
        </p>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/diploma-3.loc/resources/views/welcome.blade.php ENDPATH**/ ?>