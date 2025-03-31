<style>
    .btm_footer {
        padding-right: 200px;
    }

    /********** */
    /*----- HEADER -----*/
    .hidden {
        display: none;
    }

    .menu-item img {
        display: none;
    }

    /*----- FOOTER -----*/
    footer {
        background: #000F26;
        color: #FFFFFF;
        display: block;
        position: relative;
        padding: 50px 0 30px;
    }

    footer p {
        font-size: 16px;
        font-weight: 500;
        line-height: 1.8;
    }

    footer h6 {
        font-size: 16px;
        font-weight: 500;
        color: #008ED4;
        display: block;
        margin-bottom: 1rem;
    }

    .footer_logo {
        position: absolute;
        right: 0;
        bottom: 0;
        width: 200px;
    }

    .ftmenu_list li a {
        font-size: 16px;
        font-weight: 500;
        color: #fff;
        display: flex;
        margin-bottom: 10px;
        align-items: center;
    }

    .ftmenu_list li a svg {
        margin-right: 10px;
        width: 22px;
        height: 22px;
    }

    .ftmenu_list li a p {
        width: 100%;
        margin-bottom: 0;
    }

    .social_list li a {
        background: #008ED4;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .social_list li a:hover {
        border: 1px solid #008ED4;
    }

    .social_list {
        display: flex;
        align-items: center;
        margin: 1.5rem 0;
    }

    .social_list li {
        margin-right: 10px;
    }

    .social_list li:last-child {
        margin-right: 0;
    }

    #res_logo {
        display: none;
    }

    @media  only screen and (max-width: 991px) {
        .menu-item.active a {
            background: #0356d6 !important;
            color: #fff !important;
            font-weight: 400 !important;
            border-color: #0356d6 !important;
        }

        .menu-item img {
            display: inline-block;
            margin-right: 10px;
            margin-top: -5px;
        }

        #res_logo img {
            max-width: 190px;
            width: 100%;
        }

        #res_logo img {
            padding-left: 15px;
        }

        footer {
            padding: 30px 0;
        }

        .headitemshow .brand {
            position: relative;
            z-index: 1111;
        }

        #footer .row .col-lg-4.col-md-4 {
            margin-top: 1rem;
        }
    }

    /* new scope 24-1-2024 */
    .teleph_text {
        background: var(--Blue-linear, linear-gradient(273deg, #018ED5 1.21%, #0356D6 98.03%));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: 21px !important;
        font-weight: 400 !important;
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 0 !important;
    }

    .last_menuitem {
        display: flex;
        align-items: center;
        gap: 24px;
    }



    .menu_transport_company {
        position: absolute;
        bottom: 0;
        width: 100%;
        align-items: center;
        padding: 20px;
        display: none;
    }

    .menu_transport_company a.getqt_btnincld {
        border-radius: 5px;
        font-size: 16px !important;
        padding: 8px 17px !IMPORTANT;
        max-width: max-content !important;
        margin-right: 0 !important;
    }

    .menu_transport_company p {
        margin-bottom: 0;
        font-size: 18px;
        color: #000;
    }

    @media  only screen and (max-width: 575px) {
        .menu_transport_company {
            display: flex;
            width: 370px;
            padding: 20px 15px;
        }
    }

    /********** */
    @media  screen and (max-width: 767px) {
        .footer_logo {
            position: relative;
            margin-top: 25px;
        }

        .btm_footer {
            padding-right: 15px;
        }

        footer p {
            font-size: 12px;
            line-height: 18px;
        }
    }
</style>
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-6">
                <h6 class="ftlink_title">Quick links</h6>
                <ul class="ftmenu_list">
                    <li>
                        <a href="#home">Home</a>
                    </li>
                    <!-- <li>
                        <a href="#review">Reviews</a>
                    </li> -->
                    <li>
                        <a href="#chooseus">Why choose us</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('transporter.home')); ?>">Transporters</a>
                    </li>
                    <li>
                        <?php if(Auth::guard('transporter')->user()): ?>
                        <a href="<?php echo e(route('front.dashboard')); ?>">
                            Account</a>
                        <?php else: ?>
                        <a href="<?php echo e(route('front.login')); ?>">Account</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-6">
                <h6 class="ftlink_title">Support</h6>
                <ul class="ftmenu_list">
                    <li>
                        <a href="<?php echo e(route('front.faq')); ?>">FAQs</a>
                    </li>
                    <!-- <li>
                        <a href="<?php echo e(route('front.contact')); ?>">Contact us</a>
                    </li> -->
                    <li>
                        <a href="<?php echo e(route('front.privacy_policy')); ?>">Privacy policy</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('front.term_condition')); ?>">Terms & conditions</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('front.contact')); ?>">Contact us</a>
                    </li>
                </ul>
            </div>
            <!-- <div class="col-lg-4 col-md-4">
                <h6 class="ftlink_title">Talk to us</h6>
                <ul class="ftmenu_list">
                    <li>
                        <a href="mailto:info@transportanycar.com">
                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5278 0.75C15.757 0.75 16.9395 1.23583 17.8094 2.10758C18.6803 2.9775 19.167 4.15083 19.167 5.37917V12.6208C19.167 15.1783 17.0862 17.25 14.5278 17.25H5.47201C2.9136 17.25 0.833679 15.1783 0.833679 12.6208V5.37917C0.833679 2.82167 2.90443 0.75 5.47201 0.75H14.5278ZM15.9862 6.745L16.0595 6.67167C16.2786 6.40583 16.2786 6.02083 16.0494 5.755C15.922 5.61842 15.7469 5.535 15.5645 5.51667C15.372 5.50658 15.1887 5.57167 15.0503 5.7L10.917 9C10.3853 9.44092 9.6236 9.44092 9.08368 9L4.95868 5.7C4.6736 5.48917 4.27943 5.51667 4.04201 5.76417C3.79451 6.01167 3.76701 6.40583 3.97693 6.68083L4.09701 6.8L8.26785 10.0542C8.78118 10.4575 9.4036 10.6775 10.0553 10.6775C10.7053 10.6775 11.3387 10.4575 11.8511 10.0542L15.9862 6.745Z" fill="white" />
                            </svg>
                            <p>info@transportanycar.com</p>
                        </a>
                    </li>
                    <li>
                        <a href="tel:0800 689 4934">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.57078 9.43298C12.2274 13.0886 13.057 8.85945 15.3852 11.186C17.6298 13.43 18.9198 13.8796 16.076 16.7226C15.7198 17.0089 13.4565 20.453 5.50257 12.5013C-2.45233 4.54863 0.989806 2.28303 1.27616 1.92691C4.1269 -0.924016 4.56873 0.37356 6.8133 2.61751C9.14152 4.94508 4.91412 5.77734 8.57078 9.43298Z" fill="white" />
                            </svg>
                            <p>0808 155 7979</p>
                        </a>
                    </li>
                </ul>
            </div> -->
            <!-- <div class="col-12 btm_footer text-center text-md-left mt-3 text-decoration-none">
                <p class="mb-0">Transport Any Car <span>&copy; All rights reserved. <?php echo e(date('Y')); ?></span>. TransportAnyCar.com is a limited company registered in England and Wales. Registered address: 128 City Road, London, EC1V 2NX.</p>
                
                <div class="foot_img">
                    <img src="<?php echo e(asset('assets/web/images/footer_logo.png')); ?>" alt="brand_logo" class="footer_logo" />
                </div>

                <img src="<?php echo e(asset('assets/web/images/facebook.png')); ?>" alt="brand_logo" class="facebook_icon" width="25" />
            </div> -->
            <div class="col-12 text-center text-md-left mt-3 text-decoration-none">
                <div class="row">

                    <div class="col-12 col-md-6 col-xl-8 mb-3 mb-md-0 order-2 order-md-1">
                        <p class="mb-0">Transport Any Car <span>&copy; All rights reserved. <?php echo e(date('Y')); ?></span>. TransportAnyCar.com is a limited company registered in England and Wales. Registered address: 128 City Road, London, EC1V 2NX.</p>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 order-1 order-md-2">
                        <div class="foot_img row mx-0 align-items-center justify-content-between justify-content-md-center justify-content-md-end">
                            <img src="<?php echo e(asset('assets/web/images/footer_logo.png')); ?>" alt="brand_logo" class="footer_logos" width="200" />
                            <ul class="list-inline social-icons ml-3">
                                <li>
                                    <a href="https://www.facebook.com/share/16A3vJKiYH/?mibextid=wwXIfr" target="_blank" class="text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="25px" height="25px" fill="#ffffff" class="mx-auto d-block">    
                                        <path d="M41,4H9C6.24,4,4,6.24,4,9v32c0,2.76,2.24,5,5,5h32c2.76,0,5-2.24,5-5V9C46,6.24,43.76,4,41,4z M37,19h-2c-2.14,0-3,0.5-3,2 v3h5l-1,5h-4v15h-5V29h-4v-5h4v-3c0-4,2-7,6-7c2.9,0,4,1,4,1V19z" />
                                    </svg>
                                    <span class="d-block text-white">Follow us</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</footer><?php /**PATH /var/www/html/public_html/resources/views/layouts/web/footer.blade.php ENDPATH**/ ?>