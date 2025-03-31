<?php $__env->startSection('head_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.web.head-web-menu-without-mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main>
        <section class="wd-faq-blog">
            <div class="container">
                <div class="wd_title">
                    <h3>Frequently asked questions</h3>
                    <p>check out our FAQs for more information</p>
                </div>
                <div class="wd_faq">
                    <div class="accordion" id="accordionExample">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card">
                                <div class="card-header collapsed" data-toggle="collapse" data-target="#collapse<?php echo e($key); ?>" aria-expanded="false">
                                    <span class="title"><?php echo e($item->title); ?></span>
                                    <span class="accicon rotate-icon">
                                        <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.8335 16.9657V9.96575H0.833496V7.63242H7.8335V0.632416H10.1668V7.63242H17.1668V9.96575H10.1668V16.9657H7.8335Z" fill="#111111"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div id="collapse<?php echo e($key); ?>" class="collapse" data-parent="#accordionExample" style="">
                                    <div class="card-body">
                                        <p><?php echo $item->content; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php echo $__env->make('layouts.web.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.web.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/public_html/resources/views/front/faq.blade.php ENDPATH**/ ?>