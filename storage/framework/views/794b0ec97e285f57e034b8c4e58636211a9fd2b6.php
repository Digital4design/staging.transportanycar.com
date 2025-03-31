<?php $__env->startSection('head_css'); ?>
<?php $__env->stopSection(); ?>
<style>
    /* .wd-transport-img img {
        width: 20%;
    } */
    .wd-transport-img {
        overflow: hidden;
        width: 58px;
        height: 58px;
        border-radius: 100%;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        padding-bottom: 0!important;
    }
    .wd-transport-img img {
        border-radius: 100%;
        object-fit: cover;
        height: 100%;
        width: 100%;
        object-position: center;
        display: block;
        aspect-ratio: 1 / 1;
    }

    .feedback-view {
        padding: 20px 0 70px !important;
    }

    .wd-transport-dtls {
        position: relative;
    }

    .feedback_right_sec .accept_grp {
        position: absolute;
        right: 15px;
        margin: 0;
        top: 0;
    }

    .feedback_right_sec .wd-transport-img {
        margin-bottom: 15px;
    }

    .feedback_right_sec .wd-transport-area {
        display: block;
    }

    .feedback_right_sec .wd-transport-rght ul li p {
        min-width: 160px;
    }

    .wd-transport-dtls h1 {
        text-transform: capitalize;
    }

    .page-item:last-child .page-link {
        padding-bottom: 3px;
        font-size: 16px;
    }

    .page-item:first-child .page-link {
        padding-bottom: 3px;
        font-size: 16px;
    }

    ul.pagination {
        padding: 5px 0;
    }

    .table-responsive {
        border: 1px solid #C3C3C3;
    }

    .feedback-time-line table {
        border: none !important;
    }

    @media(max-width: 580px) {
        .feedback_right_sec {
            margin-bottom: 40px;
        }

        .feedback-tbl {
            border-radius: 10px !important;
            overflow: hidden;
        }

        .accept_grp {
            margin: 24px auto 20px !important;
        }

        .fedback-txt {
            padding: 16px 30px 0 !important;
        }

        .table-responsive {
            border: 1px solid #C3C3C3;
        }
    }

    .user-feedback-header-wrap {
        gap: 16px;
    }

    .banner {
        font-size: 16px;
        line-height: 20px;
        color: #ffffff;
        background: #52D017;
        text-transform: capitalize;
        position: absolute;
        right: -50px;
        top: 20px;
        transform: rotate(38deg);
        padding: 8px 50px;
        display: inline-block;
    }

    .banner.new_member {
        background: #52D017;
    }

    .banner.pro_member {
        background: #000000;
    }

    .banner.vip_member {
        /* background: #fff000; */
        background: linear-gradient(90deg, #C5B358 65.5%, #525225 100%);
        color: #000000;
    }

    .popover .arrow.center {
        margin: 0 auto;
        left: 0;
        right: 0;
    }

    .popover {
        border: 1px solid #CFCFCF;
        border-radius: 10px;
    }

    .popover .popover-body {
        font-size: 12px;
        line-height: 18px;
        width: 300px;
        color: rgba(0, 0, 0, 0.5);
        width: 100%;
        text-align: center;
        padding: 10px 25px;
    }

    .queston-mark svg:hover {
        cursor: pointer;
    }

    @media (min-width: 992px) {
        .set_banner_position>.wd-white-box {
            position: relative;
            overflow: hidden;
        }
    }

    @media(max-width: 1199px) {
        .wd-transport-area {
            flex-wrap: wrap;
        }

        .wd-transport-rght ul li p {
            font-size: 14px;
            min-width: 126px;
        }

        .wd-transport-rght ul li span.wd-black {
            font-size: 18px;
        }

        .wd-transport-rght ul li {
            margin: 5px 0;
        }

        .wd-pb {
            padding-bottom: 60px;
        }
    }

    @media(max-width: 991px) {
        #user-feedback header~section {
            overflow: hidden;
            position: relative;
        }

        #user-feedback .wd-white-box {
            padding: 0;
        }

        #user-feedback .admin-header {
            position: relative !important;
        }

        #user-feedback .adjust_spacing {
            padding-top: 0;
        }

        /* .admin-header {
            position: fixed!important;
        } */
        .adjust_spacing {
            padding-top: 65px;
        }

        .set_banner_position {
            position: relative;
            padding: 0;
        }

        .banner {
            right: -50px;
            top: 90px;
            z-index: 2;
            /* position: fixed; */
        }
    }

    @media(max-width: 767px) {
        .banner {
            right: -50px;
            top: 20px;
            z-index: 2;
        }

        .wd-transport-img {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .wd-transport-rght ul li p {
            font-size: 16px;
            min-width: 144px;
        }

        .wd-transport-rght ul li span.wd-black {
            font-size: 22px;
        }

        .wd-feedback-box .col-lg-6:nth-child(1) {
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
            margin-bottom: 25px;
        }

        .wd-transport-rght ul li span {
            padding: 0px 12px;
        }

        .wd-transport-rght ul li span br {
            display: none;
        }

    }

    @media (max-width: 575px) {
        .wd-transport-dtls.adjust-space-in-mobile {
            padding-left: 0;
            padding-right: 0;
        }
    }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/globle.css')); ?>" />
<?php $__env->startSection('content'); ?>
    
    <?php echo $__env->make('layouts.web.dashboard.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="">

        
        <!-- SIDEBAR -->
        
        
        <!-- content part -->
        <?php if($completed_job >= 0 && $completed_job <= 10): ?>
            <div class="banner new_member d-lg-none">New Member</div>
        <?php elseif($completed_job >= 11 && $completed_job <= 50): ?>
            <div class="banner pro_member d-lg-none">Pro Member</div>
        <?php elseif($completed_job >= 51): ?>
            <div class="banner vip_member d-lg-none">ViP Member</div>
        <?php endif; ?>
        <div class="adjust_spacing">
            
            <div class="container-job set_banner_position">
                <div class="wd-white-box">
                    <?php if($completed_job >= 0 && $completed_job <= 10): ?>
                        <div class="banner new_member d-none d-lg-inline-block">New Member</div>
                    <?php elseif($completed_job >= 11 && $completed_job <= 50): ?>
                        <div class="banner pro_member d-none d-lg-inline-block">Pro Member</div>
                    <?php elseif($completed_job >= 51): ?>
                        <div class="banner vip_member d-none d-lg-inline-block">ViP Member</div>
                    <?php endif; ?>
                    <div class="wd-feedback-box border-0 rounded-0 p-0">
                        <div class="row wd-pb pb-3 pb-md-5 mx-0">
                            <div class="col-lg-12">
                                <div class="wd-transport-dtls adjust-space-in-mobile">
                                    <div class="row mx-0 align-items-center user-feedback-header-wrap mb-3">
                                        <div class="wd-transport-img pt-0">
                                            <img src="<?php echo e($user->profile_image); ?>" width="58" height="58"
                                                alt="trasporter feedback" class="img-fluid">
                                        </div>
                                        <div class="">
                                            <h1 class="user-feedback-name mb-0"><?php echo e($user->username ?? ''); ?> <img
                                                    src="<?php echo e(asset('/assets/images/user-verified.png')); ?>" alt=""
                                                    width="20" height="20" class="ml-1" />
                                                <!-- <span>(<?php echo e(count($feedback)); ?>)</span> -->
                                            </h1>

                                            <?php if($rating_percentage == 0): ?>
                                                <ul class="wd-star-lst user-feedback-stars">
                                                    <li>
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                fill="#D9D9D9" />
                                                        </svg>
                                                    </li>
                                                    <li>
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                fill="#D9D9D9" />
                                                        </svg>
                                                    </li>
                                                    <li>
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                fill="#D9D9D9" />
                                                        </svg>
                                                    </li>
                                                    <li>
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                fill="#D9D9D9" />
                                                        </svg>
                                                    </li>
                                                    <li>
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                fill="#D9D9D9" />
                                                        </svg>
                                                    </li>
                                                    <li class="user-feedback-rating-count">
                                                        <span>(<?php echo e($user->completed_job); ?>)</span>
                                                        
                                                    </li>

                                                    


                                                </ul>
                                            <?php else: ?>
                                                <?php
                                                    $totalStars = 5; // Total number of stars
                                                    $yellowStars = floor($rating_average); // Full yellow stars (integer part)
                                                    $halfStar = $rating_average - $yellowStars >= 0.5; // Check if there is a half-star
                                                    $greyStars = $totalStars - $yellowStars - ($halfStar ? 1 : 0); // Remaining grey stars
                                                ?>
                                                <ul class="wd-star-lst user-feedback-stars">
                                                    
                                                    <?php for($i = 1; $i <= $yellowStars; $i++): ?>
                                                        <li>
                                                            <svg width="12" height="12" viewBox="0 0 12 12"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                    fill="#FFA800" />
                                                            </svg>
                                                        </li>
                                                    <?php endfor; ?>

                                                    
                                                    <?php if($halfStar): ?>
                                                        <li>
                                                            <svg width="12" height="12" viewBox="0 0 12 12"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <defs>
                                                                    <linearGradient id="halfStarGradient" x1="0%"
                                                                        y1="0%" x2="100%" y2="0%">
                                                                        <stop offset="50%" stop-color="#FFA800" />
                                                                        <stop offset="50%" stop-color="#ccc" />
                                                                    </linearGradient>
                                                                </defs>
                                                                <path
                                                                    d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                    fill="url(#halfStarGradient)" />
                                                            </svg>
                                                        </li>
                                                    <?php endif; ?>

                                                    
                                                    <?php for($i = 1; $i <= $greyStars; $i++): ?>
                                                        <li>
                                                            <svg width="12" height="12" viewBox="0 0 12 12"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                    fill="#ccc" />
                                                            </svg>
                                                        </li>
                                                    <?php endfor; ?>

                                                    
                                                    <li class="user-feedback-rating-count">
                                                        <span>(<?php echo e($user->completed_job); ?>)</span>
                                                        
                                                    </li>
                                                </ul>
                                            <?php endif; ?>

                                            <div>Member since: <span
                                                    class="font-weight-light user-feedback-member-from"><?php echo e($user->created_at->format('d/m/Y')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wd-transport-area pb-0">
                                        <div class="wd-transport-rght">
                                            <ul>
                                                <li>
                                                    <p>Insurance:</p>
                                                    <span>
                                                        <?php if($user->goods_in_transit_insurance): ?>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="13"
                                                                height="13" viewBox="0 0 13 13" fill="none">
                                                                <path
                                                                    d="M4.41537 11.1567L0.190373 6.93169C-0.0634575 6.67786 -0.0634575 6.2663 0.190373 6.01245L1.10959 5.0932C1.36342 4.83935 1.775 4.83935 2.02883 5.0932L4.87499 7.93934L10.9712 1.8432C11.225 1.58937 11.6366 1.58937 11.8904 1.8432L12.8096 2.76245C13.0634 3.01628 13.0634 3.42783 12.8096 3.68169L5.33462 11.1567C5.08076 11.4105 4.6692 11.4105 4.41537 11.1567Z"
                                                                    fill="#52D017" />
                                                            </svg>
                                                            
                                                        <?php endif; ?>
                                                    </span>
                                                </li>
                                                <li>
                                                    <p>Photo ID:</p>
                                                    <span>
                                                        <?php if($user->profile_image): ?>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="13"
                                                                height="13" viewBox="0 0 13 13" fill="none">
                                                                <path
                                                                    d="M4.41537 11.1567L0.190373 6.93169C-0.0634575 6.67786 -0.0634575 6.2663 0.190373 6.01245L1.10959 5.0932C1.36342 4.83935 1.775 4.83935 2.02883 5.0932L4.87499 7.93934L10.9712 1.8432C11.225 1.58937 11.6366 1.58937 11.8904 1.8432L12.8096 2.76245C13.0634 3.01628 13.0634 3.42783 12.8096 3.68169L5.33462 11.1567C5.08076 11.4105 4.6692 11.4105 4.41537 11.1567Z"
                                                                    fill="#52D017" />
                                                            </svg>
                                                            
                                                        <?php endif; ?>
                                                </li>
                                                <li>
                                                    <p>Positive feedback:</p>
                                                    <span>
                                                        <?php echo e($rating_percentage == floor($rating_percentage) 
                                                            ? round($rating_percentage) 
                                                            : number_format($rating_percentage, 1)); ?>%
                                                    </span>
                                                    
                                                </li>
                                                
                                                <li>
                                                    <p>Jobs completed:</p>
                                                    <span><?php echo e($user->completed_job); ?></span>
                                                </li>
                                                
                                                <li>
                                                    <p>Payment method:</p>
                                                    <span>
                                                        <?php echo e(str_replace(',', ', ', $user->payment_methods)); ?></span>
                                                </li>
                                            </ul>

                                            <?php if($quote->status != 'accept'): ?>
                                                <div class="accept_grp">
                                                    <a href="javascript:;" class="wd-accept-btn"
                                                        onclick="quoteChangeStatus(<?php echo e($quote->id); ?>)">Accept quote</a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mx-0">
                            <div class="col-lg-12">
                                <div class="feedback-tbl border-none bg-white border-0 rounded-0" id="feedback_listing">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(function() {
            $('body').attr('id', 'user-feedback');
            $('.photo_id_popover').popover({
                content: 'We have a copy of this transporters valid drivers license photo I.D to protect you and ensuring a safe market place for transporting your vehicle.',
                container: '.photo_id_popover',
                trigger: 'hover',
                html: true,
                placement: 'bottom',
                template: '<div class="popover" role="tooltip"><div class="arrow center"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
            })
            $('.insurance_popover').popover({
                content: 'We have verified this transport providers insurance to ensure they have the correct goods in transit (GIT) cover to protect you and transport vehicles safe and securely.',
                container: '.insurance_popover',
                trigger: 'hover',
                html: true,
                placement: 'bottom',
                template: '<div class="popover" role="tooltip"><div class="arrow center"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
            })
        })
        var transport_id = "<?php echo e($user->id); ?>";
        var globalSiteUrl = "<?php echo e(route('front.feedback_listing', ['id' => ':transport_id'])); ?>";
        globalSiteUrl = globalSiteUrl.replace(':transport_id', transport_id);

        function fetch_data(page) {
            $.ajax({
                url: globalSiteUrl + "?page=" + page,
                type: 'GET',
                success: function(res) {
                    let result = res.data;
                    if (result) {
                        $('#feedback_listing').html(result.html);
                    }
                }
            });
        }
        $(document).ready(function() {
            fetch_data(1);
        });

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('#page').val(page);
            fetch_data(page);
        });

        function quoteChangeStatus(quote_id) {
            var url = "<?php echo e(route('front.checkout', ['id' => ':quote_id'])); ?>";
            url = url.replace(':quote_id', quote_id);
            window.location.href = url;
            return;
        }
        $(document).ready(function() {
            $(document).on('click', '.read_more_show', function() {
                var parentTr = $(this).siblings('.read_more_content');
                // var readMoreContent = parentTr.find('.read_more_content');
                $(this).addClass('d-none');
                parentTr.removeClass('d-none');
                parentTr.find('.read_more_less').removeClass('d-none');
            });
            $(document).on('click', '.read_more_less', function() {
                var parentTr = $(this).parent('.read_more_content');
                var showMore = $(this).parent().parent().find('.read_more_show');
                // var readMoreContent = parentTr.find('.read_more_content');
                // parentTr.find('.read_more_show').removeClass('d-none');
                showMore.removeClass('d-none');
                parentTr.addClass('d-none');
                $(this).addClass('d-none');
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.web.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/public_html/resources/views/front/dashboard/feedback_view.blade.php ENDPATH**/ ?>