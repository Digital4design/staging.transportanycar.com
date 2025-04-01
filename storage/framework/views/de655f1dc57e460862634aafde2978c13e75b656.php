

<?php $__env->startSection('head_css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<style>

@media(max-width: 1400px){
    .wd-quote-box2 {
        width: 100%;
    }
}

@media(max-width: 580px){
    .accepted_quotes_row  .wd-quote-lft {
        column-gap: 15px;
    }
    .wd-quote-lft {
        row-gap: 15px;
    }
    .accepted_quotes_row .wd-quote-lft {
        display: flex;
        flex-wrap: wrap;
    }
    .accepted_quotes_row .wd-quote-lft .list_detail {
        width: 100%;
    }
    .new_dev_delivery .accepted_quotes_row .wd-quote-box .wd-quote-lft,
    .new_dev_delivery .accepted_quotes_row .wd-quote-box.accepted_quotes_new .wd-quote-lft {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        width: 100%;
    }
    .wd-quote-rght a {margin-bottom: 15px;}
    .wd-quote-box {align-items: flex-start;}
    .wd-quote-rght {
        width: 50%;
        align-items: flex-start;
    }
    .wd-quote-box {
        flex-direction: column;
    }
}

@media(max-width: 380px){
/* .accepted_quotes_row .wd-quote-lft .list_detail {
    width: 29%;
} */
}

</style>

    <?php echo $__env->make('layouts.web.dashboard.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="admin_del wd-active-job">
        <div class="container-job" style="padding-right: 20px;">
            <div class="wd-deliver-box">
                <div class="row h-100 new_dev_delivery">
                    <div class="col-lg-4">
                        <div class="wd-deliver-lft">
                            <div class="wd-profl-delivr">
                                <h1>Past Deliveries</h1>
                                <ul>
                                    

                                    <!-- <li>
                                        <a href="javascript:;">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_650_1100)">
                                                    <path d="M17.4437 7.36875C17.5537 7.86375 17.6175 8.3725 17.6175 8.895C17.6175 12.93 14.1925 16.2937 9.6825 17.0162C10.6362 17.4012 11.705 17.6262 12.8437 17.6262C13.9175 17.6262 14.9312 17.4287 15.8462 17.085C17.005 17.48 18.27 17.5825 19.3162 17.5825C18.8438 17.0159 18.4437 16.3928 18.125 15.7275C19.285 14.6925 20 13.3212 20 11.8113C20 10.0262 19.0037 8.435 17.4437 7.36875ZM15.7425 8.895C15.7425 5.36375 12.2187 2.5 7.87125 2.5C3.52375 2.5 0 5.36375 0 8.895C0 10.7375 0.96375 12.3925 2.49875 13.56C2.1138 14.546 1.57132 15.4629 0.8925 16.275C2.465 16.275 4.49 16.0687 6.04875 15.1112C6.635 15.225 7.24375 15.2912 7.87125 15.2912C12.2187 15.29 15.7425 12.4275 15.7425 8.895Z" fill="white"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_650_1100">
                                                        <rect width="20" height="20" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg> Leave feedback
                                        </a>
                                    </li> -->

                                    <li>
                                        <a href="<?php echo e(route('front.logout')); ?>">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_650_1110)">
                                                    <path d="M15.75 0H7.5C6.90381 0.00178057 6.33255 0.239405 5.91098 0.660977C5.48941 1.08255 5.25178 1.65381 5.25 2.25V6.75H12C12.5967 6.75 13.169 6.98705 13.591 7.40901C14.0129 7.83097 14.25 8.40326 14.25 9C14.25 9.59674 14.0129 10.169 13.591 10.591C13.169 11.0129 12.5967 11.25 12 11.25H5.25V15.75C5.25178 16.3462 5.48941 16.9175 5.91098 17.339C6.33255 17.7606 6.90381 17.9982 7.5 18H15.75C16.3462 17.9982 16.9175 17.7606 17.339 17.339C17.7606 16.9175 17.9982 16.3462 18 15.75V2.25C17.9982 1.65381 17.7606 1.08255 17.339 0.660977C16.9175 0.239405 16.3462 0.00178057 15.75 0Z" fill="white"/>
                                                    <path d="M2.55772 9.75002H12.0002C12.1991 9.75002 12.3899 9.671 12.5305 9.53035C12.6712 9.38969 12.7502 9.19893 12.7502 9.00002C12.7502 8.8011 12.6712 8.61034 12.5305 8.46969C12.3899 8.32903 12.1991 8.25002 12.0002 8.25002H2.55772L3.53272 7.28252C3.67395 7.14129 3.75329 6.94974 3.75329 6.75002C3.75329 6.55029 3.67395 6.35874 3.53272 6.21752C3.39149 6.07629 3.19994 5.99695 3.00022 5.99695C2.80049 5.99695 2.60895 6.07629 2.46772 6.21752L0.217718 8.46752C0.0822483 8.61173 0.00683594 8.80215 0.00683594 9.00002C0.00683594 9.19788 0.0822483 9.3883 0.217718 9.53252L2.46772 11.7825C2.61133 11.9192 2.80198 11.9954 3.00022 11.9954C3.19845 11.9954 3.3891 11.9192 3.53272 11.7825C3.67323 11.6409 3.75208 11.4495 3.75208 11.25C3.75208 11.0505 3.67323 10.8591 3.53272 10.7175L2.55772 9.75002Z" fill="white"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_650_1110">
                                                        <rect width="18" height="18" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg> Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 accepted_quotes_row">
                        <div class="wd-delivr-rght new_sec_delivr">
                            <h2>Booked Deliveries</h2>
                            <?php $__empty_1 = true; $__currentLoopData = $quotes_booked; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="wd-quote-box accepted_quotes_new">
                                    <div class="wd-quote-lft">
                                        <div class="list_detail">
                                            <span>
                                                <img src="<?php echo e(asset('assets/web/images/dashboard/car-icon.svg')); ?>" alt="Car Icon">
                                            </span>
                                            <p>Make & model:</p>
                                            <p><b><?php echo e($item->vehicle_make); ?> <?php echo e($item->vehicle_model); ?></b></p>
                                        </div>

                                        <div class="list_detail">
                                            <span>
                                                <img src="<?php echo e(asset('assets/web/images/dashboard/calender.png')); ?>" alt="Calendar Icon">
                                            </span>
                                            <p>Accepted:</p>
                                            <p><b><?php echo e($item->updated_at->format('d M Y')); ?></b></p>
                                        </div>

                                        <div class="list_detail">
                                            <span>
                                                <img src="<?php echo e(asset('assets/web/images/dashboard/map-icon.svg')); ?>" alt="Map Icon">
                                            </span>
                                            <p>Pick-up postcode:</p>
                                            <p><b><?php echo e($item->pickup_postcode); ?></b></p>
                                        </div>


                                        <div class="list_detail">
                                            <span>
                                                <img src="<?php echo e(asset('assets/web/images/dashboard/red-map-icon.svg')); ?>" alt="Map Icon">
                                            </span>
                                            <p>Drop-off area:</p>
                                            <p><b><?php echo e($item->drop_postcode); ?></b></p>
                                        </div>

                                        <div class="list_detail">
                                            <span>
                                                <img src="<?php echo e(asset('assets/web/images/dashboard/credit-card.png')); ?>" alt="Credit Card Icon">
                                            </span>
                                            <p>Balance to pay:</p>
                                            <p><b>£<?php if($item->quoteByTransporter): ?> <?php echo e(roundBasedOnDecimal($item->quoteByTransporter->transporter_payment)); ?> <?php endif; ?></b></p>
                                        </div>

                                        <div class="list_detail">
                                            <span>
                                                <img src="<?php echo e(asset('assets/web/images/dashboard/pound.png')); ?>" alt="Pound Icon">
                                            </span>
                                            <p>Quote amount:</p>
                                            <p><b>£<?php if($item->quoteByTransporter): ?> <?php echo e(roundBasedOnDecimal($item->quoteByTransporter->price)); ?> <?php endif; ?></b></p>
                                        </div>
                                    </div>

                                    <div class="wd-quote-rght">
                                        <a href="<?php echo e(route('front.leave_feedback', ['id' => $item->quoteByTransporter->id ?? null])); ?>"class="wd-leave-btn">Leave feedback</a>
                                        <a href="<?php echo e(route('front.user_deposit', ['id' => $item->quoteByTransporter->id ?? null])); ?>">Contact transporter</a>
                                        <?php if($item->quoteByTransporter && $item->quoteByTransporter->id): ?>
                                        <form id="download-form" action="<?php echo e(route('front.download_vat_receipt')); ?>" method="GET">
                                            <input type="hidden" name="payment_date" value="<?php echo e($item->quoteByTransporter->updated_at); ?>">
                                            <input type="hidden" name="total" value="<?php echo e($item->quoteByTransporter->deposit); ?>">
                                            <input type="hidden" name="vehicle_name" value="<?php echo e($item->vehicle_make . ' ' . $item->vehicle_model); ?>">
                                        </form>
                                        <a href="javascript:;" id="download-vat-receipt" class="wd-orange">View VAT receipt </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p>-Currently none to show-</p>
                            <?php endif; ?>
                            <h2>Expired Quote Requests</h2>
                            <?php $__empty_1 = true; $__currentLoopData = $quotes_cancelled; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="wd-quote-box">
                                <div class="wd-quote-box2">
                                    <div class="wd-quote-lft">
                                        <div class="list_detail">
                                        <span>
                                            <img src="<?php echo e(asset('assets/web/images/dashboard/car-icon.svg')); ?>" alt="Map Icon">
                                        </span>
                                            <p>Make & model:</p>
                                            <p><b><?php echo e($item->vehicle_make); ?> <?php echo e($item->vehicle_model); ?></b></p>
                                        </div>
                                        <div class="list_detail">
                                            <span>
                                              <img src="<?php echo e(asset('assets/web/images/dashboard/calender.png')); ?>" alt="Map Icon">
                                            </span>
                                            <p>Expired:</p>
                                            <p><b><?php echo e(formatCustomDate($item->created_at->addDays(10))); ?></b></p>
                                        </div>
                                       
                                    </div>

                                    <div class="wd-quote-lft">
                                        <div class="list_detail">
                                            <span>
                                                <img src="<?php echo e(asset('assets/web/images/dashboard/map-icon.svg')); ?>" alt="Map Icon">
                                            </span>
                                            <p>Pick-up postcode:</p>
                                            <p><b><?php echo e($item->pickup_postcode); ?></b></p>
                                        </div>
                                        <div class="list_detail">
                                            <span>
                                            <img src="<?php echo e(asset('assets/web/images/dashboard/red-map-icon.svg')); ?>" alt="Map Icon">
                                            </span>
                                            <p>Drop-off area:</p>
                                            <p><b><?php echo e($item->drop_postcode); ?></b></p>
                                        </div>

                                        <div class="list_detail">
                                        <span>
                                          <img src="<?php echo e(asset('assets/web/images/dashboard/pound.png')); ?>" alt="Map Icon">
                                        </span>
                                            <p>Quotes:</p>
                                            <p><b><?php echo e($item->quotation_count); ?></b></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="wd-quote-rght">
                                    <a href="<?php echo e(route('front.quote_renew', ['id' => $item->id])); ?>" class="wd-leave-btn">Relist</a>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p>-Currently none to show-</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('layouts.web.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/web/js/admin.js')); ?>"></script>
    <script>
        const fileImage = document.querySelector('.input-preview__src');
        const filePreview = document.querySelector('.input-preview');

        fileImage.onchange = function () {
            const reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                filePreview.style.backgroundImage  = "url("+e.target.result+")";
                filePreview.classList.add("has-image");
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
    </script>
    <script>
        $('#download-vat-receipt').on('click', function(e) {
            e.preventDefault();
            $('#download-form').submit();
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.web.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravelproject\transport\staging.transportanycar.com\resources\views/front/dashboard/past_deliveries.blade.php ENDPATH**/ ?>