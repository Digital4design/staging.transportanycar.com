


<?php $__env->startSection('head_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.web.head-web-menu-without-mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main>
        <section class="join_network_main trans_forgotpass position-relative">
            <div class="container">
                <div class="position-relative text-center">
                    <h1 class="banner_newtext d-block text-center">Forgot password</h1>
                    <p>Please enter the email address associated with <br /> your account.</p>
                </div>
                <form class="other_forgot_account" action="<?php echo e(route('front.web_forgot_password')); ?>" name="form_forgot_password" id="form_forgot_password" method="post" autocomplete="off">
                    <?php echo csrf_field(); ?>
                    <a href="javascript:history.back()" class="backtologin">
                        <svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 11.5L1 6.5L6 1.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>Back </a>
                    <div class="signnetwork">
                        <div class="row m-0">
                            <div class="col-lg-12">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                                <?php if($errors->has('email')): ?>
                                        <span class="login-error"><?php echo e($errors->first('email')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group text-right">
                                    <a href="<?php echo e(route('front.login')); ?>" class="manual_link d-inline-block">Back to login</a>
                                </div>
                            </div>
                        </div>
                        <?php if($errors->has('success')): ?>
                                <span class="login-error" style="color:green !important; text-align: left; font-size: 16px; padding-left: 20px; width: max-content; margin-top: -25px;"><?php echo e($errors->first('success')); ?></span>
                            <?php endif; ?>
                        <div class="btngroup">
                            <button type="submit" class="getqt_btnincld">Send link <svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.4848 1.62323L8.35854 8.49696L1.4848 15.3707" stroke="white" stroke-width="2.06212" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <img src="<?php echo e(asset('assets/web/images/home/trans_account_img.png')); ?>" alt="image" class="bgright_img" />
        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(function () {
            $(document).on('submit', '#form_forgot_password', function () {
                $(this).validate({
                    rules: {
                        email: {required: true, maxlength:50},
                    },
                    messages: {
                        email: {required: 'Please enter email'},
                    },
                    errorElement: 'span',
                    errorPlacement: function (error, element) {
                        error.insertAfter($(element));
                    },
                });
                return $(this).valid();
            });
        });
        $('#email').on('keyup', function() {
            $('.login-error').text('');
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.web.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravelproject\transport\staging.transportanycar.com\resources\views/front/guest/forgot_password.blade.php ENDPATH**/ ?>