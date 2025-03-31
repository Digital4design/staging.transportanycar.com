<nav class="navbar">
    <div class="menu_leftbar">
        <a href="<?php echo e(route('transporter.dashboard')); ?>" class="logo">
            <img src="<?php echo e(asset('assets/web/images/logo.png')); ?>" alt="brand_logo" />
        </a>
    </div>
    <div class="navbarmenu">
        <div class="menu_rightbar">
            <div class="dropdown notifaction_sec">
                
                <a class="menu-link dropdown-toggle noti_info_icon <?php if($notificationCount>9): ?> ? two_digit : '' <?php endif; ?>" href="javascript:;" id="dropdownMenuButton">
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.5 21C11.9487 21 13.1238 19.8249 13.1238 18.375H7.87626C7.87626 19.8249 9.05136 21 10.5 21ZM19.3344 14.8596C18.542 14.0081 17.0592 12.7271 17.0592 8.53125C17.0592 5.34434 14.8247 2.79316 11.8117 2.16727V1.3125C11.8117 0.587754 11.2244 0 10.5 0C9.77569 0 9.18835 0.587754 9.18835 1.3125V2.16727C6.17534 2.79316 3.94081 5.34434 3.94081 8.53125C3.94081 12.7271 2.45809 14.0081 1.66567 14.8596C1.41958 15.1241 1.31048 15.4403 1.31253 15.75C1.31704 16.4227 1.84491 17.0625 2.62913 17.0625H18.3709C19.1551 17.0625 19.6834 16.4227 19.6875 15.75C19.6896 15.4403 19.5805 15.1237 19.3344 14.8596Z" fill="black" />
                    </svg>
                    <?php if($notificationCount>=1): ?>
                        <small><?php echo e($notificationCount); ?></small>
                    <?php endif; ?>
                </a>
                <div class="dropdown-menu" style="display:none">
                    <h5>
                        <a href="javascript:void(0)" id="dropdownClose">
                            <svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.5">
                                    <path d="M6 11.8635L1 6.43176L6 1" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                            </svg>
                        </a>
                        Notifications
                        <!-- <a href="javascript:;" id="dropdownCrossClose" class="d-lg-none d-md-none d-sm-block d-block res_close_menu"><svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.93934 15.9393C0.353553 16.5251 0.353553 17.4749 0.93934 18.0607C1.52513 18.6464 2.47487 18.6464 3.06066 18.0607L0.93934 15.9393ZM10.5607 10.5607C11.1464 9.97487 11.1464 9.02513 10.5607 8.43934C9.97487 7.85355 9.02513 7.85355 8.43934 8.43934L10.5607 10.5607ZM8.43934 8.43934C7.85355 9.02513 7.85355 9.97487 8.43934 10.5607C9.02513 11.1464 9.97487 11.1464 10.5607 10.5607L8.43934 8.43934ZM18.0607 3.06066C18.6464 2.47487 18.6464 1.52513 18.0607 0.93934C17.4749 0.353553 16.5251 0.353553 15.9393 0.93934L18.0607 3.06066ZM10.5607 8.43934C9.97487 7.85355 9.02513 7.85355 8.43934 8.43934C7.85355 9.02513 7.85355 9.97487 8.43934 10.5607L10.5607 8.43934ZM15.9393 18.0607C16.5251 18.6464 17.4749 18.6464 18.0607 18.0607C18.6464 17.4749 18.6464 16.5251 18.0607 15.9393L15.9393 18.0607ZM8.43934 10.5607C9.02513 11.1464 9.97487 11.1464 10.5607 10.5607C11.1464 9.97487 11.1464 9.02513 10.5607 8.43934L8.43934 10.5607ZM3.06066 0.93934C2.47487 0.353553 1.52513 0.353553 0.93934 0.93934C0.353553 1.52513 0.353553 2.47487 0.93934 3.06066L3.06066 0.93934ZM3.06066 18.0607L10.5607 10.5607L8.43934 8.43934L0.93934 15.9393L3.06066 18.0607ZM10.5607 10.5607L18.0607 3.06066L15.9393 0.93934L8.43934 8.43934L10.5607 10.5607ZM8.43934 10.5607L15.9393 18.0607L18.0607 15.9393L10.5607 8.43934L8.43934 10.5607ZM10.5607 8.43934L3.06066 0.93934L0.93934 3.06066L8.43934 10.5607L10.5607 8.43934Z" fill="#000"/></svg></a> -->
                    </h5>
                    <?php if(isset($notifications) && $notifications->isNotEmpty()): ?>
                        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($notification->type != 'feedback'): ?>
                        <div class="dropdown-item <?php echo e($notification->seen == 1 ? 'gray_notify' : 'white_notify'); ?>" data-type="<?php echo e($notification->type); ?>" data-id="<?php echo e($notification->type == 'message' ? $notification->reference_id : $notification->user_quote_id); ?>" 
                        data-href="
                        <?php if($notification->type == 'won_job'): ?>
                            <?php echo e(route('transporter.current_jobs', ['id' => $notification->reference_id])); ?>

                        <?php elseif($notification->type == 'message'): ?>
                            
                            <?php echo e(route('transporter.job_information', $notification->user_quote_id)); ?>

                        <?php elseif($notification->type == 'outbid'): ?>
                            
                            <?php echo e(route('transporter.job_information', $notification->user_quote_id)); ?>

                        <?php endif; ?>
                        " onclick="handleNotificationClick(event, this);">
                            <div class="drop-item-lft notifaction_sec_list">
                                <span class="notifi_icon">
                                    <?php if($notification->type == 'won_job'): ?>
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="14" cy="14" r="14" fill="#52D017"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7 14.0002C7.00024 10.6607 9.35944 7.78639 12.6348 7.1351C15.9102 6.48382 19.1895 8.23693 20.4673 11.3223C21.7451 14.4077 20.6655 17.966 17.8887 19.8212C15.1119 21.6764 11.4113 21.3117 9.05 18.9502C7.73728 17.6373 6.99987 15.8568 7 14.0002Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.5 14.001L12.833 16.334L17.5 11.668" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <?php elseif($notification->type == 'message'): ?>
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="14" cy="14" r="14" fill="#0356D6"/>
                                        <path d="M14.5846 13.416H11.0846C10.9299 13.416 10.7816 13.4775 10.6722 13.5869C10.5628 13.6963 10.5013 13.8446 10.5013 13.9993C10.5013 14.1541 10.5628 14.3024 10.6722 14.4118C10.7816 14.5212 10.9299 14.5827 11.0846 14.5827H14.5846C14.7393 14.5827 14.8877 14.5212 14.9971 14.4118C15.1065 14.3024 15.168 14.1541 15.168 13.9993C15.168 13.8446 15.1065 13.6963 14.9971 13.5869C14.8877 13.4775 14.7393 13.416 14.5846 13.416ZM16.918 11.0827H11.0846C10.9299 11.0827 10.7816 11.1441 10.6722 11.2535C10.5628 11.3629 10.5013 11.5113 10.5013 11.666C10.5013 11.8207 10.5628 11.9691 10.6722 12.0785C10.7816 12.1879 10.9299 12.2493 11.0846 12.2493H16.918C17.0727 12.2493 17.2211 12.1879 17.3304 12.0785C17.4398 11.9691 17.5013 11.8207 17.5013 11.666C17.5013 11.5113 17.4398 11.3629 17.3304 11.2535C17.2211 11.1441 17.0727 11.0827 16.918 11.0827ZM18.0846 8.16602H9.91797C9.45384 8.16602 9.00872 8.35039 8.68053 8.67858C8.35234 9.00677 8.16797 9.45189 8.16797 9.91602V15.7493C8.16797 16.2135 8.35234 16.6586 8.68053 16.9868C9.00872 17.315 9.45384 17.4993 9.91797 17.4993H16.6788L18.8371 19.6635C18.8916 19.7176 18.9563 19.7604 19.0274 19.7894C19.0984 19.8184 19.1745 19.8331 19.2513 19.8327C19.3278 19.8347 19.4037 19.8187 19.473 19.786C19.5795 19.7423 19.6707 19.6679 19.735 19.5724C19.7994 19.4769 19.8341 19.3645 19.8346 19.2493V9.91602C19.8346 9.45189 19.6503 9.00677 19.3221 8.67858C18.9939 8.35039 18.5488 8.16602 18.0846 8.16602ZM18.668 17.8435L17.3321 16.5018C17.2776 16.4478 17.213 16.405 17.1419 16.376C17.0708 16.347 16.9947 16.3322 16.918 16.3327H9.91797C9.76326 16.3327 9.61489 16.2712 9.50549 16.1618C9.39609 16.0524 9.33464 15.9041 9.33464 15.7493V9.91602C9.33464 9.76131 9.39609 9.61293 9.50549 9.50354C9.61489 9.39414 9.76326 9.33268 9.91797 9.33268H18.0846C18.2393 9.33268 18.3877 9.39414 18.4971 9.50354C18.6065 9.61293 18.668 9.76131 18.668 9.91602V17.8435Z" fill="white"/>
                                    </svg>
                                    <?php elseif($notification->type == 'outbid'): ?>
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="14" cy="14" r="14" fill="#ED1C24"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7 14.0002C7.00024 10.6607 9.35944 7.78639 12.6348 7.1351C15.9102 6.48382 19.1895 8.23693 20.4673 11.3223C21.7451 14.4077 20.6655 17.966 17.8887 19.8212C15.1119 21.6764 11.4113 21.3117 9.05 18.9502C7.73728 17.6373 6.99987 15.8568 7 14.0002Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.8448 16.0946C10.5518 16.3874 10.5517 16.8623 10.8446 17.1552C11.1374 17.4482 11.6123 17.4483 11.9052 17.1554L10.8448 16.0946ZM14.5302 14.5314C14.8232 14.2386 14.8233 13.7637 14.5304 13.4708C14.2376 13.1778 13.7627 13.1777 13.4698 13.4706L14.5302 14.5314ZM13.4695 13.4709C13.1767 13.7639 13.1769 14.2388 13.4699 14.5315C13.7629 14.8243 14.2378 14.8241 14.5305 14.5311L13.4695 13.4709ZM17.1545 11.9051C17.4473 11.6121 17.4471 11.1372 17.1541 10.8445C16.8611 10.5517 16.3862 10.5519 16.0935 10.8449L17.1545 11.9051ZM14.5302 13.4706C14.2373 13.1777 13.7624 13.1778 13.4696 13.4708C13.1767 13.7637 13.1768 14.2386 13.4698 14.5314L14.5302 13.4706ZM16.0948 17.1554C16.3877 17.4483 16.8626 17.4482 17.1554 17.1552C17.4483 16.8623 17.4482 16.3874 17.1552 16.0946L16.0948 17.1554ZM13.4696 14.5312C13.7624 14.8242 14.2373 14.8243 14.5302 14.5314C14.8232 14.2386 14.8233 13.7637 14.5304 13.4708L13.4696 14.5312ZM11.9054 10.8448C11.6126 10.5518 11.1377 10.5517 10.8448 10.8446C10.5518 11.1374 10.5517 11.6123 10.8446 11.9052L11.9054 10.8448ZM11.9052 17.1554L14.5302 14.5314L13.4698 13.4706L10.8448 16.0946L11.9052 17.1554ZM14.5305 14.5311L17.1545 11.9051L16.0935 10.8449L13.4695 13.4709L14.5305 14.5311ZM13.4698 14.5314L16.0948 17.1554L17.1552 16.0946L14.5302 13.4706L13.4698 14.5314ZM14.5304 13.4708L11.9054 10.8448L10.8446 11.9052L13.4696 14.5312L14.5304 13.4708Z" fill="white"/>
                                    </svg>
                                    <?php endif; ?>
                                </span>
                                <div class="item-content">
                                    <h4><?php echo e($notification->title); ?> </h4>
                                    <h6> <?php echo e($notification->message); ?></h6>
                                </div>
                                <div class="notifi_time">
                                    <span><?php echo e(getTimeAgo($notification->created_at->toDateTimeString())); ?></span> 
                                    <a href="javascript:void(0)" class="view_debtn">View</a>
                                    <!-- <?php if($notification->type == 'won_job'): ?>
                                        <a href="javascript:void(0)" data-href="<?php echo e(route('transporter.current_jobs', ['id' => $notification->reference_id])); ?>" onclick="notificationStatus('<?php echo e(route('transporter.notification_status')); ?>', 'won_job', <?php echo e($notification->user_quote_id); ?>, this);" class="view_debtn">View</a>
                                    <?php elseif($notification->type == 'message'): ?>
                                        <a href="javascript:void(0)" data-href="<?php echo e(route('transporter.messages', ['thread_id' => $notification->reference_id])); ?>" onclick="notificationStatus('<?php echo e(route('transporter.notification_status')); ?>', 'message', <?php echo e($notification->reference_id); ?>, this);" class="view_debtn">View</a>
                                    <?php elseif($notification->type == 'outbid'): ?>
                                        <a href="javascript:void(0)" data-href="<?php echo e(route('transporter.current_jobs', ['source' => 'notification', 'quote-id' => $notification->user_quote_id])); ?>" onclick="notificationStatus('<?php echo e(route('transporter.notification_status')); ?>', 'outbid', <?php echo e($notification->user_quote_id); ?>, this);" class="view_debtn">View</a>
                                    <?php endif; ?> -->
                                </div>
                            </div>
                            
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <div class="dropdown-item empty_notifiction" href="javascript:;">
                        <div class="no_notification">
                            <img src="<?php echo e(asset('assets/images/no_notification.png')); ?>">
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <a class="menu-link profile_menu" href="<?php echo e(route('transporter.profile')); ?>">
                <img src="<?php echo e(checkFileExist(Auth::user()->profile_image)); ?>" alt="icon" />
                <h3><?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?></h3>
            </a>
        </div>
        <button id="sidebarToggle">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</nav><?php /**PATH /var/www/html/public_html/resources/views/layouts/transporter/dashboard/top_head.blade.php ENDPATH**/ ?>