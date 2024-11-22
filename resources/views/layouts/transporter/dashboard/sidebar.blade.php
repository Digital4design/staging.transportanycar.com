<?php
$currentRoute = request()->route()->getName();
?>
<div id="sidebar-wrapper">
    <div class="top_menu">
        <div class="list-group" id="accordion">
            <a class="list-group-item @if ($currentRoute == 'transporter.dashboard') active @endif"
                href="{{ route('transporter.dashboard') }}">
                <span>
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.082 12.4527C11.0821 12.8635 11.2454 13.2575 11.5359 13.548C11.8264 13.8385 12.2204 14.0018 12.6313 14.0019C13.232 14.0019 13.7469 13.6566 14.0039 13.157L14.0082 13.1609L16.8363 8.05854L11.8715 11.1031L11.8762 11.1078C11.4047 11.3738 11.082 11.873 11.082 12.4527ZM18.8727 5.07065C17.2852 3.68315 15.234 2.79722 12.8902 2.66479V5.01909C14.8434 5.14331 15.9941 5.76362 17.1496 6.73159L18.8727 5.07065ZM19.9785 11.7187H22.3301C22.1723 9.37495 21.2555 7.44917 19.832 5.87105L18.1684 7.52456C19.1707 8.673 19.8301 10.1562 19.9785 11.7187Z"
                            fill="black" />
                        <path
                            d="M19.9895 12.8907C19.7406 16.7969 16.5043 19.895 12.5512 19.895C8.43594 19.895 4.96484 16.5575 4.96484 12.4426C4.96484 8.52544 8.20273 5.32036 11.7184 5.01958V2.66528C6.64023 2.96958 2.62109 7.24224 2.62109 12.4528C2.62109 17.8602 7.08203 22.2387 12.4895 22.2387C17.7363 22.2387 22.0949 17.9688 22.3453 12.8907H19.9895Z"
                            fill="black" />
                    </svg> Dashboard
                </span>
            </a>
            <a class="list-group-item @if ($currentRoute == 'transporter.profile') active @endif"
                href="{{ route('transporter.profile') }}">
                <span>
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.4997 0.586182C7.87133 0.589121 5.35143 1.63455 3.49287 3.49311C1.63431 5.35167 0.588876 7.87158 0.585938 10.5C0.590341 13.1279 1.63624 15.647 3.49448 17.5052C5.35273 19.3635 7.87178 20.4094 10.4997 20.4138C13.129 20.4138 15.6506 19.3693 17.5098 17.5101C19.369 15.6509 20.4135 13.1293 20.4135 10.5C20.4135 7.87067 19.369 5.34906 17.5098 3.48986C15.6506 1.63067 13.129 0.586182 10.4997 0.586182ZM16.5297 16.2206C15.9729 15.0976 15.1134 14.1525 14.0481 13.492C12.9827 12.8315 11.754 12.4818 10.5005 12.4825C9.24706 12.4832 8.01872 12.8341 6.95409 13.4957C5.88946 14.1574 5.03091 15.1034 4.47532 16.227C2.99294 14.6895 2.16694 12.6356 2.17214 10.5C2.17214 8.29136 3.04951 6.17321 4.61124 4.61148C6.17296 3.04976 8.29112 2.17239 10.4997 2.17239C12.7083 2.17239 14.8265 3.04976 16.3882 4.61148C17.9499 6.17321 18.8273 8.29136 18.8273 10.5C18.8323 12.6327 18.0084 14.6839 16.5297 16.2206ZM10.4997 4.5517C9.79386 4.5517 9.10383 4.76101 8.51692 5.15318C7.93001 5.54534 7.47256 6.10274 7.20244 6.75488C6.93231 7.40702 6.86163 8.12462 6.99934 8.81694C7.13705 9.50925 7.47696 10.1452 7.97609 10.6443C8.47522 11.1434 9.11115 11.4833 9.80346 11.6211C10.4958 11.7588 11.2134 11.6881 11.8655 11.418C12.5177 11.1478 13.0751 10.6904 13.4672 10.1035C13.8594 9.51656 14.0687 8.82654 14.0687 8.12066C14.0687 7.65198 13.9764 7.18789 13.797 6.75488C13.6177 6.32187 13.3548 5.92843 13.0234 5.59702C12.692 5.26562 12.2985 5.00273 11.8655 4.82337C11.4325 4.64401 10.9684 4.5517 10.4997 4.5517Z"
                            fill="black" />
                    </svg> Profile
                </span>
            </a>
            <div class="side_dropdown">
                <a class="list-group-item btn btn-link @if ($currentRoute == 'transporter.current_jobs' || $currentRoute == 'transporter.new_jobs_new') active @endif"
                    href="javascript:;" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                    aria-controls="collapseOne">
                    <span>
                        <div class="noti_info_icon @if ($newQuotesCount > 99) ? job_icon : '' @endif">
                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.9 3H15C15 1.3 13.7 0 12 0H8C6.3 0 5 1.3 5 3H3.1C1.4 3 0 4.4 0 6.1V7.1C0 8 0.4 8.8 1 9.4V14C1 16.2 2.8 18 5 18H15C17.2 18 19 16.2 19 14V9.5C19.6 8.9 20 8.1 20 7.2V6.2C20 4.4 18.6 3 16.9 3ZM8 2H12C12.6 2 13 2.4 13 3H7C7 2.4 7.4 2 8 2ZM2 6.1C2 5.5 2.5 5 3.1 5H16.9C17.5 5 18 5.5 18 6.1V7.1C18 7.5 17.8 7.9 17.4 8.2C17.3 8.3 17.1 8.4 17 8.4L11 9.7C10.9 9.3 10.5 8.9 10 8.9C9.5 8.9 9.2 9.2 9 9.7L3 8.4C2.8 8.4 2.7 8.3 2.6 8.2H2.5C2.2 8 2 7.6 2 7.1V6.1ZM17 14C17 15.1 16.1 16 15 16H5C3.9 16 3 15.1 3 14V10.5L9 11.8V12C9 12.6 9.4 13 10 13C10.6 13 11 12.6 11 12V11.8L17 10.5V14Z"
                                    fill="black" />
                            </svg>
                            @if ($newQuotesCount >= 1)
                                <small>{{ $newQuotesCount > 99 ? '99+' : $newQuotesCount }}</small>
                            @endif
                        </div>
                        Jobs
                    </span>
                    <span class="down-list">
                        <svg width="12" height="7" viewBox="0 0 12 7" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6 6L11 1" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <ul>
                            <li><a href="{{ route('transporter.new_jobs_new') }}">Find jobs @if ($totalQuotes > 0)
                                        ({{ $totalQuotes }})
                                    @endif
                                </a></li>
                            {{--                            <li><a href="{{route('transporter.new_jobs')}}">Find jobs</a></li> --}}
                            <li><a href="{{ route('transporter.current_jobs') }}">My jobs</a></li>
                            <li><a href="{{ route('transporter.watchlist.index') }}">Watchlist</a></li>
                            <li><a href="{{ route('transporter.view.save.search') }}">Saved searches</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <a class="list-group-item @if ($currentRoute == 'transporter.messages') active @endif"
                href="{{ route('transporter.messages') }}">
                <span>
                    <div class="noti_info_icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11 9H5C4.73478 9 4.48043 9.10536 4.29289 9.29289C4.10536 9.48043 4 9.73478 4 10C4 10.2652 4.10536 10.5196 4.29289 10.7071C4.48043 10.8946 4.73478 11 5 11H11C11.2652 11 11.5196 10.8946 11.7071 10.7071C11.8946 10.5196 12 10.2652 12 10C12 9.73478 11.8946 9.48043 11.7071 9.29289C11.5196 9.10536 11.2652 9 11 9ZM15 5H5C4.73478 5 4.48043 5.10536 4.29289 5.29289C4.10536 5.48043 4 5.73478 4 6C4 6.26522 4.10536 6.51957 4.29289 6.70711C4.48043 6.89464 4.73478 7 5 7H15C15.2652 7 15.5196 6.89464 15.7071 6.70711C15.8946 6.51957 16 6.26522 16 6C16 5.73478 15.8946 5.48043 15.7071 5.29289C15.5196 5.10536 15.2652 5 15 5ZM17 0H3C2.20435 0 1.44129 0.316071 0.87868 0.87868C0.316071 1.44129 0 2.20435 0 3V13C0 13.7956 0.316071 14.5587 0.87868 15.1213C1.44129 15.6839 2.20435 16 3 16H14.59L18.29 19.71C18.3834 19.8027 18.4943 19.876 18.6161 19.9258C18.7379 19.9755 18.8684 20.0008 19 20C19.1312 20.0034 19.2613 19.976 19.38 19.92C19.5626 19.845 19.7189 19.7176 19.8293 19.5539C19.9396 19.3901 19.999 19.1974 20 19V3C20 2.20435 19.6839 1.44129 19.1213 0.87868C18.5587 0.316071 17.7956 0 17 0ZM18 16.59L15.71 14.29C15.6166 14.1973 15.5057 14.124 15.3839 14.0742C15.2621 14.0245 15.1316 13.9992 15 14H3C2.73478 14 2.48043 13.8946 2.29289 13.7071C2.10536 13.5196 2 13.2652 2 13V3C2 2.73478 2.10536 2.48043 2.29289 2.29289C2.48043 2.10536 2.73478 2 3 2H17C17.2652 2 17.5196 2.10536 17.7071 2.29289C17.8946 2.48043 18 2.73478 18 3V16.59Z"
                                fill="black" />
                        </svg>
                        @if ($unseenMessageCount >= 1)
                            <small>{{ $unseenMessageCount }}</small>
                        @endif
                    </div>
                    Messages
                </span>
            </a>
            <a class="list-group-item logout_btn @if ($currentRoute == 'transporter.feedback') active @endif"
                href="{{ route('transporter.feedback') }}">
                <span>
                    <div class="noti_info_icon">
                        <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 20H17C17.83 20 18.54 19.5 18.84 18.78L21.86 11.73C21.95 11.5 22 11.26 22 11V9C22 7.9 21.1 7 20 7H13.69L14.64 2.43L14.67 2.11C14.67 1.7 14.5 1.32 14.23 1.05L13.17 0L6.58 6.59C6.22 6.95 6 7.45 6 8V18C6 19.1 6.9 20 8 20ZM8 8L12.34 3.66L11 9H20V11L17 18H8V8ZM0 8H4V20H0V8Z"
                                fill="black" />
                        </svg>
                        @if ($unseenFeedback >= 1)
                            <small>{{ $unseenFeedback }}</small>
                        @endif
                    </div>
                    Feedback
                </span>
            </a>
            {{-- <a class="list-group-item manage_notification @if ($currentRoute == 'transporter.manage_notification') active @endif"
                href="{{ route('transporter.manage_notification') }}">
                <span>
                    <div class="noti_info_icon">
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                              d="M10.5 21C11.9487 21 13.1238 19.8249 13.1238 18.375H7.87626C7.87626 19.8249 9.05136 21 10.5 21ZM19.3344 14.8596C18.542 14.0081 17.0592 12.7271 17.0592 8.53125C17.0592 5.34434 14.8247 2.79316 11.8117 2.16727V1.3125C11.8117 0.587754 11.2244 0 10.5 0C9.77569 0 9.18835 0.587754 9.18835 1.3125V2.16727C6.17534 2.79316 3.94081 5.34434 3.94081 8.53125C3.94081 12.7271 2.45809 14.0081 1.66567 14.8596C1.41958 15.1241 1.31048 15.4403 1.31253 15.75C1.31704 16.4227 1.84491 17.0625 2.62913 17.0625H18.3709C19.1551 17.0625 19.6834 16.4227 19.6875 15.75C19.6896 15.4403 19.5805 15.1237 19.3344 14.8596Z"
                              fill="none"
                              stroke="black"
                              stroke-width="2"
                            />
                          </svg>
                          
                    </div>
                    Manage Notificaton
                </span>
            </a> --}}
            <a class="list-group-item works-btn @if ($currentRoute == 'transporter.howItWork') active @endif"
                href="{{ route('transporter.howItWork') }}">
                <span>
                    <div class="noti_info_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24"
                            fill="none">
                            <g id="Xnix/Line/Megaphone_2">
                                <g id="Vector">
                                    <path id="Vector-57" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2 8.9235L16.3463 5.23096V18.7691L10.5094 17.1863C10.6063 18.608 9.54706 19.8508 8.11137 20C6.6492 19.8438 5.58258 18.5614 5.71221 17.1154V16.1315L2 15.0766V8.9235Z"
                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path id="Vector-58"
                                        d="M24.0003 12.3222C24.5526 12.3222 25.0003 11.8745 25.0003 11.3222C25.0003 10.7699 24.5526 10.3222 24.0003 10.3222V12.3222ZM21.842 10.3222C21.2897 10.3222 20.842 10.7699 20.842 11.3222C20.842 11.8745 21.2897 12.3222 21.842 12.3222V10.3222ZM20.7642 18.122C21.1548 18.5125 21.7879 18.5124 22.1784 18.1218C22.5689 17.7312 22.5688 17.0981 22.1782 16.7076L20.7642 18.122ZM20.6544 15.1842C20.2639 14.7937 19.6307 14.7938 19.2402 15.1844C18.8498 15.5749 18.8498 16.2081 19.2404 16.5986L20.6544 15.1842ZM22.18 5.93847C22.5709 5.54829 22.5714 4.91512 22.1813 4.52426C21.7911 4.13339 21.1579 4.13283 20.767 4.52301L22.18 5.93847ZM19.2409 6.04643C18.8501 6.43661 18.8495 7.06977 19.2397 7.46064C19.6299 7.85151 20.263 7.85207 20.6539 7.46189L19.2409 6.04643ZM17.3467 18.7692C17.3467 18.2169 16.899 17.7692 16.3467 17.7692C15.7944 17.7692 15.3467 18.2169 15.3467 18.7692H17.3467ZM15.3467 20C15.3467 20.5523 15.7944 21 16.3467 21C16.899 21 17.3467 20.5523 17.3467 20H15.3467ZM15.3466 5.23085C15.3466 5.78313 15.7943 6.23085 16.3466 6.23085C16.8989 6.23085 17.3466 5.78313 17.3466 5.23085H15.3466ZM17.3466 4C17.3466 3.44772 16.8989 3 16.3466 3C15.7943 3 15.3466 3.44772 15.3466 4H17.3466ZM1 8.92335C1 9.47563 1.44772 9.92335 2 9.92335C2.55228 9.92335 3 9.47563 3 8.92335H1ZM3 7.6925C3 7.14021 2.55228 6.6925 2 6.6925C1.44772 6.6925 1 7.14021 1 7.6925H3ZM1 16.3072C1 16.8595 1.44772 17.3072 2 17.3072C2.55228 17.3072 3 16.8595 3 16.3072H1ZM3 15.0764C3 14.5241 2.55228 14.0764 2 14.0764C1.44772 14.0764 1 14.5241 1 15.0764H3ZM5.92732 15.1546C5.38792 15.036 4.8545 15.3771 4.73589 15.9165C4.61728 16.4559 4.9584 16.9893 5.4978 17.1079L5.92732 15.1546ZM10.295 18.1628C10.8344 18.2814 11.3678 17.9403 11.4864 17.4009C11.605 16.8615 11.2639 16.328 10.7245 16.2094L10.295 18.1628ZM24.0003 10.3222H21.842V12.3222H24.0003V10.3222ZM22.1782 16.7076L20.6544 15.1842L19.2404 16.5986L20.7642 18.122L22.1782 16.7076ZM20.767 4.52301L19.2409 6.04643L20.6539 7.46189L22.18 5.93847L20.767 4.52301ZM15.3467 18.7692V20H17.3467V18.7692H15.3467ZM17.3466 5.23085V4H15.3466V5.23085H17.3466ZM3 8.92335V7.6925H1V8.92335H3ZM3 16.3072V15.0764H1V16.3072H3ZM5.4978 17.1079L10.295 18.1628L10.7245 16.2094L5.92732 15.1546L5.4978 17.1079Z"
                                        fill="black" />
                                </g>
                            </g>
                        </svg>
                    </div>
                    How it works
                </span>
            </a>
        </div>
    </div>
    <ul class="bottom_menu">
        <li>
            <a href="javascript:;" data-toggle="modal" data-target="#help">
                <span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14.5809 19.4041C14.6644 19.9894 14.2604 20.5326 13.6759 20.6211L11.9999 20.9841C11.6306 21.1187 11.2167 21.0265 10.9396 20.7477C10.6625 20.469 10.5727 20.0546 10.7096 19.6861C10.8464 19.3176 11.185 19.0623 11.5769 19.0321L13.2519 18.6701C13.8212 18.509 14.414 18.8364 14.5809 19.4041V19.4041Z"
                            stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7 15.9919C5.89543 15.9919 5 15.0965 5 13.9919V10.9919C5 9.88737 5.89543 8.99194 7 8.99194C8.10457 8.99194 9 9.88737 9 10.9919V13.9919C9 15.0965 8.10457 15.9919 7 15.9919Z"
                            stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M17 15.9919C15.8954 15.9919 15 15.0965 15 13.9919V10.9919C15 9.88737 15.8954 8.99194 17 8.99194C18.1046 8.99194 19 9.88737 19 10.9919V13.9919C19 15.0965 18.1046 15.9919 17 15.9919Z"
                            stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M18 11C18 11.5523 18.4477 12 19 12C19.5523 12 20 11.5523 20 11H18ZM4 11C4 11.5523 4.44772 12 5 12C5.55228 12 6 11.5523 6 11H4ZM20 14.003C20.0017 13.4508 19.5553 13.0017 19.003 13C18.4508 12.9983 18.0017 13.4447 18 13.997L20 14.003ZM13.4567 19.6511C12.9177 19.7717 12.5786 20.3063 12.6991 20.8453C12.8197 21.3843 13.3543 21.7234 13.8933 21.6029L13.4567 19.6511ZM20 11V9H18V11H20ZM20 9C20 4.58172 16.4183 1 12 1V3C15.3137 3 18 5.68629 18 9H20ZM12 1C7.58172 1 4 4.58172 4 9H6C6 5.68629 8.68629 3 12 3V1ZM4 9V11H6V9H4ZM18 13.997C17.9917 16.7114 16.1057 19.0586 13.4567 19.6511L13.8933 21.6029C17.4538 20.8065 19.9889 17.6515 20 14.003L18 13.997Z"
                            fill="black" />
                    </svg> Help & support
                </span>
            </a>
        </li>
    </ul>
