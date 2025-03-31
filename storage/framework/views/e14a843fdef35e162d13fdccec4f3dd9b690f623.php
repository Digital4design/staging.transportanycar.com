<header class="header">
    <div class="container">
        <nav class="navbar">
            <a class="brand" href="<?php echo e(route('front.home')); ?>">
                <img src="<?php echo e(asset('assets/web/images/logo.png')); ?>" alt="brand_logo" />
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
                        <a href="<?php echo e(route('front.home')); ?>"><img src="<?php echo e(asset('assets/web/images/logo.png')); ?>" alt="brand_logo" /></a>
                    </li>
                    <li class="menu-item active">
                        <a href="<?php echo e(route('transporter.home')); ?>">Home</a>
                    </li>    
                    <li class="menu-item">
                        <a href="<?php echo e(route('front.home')); ?>#chooseus"> Why choose us</a>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo e(route('front.faq')); ?>">FAQs</a>
                    </li>                                                    
                    <!-- <li class="menu-item last_menuitem">
                        <a href="tel:08081557979" class="teleph_text">
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.01365 2.87701C3.0467 1.78879 3.41178 1.48358 3.852 1.34153C4.15665 1.2617 4.47616 1.25727 4.78291 1.32862C5.18674 1.44601 5.29357 1.53523 6.61774 2.85471C7.78109 4.01336 7.8973 4.13897 8.00883 4.36553C8.22207 4.76322 8.25538 5.23304 8.10039 5.65684C7.983 5.97966 7.81631 6.19332 7.11078 6.90118L6.65061 7.36253C6.52976 7.48534 6.50136 7.67184 6.58017 7.82505C7.60258 9.56932 9.05311 11.0239 10.7945 12.0511C10.995 12.1585 11.2418 12.1238 11.405 11.9654L11.8475 11.5299C12.1211 11.2495 12.4107 10.9853 12.715 10.7387C13.193 10.4452 13.7886 10.4191 14.2904 10.6694C14.5358 10.7868 14.6168 10.8596 15.8165 12.057C17.0538 13.2908 17.089 13.3295 17.2252 13.6124C17.4815 14.0808 17.4788 14.648 17.2182 15.1139C17.0855 15.3768 17.0045 15.4719 16.3084 16.1833C15.8881 16.613 15.4925 17.0051 15.4291 17.0626C14.8549 17.5381 14.1181 17.7713 13.3748 17.7129C12.0148 17.589 10.6986 17.1686 9.51848 16.4815C6.90433 15.0965 4.67891 13.0785 3.04552 10.6119C2.68976 10.0957 2.37347 9.55339 2.09935 8.98958C1.36399 7.72923 0.984247 6.29302 1.00057 4.83392C1.05671 4.0706 1.42277 3.3635 2.01365 2.87701Z" stroke="url(#paint0_linear_13_2391)" stroke-width="1.76087" stroke-linecap="round" stroke-linejoin="round" />
                                <defs>
                                    <linearGradient id="paint0_linear_13_2391" x1="17.4155" y1="13.1702" x2="0.830392" y2="12.4127" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#018ED5" />
                                        <stop offset="1" stop-color="#0356D6" />
                                    </linearGradient>
                                </defs>
                            </svg> 0808 155 7979 </a>
                    </li> -->
                    <?php if(Auth::guard('transporter')->user()): ?>
                    <li class="menu-item">
                            <a href="<?php echo e(route('transporter.dashboard')); ?>" class="header_btn"><svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.80996 10.5786H4.66134C3.146 10.6538 1.80347 11.5794 1.19428 12.9689C0.459504 14.4115 1.92594 15.775 3.6314 15.775H10.8399C12.5464 15.775 14.0128 14.4115 13.277 12.9689C12.6678 11.5794 11.3253 10.6538 9.80996 10.5786Z" stroke="#F9FFF1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M10.3536 4.34286C10.3536 6.06481 8.95772 7.46072 7.23578 7.46072C5.51383 7.46072 4.11792 6.06481 4.11792 4.34286C4.11792 2.62092 5.51383 1.22501 7.23578 1.22501C8.06268 1.22501 8.85572 1.55349 9.44044 2.13821C10.0251 2.72292 10.3536 3.51596 10.3536 4.34286Z" stroke="#F9FFF1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg> My account</a>
                    </li>
                    <?php else: ?>
                    <li class="menu-item">
                        <a href="<?php echo e(route('front.login')); ?>" class="header_btn">
                            <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.80996 10.5786H4.66134C3.146 10.6538 1.80347 11.5794 1.19428 12.9689C0.459504 14.4115 1.92594 15.775 3.6314 15.775H10.8399C12.5464 15.775 14.0128 14.4115 13.277 12.9689C12.6678 11.5794 11.3253 10.6538 9.80996 10.5786Z" stroke="#F9FFF1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3536 4.34286C10.3536 6.06481 8.95772 7.46072 7.23578 7.46072C5.51383 7.46072 4.11792 6.06481 4.11792 4.34286C4.11792 2.62092 5.51383 1.22501 7.23578 1.22501C8.06268 1.22501 8.85572 1.55349 9.44044 2.13821C10.0251 2.72292 10.3536 3.51596 10.3536 4.34286Z" stroke="#F9FFF1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg> User login </a>
                    </li>
                    <li class="menu-item">
                    <a href="<?php echo e(route('transporter.login')); ?>" class="header_btn">
                            <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.80996 10.5786H4.66134C3.146 10.6538 1.80347 11.5794 1.19428 12.9689C0.459504 14.4115 1.92594 15.775 3.6314 15.775H10.8399C12.5464 15.775 14.0128 14.4115 13.277 12.9689C12.6678 11.5794 11.3253 10.6538 9.80996 10.5786Z" stroke="#F9FFF1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3536 4.34286C10.3536 6.06481 8.95772 7.46072 7.23578 7.46072C5.51383 7.46072 4.11792 6.06481 4.11792 4.34286C4.11792 2.62092 5.51383 1.22501 7.23578 1.22501C8.06268 1.22501 8.85572 1.55349 9.44044 2.13821C10.0251 2.72292 10.3536 3.51596 10.3536 4.34286Z" stroke="#F9FFF1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg> 
                            Transporter login </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
</header>
<?php /**PATH D:\Laravelproject\transport\staging.transportanycar.com\resources\views/layouts/transporter/head-web-menu.blade.php ENDPATH**/ ?>