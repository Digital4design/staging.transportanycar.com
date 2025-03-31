<header class="header">
    <div class="container">
        <nav class="navbar">
            <a class="brand" href="<?php echo e(route('front.home')); ?>">
                <img src="<?php echo e(site_logo); ?>" alt="brand_logo" />
            </a>
            <input type="checkbox" id="nav" class="hidden">
            <label for="nav" class="nav-toggle">
                <span></span>
                <span></span>
                <span></span>
            </label>
            <div class="wrapper">
                <ul class="menu">
                    <li id="res_logo">
                        <img src="<?php echo e(site_logo); ?>" alt="brand_logo" />
                    </li>
                    <li class="menu-item active">
                        <a href="<?php echo e(route('front.home')); ?>"> Home</a>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo e(route('front.home')); ?>#chooseus"> Why choose us</a>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo e(route('front.faq')); ?>">FAQs</a>
                    </li>
                    <?php if(Auth::guard('web')->user() && Auth::guard('web')->user()->type == 'user'): ?>
                    <li class="menu-item last_menuitem">
                        <a href="<?php echo e(route('front.dashboard')); ?>" class="header_btn">
                            <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.80996 10.5786H4.66134C3.146 10.6538 1.80347 11.5794 1.19428 12.9689C0.459504 14.4115 1.92594 15.775 3.6314 15.775H10.8399C12.5464 15.775 14.0128 14.4115 13.277 12.9689C12.6678 11.5794 11.3253 10.6538 9.80996 10.5786Z" stroke="#F9FFF1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3536 4.34286C10.3536 6.06481 8.95772 7.46072 7.23578 7.46072C5.51383 7.46072 4.11792 6.06481 4.11792 4.34286C4.11792 2.62092 5.51383 1.22501 7.23578 1.22501C8.06268 1.22501 8.85572 1.55349 9.44044 2.13821C10.0251 2.72292 10.3536 3.51596 10.3536 4.34286Z" stroke="#F9FFF1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg> My Account </a>
                    </li>
                    <?php else: ?>
                    <li class="menu-item last_menuitem">
                        <a href="<?php echo e(route('front.login')); ?>" class="header_btn">
                            <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.80996 10.5786H4.66134C3.146 10.6538 1.80347 11.5794 1.19428 12.9689C0.459504 14.4115 1.92594 15.775 3.6314 15.775H10.8399C12.5464 15.775 14.0128 14.4115 13.277 12.9689C12.6678 11.5794 11.3253 10.6538 9.80996 10.5786Z" stroke="#F9FFF1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3536 4.34286C10.3536 6.06481 8.95772 7.46072 7.23578 7.46072C5.51383 7.46072 4.11792 6.06481 4.11792 4.34286C4.11792 2.62092 5.51383 1.22501 7.23578 1.22501C8.06268 1.22501 8.85572 1.55349 9.44044 2.13821C10.0251 2.72292 10.3536 3.51596 10.3536 4.34286Z" stroke="#F9FFF1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg> User login </a>
                    </li>
                    <li class="menu-item last_menuitem">
                        <a href="<?php echo e(route('transporter.login')); ?>" class="header_btn">
                            <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.80996 10.5786H4.66134C3.146 10.6538 1.80347 11.5794 1.19428 12.9689C0.459504 14.4115 1.92594 15.775 3.6314 15.775H10.8399C12.5464 15.775 14.0128 14.4115 13.277 12.9689C12.6678 11.5794 11.3253 10.6538 9.80996 10.5786Z" stroke="#F9FFF1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3536 4.34286C10.3536 6.06481 8.95772 7.46072 7.23578 7.46072C5.51383 7.46072 4.11792 6.06481 4.11792 4.34286C4.11792 2.62092 5.51383 1.22501 7.23578 1.22501C8.06268 1.22501 8.85572 1.55349 9.44044 2.13821C10.0251 2.72292 10.3536 3.51596 10.3536 4.34286Z" stroke="#F9FFF1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg> 
                            Transporter login </a>
                    </li>
                    <?php endif; ?>
                    <?php if(!(Auth::guard('web')->user() && Auth::guard('web')->user()->type == 'user')): ?>
                    <div class="menu_transport_company">
                        <p>Are you a transport company?</p><a href="<?php echo e(route('transporter.home')); ?>" class="getqt_btnincld">Sign up</a>
                    </div>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
</header>
<?php /**PATH D:\Laravelproject\transport\staging.transportanycar.com\resources\views/layouts/web/head-web-menu-without-mobile.blade.php ENDPATH**/ ?>