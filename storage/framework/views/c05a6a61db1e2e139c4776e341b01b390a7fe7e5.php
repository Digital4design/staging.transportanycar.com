<?php $__env->startSection('head_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
    .great_job_sec {
        padding: 0!important;
    }
    .col-lg-12.forgot-link {
        margin-top: -7px;
    }

.great_job_sec h2 {
    font-size: 48px;
    text-align: center;
    margin-bottom: 0;
    color: #000;
}
.great_job_sec p.subheader {
    color: #777;
    font-size: 17px;
    text-align: center;
    max-width: 500px;
    margin: 10px auto;
}
.great_job_sec ul.checklist {
    border: 1px solid #DADADA;
    padding: 20px 20px;
    border-radius: 10px;
    max-width: 370px;
    margin: 30px auto 30px;
}
.great_job_sec .checklist li {
    font-size: 16px;
    margin: 15px 0;
    position: relative;
    padding-left: 27px;
    color: #000;
    font-weight: 400;   
}
.great_job_sec .checklist li:before {
    content: '';
    display: block;
    position: absolute;
    left: 0;
    top: 0;
    border-right: 4px solid #52D017;
    border-bottom: 4px solid #52D017;
    width: 12px;
    height: 20px;
    transform: rotate(45deg);
}
.trans_login_blog_sec p {
    font-size: 17px;
    text-align: center;
    color: #000;
}
.trans-login {
    color: #07F !important;
    text-align: center;
    display: block;
    text-decoration: underline !important;
    text-underline-offset: 7px;
    margin-top: -10px;
}
.signnetwork {
    border: 1px solid #DADADA !important;
}
@media(max-width: 580px){
    .trans-login {margin-top: 10px;}
    .signnetwork {
        max-width: 370px;
        margin: auto;
    }
    .col-lg-12.forgot-link {
        margin-bottom: -21px !important;
    }
    .great_job_sec p.subheader {
        font-size: 15px;
    }
    .great_job_sec .checklist li {  
        padding-left: 25px;    margin: 20px 0;    font-size: 15px;
    }
    .trans_login_blog_sec p {
        font-size: 16px;
    }
    .trans_login_blog .signnetwork {
        padding-top: 15px;
    }
    .great_job_sec_new {
    padding: 0 2px;
}
.trans_login_blog_sec {
    max-width: 366px;
}

.great_job_sec ul.checklist {
    padding: 0px 20px;
}

}
</style>
<?php echo $__env->make('layouts.web.head-web-menu-without-mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<main>
    <section class="join_network_main trans_login_main position-relative">
        <div class="container">
            <?php if(!session()->has('login_message')): ?>
            <div class="position-relative text-center">
                <h1 class="banner_newtext d-block text-center">Your account</h1>
                <p>Login to your account</p>
            </div>
            <?php endif; ?>
            <?php if(session()->has('login_message')): ?>
            <div class="great_job_sec_new">
            <div class="great_job_sec">
                <h2>Great news!</h2>
                <p class="subheader">Your job has been sent to our network of transport companies and you will start to receive quotes shortly.</p>
                <ul class="checklist">
                    <li>Start receiving quotes via email in minutes.</li>
                    <li>Choose the best quote for you based on price and feedback.</li>
                    <li>Accept the quote and arrange collection.</li>
                </ul>
                </div>
            </div>
            <?php endif; ?>
            <form class="trans_login_blog <?php if(session()->has('login_message')): ?> trans_login_blog_sec <?php endif; ?>" action="<?php echo e(route('front.login_post')); ?>" name="form_login" id="form_login" method="post" autocomplete="off">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="unsub" value="<?php echo e(request()->get('unsub')); ?>">
                <?php if(!session()->has('login_message')): ?>
                <a href="<?php echo e(route('front.home')); ?>" class="backtologin">
                    <svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 11.5L1 6.5L6 1.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>Back </a>
                <?php endif; ?>
                <div class="signnetwork">
                    <?php if($errors->has('general')): ?>
                        <span class="login-error" id="general-error" style="margin: -20px 0px 10px 0px !important;text-align:center !important;"><?php echo e($errors->first('general')); ?></span>
                    <?php endif; ?>
                    <div class="row m-0">
                        <?php if(session()->has('login_message')): ?>
                        <div class="col-lg-12">
                            <p>It looks like you already have an account with us so please log in to manage your jobs.</p>
                        </div>
                        <?php endif; ?>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo e(session('login_email', old('email'))); ?>" placeholder="Enter your email address" />
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
                        <div class="col-lg-12 forgot-link">
                            <div class="form-group text-right">
                                <a href="<?php echo e(route('front.forgot_password')); ?>" class="manual_link d-inline-block ">Forgot password</a>
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
        <?php if(!session()->has('login_message')): ?>
        <a class="trans-login" href="<?php echo e(route('transporter.login')); ?>">Transporter login</a>
        <?php endif; ?>
    </section>
</main>
<?php echo $__env->make('layouts.web.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
   <script src="<?php echo e(asset('assets/web/js/login.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.web.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/public_html/resources/views/front/guest/login.blade.php ENDPATH**/ ?>