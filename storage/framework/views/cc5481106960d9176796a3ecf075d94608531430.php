<?php $__env->startSection('head_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.web.head-web-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main>
        <section class="other_info_main">
            <div class="container">
                <h4 class="text-center d-block"><?php echo e($data->title); ?></h4>
                <div class="other_info_blog terms_condition_blog">
                    <?php echo $data->content; ?>

                </div>
            </div>
        </section>
    </main>
    <?php echo $__env->make('layouts.web.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.web.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/public_html/resources/views/front/terms_condition.blade.php ENDPATH**/ ?>