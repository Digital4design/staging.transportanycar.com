@extends('layouts.web.dashboard.app')

@section('head_css')
@endsection
<style>
    .wd_leave_bx {
        padding:0!important;
        box-shadow: none!important;
        background: transparent!important;
        border: none!important;
    }
    .leave_inner h2 {
        font-size: 16px !important;
    }

    .leave_img img {
        object-fit: cover;
    }

    .feedback-error {
        color: red !important;
        font-size: 12px !important;
        margin-top: -22px;
        font-family: auto !important;
    }

    .verified_btns {
        font-size: 12px;
        font-weight: 500;
        color: #52D017;
    }

    .leave_inner_img::after {
        display: none;
    }

    .quote-accepted {
        font-size: 14px !important;
        color: #000000;
    }

    ul.lve_rate li {
        gap: 10px;
        margin-bottom: 0 !important;
    }

    ul.lve_rate li h5 {
        font-weight: 500;
        font-size: 16px;
        color: #000000;
    }

    .leave_inner .form-group label {
        font-size: 16px !important;
    }

    .leave_inner .form-group textarea {
        border: 1px solid #D9D9D9 !important;
        padding: 5px 10px !important;
        font-size: 14px;
        font-weight: 300;
        color: #C3C3C3;
    }

    button.lve_feed_btn {
        font-size: 14px;
        padding: 7px 60px !important;
    }

    .leave_txt h4 {
        color: #000000 !important;
    }

    .leave_rating {
        font-size: 12px !important;
        margin-bottom: 5px !important;
    }

    .lve_rate li {
        justify-content: flex-start !important;
    }

    ul.lve_rate li .starrating svg {
        width: 23px;
    }

    .lve_rate li .starrating label {
        margin-bottom: 2px !important;
    }

    ul.lve_rate li .starrating {
        gap: 2px;
        padding-right: 0 !important;
    }

    @media(max-width: 580px) {


        .user_feedback .wd_leave_bx {
            border: none;
            background: #fff;
            box-shadow: none;
            padding: 0;
        }

        .leave_body {
            padding: 20px !important;
            border-top: 0 !important;
        }

        .leave_rgt {
            width: 64%;
            justify-content: flex-end;
        }

        /* .leave_txt h4 {
            font-size: 18px !important;
            color: #000000 !important;
        } */



        .leave_body .leave_tabs span {
            font-size: 16px;
            margin-bottom: 15px;
            color: #606060;
        }

        .leave_body .leave_tabs p {
            font-size: 16px;
            line-height: 25px;
            color: #606060;
        }

        /* .leave_tabs {
            padding-top: 15px;
        } */

        .leave_tabs ul.nav li.nav-item {
            width: 100%;
        }

        .leave_tabs ul.nav li.nav-item a.nav-link {
            margin-bottom: 0;
        }




        /* ul.lve_rate li h5 {
            font-size: 16px;
            color: #000000;
        } */

        ul.lve_rate .starrating span {
            font-size: 16px;
        }

        /* ul.lve_rate li {
            margin-bottom: 4px;
        } */

        .leave_tabs ul.nav {
            margin-bottom: 30px;
        }

        .leave_inner .form-group label {
            font-size: 18px !important;
            font-weight: 600 !important;
            color: #383838 !important;
            margin-bottom: 10px !important;
        }

        /* .leave_inner .form-group textarea {
            border: 2px solid #CFCFCF !important;
            height: auto !important;
            padding: 7px !important;
        } */

        .leave_inner .form-group {
            margin-top: 12px;
        }

        .leave_tabs .nav-pills .nav-item:nth-child(2) .nav-link.active {
            border-color: #3d3d3d;
            color: #3d3d3d;
            background: #c5c5c5bf;
        }

        .leave_tabs .nav-pills .nav-item:nth-child(3) .nav-link.active {
            border-color: #ea0000;
            color: #ea0000;
            background: #fa60604d;
        }

        button.lve_feed_btn {
            display: block;
            margin: auto;
        }

        .user_feedback {
            padding-top: 20px !important;
        }

    }
