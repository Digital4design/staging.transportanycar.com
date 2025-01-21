@extends('layouts.transporter.dashboard.app')

@section('head_css')
<style>
    .add_to_wishlist {
        background: #999999;
        color: #F3F8FF;
        border-radius: 7px;
        font-size: 12px;
        line-height: 16px;
        font-weight: 500;
        padding: 8px 18px;
        display: inline-block;
    }

    .add_to_wishlist:hover {
        background-color: #6c6969;
        color: #F3F8FF;
    }

    .view_message {
        font-size: 14px;
        line-height: 19px;
        font-weight: 500;
        color: #F3F8FF;
        background-color: #9C9C9C;
        border-radius: 7px;
        padding: 10px 14px;
    }

    .view_message:focus {
        box-shadow: none;
    }

    .view_message[data-target="#bidCollapse0"] {
        background-color: #0356D6;
    }

    .view_message:hover {
        color: #F3F8FF;
    }

    .card {
        padding-bottom: 5px;
    }

    .message_count {
        display: inline-block;
        width: 18px;
        height: 18px;
        border-radius: 100%;
        background-color: #F3F8FF;
        color: #000000;
        font-size: 14px;
        line-height: 18px;
        font-weight: 300;
        margin-left: 5px;
    }

    .bidder_bid {
        font-size: 14px;
        line-height: 18px;
        font-weight: 500;
        color: #000000;
        text-align: center;
        margin-bottom: 10px;
    }

    .bidder_bid span {
        color: #52D017;
    }

    .bidder_verified {
        font-size: 16px;
        line-height: 20px;
        font-weight: 400;
        color: #5B5B5B;
    }

    .bidder_name {
        font-size: 16px;
        line-height: 20px;
        font-weight: 400;
    }

    .bidder_name span {
        color: #0356D6;
    }

    .card-header {
        padding: 20px;
    }

    .card-body {
        font-size: 14px;
        line-height: 20px;
        font-weight: 400;
        color: #444444;
    }

    .message-info {
        font-size: 14px;
        line-height: 18px;
        font-weight: 400;
        color: #313131;
    }

    .message-info p:first-child {
        font-weight: 500;
        margin-bottom: 10px;
    }

    .message-info span {
        color: #006DF0
    }

    .accordion {
        background-color: #F3F3F3;
    }

    textarea {
        border: 2px solid #CFCFCF;
        border-radius: 5px;
        background-color: #ffffff;
        width: 100%;
        padding: 8px 10px;
    }

    textarea::-webkit-input-placeholder {
        font-size: 12px;
        line-height: 16px;
        font-weight: 300;
        color: #C3C3C3;
    }

    textarea::-moz-placeholder {
        font-size: 12px;
        line-height: 16px;
        font-weight: 300;
        color: #C3C3C3;
    }

    textarea:-ms-input-placeholder {
        font-size: 12px;
        line-height: 16px;
        font-weight: 300;
        color: #C3C3C3;
    }

    textarea:-moz-placeholder {
        font-size: 12px;
        line-height: 16px;
        font-weight: 300;
        color: #C3C3C3;
    }

    .note {
        font-size: 10px;
        line-height: 13px;
        font-weight: 300;
        color: #444444;
        padding-left: 20px;
        margin-top: 5px;
    }

    .note svg {
        position: absolute;
        left: 0;
        top: 0;
    }

    .content_wrap .label,
    .content_wrap .value {
        font-size: 15px;
        line-height: 20px;
    }

    .zoom-icon {
        left: 20px;
        top: 5px;
    }

    .car-title {
        font-weight: 500;
    }

    .wishlist_wrap .label,
    .content_wrap .label {
        font-weight: 300;
    }

    .wishlist_wrap .value,
    .content_wrap .value {
        font-weight: 400;
    }

    .wishlist_wrap .value,
    .wishlist_wrap .label {
        font-size: 12px;
        line-height: 16px;
    }

    .wishlist_wrap .value.price {
        color: #52D017;
    }

    .wishlist_wrap .value.bid_count {
        color: #0356D6;
    }

    .car-content {
        font-size: 15px;
        line-height: 20px;
        font-weight: 400;
    }

    .left-content .img_wrap {
        max-width: 92px;
        width: 92px;
        height: 57px;
        flex: 0 0 92px;
        border-radius: 5px;
        overflow: hidden;
        display: flex;
        height: 57px;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
    }

    .left-content .img_wrap+.car-content {
        flex: 0 0 calc(100% - 100px);
        max-width: calc(100% - 100px);
    }

    .back_btn a {
        font-size: 18px;
        line-height: 24px;
        color: rgba(0, 0, 0, 0.5);
    }

    .date {
        font-size: 12px;
        line-height: 16px;
        font-weight: 400;
        color: #5F5F5F;
    }

    .heading {
        font-size: 25px;
        line-height: 32px;
        text-align: center;
        color: #000000;
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    }

    .wd-white-box {
        overflow: visible;
    }

    .send_message {
        font-size: 14px;
        line-height: 18px;
        font-weight: 400;
        color: #FFFFFF;
        border-radius: 5px;
        border: 1px solid #52D017;
        background-color: #52D017;
        padding: 6px 20px;
        margin-top: 15px;
    }

    .bid_lowest {
        font-size: 12px;
        line-height: 16px;
        color: #ffffff;
        font-weight: 400;
        background-color: #52D017;
        position: absolute;
        left: 0;
        top: 0;
        padding: 2px 15px;
        border-radius: 0 0 15px 0;
    }

    .send_message:hover {
        color: #ffffff;
    }

    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        object-fit: cover;
        object-position: center;
        width: 100%;
        height: 100%;
    }

    #myImg:hover {
        opacity: 0.7;
    }

    #myModal .carousel-control-prev,
    #myModal .carousel-control-next {
        margin: auto;
        height: 25px;
        width: auto;
        background: transparent;
        border: none;
    }
    #myModal .close {
        cursor: pointer;
        position: absolute;
        right: 0;
        top: 0;
        background: rgba(255, 255, 255, 1) !important;
        width: 25px;
        height: 25px;
        text-align: center;
        border-radius: 100%;
        font-size: 20px;
        line-height: 24px;
        z-index: 999;
        opacity: 1;
        padding:0;
    }
    #myModal .modal-header {
        border: none;
        padding: 0;
    }

    /* #myModal .close:hover {
                                background-color: #0356d6!important;
                                color:#ffffff;
                            } */
    .view-quote .place_bid_btn:hover {
        background-color: #52D017;
        color: #ffffff;
    }

    .modal#myModal {
        display: none;
        background-color: rgba(0, 0, 0, 0.5);
    }

    #caption {
        text-align: center;
        padding: 10px 0;
    }

    .modal-content,
    #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    @media screen and (min-width: 1680px) {
        .upper-left {
            flex: 0 0 41.666667%;
            max-width: 41.666667%;
            margin-bottom: 0 !important;
        }

        .upper-right {
            flex: 0 0 58.333333%;
            max-width: 58.333333%;
            margin-top: 0 !important;
        }

        .expiry,
        .delivery {
            flex: 0 0 50%;
            max-width: 50%;
        }

        .left-content {
            flex: 0 0 25%;
            max-width: 25%;
        }

        .right-content {
            flex: 0 0 75%;
            max-width: 75%;
        }
    }

    @media screen and (min-width: 1024px) {
        .add_to_wishlist {
            font-size: 16px;
            padding: 9px 18px;
        }
    }

    @media screen and (min-width: 768px) {
        .content_wrap {
            margin-left: -15px;
            margin-right: -15px;
        }

        .place_bid_wrap {
            width: auto;
        }

        .add_to_wishlist {
            font-size: 14px;
            line-height: 24px;
            padding: 6px 18px;
        }

        .wishlist_wrap .value,
        .wishlist_wrap .label {
            font-size: 14px;
        }
    }

    @media screen and (max-width: 767px) {
        .zoom-icon {
            left: 5px;
        }

        .place_bid_wrap {
            width: 100%;
        }

        .place_bid_btn {
            width: 100%;
            font-size: 20px !important;
            line-height: 37px !important;
        }

        .content_wrap {
            bordeR: 1px solid #DADADA;
            border-radius: 8px;
            padding: 20px 5px;
        }

        .wishlist_wrap .label,
        .content_wrap .label {
            min-width: 30%;
        }

        .lower-left {
            margin: 0;
            max-width: 140px;
        }
    }

    @media screen and (max-width: 575px) {
        .job_details {
            padding-top: 70px !important;
        }

        .note svg {
            top: 5px;
        }

        .bid_wrapper {
            margin-left: -30px;
            margin-right: -30px;
        }

        .wishlist_wrap .label,
        .content_wrap .label {
            min-width: 40%;
        }
    }
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/globle.css') }}" />
@endsection


