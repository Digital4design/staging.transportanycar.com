<nav class="navbar">
    <div class="menu_leftbar">
        <a href="{{route('transporter.dashboard')}}" class="logo">
            <img src="{{asset('assets/web/images/logo.png')}}" alt="brand_logo" />
        </a>
    </div>
    <div class="navbarmenu">
        <div class="menu_rightbar">
            <div class="dropdown notifaction_sec">
                {{-- <a class="menu-link dropdown-toggle noti_info_icon @if($unseenMessageCount>9) ? two_digit : '' @endif" href="{{ route('transporter.messages') }}">
                    
                    <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.5843 6.67253C19.6089 7.36245 20.1881 7.90182 20.878 7.87725C21.5679 7.85268 22.1073 7.27348 22.0827 6.58356L19.5843 6.67253ZM15.2974 1.46138V2.71138C15.3113 2.71138 15.3253 2.71115 15.3392 2.71068L15.2974 1.46138ZM6.99458 1.46138L6.95282 2.71068C6.96674 2.71115 6.98066 2.71138 6.99458 2.71138V1.46138ZM0.209288 6.58356C0.184721 7.27348 0.724094 7.85268 1.41401 7.87725C2.10393 7.90182 2.68314 7.36245 2.7077 6.67253L0.209288 6.58356ZM22.0835 6.62804C22.0835 5.93769 21.5239 5.37804 20.8335 5.37804C20.1431 5.37804 19.5835 5.93769 19.5835 6.62804H22.0835ZM20.8335 14.378L22.0827 14.4225C22.0832 14.4077 22.0835 14.3929 22.0835 14.378H20.8335ZM15.2974 19.5447L15.3392 18.2954C15.3253 18.2949 15.3113 18.2947 15.2974 18.2947V19.5447ZM6.99458 19.5447V18.2947C6.98066 18.2947 6.96674 18.2949 6.95282 18.2954L6.99458 19.5447ZM1.4585 14.378H0.208496C0.208496 14.3929 0.20876 14.4077 0.209288 14.4225L1.4585 14.378ZM2.7085 6.62804C2.7085 5.93769 2.14885 5.37804 1.4585 5.37804C0.76814 5.37804 0.208496 5.93769 0.208496 6.62804H2.7085ZM21.464 7.70738C22.0601 7.35916 22.261 6.59364 21.9128 5.99754C21.5646 5.40144 20.7991 5.20049 20.203 5.54871L21.464 7.70738ZM14.0342 10.5999L13.4036 9.52053L13.3933 9.52673L14.0342 10.5999ZM8.25783 10.5999L8.89877 9.52668L8.88833 9.52058L8.25783 10.5999ZM2.089 5.54871C1.4929 5.20049 0.727376 5.40144 0.379159 5.99754C0.030943 6.59364 0.231893 7.35916 0.827995 7.70738L2.089 5.54871ZM22.0827 6.58356C21.953 2.94067 18.8988 0.0903093 15.2557 0.212075L15.3392 2.71068C17.6045 2.63496 19.5036 4.40735 19.5843 6.67253L22.0827 6.58356ZM15.2974 0.211378H6.99458V2.71138H15.2974V0.211378ZM7.03633 0.212075C3.39317 0.0903093 0.339008 2.94067 0.209288 6.58356L2.7077 6.67253C2.78837 4.40735 4.68747 2.63496 6.95282 2.71068L7.03633 0.212075ZM19.5835 6.62804V14.378H22.0835V6.62804H19.5835ZM19.5843 14.3336C19.5036 16.5987 17.6045 18.3711 15.3392 18.2954L15.2557 20.794C18.8988 20.9158 21.953 18.0654 22.0827 14.4225L19.5843 14.3336ZM15.2974 18.2947H6.99458V20.7947H15.2974V18.2947ZM6.95282 18.2954C4.68747 18.3711 2.78837 16.5987 2.7077 14.3336L0.209288 14.4225C0.339008 18.0654 3.39317 20.9158 7.03634 20.794L6.95282 18.2954ZM2.7085 14.378V6.62804H0.208496V14.378H2.7085ZM20.203 5.54871L13.4037 9.52058L14.6647 11.6793L21.464 7.70738L20.203 5.54871ZM13.3933 9.52673C12.0091 10.3533 10.2829 10.3533 8.89874 9.52673L7.61692 11.6731C9.79058 12.9712 12.5014 12.9712 14.6751 11.6731L13.3933 9.52673ZM8.88833 9.52058L2.089 5.54871L0.827995 7.70738L7.62733 11.6793L8.88833 9.52058Z" fill="black"/>
                        </svg>
                        
                    @if ($unseenMessageCount >= 1)
                            <small>{{ $unseenMessageCount }}</small>
                    @endif
                </a> --}}
                <a class="menu-link dropdown-toggle noti_info_icon @if($notificationCount>9) ? two_digit : '' @endif" href="javascript:;" id="dropdownMenuButton">
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.5 21C11.9487 21 13.1238 19.8249 13.1238 18.375H7.87626C7.87626 19.8249 9.05136 21 10.5 21ZM19.3344 14.8596C18.542 14.0081 17.0592 12.7271 17.0592 8.53125C17.0592 5.34434 14.8247 2.79316 11.8117 2.16727V1.3125C11.8117 0.587754 11.2244 0 10.5 0C9.77569 0 9.18835 0.587754 9.18835 1.3125V2.16727C6.17534 2.79316 3.94081 5.34434 3.94081 8.53125C3.94081 12.7271 2.45809 14.0081 1.66567 14.8596C1.41958 15.1241 1.31048 15.4403 1.31253 15.75C1.31704 16.4227 1.84491 17.0625 2.62913 17.0625H18.3709C19.1551 17.0625 19.6834 16.4227 19.6875 15.75C19.6896 15.4403 19.5805 15.1237 19.3344 14.8596Z" fill="black" />
                    </svg>
                    @if($notificationCount>=1)
                        <small>{{$notificationCount}}</small>
                    @endif
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
                    @if(isset($notifications) && $notifications->isNotEmpty())
                        @foreach($notifications as $notification)
                        @if($notification->type != 'feedback')
                        <div class="dropdown-item {{ $notification->seen == 1 ? 'gray_notify' : 'white_notify' }}" data-type="{{ $notification->type }}" data-id="{{ $notification->type == 'message' ? $notification->reference_id : $notification->user_quote_id }}" 
                        data-href="
                        @if($notification->type == 'won_job')
                            {{ route('transporter.current_jobs', ['id' => $notification->reference_id]) }}
                        @elseif($notification->type == 'message')
                            {{-- {{ route('transporter.job_information', ['thread_id' => $notification->user_quote_id]) }} --}}
                            {{ route('transporter.job_information', $notification->user_quote_id) }}
                        @elseif($notification->type == 'outbid')
                            {{-- {{ route('transporter.current_jobs', ['source' => 'notification', 'quote-id' => $notification->user_quote_id]) }} --}}
                            {{ route('transporter.job_information', $notification->user_quote_id) }}
                        @endif
                        " onclick="handleNotificationClick(event, this);">
                            <div class="drop-item-lft notifaction_sec_list">
                                <span class="notifi_icon">
                                    @if($notification->type == 'won_job')
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="14" cy="14" r="14" fill="#52D017"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7 14.0002C7.00024 10.6607 9.35944 7.78639 12.6348 7.1351C15.9102 6.48382 19.1895 8.23693 20.4673 11.3223C21.7451 14.4077 20.6655 17.966 17.8887 19.8212C15.1119 21.6764 11.4113 21.3117 9.05 18.9502C7.73728 17.6373 6.99987 15.8568 7 14.0002Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.5 14.001L12.833 16.334L17.5 11.668" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    @elseif($notification->type == 'message')
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="14" cy="14" r="14" fill="#0356D6"/>
                                        <path d="M14.5846 13.416H11.0846C10.9299 13.416 10.7816 13.4775 10.6722 13.5869C10.5628 13.6963 10.5013 13.8446 10.5013 13.9993C10.5013 14.1541 10.5628 14.3024 10.6722 14.4118C10.7816 14.5212 10.9299 14.5827 11.0846 14.5827H14.5846C14.7393 14.5827 14.8877 14.5212 14.9971 14.4118C15.1065 14.3024 15.168 14.1541 15.168 13.9993C15.168 13.8446 15.1065 13.6963 14.9971 13.5869C14.8877 13.4775 14.7393 13.416 14.5846 13.416ZM16.918 11.0827H11.0846C10.9299 11.0827 10.7816 11.1441 10.6722 11.2535C10.5628 11.3629 10.5013 11.5113 10.5013 11.666C10.5013 11.8207 10.5628 11.9691 10.6722 12.0785C10.7816 12.1879 10.9299 12.2493 11.0846 12.2493H16.918C17.0727 12.2493 17.2211 12.1879 17.3304 12.0785C17.4398 11.9691 17.5013 11.8207 17.5013 11.666C17.5013 11.5113 17.4398 11.3629 17.3304 11.2535C17.2211 11.1441 17.0727 11.0827 16.918 11.0827ZM18.0846 8.16602H9.91797C9.45384 8.16602 9.00872 8.35039 8.68053 8.67858C8.35234 9.00677 8.16797 9.45189 8.16797 9.91602V15.7493C8.16797 16.2135 8.35234 16.6586 8.68053 16.9868C9.00872 17.315 9.45384 17.4993 9.91797 17.4993H16.6788L18.8371 19.6635C18.8916 19.7176 18.9563 19.7604 19.0274 19.7894C19.0984 19.8184 19.1745 19.8331 19.2513 19.8327C19.3278 19.8347 19.4037 19.8187 19.473 19.786C19.5795 19.7423 19.6707 19.6679 19.735 19.5724C19.7994 19.4769 19.8341 19.3645 19.8346 19.2493V9.91602C19.8346 9.45189 19.6503 9.00677 19.3221 8.67858C18.9939 8.35039 18.5488 8.16602 18.0846 8.16602ZM18.668 17.8435L17.3321 16.5018C17.2776 16.4478 17.213 16.405 17.1419 16.376C17.0708 16.347 16.9947 16.3322 16.918 16.3327H9.91797C9.76326 16.3327 9.61489 16.2712 9.50549 16.1618C9.39609 16.0524 9.33464 15.9041 9.33464 15.7493V9.91602C9.33464 9.76131 9.39609 9.61293 9.50549 9.50354C9.61489 9.39414 9.76326 9.33268 9.91797 9.33268H18.0846C18.2393 9.33268 18.3877 9.39414 18.4971 9.50354C18.6065 9.61293 18.668 9.76131 18.668 9.91602V17.8435Z" fill="white"/>
                                    </svg>
                                    @elseif($notification->type == 'outbid')
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="14" cy="14" r="14" fill="#ED1C24"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7 14.0002C7.00024 10.6607 9.35944 7.78639 12.6348 7.1351C15.9102 6.48382 19.1895 8.23693 20.4673 11.3223C21.7451 14.4077 20.6655 17.966 17.8887 19.8212C15.1119 21.6764 11.4113 21.3117 9.05 18.9502C7.73728 17.6373 6.99987 15.8568 7 14.0002Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.8448 16.0946C10.5518 16.3874 10.5517 16.8623 10.8446 17.1552C11.1374 17.4482 11.6123 17.4483 11.9052 17.1554L10.8448 16.0946ZM14.5302 14.5314C14.8232 14.2386 14.8233 13.7637 14.5304 13.4708C14.2376 13.1778 13.7627 13.1777 13.4698 13.4706L14.5302 14.5314ZM13.4695 13.4709C13.1767 13.7639 13.1769 14.2388 13.4699 14.5315C13.7629 14.8243 14.2378 14.8241 14.5305 14.5311L13.4695 13.4709ZM17.1545 11.9051C17.4473 11.6121 17.4471 11.1372 17.1541 10.8445C16.8611 10.5517 16.3862 10.5519 16.0935 10.8449L17.1545 11.9051ZM14.5302 13.4706C14.2373 13.1777 13.7624 13.1778 13.4696 13.4708C13.1767 13.7637 13.1768 14.2386 13.4698 14.5314L14.5302 13.4706ZM16.0948 17.1554C16.3877 17.4483 16.8626 17.4482 17.1554 17.1552C17.4483 16.8623 17.4482 16.3874 17.1552 16.0946L16.0948 17.1554ZM13.4696 14.5312C13.7624 14.8242 14.2373 14.8243 14.5302 14.5314C14.8232 14.2386 14.8233 13.7637 14.5304 13.4708L13.4696 14.5312ZM11.9054 10.8448C11.6126 10.5518 11.1377 10.5517 10.8448 10.8446C10.5518 11.1374 10.5517 11.6123 10.8446 11.9052L11.9054 10.8448ZM11.9052 17.1554L14.5302 14.5314L13.4698 13.4706L10.8448 16.0946L11.9052 17.1554ZM14.5305 14.5311L17.1545 11.9051L16.0935 10.8449L13.4695 13.4709L14.5305 14.5311ZM13.4698 14.5314L16.0948 17.1554L17.1552 16.0946L14.5302 13.4706L13.4698 14.5314ZM14.5304 13.4708L11.9054 10.8448L10.8446 11.9052L13.4696 14.5312L14.5304 13.4708Z" fill="white"/>
                                    </svg>
                                    @endif
                                </span>
                                <div class="item-content">
                                    <h4>{{ $notification->title }} </h4>
                                    <h6> {{ $notification->message }}</h6>
                                </div>
                                <div class="notifi_time">
                                    <span>{{ getTimeAgo($notification->created_at->toDateTimeString()) }}</span> 
                                    <a href="javascript:void(0)" class="view_debtn">View</a>
                                    <!-- @if($notification->type == 'won_job')
                                        <a href="javascript:void(0)" data-href="{{ route('transporter.current_jobs', ['id' => $notification->reference_id]) }}" onclick="notificationStatus('{{ route('transporter.notification_status') }}', 'won_job', {{ $notification->user_quote_id }}, this);" class="view_debtn">View</a>
                                    @elseif($notification->type == 'message')
                                        <a href="javascript:void(0)" data-href="{{ route('transporter.messages', ['thread_id' => $notification->reference_id]) }}" onclick="notificationStatus('{{ route('transporter.notification_status') }}', 'message', {{ $notification->reference_id }}, this);" class="view_debtn">View</a>
                                    @elseif($notification->type == 'outbid')
                                        <a href="javascript:void(0)" data-href="{{ route('transporter.current_jobs', ['source' => 'notification', 'quote-id' => $notification->user_quote_id]) }}" onclick="notificationStatus('{{ route('transporter.notification_status') }}', 'outbid', {{ $notification->user_quote_id }}, this);" class="view_debtn">View</a>
                                    @endif -->
                                </div>
                            </div>
                            
                        </div>
                        @endif
                        @endforeach
                    @else
                    <div class="dropdown-item empty_notifiction" href="javascript:;">
                        <div class="no_notification">
                            <img src="{{asset('assets/images/no_notification.png')}}">
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <a class="menu-link profile_menu" href="{{route('transporter.profile')}}">
                <img src="{{checkFileExist(Auth::user()->profile_image)}}" alt="icon" />
                <h3>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h3>
            </a>
        </div>
        <button id="sidebarToggle">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</nav>