</style>
@section('content')
    @include('layouts.web.dashboard.header')
    <section class="user_feedback">
        <div class="container">
            <div class="wd_leave_bx">
                <form id="ratingForm" action="javescript:void(0)" class="leave_inner">
                    @csrf
                    <input type="hidden" id="quote_by_transporter_id" name="quote_by_transporter_id"
                        value="{{ $data->id }}">
                    <h2>Leave feedback</h2>
                    <div class="leave_body">
                        <h3>{{ $quote_info->vehicle_make }} {{ $quote_info->vehicle_model }}
                            @if (!is_null($quote_info->vehicle_make_1) && !is_null($quote_info->vehicle_model_1))
                                / {{ $quote_info->vehicle_make_1 }} {{ $quote_info->vehicle_model_1 }}
                            @endif
                        </h3>
                        <div class="leave_header">
                            <div class="leave_img">
                                @php
                                    $image = $quote_info->image;
                                    $defaultImage = asset('uploads/no_car_image.png');
                                    $noQuoteImage = asset('uploads/no_quote.png');

                                    if (is_null($image) || $image == $noQuoteImage) {
                                        $image = $defaultImage;
                                    }
                                @endphp
                                <img src="{{ $image }}" class="img-fluid" alt="book delivery">
                            </div>
                            <div class="leave_rgt">
                                <div class="leave_inner_img">
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="#5B5B5B" class="size-6" width="43" height="43">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg> --}}
                                    <img src="{{ $transporter_detail->profile_image }}">
                                </div>
                                <div class="leave_txt">
                                    <h4>{{ $transporter_detail->username }} <img
                                            src="{{ asset('/assets/images/user-verified.png') }}" width="18"
                                            height="18" alt="" class="ml-1" /></h4>
                                    <div class="leave_rating">
                                        <span>
                                            <svg width="13" height="13" viewBox="0 0 10 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.92593 0L6.03186 3.40373H9.61076L6.71537 5.50735L7.82131 8.91108L4.92593 6.80746L2.03054 8.91108L3.13648 5.50735L0.241092 3.40373H3.81999L4.92593 0Z"
                                                    fill="#FFA800" />
                                            </svg>
                                        </span>
                                        <span>
                                            <svg width="13" height="13" viewBox="0 0 10 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.92593 0L6.03186 3.40373H9.61076L6.71537 5.50735L7.82131 8.91108L4.92593 6.80746L2.03054 8.91108L3.13648 5.50735L0.241092 3.40373H3.81999L4.92593 0Z"
                                                    fill="#FFA800" />
                                            </svg>
                                        </span>
                                        <span>
                                            <svg width="13" height="13" viewBox="0 0 10 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.92593 0L6.03186 3.40373H9.61076L6.71537 5.50735L7.82131 8.91108L4.92593 6.80746L2.03054 8.91108L3.13648 5.50735L0.241092 3.40373H3.81999L4.92593 0Z"
                                                    fill="#FFA800" />
                                            </svg>
                                        </span>
                                        <span>
                                            <svg width="13" height="13" viewBox="0 0 10 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.92593 0L6.03186 3.40373H9.61076L6.71537 5.50735L7.82131 8.91108L4.92593 6.80746L2.03054 8.91108L3.13648 5.50735L0.241092 3.40373H3.81999L4.92593 0Z"
                                                    fill="#FFA800" />
                                            </svg>
                                        </span>
                                        <span>
                                            <svg width="13" height="13" viewBox="0 0 10 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.92593 0L6.03186 3.40373H9.61076L6.71537 5.50735L7.82131 8.91108L4.92593 6.80746L2.03054 8.91108L3.13648 5.50735L0.241092 3.40373H3.81999L4.92593 0Z"
                                                    fill="#FFA800" />
                                            </svg>
                                        </span>
                                        (12)
                                        <!-- ({{ $transporter_feedback['overall_percentage'] }}%) -->
                                        {{-- ({{ 100 }}%) --}}
                                    </div>
                                    <a href="javascript:;" class="verified_btns">
                                        <svg width="10" height="10" viewBox="0 0 9 7" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.0568 6.72412L0.131796 3.79912C-0.0439321 3.6234 -0.0439321 3.33847 0.131796 3.16273L0.768177 2.52633C0.943906 2.35058 1.22885 2.35058 1.40458 2.52633L3.375 4.49673L7.59542 0.276328C7.77114 0.100599 8.05609 0.100599 8.23182 0.276328L8.8682 0.912726C9.04392 1.08845 9.04392 1.37338 8.8682 1.54912L3.6932 6.72414C3.51745 6.89987 3.23253 6.89987 3.0568 6.72412Z"
                                                fill="#52D017" />
                                        </svg>
                                        Verified
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="leave_tabs">
                            <!-- <span>Accepted:  08/01/2024 19:20</span> -->
                            <p class="quote-accepted">Quote accepted: 08/01/2024 19:20</p>
                            {{-- <p><b> Rate this transaction.</b> This feedback helps other user and transport providers.</p> --}}
                            {{-- <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#positive" role="tab"
                                        aria-controls="pills-positive" aria-selected="true">
                                        <svg width="29" height="29" viewBox="0 0 29 29" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1195_760)">
                                                <path
                                                    d="M5.89062 12.6875H1.35938C0.608604 12.6875 0 13.2961 0 14.0469V27.6406C0 28.3914 0.608604 29 1.35938 29H5.89062C6.6414 29 7.25 28.3914 7.25 27.6406V14.0469C7.25 13.2961 6.6414 12.6875 5.89062 12.6875ZM3.625 26.7344C2.87423 26.7344 2.26562 26.1258 2.26562 25.375C2.26562 24.6242 2.87423 24.0156 3.625 24.0156C4.37577 24.0156 4.98438 24.6242 4.98438 25.375C4.98438 26.1258 4.37577 26.7344 3.625 26.7344ZM21.75 4.61349C21.75 7.01596 20.279 8.36355 19.8652 9.96875H25.6268C27.5185 9.96875 28.9911 11.5403 28.9999 13.2595C29.0047 14.2755 28.5725 15.3693 27.8989 16.046L27.8927 16.0522C28.4498 17.3741 28.3592 19.2262 27.3655 20.5534C27.8572 22.0201 27.3616 23.8218 26.4376 24.7877C26.681 25.7845 26.5647 26.6328 26.0894 27.3157C24.9333 28.9766 22.0681 29 19.6452 29L19.484 28.9999C16.749 28.999 14.5106 28.0032 12.7121 27.203C11.8083 26.8009 10.6265 26.3032 9.7299 26.2867C9.35947 26.2799 9.0625 25.9776 9.0625 25.6071V13.499C9.0625 13.3178 9.13511 13.1439 9.26403 13.0164C11.5078 10.7993 12.4726 8.45191 14.3117 6.60973C15.1502 5.76964 15.4551 4.50066 15.7499 3.27349C16.0018 2.22558 16.5287 0 17.6719 0C19.0312 0 21.75 0.453125 21.75 4.61349Z"
                                                    fill="#00BC29" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1195_760">
                                                    <rect width="29" height="29" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>

                                        Positive
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#neutral" role="tab"
                                        aria-controls="pills-neutral" aria-selected="false">
                                        <svg width="36" height="31" viewBox="0 0 36 31" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M36 13C36 15.3303 35.1964 17.4832 33.5893 19.4587C31.9821 21.4341 29.7991 22.9944 27.0402 24.1395C24.2812 25.2846 21.2679 25.8571 18 25.8571C17.0625 25.8571 16.0915 25.8035 15.0871 25.6964C12.4353 28.0401 9.35491 29.6607 5.84598 30.558C5.18973 30.7455 4.42634 30.8928 3.5558 31C3.32812 31.0268 3.12388 30.9665 2.94308 30.8192C2.76228 30.6718 2.64509 30.4776 2.59152 30.2366V30.2165C2.55134 30.1629 2.54799 30.0826 2.58147 29.9754C2.61496 29.8683 2.62835 29.8013 2.62165 29.7745C2.61496 29.7477 2.64509 29.6841 2.71205 29.5837L2.83259 29.4029L2.97321 29.2321L3.13393 29.0513C3.22768 28.9442 3.43527 28.7131 3.7567 28.3582C4.07812 28.0033 4.30915 27.7489 4.44978 27.5948C4.5904 27.4408 4.79799 27.1763 5.07254 26.8013C5.3471 26.4263 5.56473 26.0848 5.72545 25.7768C5.88616 25.4687 6.06696 25.0736 6.26786 24.5915C6.46875 24.1093 6.64286 23.6004 6.79018 23.0647C4.6875 21.8727 3.03013 20.3995 1.81808 18.6451C0.606027 16.8906 0 15.0089 0 13C0 11.2589 0.475446 9.59483 1.42634 8.00778C2.37723 6.42072 3.65625 5.0513 5.26339 3.89952C6.87054 2.74773 8.78571 1.83367 11.0089 1.15733C13.2321 0.480992 15.5625 0.142822 18 0.142822C21.2679 0.142822 24.2812 0.715367 27.0402 1.86046C29.7991 3.00555 31.9821 4.56581 33.5893 6.54126C35.1964 8.51671 36 10.6696 36 13Z"
                                                fill="#3D3D3D" />
                                        </svg>Neutral
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#negative" role="tab"
                                        aria-controls="pills-negative" aria-selected="false">
                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1195_773)">
                                                <path
                                                    d="M0 2.73438V14.4531C0 15.1003 0.524658 15.625 1.17188 15.625H5.07812C5.72534 15.625 6.25 15.1003 6.25 14.4531V2.73438C6.25 2.08716 5.72534 1.5625 5.07812 1.5625H1.17188C0.524658 1.5625 0 2.08716 0 2.73438ZM1.95312 12.5C1.95312 11.8528 2.47778 11.3281 3.125 11.3281C3.77222 11.3281 4.29688 11.8528 4.29688 12.5C4.29688 13.1472 3.77222 13.6719 3.125 13.6719C2.47778 13.6719 1.95312 13.1472 1.95312 12.5ZM15.2344 25C14.2489 25 13.7947 23.0814 13.5776 22.178C13.3234 21.1201 13.0605 20.0261 12.3377 19.3019C10.7523 17.7138 9.92056 15.6902 7.98628 13.7789C7.93124 13.7245 7.88754 13.6597 7.85772 13.5883C7.8279 13.5169 7.81254 13.4402 7.81255 13.3628V2.92485C7.81255 2.60547 8.06855 2.34487 8.38789 2.33901C9.16089 2.32485 10.1796 1.8957 10.9587 1.54907C12.5092 0.859277 14.4389 0.000830078 16.7966 0H16.9355C19.0242 0 21.4942 0.020166 22.4909 1.452C22.9006 2.04072 23.0009 2.77202 22.7911 3.6313C23.5875 4.46396 24.0148 6.01719 23.591 7.28154C24.4476 8.42568 24.5257 10.0224 24.0455 11.1619L24.0508 11.1672C24.6315 11.7507 25.0041 12.6936 25 13.5694C24.9924 15.0515 23.7228 16.4062 22.0921 16.4062H17.1251C17.4819 17.79 18.75 18.9518 18.75 21.0229C18.75 24.6094 16.4062 25 15.2344 25Z"
                                                    fill="#EA0000" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1195_773">
                                                    <rect width="25" height="25" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        Negative</a>
                                </li>
                            </ul> --}}
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="positive" role="tabpanel"
                                    aria-labelledby="positive-tab">
                                    <ul class="lve_rate">
                                        <li>
                                            <h5>Click to rate:</h5>
                                            {{-- <h5>Communication</h5> --}}
                                            <div class="starrating">
                                                <input type="radio" id="star5_comm_pos" name="rating_comm_positive"
                                                    value="5" /><label for="star5_comm_pos" title="5 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>

                                                </label>
                                                <input type="radio" id="star4_comm_pos" name="rating_comm_positive"
                                                    value="4" /><label for="star4_comm_pos" title="4 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star3_comm_pos" name="rating_comm_positive"
                                                    value="3" /><label for="star3_comm_pos" title="3 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star2_comm_pos" name="rating_comm_positive"
                                                    value="2" /><label for="star2_comm_pos" title="2 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star1_comm_pos" name="rating_comm_positive"
                                                    value="1" /><label for="star1_comm_pos" title="1 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                {{-- <span class="rating-display">(0/5)</span> --}}
                                            </div>
                                        </li>
                                        {{-- <li>
                                            <h5>Punctuality</h5>
                                            <div class="starrating">
                                                <input type="radio" id="star5_punct" name="rating_punct_positive"
                                                    value="5" /><label for="star5_punct" title="5 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>

                                                </label>
                                                <input type="radio" id="star4_punct" name="rating_punct_positive"
                                                    value="4" /><label for="star4_punct" title="4 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star3_punct" name="rating_punct_positive"
                                                    value="3" /><label for="star3_punct" title="3 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star2_punct" name="rating_punct_positive"
                                                    value="2" /><label for="star2_punct" title="2 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star1_punct" name="rating_punct_positive"
                                                    value="1" /><label for="star1_punct" title="1 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <span class="rating-display">(0/5)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <h5>Care of Goods</h5>
                                            <div class="starrating">
                                                <input type="radio" id="star5_care" name="rating_care_positive"
                                                    value="5" /><label for="star5_care" title="5 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>

                                                </label>
                                                <input type="radio" id="star4_care" name="rating_care_positive"
                                                    value="4" /><label for="star4_care" title="4 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star3_care" name="rating_care_positive"
                                                    value="3" /><label for="star3_care" title="3 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star2_care" name="rating_care_positive"
                                                    value="2" /><label for="star2_care" title="2 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star1_care" name="rating_care_positive"
                                                    value="1" /><label for="star1_care" title="1 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <span class="rating-display">(0/5)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <h5>Professionalism</h5>
                                            <div class="starrating">
                                                <input type="radio" id="star5_professionalism"
                                                    name="rating_prof_positive" value="5" /><label
                                                    for="star5_professionalism" title="5 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>

                                                </label>
                                                <input type="radio" id="star4_professionalism"
                                                    name="rating_prof_positive" value="4" /><label
                                                    for="star4_professionalism" title="4 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star3_professionalism"
                                                    name="rating_prof_positive" value="3" /><label
                                                    for="star3_professionalism" title="3 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star2_professionalism"
                                                    name="rating_prof_positive" value="2" /><label
                                                    for="star2_professionalism" title="2 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star1_professionalism"
                                                    name="rating_prof_positive" value="1" /><label
                                                    for="star1_professionalism" title="1 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <span class="rating-display">(0/5)</span>
                                            </div>
                                        </li> --}}

                                    </ul>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Write a review</label>
                                        <textarea id="pos_comment" name="pos_comment" placeholder="Describe your experience... "></textarea>
                                    </div>
                                    <!-- <button class="lve_feed_btn">Leave feedback</button> -->
                                </div>
                                <!-- neutral -->
                                <div class="tab-pane fade" id="neutral" role="tabpanel" aria-labelledby="neutral-tab">
                                    <ul class="lve_rate">
                                        <li>
                                            <h5>Communication</h5>
                                            <div class="starrating">
                                                <input type="radio" id="star5_comm_neutral" name="rating_comm_neutral"
                                                    value="5" /><label for="star5_comm_neutral" title="5 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>

                                                </label>
                                                <input type="radio" id="star4_comm_neutral" name="rating_comm_neutral"
                                                    value="4" /><label for="star4_comm_neutral" title="4 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star3_comm_neutral" name="rating_comm_neutral"
                                                    value="3" /><label for="star3_comm_neutral" title="3 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star2_comm_neutral" name="rating_comm_neutral"
                                                    value="2" /><label for="star2_comm_neutral" title="2 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star1_comm_neutral" name="rating_comm_neutral"
                                                    value="1" /><label for="star1_comm_neutral" title="1 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <span class="rating-display">(0/5)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <h5>Punctuality</h5>
                                            <div class="starrating">
                                                <input type="radio" id="star5_punct_neutral"
                                                    name="rating_punct_neutral" value="5" /><label
                                                    for="star5_punct_neutral" title="5 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>

                                                </label>
                                                <input type="radio" id="star4_punct_neutral"
                                                    name="rating_punct_neutral" value="4" /><label
                                                    for="star4_punct_neutral" title="4 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star3_punct_neutral"
                                                    name="rating_punct_neutral" value="3" /><label
                                                    for="star3_punct_neutral" title="3 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star2_punct_neutral"
                                                    name="rating_punct_neutral" value="2" /><label
                                                    for="star2_punct_neutral" title="2 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star1_punct_neutral"
                                                    name="rating_punct_neutral" value="1" /><label
                                                    for="star1_punct_neutral" title="1 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <span class="rating-display">(0/5)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <h5>Care of Goods</h5>
                                            <div class="starrating">
                                                <input type="radio" id="star5_care_neutral" name="rating_care_neutral"
                                                    value="5" /><label for="star5_care_neutral" title="5 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>

                                                </label>
                                                <input type="radio" id="star4_care_neutral" name="rating_care_neutral"
                                                    value="4" /><label for="star4_care_neutral" title="4 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star3_care_neutral" name="rating_care_neutral"
                                                    value="3" /><label for="star3_care_neutral" title="3 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star2_care_neutral" name="rating_care_neutral"
                                                    value="2" /><label for="star2_care_neutral" title="2 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star1_care_neutral" name="rating_care_neutral"
                                                    value="1" /><label for="star1_care_neutral" title="1 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <span class="rating-display">(0/5)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <h5>Professionalism</h5>
                                            <div class="starrating">
                                                <input type="radio" id="star5_prof_neutral" name="rating_prof_neutral"
                                                    value="5" /><label for="star5_prof_neutral" title="5 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>

                                                </label>
                                                <input type="radio" id="star4_prof_neutral" name="rating_prof_neutral"
                                                    value="4" /><label for="star4_prof_neutral" title="4 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star3_prof_neutral" name="rating_prof_neutral"
                                                    value="3" /><label for="star3_prof_neutral" title="3 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star2_prof_neutral" name="rating_prof_neutral"
                                                    value="2" /><label for="star2_prof_neutral" title="2 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star1_prof_neutral" name="rating_prof_neutral"
                                                    value="1" /><label for="star1_prof_neutral" title="1 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <span class="rating-display">(0/5)</span>
                                            </div>
                                        </li>

                                    </ul>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Feedback comments:</label>
                                        <textarea id="neu_comment" name="neu_comment"></textarea>

                                    </div>
                                    <!-- <button class="lve_feed_btn">Leave feedback</button> -->
                                </div>
                                <!-- negative -->
                                <div class="tab-pane fade" id="negative" role="tabpanel"
                                    aria-labelledby="negative-tab">
                                    <ul class="lve_rate">
                                        <li>
                                            <h5>Rating</h5>
                                            <div class="starrating">
                                                <input type="radio" id="star5_comm_negative"
                                                    name="rating_comm_negative" value="5" /><label
                                                    for="star5_comm_negative" title="5 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>

                                                </label>
                                                <input type="radio" id="star4_comm_negative"
                                                    name="rating_comm_negative" value="4" /><label
                                                    for="star4_comm_negative" title="4 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star3_comm_negative"
                                                    name="rating_comm_negative" value="3" /><label
                                                    for="star3_comm_negative" title="3 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star2_comm_negative"
                                                    name="rating_comm_negative" value="2" /><label
                                                    for="star2_comm_negative" title="2 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star1_comm_negative"
                                                    name="rating_comm_negative" value="1" /><label
                                                    for="star1_comm_negative" title="1 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <span class="rating-display">(0/5)</span>
                                            </div>
                                        </li>
                                        {{-- <li>
                                            <h5>Punctuality</h5>
                                            <div class="starrating">
                                                <input type="radio" id="star5_punct_negative"
                                                    name="rating_punct_negative" value="5" /><label
                                                    for="star5_punct_negative" title="5 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>

                                                </label>
                                                <input type="radio" id="star4_punct_negative"
                                                    name="rating_punct_negative" value="4" /><label
                                                    for="star4_punct_negative" title="4 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star3_punct_negative"
                                                    name="rating_punct_negative" value="3" /><label
                                                    for="star3_punct_negative" title="3 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star2_punct_negative"
                                                    name="rating_punct_negative" value="2" /><label
                                                    for="star2_punct_negative" title="2 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star1_punct_negative"
                                                    name="rating_punct_negative" value="1" /><label
                                                    for="star1_punct_negative" title="1 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <span class="rating-display">(0/5)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <h5>Care of Goods</h5>
                                            <div class="starrating">
                                                <input type="radio" id="star5_care_negative"
                                                    name="rating_care_negative" value="5" /><label
                                                    for="star5_care_negative" title="5 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>

                                                </label>
                                                <input type="radio" id="star4_care_negative"
                                                    name="rating_care_negative" value="4" /><label
                                                    for="star4_care_negative" title="4 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star3_care_negative"
                                                    name="rating_care_negative" value="3" /><label
                                                    for="star3_care_negative" title="3 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star2_care_negative"
                                                    name="rating_care_negative" value="2" /><label
                                                    for="star2_care_negative" title="2 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star1_care_negative"
                                                    name="rating_care_negative" value="1" /><label
                                                    for="star1_care_negative" title="1 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <span class="rating-display">(0/5)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <h5>Professionalism</h5>
                                            <div class="starrating">
                                                <input type="radio" id="star5_prof_negative"
                                                    name="rating_prof_negative" value="5" /><label
                                                    for="star5_prof_negative" title="5 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>

                                                </label>
                                                <input type="radio" id="star4_prof_negative"
                                                    name="rating_prof_negative" value="4" /><label
                                                    for="star4_prof_negative" title="4 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star3_prof_negative"
                                                    name="rating_prof_negative" value="3" /><label
                                                    for="star3_prof_negative" title="3 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star2_prof_negative"
                                                    name="rating_prof_negative" value="2" /><label
                                                    for="star2_prof_negative" title="2 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star1_prof_negative"
                                                    name="rating_prof_negative" value="1" /><label
                                                    for="star1_prof_negative" title="1 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <span class="rating-display">(0/5)</span>
                                            </div>
                                        </li> --}}

                                    </ul>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Feedback comments:</label>
                                        <textarea id="neg_comment" name="neg_comment"></textarea>
                                    </div>

                                </div>
                                <span class="feedback-error d-none"></span>
                                <button class="lve_feed_btn">Leave feedback</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('assets/web/js/admin.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('input[type=radio]').on('click', function() {
                var rating = $(this).val();
                $(this).closest('.starrating').find('.rating-display').text(`(${rating}/5)`);
            });
            $('#ratingForm').submit(function(e) {
                e.preventDefault();

                var positiveRatings = [];
                var negativeRatings = [];
                var neutralRatings = [];

                function extractActiveTabRatings() {
                    var activeTabId = $('.nav-link.active').attr('href');
                    var activeTab = $(activeTabId);
                    positiveRatings = [];
                    negativeRatings = [];
                    neutralRatings = [];
                    activeTab.find('input[type=radio]:checked').each(function() {
                        var category = $(this).attr('name');
                        var value = $(this).val();
                        if (activeTabId === '#positive') {
                            positiveRatings.push({
                                category: category,
                                value: value
                            });
                        } else if (activeTabId === '#negative') {
                            negativeRatings.push({
                                category: category,
                                value: value
                            });
                        } else if (activeTabId === '#neutral') {
                            neutralRatings.push({
                                category: category,
                                value: value
                            });
                        }
                    });
                }

                function getFeedbackComments() {
                    var activeTabId = $('.nav-link.active').attr('href');
                    var comments = '';
                    if (activeTabId === '#positive') {
                        comments = $('#pos_comment').val().trim();
                    } else if (activeTabId === '#negative') {
                        comments = $('#neg_comment').val().trim();
                    } else if (activeTabId === '#neutral') {
                        comments = $('#neu_comment').val().trim();
                    }
                    return comments;
                }

                function validateForm() {
                    var ratingsProvided = positiveRatings.length > 0 || negativeRatings.length > 0 ||
                        neutralRatings.length > 0;
                    var feedbackComments = getFeedbackComments();
                    if (!ratingsProvided) {
                        $('.feedback-error').removeClass('d-none');
                        $('.feedback-error').text('Please provide ratings before submitting.');
                        return false;
                    }
                    if (feedbackComments === '') {
                        $('.feedback-error').removeClass('d-none');
                        $('.feedback-error').text('Please provide feedback comments before submitting.');
                        return false;
                    }
                    return true;
                }

                // Clear any previous error messages
                $('.feedback-error').addClass('d-none').text('');

                extractActiveTabRatings();
                var feedback = getFeedbackComments();

                if (!validateForm()) {
                    return; // Exit submission process
                }
                // Example: AJAX submission
                $.ajax({
                    url: "{{ route('front.save_feedback_quote') }}",
                    method: 'POST',
                    data: {
                        positiveRatings: positiveRatings,
                        negativeRatings: negativeRatings,
                        neutralRatings: neutralRatings,
                        feedback: feedback,
                        _token: "{{ csrf_token() }}",
                        quote_by_transporter_id: $('#quote_by_transporter_id').val()
                    },
                    success: function(response) {
                        if (response.status) {
                            Swal.fire({
                                title: '<span class="help-title">Thank You.</span>',
                                html: '<span class="help-text">Your feedback has been submitted.</span>',
                                confirmButtonColor: '#52D017',
                                confirmButtonText: 'OK',
                                customClass: {
                                    title: 'swal-title',
                                    htmlContainer: 'swal-text-container',
                                    popup: 'swal-popup'
                                },
                                showCloseButton: true,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    history.back();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: '<span class="help-title">Error</span>',
                                html: '<span class="help-text">Invalid feedback data!.. Please try again</span>',
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
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: '<span class="help-title">Error</span>',
                            html: '<span class="help-text">Something went wrong!.. Please try again</span>',
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
            });
            // Clear error message on change
            $('#positive, #negative, #neutral').on('change', 'input[type=radio], textarea', function() {
                $('.feedback-error').addClass('d-none').text(''); // Remove error message on change
            });
            $('.nav-link').on('click', function() {
                $('.feedback-error').addClass('d-none').text('');
            })
            $('#ratingForm').on('keyup', 'textarea', function() {
                var activeTabId = $('.nav-link.active').attr('href'); // Get the ID of the active tab
                var textareaId = $(this).attr('id'); // Get the ID of the changed textarea

                // Check if the active tab ID matches the textarea ID
                if (
                    (activeTabId === '#positive' && textareaId === 'pos_comment') ||
                    (activeTabId === '#negative' && textareaId === 'neg_comment') ||
                    (activeTabId === '#neutral' && textareaId === 'neu_comment')
                ) {
                    $('.feedback-error').addClass('d-none').text(''); // Remove error message
                }
            });
        });
    </script>
@endsection