@section('content')
<div id="wrapper">
    <!-- SIDEBAR -->
    @include('layouts.transporter.dashboard.sidebar')
    <div id="page-content-wrapper">
        @include('layouts.transporter.dashboard.top_head')

        <div class="content_container adjust_spacing job_details">
            <div class="inner_content set_banner_position">

                <div class="wd-white-box">

                    <div class="row align-items-center">
                        <div class="col-7 mb-3 pl-0 pl-md-3">
                            <div class="back_btn row mx-0 align-items-center">
                                <a href="{{ url('transporter/new-jobs-new') }}"
                                    class="d-flex flex-wrap align-items-center">
                                    <svg width="7" height="13" viewBox="0 0 7 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="mr-2">
                                        <g opacity="0.5">
                                            <path d="M6 11.5L1 6.5L6 1.5" stroke="black" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                    </svg>
                                    Back to find jobs
                                </a>
                            </div>
                        </div>
                        <div class="col-5 date mb-3 pr-0 pr-md-3 text-right">
                            Posted {{ getTimeAgo($quote->created_at->toDateTimeString()) }}
                        </div>
                    </div>
                    <div class="wrapper row">
                        <div
                            class="left-content row mx-0 align-items-start justify-content-between col-xl-4 mb-3 mb-xl-0 px-0 px-md-3">
                            <div class="img_wrap">
                      
                                <img src="{{ $quote->image }}" alt="image" width="92" height="57"
                                    class="img-fluid" id="myImg" data-toggle="modal" data-target="#myModal" />
                                <svg class="position-absolute zoom-icon" width="15" height="15"
                                    viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1 4.46454C1.00208 2.81004 2.25546 1.38727 3.99372 1.06625C5.73198 0.745234 7.47105 1.61536 8.1475 3.14456C8.82395 4.67375 8.24941 6.43617 6.77521 7.35411C5.301 8.27205 3.33766 8.08988 2.08575 6.919C1.38943 6.26774 0.998849 5.38479 1 4.46454Z"
                                        stroke="#D9D9D9" stroke-width="0.8" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M7.03516 7.17249L8.99979 8.99999" stroke="#D9D9D9" stroke-width="0.8"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M3.84426 3.10517C3.68279 2.95441 3.42967 2.96308 3.2789 3.12455C3.12814 3.28602 3.13681 3.53913 3.29828 3.6899L3.84426 3.10517ZM4.44118 4.75706C4.60264 4.90783 4.85576 4.89915 5.00653 4.73768C5.1573 4.57621 5.14862 4.3231 4.98715 4.17233L4.44118 4.75706ZM4.98753 4.17233C4.82606 4.02157 4.57294 4.03024 4.42217 4.19171C4.27141 4.35318 4.28008 4.60629 4.44155 4.75706L4.98753 4.17233ZM5.58444 5.82422C5.74591 5.97499 5.99903 5.96631 6.1498 5.80484C6.30057 5.64338 6.29189 5.39026 6.13042 5.23949L5.58444 5.82422ZM4.98715 4.75706C5.14862 4.60629 5.1573 4.35318 5.00653 4.19171C4.85576 4.03024 4.60264 4.02157 4.44118 4.17233L4.98715 4.75706ZM3.29828 5.23949C3.13681 5.39026 3.12814 5.64338 3.2789 5.80484C3.42967 5.96631 3.68279 5.97499 3.84426 5.82422L3.29828 5.23949ZM4.44155 4.17233C4.28008 4.3231 4.27141 4.57621 4.42217 4.73768C4.57294 4.89915 4.82606 4.90783 4.98753 4.75706L4.44155 4.17233ZM6.13042 3.6899C6.29189 3.53913 6.30057 3.28602 6.1498 3.12455C5.99903 2.96308 5.74591 2.95441 5.58444 3.10517L6.13042 3.6899ZM3.29828 3.6899L4.44118 4.75706L4.98715 4.17233L3.84426 3.10517L3.29828 3.6899ZM4.44155 4.75706L5.58444 5.82422L6.13042 5.23949L4.98753 4.17233L4.44155 4.75706ZM4.44118 4.17233L3.29828 5.23949L3.84426 5.82422L4.98715 4.75706L4.44118 4.17233ZM4.98753 4.75706L6.13042 3.6899L5.58444 3.10517L4.44155 4.17233L4.98753 4.75706Z"
                                        fill="#D9D9D9" />
                                </svg>
                            </div>
                            <div class="car-content">
                                @if (!is_null($quote->vehicle_make_1) && !is_null($quote->vehicle_model_1))
                                <div class="car-title"> {{ $quote->vehicle_make }}
                                    {{ $quote->vehicle_model }} /{{ $quote->vehicle_make_1 }}
                                    {{ $quote->vehicle_model_1 }}</div>
                                @else
                                <div class="car-title">
                                    {{ $quote->vehicle_make }}
                                    {{ $quote->vehicle_model }}
                                </div>
                                @endif

                                <div class="d-flex flex-wrap align-items-center position-relative pl-3">
                                    <svg class="position-absolute" style="left:0; top:0;" width="10" height="16"
                                        viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="mr-1">
                                        <path
                                            d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z"
                                            fill="#52D017"></path>
                                    </svg>
                                    <span>{{ $quote->pickup_postcode ? hidePostcode($quote->pickup_postcode) : '-' }}</span>
                                </div>
                                <div class="d-flex flex-wrap align-items-center position-relative pl-3">
                                    <svg class="position-absolute" style="left:0; top:0;" width="10" height="16"
                                        viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="mr-1">
                                        <path
                                            d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z"
                                            fill="#ed1c24"></path>
                                    </svg>
                                    <span>{{ $quote->drop_postcode ? hidePostcode($quote->drop_postcode) : '-' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="right-content col-xl-8">
                            <div class="content_wrap row align-items-center justify-content-between mb-3 mb-md-0">
                                <div class="col-12 d-flex flex-wrap align-items-center upper-left">
                                    <div class="row w-100 ">
                                        <div
                                            class="wrap d-flex flex-wrap flex-md-column col-12 col-md-4 expiry mb-2 mb-md-0">
                                            <span class="label">Expiry date:</span>
                                            <span class="value">
                                                {{ formatCustomDate($quote->created_at->addDays(10)) }}</span>
                                        </div>
                                        <div
                                            class="wrap d-flex flex-wrap flex-md-column col-12 col-md-4 delivery mb-2 mb-md-0">
                                            <span class="label">Delivery date:</span>
                                            @if ($quote->delivery_timeframe_from)
                                            <span
                                                class="value">{{ formatCustomDate($quote->delivery_timeframe_from) }}</span>
                                            @else
                                            <span class="value">{{ $quote->delivery_timeframe }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex flex-wrap align-items-center upper-right my-md-3">
                                    <div class="row w-100 ">
                                        <div class="wrap d-flex flex-wrap flex-md-column col-12 col-md-4 mb-2 mb-md-0">
                                            <span class="label">Starts & drives:</span>
                                            @if ($quote->starts_drives == '1' && $quote->starts_drives_1 == '1')
                                            <span class="value">Yes</span>
                                            @elseif ($quote->starts_drives == '1' || $quote->starts_drives_1 == null)
                                            <span class="value">Yes/No</span>
                                            @elseif ($quote->starts_drives == '1' || $quote->starts_drives_1 == '0')
                                            <span class="value">Yes/No</span>
                                            @elseif ($quote->starts_drives == '0' || $quote->starts_drives_1 == '1')
                                            <span class="value">No/Yes</span>
                                            @elseif ($quote->starts_drives == '1')
                                            <span class="value">Yes</span>
                                            @else
                                            <span class="value">No</span>
                                            @endif
                                        </div>
                                        <div class="wrap d-flex flex-wrap flex-md-column col-12 col-md-4 mb-2 mb-md-0">
                                            <span class="label">Delivery type:</span>
                                            <span class="value"> {{ $quote->how_moved }}</span>
                                        </div>
                                        <div class="wrap d-flex flex-wrap flex-md-column col-12 col-md-4">
                                            <span class="label">Journey miles:</span>
                                            <span class="value">{{ str_replace(' mi', '', $quote->distance) }}
                                                ({{ $quote->duration }})</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wishlist_wrap row align-items-center">
                                <div
                                    class="col-6 col-md-12 mb-3 mb-md-0 d-flex d-md-none flex-wrap align-items-end upper-right px-0 px-md-3">
                                    <div class="row w-100 mx-0">

                                        @if ($quote->watchlist)
                                        <a href="javascript:;" class="add_to_wishlist"
                                            onclick="removeToWatchlist('{{ $quote->id }}');">

                                            Add to watchlist
                                        </a>
                                        @else
                                        <a href="javascript:;" class="add_to_wishlist"
                                            onclick="addToWatchlist('{{ $quote->id }}');">
                                            Add to watchlist
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div
                                    class="col-6 col-md-12 d-flex flex-wrap align-items-center upper-left mb-3 px-0 px-md-3 justify-content-end justify-content-md-start">
                                    <div class="row w-100 lower-left">
                                        <div
                                            class="wrap d-flex flex-wrap align-items-center col-12 col-md-4 px-0 px-md-3 expiry justify-content-md-start">
                                            @php
                                            $lowestBid = $quote->lowest_bid ?? 0;
                                            $transporterQuotesCount = $quote->transporter_quotes_count ?? 0;
                                            @endphp

                                            @if ($transporterQuotesCount > 0)
                                            <span class="label">Current lowest bid:</span>
                                            <span class="value price ml-1">£{{ $lowestBid }}</span>
                                            @else
                                            <span class="label">Current lowest bid:</span>
                                            <span class="value price ml-1">£0</span>
                                            @endif
                                        </div>
                                        <div
                                            class="wrap d-flex flex-wrap align-items-center col-12 col-md-4 px-0 px-md-3 delivery justify-content-md-start">
                                            <span class="label">Transporters bidding:</span>
                                            @if ($transporterQuotesCount > 0)
                                            <span
                                                class="value bid_count ml-1">{{ $transporterQuotesCount }}</span>
                                            @else
                                            <span class="value bid_count ml-1">0</span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex flex-wrap align-items-end upper-right px-0 px-md-3">
                                    <div class="row w-100 mx-0">
                                        @if ($quote->watchlist)
                                        <a href="javascript:;" class="add_to_wishlist d-none d-md-inline-block"
                                            onclick="removeToWatchlist('{{ $quote->id }}');">

                                            Add to watchlist
                                        </a>
                                        @else
                                        <a href="javascript:;" class="add_to_wishlist d-none d-md-inline-block"
                                            onclick="addToWatchlist('{{ $quote->id }}');">
                                            Add to watchlist
                                        </a>
                                        @endif

                                        <div class="place_bid_wrap view-quote my-0 ml-md-2 mr-0">
                                            @if ($quote->quoteByTransporter)
                                            <a href="javascript:;"
                                                onclick="share_edit_quote('{{ $quote->id }}');"
                                                class="place_bid_btn">Edit
                                                bid</a>
                                            @else
                                            <a href="javascript:;"
                                                onclick="share_give_quote('{{ $quote->id }}');"
                                                class="place_bid_btn">Place
                                                bid</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bid_wrapper">
                        <h2 class="heading mb-0 mt-4 pt-md-5 pb-4">Quotes & Questions</h2>
                        @if ($quotebytransporters->isNotEmpty())
                        <div class="accordion" id="accordionBids">
                            @foreach ($quotebytransporters as $key => $transporter)
                            <div class="card bg-transparent border-0 rounded-0">
                                <div class="card-header bg-white border-0 justify-content-between"
                                    id="bid{{ $key }}">
                                    @if ($key == 1)
                                    <span class="bid_lowest">Lowest</span>
                                    @endif
                                    <div class="d-flex flex-wrap align-items-center">
                                        <svg width="34" height="34" viewBox="0 0 34 34"
                                            fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                                            <path
                                                d="M17 0.375C13.7119 0.375 10.4976 1.35004 7.76365 3.17682C5.02968 5.0036 2.89882 7.60007 1.64051 10.6379C0.382203 13.6757 0.0529729 17.0184 0.694452 20.2434C1.33593 23.4683 2.91931 26.4306 5.24436 28.7556C7.5694 31.0807 10.5317 32.6641 13.7566 33.3056C16.9816 33.947 20.3243 33.6178 23.3621 32.3595C26.3999 31.1012 28.9964 28.9703 30.8232 26.2364C32.65 23.5024 33.625 20.2881 33.625 17C33.625 12.5908 31.8734 8.36214 28.7557 5.24435C25.6379 2.12656 21.4092 0.375 17 0.375ZM9.87501 29.3381C10.0514 27.5805 10.8745 25.9511 12.1845 24.766C13.4944 23.5809 15.1979 22.9247 16.9644 22.9247C18.7309 22.9247 20.4343 23.5809 21.7443 24.766C23.0543 25.9511 23.8773 27.5805 24.0538 29.3381C21.9011 30.5908 19.455 31.2507 16.9644 31.2507C14.4738 31.2507 12.0277 30.5908 9.87501 29.3381ZM26.1913 27.8419C25.6851 25.7769 24.5009 23.9413 22.828 22.629C21.1552 21.3167 19.0905 20.6035 16.9644 20.6035C14.8382 20.6035 12.7735 21.3167 11.1007 22.629C9.42791 23.9413 8.24366 25.7769 7.73751 27.8419C5.51465 25.9532 3.92493 23.4279 3.18303 20.6069C2.44112 17.7859 2.58278 14.8053 3.58886 12.0674C4.59494 9.3295 6.41698 6.96631 8.80893 5.29694C11.2009 3.62757 14.0475 2.73244 16.9644 2.73244C19.8813 2.73244 22.7279 3.62757 25.1198 5.29694C27.5118 6.96631 29.3338 9.3295 30.3399 12.0674C31.346 14.8053 31.4876 17.7859 30.7457 20.6069C30.0038 23.4279 28.4141 25.9532 26.1913 27.8419ZM17 7.5C15.8257 7.5 14.6777 7.84823 13.7013 8.50065C12.7249 9.15307 11.9639 10.0804 11.5145 11.1653C11.0651 12.2503 10.9475 13.4441 11.1766 14.5958C11.4057 15.7476 11.9712 16.8056 12.8016 17.6359C13.6319 18.4663 14.6899 19.0318 15.8417 19.2609C16.9934 19.49 18.1873 19.3724 19.2722 18.923C20.3571 18.4736 21.2844 17.7126 21.9369 16.7362C22.5893 15.7598 22.9375 14.6118 22.9375 13.4375C22.9375 11.8628 22.312 10.3526 21.1985 9.23905C20.085 8.12556 18.5747 7.5 17 7.5ZM17 17C16.2954 17 15.6066 16.7911 15.0208 16.3996C14.4349 16.0082 13.9783 15.4518 13.7087 14.8008C13.439 14.1498 13.3685 13.4335 13.506 12.7425C13.6434 12.0514 13.9827 11.4167 14.4809 10.9184C14.9792 10.4202 15.6139 10.0809 16.305 9.94345C16.9961 9.80599 17.7124 9.87654 18.3633 10.1462C19.0143 10.4158 19.5707 10.8724 19.9621 11.4583C20.3536 12.0441 20.5625 12.7329 20.5625 13.4375C20.5625 14.3823 20.1872 15.2885 19.5191 15.9566C18.851 16.6247 17.9448 17 17 17Z"
                                                fill="#5B5B5B" />
                                        </svg>
                                        <div>
                                            <div class="bidder_name mb-1">
                                                @if ($transporter->getTransporters->id === Auth::user()->id)
                                                (You)
                                                @endif
                                                <span>{{ $transporter->getTransporters->username }}</span>
                                            </div>
                                            <div class="bidder_verified d-flex flex-wrap align-items-center">
                                                <svg width="15" height="16" viewBox="0 0 15 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="mr-1">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M14 4.521C14.125 11.366 10.042 14.278 7.727 14.965C7.57366 15.0106 7.41034 15.0106 7.257 14.965C4.98 14.29 1.014 11.464 1 4.862C1.01372 4.29149 1.33458 3.7729 1.839 3.506C5.363 1.516 7.058 1 7.489 1C7.92 1 9.749 1.549 13.507 3.7C13.8045 3.86767 13.9918 4.17958 14 4.521Z"
                                                        stroke="#5B5B5B" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M4.5 8.01502L6.5 10.015L10.5 6.00702"
                                                        stroke="#5B5B5B" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <span>Verified</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div>
                                            <div class="bidder_bid">
                                                {{ $key == 0 ? 'Your bid' : 'Current bid' }}:
                                                <span>£{{ round($transporter->transporter_payment) }}</span>
                                            </div>
                                            <button class="btn view_message" type="button"
                                                data-toggle="collapse"
                                                data-target="#bidCollapse{{ $key }}"
                                                aria-expanded="{{ $key == 0 ? 'true' : 'false' }}"
                                                aria-controls="bidCollapse{{ $key }}">
                                                {{ $key == 0 ? 'Your messages' : 'View messages' }}
                                                <span
                                                    class="message_count">{{ $transporter->count_messages }}</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div id="bidCollapse{{ $key }}"
                                    class="collapse {{ $key == 0 ? 'show' : '' }}"
                                    aria-labelledby="bid{{ $key }}" data-parent="#accordionBids">
                                    <div class="card-body">
                                        @foreach ($transporter->messages as $set => $message)
                                        <div class="message-info @if ($set >= 2) hidden-message @endif"
                                            @if ($set>= 2) style="display: none;" @endif>
                                            <p>
                                                @if ($message->sender->type == 'car_transporter')
                                                @if($message->sender->id === Auth::user()->id)
                                                <span>You</span>
                                                @else
                                                <span>{{ $message->sender->username }}</span>
                                                @endif
                                                @else
                                                <span>User</span>
                                                @endif
                                                sent on
                                                {{ $message->created_at->format('d/m') }} at
                                                {{ $message->created_at->format('H:i') }}
                                            </p>
                                            <p>"{{ $message->message }}"</p>
                                        </div>
                                        @endforeach
                                        @if ($transporter->messages->count() > 2)
                                        <a id="read-more" class=" mb-3">View More</a>
                                        {{-- <div id="show-less" class="mb-3"
                                                        style="display: none;">Show Less</div> --}}
                                        @endif
                                        @if ($key == '0')
                                        @if (Auth::user() && Auth::user()->id == $transporter->getTransporters->id)
                                        <form id="chat__form_{{ $key }}"
                                            action="{{ route('transporter.message.quote_send_message') }}"
                                            method="POST">
                                            @csrf
                                            <?php
                                            $thread = App\Thread::where('user_id', $quote->user_id)
                                                ->where('friend_id', Auth::user()->id)
                                                ->where('user_quote_id', $transporter->user_quote_id)
                                                ->first();
                                            ?>
                                            <input type="hidden" name="form_page" value="quote">
                                            <input type="hidden" name="user_id"
                                                value="{{ $quote->user_id }}">
                                            <input type="hidden" name="user_quote_id"
                                                value="{{ $transporter->user_quote_id }}">
                                            <input type="hidden" name="user_current_chat_id"
                                                id="user_current_chat_id_{{ $key }}"
                                                value="{{ $thread ? $thread->id : 0 }}">
                                            <textarea id="message" class="textarea" name="message" placeholder="Ask a question about this job."></textarea>
                                            <div class="position-relative note">
                                                <svg width="15" height="13"
                                                    viewBox="0 0 15 13" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M13.5634 9.26532L8.95906 1.78565C8.65532 1.27285 8.10354 0.958374 7.50754 0.958374C6.91154 0.958374 6.35976 1.27285 6.05602 1.78565L1.45089 9.26532C1.10268 9.81055 1.07274 10.5004 1.37241 11.0738C1.67208 11.6471 2.25557 12.0163 2.90202 12.0417H12.1123C12.7587 12.0163 13.3422 11.6471 13.6419 11.0738C13.9415 10.5004 13.9116 9.81055 13.5634 9.26532Z"
                                                        stroke="#5B5B5B" stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M7.50749 7.29175L7.50749 3.33341"
                                                        stroke="#5B5B5B" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                    <path d="M7.50749 9.66675V8.87508" stroke="#5B5B5B"
                                                        stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                <span>
                                                    Do not share any contact details here. We will
                                                    provide you
                                                    with the users contact details after they have
                                                    accepted your
                                                    quote.
                                                </span>
                                            </div>
                                            <div class="message-error error" style="display:none">
                                                Please enter your message.</div>
                                            <button type="button" id="formId"
                                                onclick="sendMessage({{ $key }});"
                                                class="btn send_message">
                                                Send message
                                                <svg width="19" height="19"
                                                    viewBox="0 0 19 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.7637 3.65881L15.2551 15.4893C15.0658 16.3242 14.5722 16.5321 13.8709 16.1387L10.0486 13.3221L8.20428 15.0959C8.00018 15.3 7.82947 15.4707 7.43611 15.4707L7.71072 11.578L14.7949 5.17658C15.1029 4.90198 14.7281 4.74983 14.3162 5.02444L5.55838 10.5389L1.78807 9.35881C0.967949 9.10276 0.953105 8.53869 1.95877 8.14533L16.706 2.46389C17.3888 2.20783 17.9863 2.61604 17.7637 3.65881Z"
                                                        fill="white" />
                                                </svg>
                                            </button>
                                        </form>
                                        @endif
                                        @endif

                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        @else
                        <p class="mt-4 mb-0 text-center"> - No quotes or questions to show yet -</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal get_quote fade" id="quote" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Place your bid</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.6584 0.166626L6.00008 4.82496L1.34175 0.166626L0.166748 1.34163L4.82508 5.99996L0.166748 10.6583L1.34175 11.8333L6.00008 7.17496L10.6584 11.8333L11.8334 10.6583L7.17508 5.99996L11.8334 1.34163L10.6584 0.166626Z"
                                fill="#000" />
                        </svg>
                    </span>
                </button>
            </div>
            <form id="main_form" method="post" action="{{ route('transporter.submit_offer') }}" class="bid_form">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <span class="icon_includes">£</span>
                        <input type="tel" class="form-control" aria-describedby="emailHelp"
                            placeholder="Enter bid (inc vat)" id="amount" name="amount">
                        <!-- <p style="font-size:12px; margin-top: 10px;"><b> Note:</b> The amount you bid will be the total amount you get paid directly by the customer.</p> -->
                        <div class="modal_current">
                            <p>Current lowest bid: <span class="lowAmount">£0</span></p>
                            <p>Transporters bidding: <span class="red bidCount">0</span></p>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:0px">
                        <textarea placeholder="Send a professional message for a better chance of winning the job..."
                            class="form-control textarea" id="message" name="message"></textarea>
                    </div>
                </div>
                <div class="modal-footer" style="margin-top: 10px;">
                    <input type="hidden" name="quote_id" id="quote_id" value="">
                    <p class="position-relative pl-4" style="line-height:16px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="20" height="20"
                            style="left:0; top:0;" class="position-absolute" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" className="size-6">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>
                        Do not share any contact details here. We will provide you with the users contact details after
                        they have accepted your quote.
                    </p>
                    <button type="submit" class="submit_btn">Place bid</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        {{-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> --}}
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ $quote->image }}" class="d-block w-100" alt="..." />
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset($quote->image_1) }}" class="d-block w-100" alt="..." />

                            {{-- <img src="{{ $quote->image_1 }}" class="d-block w-100" alt="..." /> --}}
                        </div>
                        {{-- <div class="carousel-item">
                            <img src="https://images.pexels.com/photos/919073/pexels-photo-919073.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="..." />
                        </div> --}}
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <span class="close">&times;</span>
                <img id="img01" class="img-fluid" />

                <div id="caption"></div>
            </div>
        </div>
    </div>