</div>
<!-- modal -->
<div class="modal help_bx fade" id="help" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    <svg width="23" height="22" viewBox="0 0 23 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15.0484 18.4041C15.1633 18.9894 14.6078 19.5326 13.8041 19.6211L11.4996 19.9841C10.9918 20.1187 10.4228 20.0265 10.0418 19.7477C9.66074 19.469 9.53726 19.0546 9.72543 18.6861C9.9136 18.3176 10.3791 18.0623 10.9179 18.0321L13.2211 17.6701C14.0039 17.509 14.819 17.8364 15.0484 18.4041V18.4041Z"
                            stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M4.625 14.9919C3.10622 14.9919 1.875 14.0965 1.875 12.9919V9.99194C1.875 8.88737 3.10622 7.99194 4.625 7.99194C6.14378 7.99194 7.375 8.88737 7.375 9.99194V12.9919C7.375 14.0965 6.14378 14.9919 4.625 14.9919Z"
                            stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M18.375 14.9919C16.8562 14.9919 15.625 14.0965 15.625 12.9919V9.99194C15.625 8.88737 16.8562 7.99194 18.375 7.99194C19.8938 7.99194 21.125 8.88737 21.125 9.99194V12.9919C21.125 14.0965 19.8938 14.9919 18.375 14.9919Z"
                            stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M20.125 10C20.125 10.5523 20.5727 11 21.125 11C21.6773 11 22.125 10.5523 22.125 10H20.125ZM0.875 10C0.875 10.5523 1.32272 11 1.875 11C2.42728 11 2.875 10.5523 2.875 10H0.875ZM22.125 13.0042C22.1273 12.4519 21.6815 12.0023 21.1292 12C20.5769 11.9977 20.1273 12.4435 20.125 12.9958L22.125 13.0042ZM13.6426 18.64C13.0974 18.7287 12.7274 19.2424 12.8161 19.7876C12.9048 20.3327 13.4186 20.7027 13.9637 20.614L13.6426 18.64ZM22.125 10V8H20.125V10H22.125ZM22.125 8C22.125 5.66824 20.8235 3.64471 18.8941 2.24152C16.9637 0.837611 14.3463 0 11.5 0V2C13.9695 2 16.1645 2.72939 17.7177 3.85899C19.2719 4.9893 20.125 6.46576 20.125 8H22.125ZM11.5 0C8.65373 0 6.0363 0.837611 4.10593 2.24152C2.17653 3.64471 0.875 5.66824 0.875 8H2.875C2.875 6.46576 3.7281 4.9893 5.28227 3.85899C6.83546 2.72939 9.03053 2 11.5 2V0ZM0.875 8V10H2.875V8H0.875ZM20.125 12.9958C20.1146 15.4819 17.6666 17.9854 13.6426 18.64L13.9637 20.614C18.4777 19.8797 22.1088 16.881 22.125 13.0042L20.125 12.9958Z"
                            fill="black" />
                    </svg>
                    Help & support
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.93934 15.9393C0.353553 16.5251 0.353553 17.4749 0.93934 18.0607C1.52513 18.6464 2.47487 18.6464 3.06066 18.0607L0.93934 15.9393ZM10.5607 10.5607C11.1464 9.97487 11.1464 9.02513 10.5607 8.43934C9.97487 7.85355 9.02513 7.85355 8.43934 8.43934L10.5607 10.5607ZM8.43934 8.43934C7.85355 9.02513 7.85355 9.97487 8.43934 10.5607C9.02513 11.1464 9.97487 11.1464 10.5607 10.5607L8.43934 8.43934ZM18.0607 3.06066C18.6464 2.47487 18.6464 1.52513 18.0607 0.93934C17.4749 0.353553 16.5251 0.353553 15.9393 0.93934L18.0607 3.06066ZM10.5607 8.43934C9.97487 7.85355 9.02513 7.85355 8.43934 8.43934C7.85355 9.02513 7.85355 9.97487 8.43934 10.5607L10.5607 8.43934ZM15.9393 18.0607C16.5251 18.6464 17.4749 18.6464 18.0607 18.0607C18.6464 17.4749 18.6464 16.5251 18.0607 15.9393L15.9393 18.0607ZM8.43934 10.5607C9.02513 11.1464 9.97487 11.1464 10.5607 10.5607C11.1464 9.97487 11.1464 9.02513 10.5607 8.43934L8.43934 10.5607ZM3.06066 0.93934C2.47487 0.353553 1.52513 0.353553 0.93934 0.93934C0.353553 1.52513 0.353553 2.47487 0.93934 3.06066L3.06066 0.93934ZM3.06066 18.0607L10.5607 10.5607L8.43934 8.43934L0.93934 15.9393L3.06066 18.0607ZM10.5607 10.5607L18.0607 3.06066L15.9393 0.93934L8.43934 8.43934L10.5607 10.5607ZM8.43934 10.5607L15.9393 18.0607L18.0607 15.9393L10.5607 8.43934L8.43934 10.5607ZM10.5607 8.43934L3.06066 0.93934L0.93934 3.06066L8.43934 10.5607L10.5607 8.43934Z"
                                fill="#CFCFCF" />
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_support" action="{{ route('transporter.help_and_support') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" aria-describedby="emailHelp" name="name"
                            placeholder="Name*" value="{{ \Auth::user()->username }}" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" aria-describedby="emailHelp" name="email"
                            placeholder="Email*" value="{{ \Auth::user()->email }}" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" aria-describedby="emailHelp" name="mobile"
                            placeholder="Phone*" value="{{ \Auth::user()->mobile }}" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" placeholder="How can we help?"></textarea>

                    </div>
                    <div class="form-group">
                        <button class="send_btn" type="submit">
                            Send message
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.7637 3.65899L15.2551 15.4895C15.0658 16.3244 14.5722 16.5322 13.8709 16.1389L10.0486 13.3223L8.20428 15.0961C8.00018 15.3002 7.82947 15.4709 7.43611 15.4709L7.71072 11.5781L14.7949 5.17676C15.1029 4.90215 14.7281 4.75 14.3162 5.02461L5.55838 10.5391L1.78807 9.35899C0.967949 9.10293 0.953105 8.53887 1.95877 8.14551L16.706 2.46406C17.3888 2.20801 17.9863 2.61621 17.7637 3.65899Z"
                                    fill="white" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Start Maintaince model comment by kartikd4d --->
{{-- <div class="modal fade" id="importantNoticeModal" tabindex="-1" role="dialog" aria-labelledby="importantNoticeLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content maintaince_text">
      <div class="modal-header">
        <h5 class="modal-title" id="importantNoticeLabel">Important Notice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        <p>The website is currently undergoing maintenance as there have been some technical issues and bugs that need to be fixed. There will not be any new jobs posted on the find jobs section until the bugs have been resolved.</p>
        <p>Whilst we are fixing the technical issues, we are also taking the opportunity to make improvements to the site that you may notice when pushed live. We will notify you by email and SMS as soon as the site is back up and running.</p>
        <h5>New features:</h5>
        <ul>
          <li><strong>Outbid alerts:</strong> You can opt in to receive emails when you have been outbid.</li>
          <li><strong>Saved searches:</strong> You can save your searches and opt in to receive email notifications each time a job gets posted that matches your saved search.</li>
          <li><strong>Watchlist:</strong> You can choose to watch jobs and they will go into your watchlist.</li>
          <li><strong>Notification panel:</strong> See all of your alerts in one place; outbids, messages, booking confirmations, saved search alerts.</li>
        </ul>
        <p>Thank you for your patience.</p>
        <p>Kind regards,<br>Transport Any Car Team</p>
        <p>If you have any questions, please email us at<b> <a href="mailto:support@transportanycar.com">support@transportanycar.com</a></b></p>
        <p>You can download the <b>how it works</b> guide <a href="/uploads/transport_any_car_how_it _works.pdf" target="_blank">here.</a></p>
      </div>
    </div>
  </div>
</div> --}}
<!--- End maintaince model --->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#form_support').validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                mobile: {
                    required: true,
                    number: true
                },
                message: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Please enter your name"
                },
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },
                mobile: {
                    required: "Please enter your phone number",
                    number: "Please enter a valid phone number"
                },
                message: {
                    required: "Please enter your message"
                }
            },
            submitHandler: function(form) {
                event.preventDefault();
                $('.send_btn').attr('disabled', true).text('Please wait!..');
                var formData = $(form).serialize();
                var actionUrl = $(form).attr('action');
                $.ajax({
                    type: 'POST',
                    url: actionUrl,
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: '<span class="help-title">Message Sent</span>',
                                html: '<span class="help-text">We will contact you ASAP.</span>',
                                confirmButtonColor: '#52D017',
                                confirmButtonText: 'OK',
                                customClass: {
                                    title: 'swal-title',
                                    htmlContainer: 'swal-text-container',
                                    popup: 'swal-popup'
                                },
                                showCloseButton: true,
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            // Show SweetAlert error message
                            Swal.fire({
                                title: '<span class="help-title">Error</span>',
                                html: '<span class="help-text">' + response
                                    .message + '</span>',
                                confirmButtonColor: '#d33',
                                confirmButtonText: 'OK',
                                customClass: {
                                    title: 'swal-title',
                                    htmlContainer: 'swal-text-container',
                                    popup: 'swal-popup'
                                },
                                showCloseButton: true,
                                allowOutsideClick: false
                            });
                        }
                        $('.send_btn').attr('disabled', false).text('Submit');
                    },
                    error: function(xhr) {
                        // Handle error response
                        Swal.fire({
                            title: '<span class="help-title">An Error Occurred</span>',
                            html: '<span class="help-text">Please try again.</span>',
                            confirmButtonColor: '#d33',
                            confirmButtonText: 'OK',
                            customClass: {
                                title: 'swal-title',
                                htmlContainer: 'swal-text-container',
                                popup: 'swal-popup'
                            },
                            showCloseButton: true,
                            allowOutsideClick: false
                        });
                    }
                });
            }
        });

        $(document).on('click', '.checkStatus', function(e) {
            var isStatus = "{{ Auth::user()->is_status }}";
            var email_status = "{{ Auth::user()->email_verify_status }}";
            var driver_license = "{{ Auth::user()->driver_license }}";
            var goods_in_transit_insurance = "{{ Auth::user()->goods_in_transit_insurance }}";

            var companyDetails = @json(optional(Auth::user()->companyDetail)->id);
            var git_insurance_cover = @json(optional(Auth::user()->companyDetail)->git_insurance_cover ?? null);
            var years_established = @json(optional(Auth::user()->companyDetail)->years_established ?? null);
            var no_of_tow_trucks = @json(optional(Auth::user()->companyDetail)->no_of_tow_trucks ?? null);
            var no_of_drivers = @json(optional(Auth::user()->companyDetail)->no_of_drivers ?? null);

            if (driver_license == null && goods_in_transit_insurance == null && email_verify_status == '0') {
                e.preventDefault();
                Swal.fire({
                    title: '<span class="swal-title" style="color:#ED1C24">Verify your account</span>',
                    html: '<span class="swal-text"> You must upload your drivers license,goods in transit insurance,verify your email and complete your company details within your profile before you are able to bid for jobs.</span>',
                    confirmButtonColor: '#52D017',
                    confirmButtonText: 'Verify',
                    customClass: {
                        title: 'swal-title',
                        htmlContainer: 'swal-text-container',
                        popup: 'swal-popup', // Add custom class for the popup
                        cancelButton: 'swal-button--cancel' // Add custom class for the cancel button
                    },
                    showCloseButton: true, // Add this line to show the close button
                    showConfirmButton: true, // Add this line to hide the confirm button
                    allowOutsideClick: false
                }).then((result) => {
                    // Redirect to the dashboard if the confirm button or close button is clicked
                    if (result.isConfirmed || result.dismiss) {
                        window.location.href =
                        "{{ route('transporter.profile') }}"; // Change this to your actual dashboard URL
                    }
                });
            } else if (driver_license == null || goods_in_transit_insurance == null) {
                e.preventDefault();
                Swal.fire({
                    title: '<span class="swal-title" style="color:#ED1C24">Upload documents</span>',
                    html: '<span class="swal-text"> You must upload a valid driving license, goods in transist insurance within your profile before you are able to bids for jobs.</span>',
                    confirmButtonColor: '#52D017',
                    confirmButtonText: 'Verify',
                    customClass: {
                        title: 'swal-title',
                        htmlContainer: 'swal-text-container',
                        popup: 'swal-popup', // Add custom class for the popup
                        cancelButton: 'swal-button--cancel' // Add custom class for the cancel button
                    },
                    showCloseButton: true, // Add this line to show the close button
                    showConfirmButton: true, // Add this line to hide the confirm button
                    allowOutsideClick: false
                }).then((result) => {
                    // Redirect to the dashboard if the confirm button or close button is clicked
                    if (result.isConfirmed || result.dismiss) {
                        window.location.href =
                        "{{ route('transporter.profile') }}"; // Change this to your actual dashboard URL
                    }
                });
            } else if (email_verify_status == '0') {
                e.preventDefault();
                Swal.fire({
                    title: '<span class="swal-title" style="color:#ED1C24">Verify your email</span>',
                    html: '<span class="swal-text"> You must verify your email address within your profile before you are able to bid for jobs.</span>',
                    confirmButtonColor: '#52D017',
                    confirmButtonText: 'Verify',
                    customClass: {
                        title: 'swal-title',
                        htmlContainer: 'swal-text-container',
                        popup: 'swal-popup', // Add custom class for the popup
                        cancelButton: 'swal-button--cancel' // Add custom class for the cancel button
                    },
                    showCloseButton: true, // Add this line to show the close button
                    showConfirmButton: true, // Add this line to hide the confirm button
                    allowOutsideClick: false
                }).then((result) => {
                    // Redirect to the dashboard if the confirm button or close button is clicked
                    if (result.isConfirmed || result.dismiss) {
                        window.location.href =
                        "{{ route('transporter.profile') }}"; // Change this to your actual dashboard URL
                    }
                });

            }
            else if(companyDetails === null || git_insurance_cover === null || years_established === null || no_of_tow_trucks === null || no_of_drivers === null)
            {
                Swal.fire({
                    title: '<span class="swal-title" style="color:#ED1C24">Complete your profile</span>',
                    html: '<span class="swal-text"> You must upload your drivers license, goods in transit insurance, verify your email and complete your company details within your profile before you are able to bid for jobs.</span>',
                    confirmButtonColor: '#52D017',
                    confirmButtonText: 'Go to profile',
                    customClass: {
                        title: 'swal-title',
                        htmlContainer: 'swal-text-container',
                        popup: 'swal-popup', // Add custom class for the popup
                        cancelButton: 'swal-button--cancel' // Add custom class for the cancel button
                    },
                    showCloseButton: true, // Add this line to show the close button
                    showConfirmButton: true, // Add this line to hide the confirm button
                    allowOutsideClick: false
                }).then((result) => {
                    // Redirect to the dashboard if the confirm button or close button is clicked
                    if (result.isConfirmed || result.dismiss) {
                        window.location.href =
                        "{{ route('transporter.profile') }}"; // Change this to your actual dashboard URL
                    }
                });
            } 
            else if (isStatus == 'pending' || isStatus == 'rejected') {
                e.preventDefault();
                Swal.fire({
                    title: '<span class="swal-title" style="color:#ED1C24">Awaiting Approval</span>',
                    html: '<span class="swal-text">Sorry you can not bid on any jobs until your account has been approved.</span>',
                    confirmButtonColor: '#52D017',
                    confirmButtonText: 'Dismiss',
                    customClass: {
                        title: 'swal-title',
                        htmlContainer: 'swal-text-container',
                        popup: 'swal-popup', // Add custom class for the popup
                        cancelButton: 'swal-button--cancel' // Add custom class for the cancel button
                    },
                    showCloseButton: true, // Add this line to show the close button
                    showConfirmButton: true, // Add this line to hide the confirm button
                    allowOutsideClick: false
                }).then((result) => {
                    // Redirect to the dashboard if the confirm button or close button is clicked
                    if (result.isConfirmed || result.dismiss) {
                        window.location.href =
                        "{{ route('transporter.dashboard') }}"; // Change this to your actual dashboard URL
                    }
                });
            } else {
                if (isStatus != 'approved') {
                    e.preventDefault();
                    Swal.fire({
                        html: `
                      <div style="text-align: center;">
                          <h2>Upload Documents.</h2>
                          <p>You must upload a valid driving license, goods in transist insurance within your profile before you are able to bids for jobs.</p>
                          <button id="verifyActionBtn" style="background-color: #52D017; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
                              Verify
                          </button>
                      </div>
                  `,
                        showConfirmButton: false, // Hide the default "OK" button
                        width: '400px',
                        padding: '20px',
                        background: '#fff',
                        customClass: {
                            popup: 'swal2-popup-custom',
                            htmlContainer: 'swal-desc-container',
                        },
                        allowOutsideClick: false, // Prevent modal from closing when clicking outside
                        didOpen: () => {
                            document.getElementById('verifyActionBtn').addEventListener(
                                'click',
                                function() {
                                    window.location.href =
                                        "{{ route('transporter.profile') }}"; // Change to your profile page URL
                                });
                        }
                    });
                } else {}
            }
        });

        // Check if the current URL contains 'dashboard' or 'profile'
        //if (window.location.href.indexOf('dashboard') > -1 || window.location.href.indexOf('profile') > -1) {
        $('#importantNoticeModal').modal('show');
        //}
    });
    // $('.maintaince_mode').on('click',function(e) {
    //   e.preventDefault();
    //     Swal.fire({
    //         title: '<span>Under maintenance</span>',
    //         html: '<span class="swal-text">Apologies for any inconvenience, this is currently under maintenance and will be back up and running shortly.</span>',
    //         confirmButtonColor: '#52D017',
    //         confirmButtonText: 'Dismiss',
    //         customClass: {
    //               title: 'swal-title',
    //               htmlContainer: 'swal-text-container',
    //               popup: 'swal-popup', // Add custom class for the popup
    //               cancelButton: 'swal-button--cancel' // Add custom class for the cancel button
    //         },
    //         showCloseButton: true, // Add this line to show the close button
    //         showConfirmButton: true, // Add this line to hide the confirm button
    //         allowOutsideClick: false
    //       });
    //   });
</script>
<script>
    function handleNotificationClick(event, element) {
        event.preventDefault();
        const url = '{{ route('transporter.notification_status') }}';
        const type = $(element).data('type');
        const id = $(element).data('id');
        const redirectUrl = $(element).data('href');
        notificationStatus(url, type, id, redirectUrl);
    }

    function notificationStatus(url, type, id, redirectUrl) {
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                type: type,
                quote_id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function() {
                window.location.href = redirectUrl;
            },
            error: function(xhr) {
                console.error('Status update failed:', xhr);
            }
        });
    }
</script>
