<?php $__env->startSection('head_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.transporter.head-web-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main>
        <section class="join_network_main trans_login_main position-relative">
            <div class="container">
                <div class="position-relative text-center">
                    <h1 class="banner_newtext d-block text-center">Your account</h1>
                    <p>Login to your account</p>
                </div>
                <form class="trans_login_blog" action="<?php echo e(route('admin.login_post')); ?>" name="form_login" id="form_login" method="post" autocomplete="off">
                    <?php echo csrf_field(); ?>
                    <a href="<?php echo e(route('front.home')); ?>" class="backtologin">
                        <svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 11.5L1 6.5L6 1.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>Back </a>
                    <div class="signnetwork">
                        <!-- Display general error message -->
                        <?php if($errors->has('general')): ?>
                            <span class="login-error" id="general-error" style="margin: -20px 0px 10px 0px !important;text-align:center !important;"><?php echo e($errors->first('general')); ?></span>
                        <?php endif; ?>
                        <div class="row m-0">
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="email" id="email" value="<?php echo e(old('email')); ?>" placeholder="Enter your email address" />
                                <?php if($errors->has('email')): ?>
                                    <span class="login-error"><?php echo e($errors->first('email')); ?></span>
                                <?php endif; ?>
                            </div>
                           <div class="col-lg-12 eyeicon">
                                <input type="password" id="password" name="password" class="form-control no_margin" placeholder="Enter your password">
                                <i class="fas fa-eye" id="passwordIcon"></i>
                                <a href="#" id="togglePassword"></a>
                                <?php if($errors->has('password')): ?>
                                    <span class="login-error"><?php echo e($errors->first('password')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group text-right">
                                    <a href="<?php echo e(route('admin.forgot_password')); ?>" class="manual_link d-inline-block">Forgot password</a>
                                </div>
                            </div>
                        </div>
                        <div class="btngroup">
                            <button type="submit" class="getqt_btnincld">Log in <svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
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
<script src="<?php echo e(asset('assets/web/js/login.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.transporter.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/public_html/resources/views/general/login.blade.php ENDPATH**/ ?>