</div> -->
{{-- EDIT  --}}
<div class="modal get_quote fade" id="quoteEdit" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Edit bid</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    onClick="adjustbackdrop()">
                    <span aria-hidden="true">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.6584 0.166626L6.00008 4.82496L1.34175 0.166626L0.166748 1.34163L4.82508 5.99996L0.166748 10.6583L1.34175 11.8333L6.00008 7.17496L10.6584 11.8333L11.8334 10.6583L7.17508 5.99996L11.8334 1.34163L10.6584 0.166626Z"
                                fill="#000" />
                        </svg>
                    </span>
                </button>
            </div>
            <form id="editQuoteForm" action="{{ route('transporter.submit_offer') }}" method="POST"
                class="bid_form">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <span class="icon_includes">£</span>
                        <input type="tel" class="form-control" aria-describedby="emailHelp"
                            placeholder="Enter bid (inc vat)" id="editamount" name="amount">
                        <!-- <p style="font-size:12px; margin-top: 10px;"><b> Note:</b> The amount you bid will be the total amount you get paid directly by the customer.</p> -->
                        <div class="modal_current">
                            <p>Current lowest bid: <span class="lowAmount">£0</span></p>
                            <p>Transporters bidding: <span class="red bidCount">0</span></p>
                        </div>
                    </div>
                    {{-- <div class="form-group" style="margin-bottom:0px">
                        <textarea placeholder="Send a professional message for a better chance of winning the job..."
                            class="form-control textarea" id="editmessage" name="message"></textarea>
                    </div> --}}
                </div>
                <div class="modal-footer" style="margin-top: 10px;">
                    <input type="hidden" name="quote_id" id="quote_edit_id" value="">
                    {{-- <p><b> Note:</b> Do not share any contact information or company names, we will provide you with the
                        customers details after they have accepted your quote.</p> --}}
                    <button type="submit" class="submit_btn">Submit bid</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection

