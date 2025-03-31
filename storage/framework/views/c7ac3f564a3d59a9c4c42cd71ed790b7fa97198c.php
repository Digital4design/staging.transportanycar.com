<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.transporter.head-web-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main>
        <section class="join_network_main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h1 class="banner_newtext">Join our <b>network</b> of car transport companies across the UK</h1>
                    </div>
                    <div class="col-lg-6 col-md-6 text-left">
                        <p class="pera_netext">Start receiving <strong>hundreds</strong> of transport jobs every day to your email. No contract, no subscription fees, cancel anytime.</p>
                        <a href="<?php echo e(route('transporter.signup')); ?>" class="getqt_btnincld">Sign Up Free <svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.4848 1.62323L8.35854 8.49696L1.4848 15.3707" stroke="white" stroke-width="2.06212" stroke-linecap="round" stroke-linejoin="round"></path></svg></a>
                    </div>
                </div>
            </div>
            <!-- <img src="./assets/images/imgnetwork.png" alt="image" class="image_banner_netwk" /> -->
            <svg class="image_banner_netwk" width="631" height="1" viewBox="0 0 631 1" fill="none" xmlns="http://www.w3.org/2000/svg"><line y1="0.5" x2="631.001" y2="0.5" stroke="#CFCFCF"/></svg>
        </section>
        <section class="joinnetwork_steps">
            <div class="container">
                <div class="row row-reverse">
                    <div class="col-lg-6 col-md-6 text-left">
                        <div class="network_step_content">
                            <h1>1.Search for jobs</h1>
                            <p>You can use our powerful search tool to find <br /> transport jobs anywhere.</p>
                            <ul class="network_list">
                                <li><svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 6.5L6.667 11L16 2" stroke="#52D017" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>Search by postcode or area</li>
                                <li><svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 6.5L6.667 11L16 2" stroke="#52D017" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>Get notified every time a new job gets posted <br /> or accepted</li>
                                <li><svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 6.5L6.667 11L16 2" stroke="#52D017" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>Find backloads to fit in with your current jobs</li>
                            </ul>
                            <a href="<?php echo e(route('transporter.signup')); ?>" class="getqt_btnincld">Sign Up Now</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 text-right">
                        <img src="<?php echo e(asset('assets/web/images/step1.png')); ?>" alt="image" class="image-fluid" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 text-left">
                        <img src="<?php echo e(asset('assets/web/images/step2.png')); ?>" alt="image" class="image-fluid" />
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="network_step_content dflex_right">
                            <h1>2.Make offers for jobs</h1>
                            <p>Simply make an offer for the jobs you wish to carry<br/> out and get paid directly by the customer.</p>
                            <ul class="network_list">
                                <li><svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 6.5L6.667 11L16 2" stroke="#52D017" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>Messaging app to make arrangements with<br/> customers</li>
                                <li><svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 6.5L6.667 11L16 2" stroke="#52D017" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>Get paid the amount you quote the job</li>
                                <li><svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 6.5L6.667 11L16 2" stroke="#52D017" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>You choose the jobs you want to quote</li>
                            </ul>
                            <a href="<?php echo e(route('transporter.signup')); ?>" class="getqt_btnincld">Sign Up Now</a>
                        </div>
                    </div>
                </div>
                <div class="row row-reverse">
                    <div class="col-lg-6 col-md-6 text-left">
                        <div class="network_step_content">
                            <h1>3.Win the job</h1>
                            <p>When your offer has been accepted, we will send <br/>you a confirmation email with all of the job<br/> information, including customer contact details and<br/> collection/delivery address.</p>
                            <ul class="network_list">
                                <li><svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 6.5L6.667 11L16 2" stroke="#52D017" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>Get paid the full quoted amount directly by the<br/> customer on completion</li>
                                <li><svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 6.5L6.667 11L16 2" stroke="#52D017" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>Leave and receive feedback for each job</li>
                                <li><svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 6.5L6.667 11L16 2" stroke="#52D017" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>Ability to message to customer before booking</li>
                            </ul>
                            <a href="<?php echo e(route('transporter.signup')); ?>" class="getqt_btnincld">Sign Up Now</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 text-right">
                        <img src="<?php echo e(asset('assets/web/images/step3.png')); ?>" alt="image" class="image-fluid" />
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php echo $__env->make('layouts.web.transporter_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/web/js/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.transporter.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/public_html/resources/views/transporter/index.blade.php ENDPATH**/ ?>