@section('script')
{{-- <script src="{{ asset('assets/web/js/admin.js') }}"></script> --}}
<script src="{{ asset('assets/web/js/admin.js') }}"></script>
<script src="{{ asset('assets/web/js/main.js') }}"></script>
<script src="{{ asset('assets/web/js/rangeslider.js') }}"></script>
<script type="text/javascript"
    src="https://maps.google.com/maps/api/js?key={{ config('constants.google_map_key') }}&libraries=places"></script>
{{-- <script src="https://maps.googleapis.com/maps/api/js?key={{ config('constants.google_map_key') }}&loading=async&libraries=places&callback=initMap" async defer></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.40/moment-timezone-with-data.js"
    type="text/javascript"></script>

<script>
    // var modal = document.getElementById('myModal');
    // var img = document.getElementById('myImg');
    // var modalImg = document.getElementById("img01");
    // if (img.src) {
    //     img.onclick = function() {
    //         modal.style.display = "block";
    //         modalImg.src = this.src;
    //     }
    // }

    // var span = document.querySelector("#myModal .close");
    // span.onclick = function() {
    //     modal.style.display = "none";
    // }

    function sendMessage(id) {
        var form = $('#chat__form_' + id);
        var message = form.find('.textarea').val();
        var contains_email = /\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b/i.test(message);
        var contains_digit = /\d/.test(message);
        if (!message.trim()) {
            form.find('.message-error').css('display', 'block').text("Please enter your message.");
            return;
        }
        if (contains_email || contains_digit) {
            form.find('.message-error').css('display', 'block').text(
                "Do not share contact information or you will be banned.");
            return;
        }

        var send_message = false;

        if (!isEmptyOrSpaces(message)) {
            send_message = true;
        }

        if (send_message == true) {
            var submitButton = form.find(".send-msg");
            submitButton.prop("disabled", true).text("Please Wait...");
            var file_type = form.find('#file_type').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                }
            });

            var timezone = moment.tz.guess();
            var data = new FormData(form[0]); // Form data needs to be from the specific form
            data.append('message', message);
            data.append('file_type', file_type);
            data.append('timezone', timezone);

            $.ajax({
                url: form.attr('action'),
                method: "POST",
                data: data,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
            }).done(function(response) {
                submitButton.prop("disabled", false).html(
                    "Send message <svg width='17' height='15' viewBox='0 0 17 15' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M16.7637 1.65906L14.2551 13.4895C14.0658 14.3245 13.5722 14.5323 12.8709 14.1389L9.04861 11.3223L7.20428 13.0962C7.00018 13.3003 6.82947 13.471 6.43611 13.471L6.71072 9.5782L13.7949 3.17683C14.1029 2.90222 13.7281 2.75007 13.3162 3.02468L4.55838 8.53913L0.788066 7.35906C-0.0320513 7.103 -0.0468951 6.53894 0.958769 6.14558L15.706 0.464134C16.3888 0.208079 16.9863 0.616282 16.7637 1.65906Z' fill='white'/></svg>"
                );
                if (response.status == "success") {
                    window.location.reload();
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                // Handle any unexpected errors
                submitButton.prop("disabled", false).html(
                    "Send message <svg width='17' height='15' viewBox='0 0 17 15' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M16.7637 1.65906L14.2551 13.4895C14.0658 14.3245 13.5722 14.5323 12.8709 14.1389L9.04861 11.3223L7.20428 13.0962C7.00018 13.3003 6.82947 13.471 6.43611 13.471L6.71072 9.5782L13.7949 3.17683C14.1029 2.90222 13.7281 2.75007 13.3162 3.02468L4.55838 8.53913L0.788066 7.35906C-0.0320513 7.103 -0.0468951 6.53894 0.958769 6.14558L15.706 0.464134C16.3888 0.208079 16.9863 0.616282 16.7637 1.65906Z' fill='white'/></svg>"
                );
                form.find('.message-error').css('display', 'block').text(
                    "Do not share contact information or you will be banned.");
            });
        }
    }

    function isEmptyOrSpaces(str) {
        return str === null || str.match(/^ *$/) !== null;
    }

    $(function() {
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
    var globalSiteUrl = '<?php echo $path = url('/'); ?>'

    // function fetch_data(page) {
    //     $.ajax({
    //         url: globalSiteUrl + "/transporter/feedback_listing?page=" + page + '&' + params(),
    //         success: function(res) {
    //             let result = res.data;
    //             if (result) {
    //                 $('#feedback_listing').html(result.html);
    //             }
    //         }
    //     });
    // }

    function params() {
        var search = $('#search').val();
        return "search=" + search;
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

    $(document).ready(function() {
        $('body').attr('id', 'transporter-feedback');
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

    function adjustbackdrop() {
        $('.modal-backdrop').css('z-index', '1040');
    }

    function share_edit_quote(id) {
        // console.log('aaaaaaaaaaaaaaa');
        $('#quote_edit_id').val(id);
        var quotes = @json($quote);
        var selectedQuote = quotes;
        if (selectedQuote) {
            var lowestBid = selectedQuote.lowest_bid ? selectedQuote.lowest_bid : 0;
            var bidCount = selectedQuote.transporter_quotes_count ? selectedQuote.transporter_quotes_count : 0;
            // $('#editamount').val(selectedQuote.quote_by_transporter.price);
            $('#editmessage').val(selectedQuote.quote_by_transporter.message);
            $('.lowAmount').text('£' + lowestBid);
            $('.bidCount').text(bidCount);
            // Prevent closing quote modal when clicking outside
            $('#quoteEdit').modal({
                backdrop: 'static',
                keyboard: false
            });
            // if(isMobile) {
            $('#quoteEdit').css('z-index', parseInt($('#carDetailsModal').css('z-index')) + 10);
            $('.modal-backdrop').css('z-index', parseInt($('#carDetailsModal').css('z-index')) + 5);
            // }
            $('#quoteEdit').modal('show');
        }
    }

    function share_give_quote(id) {
        $('#quote_id').val(id);
        var quotes = @json($quote);
        var selectedQuote = quotes;
        if (selectedQuote) {
            var lowestBid = selectedQuote.lowest_bid ? selectedQuote.lowest_bid : 0;
            var bidCount = selectedQuote.transporter_quotes_count ? selectedQuote.transporter_quotes_count : 0;

            $('.lowAmount').text('£' + lowestBid);
            $('.bidCount').text(bidCount);
            // Prevent closing quote modal when clicking outside
            $('#quote').modal({
                backdrop: 'static',
                keyboard: false
            });
            // if(isMobile) {
            $('#quote').css('z-index', parseInt($('#carDetailsModal').css('z-index')) + 10);
            $('.modal-backdrop').css('z-index', parseInt($('#carDetailsModal').css('z-index')) + 5);
            // }
            $('#quote').modal('show');
        }
    }

    function removeToWatchlist(quoteId) {
        $.ajax({
            url: "{{ route('transporter.watchlist.remove') }}", // Replace with your route for adding to the watchlist
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}', // CSRF token for security
                quote_id: quoteId // Quote ID to be sent
            },
            success: function(response) {
                if (response.success) {
                    // Show a success message or update the UI accordingly
                    toastr.success('Job removed from watchlist!');
                    setTimeout(function() {
                        location.reload(); // Reload the page
                    }, 2000);
                } else {
                    // Handle the case where the operation wasn't successful
                    toastr.error(response.message); // Display the specific message returned from the server
                }
            },
            error: function(xhr, status, error) {
                // General error handling for unexpected issues
                console.error('An error occurred:', error);
                toastr.error('An error occurred while adding to the watchlist.');
            }
        });
    }

    function addToWatchlist(quoteId) {
        console.log('Adding quote to watchlist with ID:', quoteId); // Log for debugging

        // Send the AJAX request
        $.ajax({
            url: "{{ route('transporter.watchlist.store') }}", // Replace with your route for adding to the watchlist
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}', // CSRF token for security
                quote_id: quoteId // Quote ID to be sent
            },
            success: function(response) {
                if (response.success) {
                    // Show a success message or update the UI accordingly
                    toastr.success('Job added to watchlist!');
                    setTimeout(function() {
                        location.reload(); // Reload the page
                    }, 2000);
                } else {
                    // Handle the case where the operation wasn't successful
                    toastr.error(response.message); // Display the specific message returned from the server
                }
            },
            error: function(xhr, status, error) {
                // General error handling for unexpected issues
                console.error('An error occurred:', error);
                toastr.error('An error occurred while adding to the watchlist.');
            }
        });
    }
</script>
<script>
    $(document).ready(function() {
        var globalSiteUrl = '<?php echo $path = url('/'); ?>'
        var isMobile = '{{ isMobile() }}';
        $.validator.addMethod("noPhoneOrEmail", function(value, element) {
            var contains_email = /\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b/i.test(value);
            var contains_six_or_more_digits = value.replace(/\s+/g, '').match(/\d{7,}/);
            return !(contains_email || contains_six_or_more_digits);
        });
        $.validator.addMethod("greaterThanZero", function(value, element) {
            return this.optional(element) || parseFloat(value) > 0;
        }, "You must enter an amount greater than zero");

        $("#editQuoteForm").validate({
            rules: {
                amount: {
                    required: true,
                    noPhoneOrEmail: false,
                    greaterThanZero: true
                },
                message: {
                    required: true,
                    noPhoneOrEmail: true,
                },
            },
            messages: {
                amount: {
                    required: 'Please enter amount',
                    noPhoneOrEmail: `Do not share contact information or you will be banned.`,
                    greaterThanZero: 'You must enter an amount greater than zero'
                },
                message: {
                    required: 'Please enter message',
                    noPhoneOrEmail: `Do not share contact information or you will be banned.`
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.insertAfter($(element));
            },
            submitHandler: function(form) {
                event.preventDefault();
                // console.log("hello....................................");
                var submitButton = $(form).find('button[type="submit"]');
                submitButton.prop('disabled', true).text('Submitting...');
                $.ajax({
                    url: $(form).attr('action'),
                    type: 'POST',
                    data: $(form).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: '<span class="swal-title">Bid placed</span>',
                                html: '<span class="swal-text">Your bid has been placed successfully.</span>',
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
                                if (result.isConfirmed || result.isDismissed) {
                                    window.location.reload();
                                }
                            });
                        } else {
                            submitButton.prop('disabled', false).text('Submit');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        if (jqXHR.responseJSON && jqXHR.responseJSON.errors) {
                            var errors = jqXHR.responseJSON.errors;
                            $('#main_form').find('span.error').remove();
                            $.each(errors, function(key, errorMessages) {
                                alert(key)
                                var element = $('#' + key);
                                if (element.length > 0) {
                                    var errorElement = element.next(
                                        'span.error');
                                    if (errorElement.length === 0) {
                                        errorElement = $('<span id=' + key +
                                            '-error class="error"></span>');
                                        element.after(errorElement);
                                    }

                                    errorElement.text(errorMessages[0]);
                                }
                            });
                        } else {
                            console.error('Unexpected error:', textStatus, errorThrown);
                        }
                        submitButton.prop('disabled', false).text('Submit');
                    }
                });
            }
        });

        $("#main_form").validate({
            rules: {
                amount: {
                    required: true,
                    noPhoneOrEmail: false,
                    greaterThanZero: true
                },
                message: {
                    required: true,
                    noPhoneOrEmail: true,
                },
            },
            messages: {
                amount: {
                    required: 'Please enter amount',
                    noPhoneOrEmail: `Do not share contact information or you will be banned.`,
                    greaterThanZero: 'You must enter an amount greater than zero'
                },
                message: {
                    required: 'Please enter message',
                    noPhoneOrEmail: `Do not share contact information or you will be banned.`
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.insertAfter($(element));
            },
            submitHandler: function(form) {
                var submitButton = $(form).find('button[type="submit"]');
                submitButton.prop('disabled', true).text('Submitting...');
                $.ajax({
                    url: $(form).attr('action'),
                    type: 'POST',
                    data: $(form).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: '<span class="swal-title">Bid placed</span>',
                                html: '<span class="swal-text">Your bid has been placed successfully.</span>',
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
                                if (result.isConfirmed || result.isDismissed) {
                                    window.location.reload();
                                }
                            });
                        } else {
                            submitButton.prop('disabled', false).text('Submit');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        if (jqXHR.responseJSON && jqXHR.responseJSON.errors) {
                            var errors = jqXHR.responseJSON.errors;
                            $('#main_form').find('span.error').remove();
                            $.each(errors, function(key, errorMessages) {
                                alert(key)
                                var element = $('#' + key);
                                if (element.length > 0) {
                                    var errorElement = element.next(
                                        'span.error');
                                    if (errorElement.length === 0) {
                                        errorElement = $('<span id=' + key +
                                            '-error class="error"></span>');
                                        element.after(errorElement);
                                    }

                                    errorElement.text(errorMessages[0]);
                                }
                            });
                        } else {
                            console.error('Unexpected error:', textStatus, errorThrown);
                        }
                        submitButton.prop('disabled', false).text('Submit');
                    }
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        const messagesToShow = 2; // Number of messages to toggle per action
        const hiddenMessages = $('.hidden-message'); // Select all hidden messages

        // On clicking "Read More"
        $('#read-more').on('click', function() {
            // Show the next batch of hidden messages
            hiddenMessages.filter(':hidden').slice(0, messagesToShow).slideDown();

            // If all messages are shown, hide "Read More" and show "Show Less"
            if (hiddenMessages.filter(':hidden').length === 0) {
                $(this).hide();
                // $('#show-less').show();
            }
        });

        // On clicking "Show Less"
        // $('#show-less').on('click', function() {
        //     // Hide all messages except the first batch
        //     hiddenMessages.slice(messagesToShow).slideUp();

        //     // Show "Read More" and hide "Show Less"
        //     $('#read-more').show();
        //     $(this).hide();
        // });
    });
</script>
@endsection