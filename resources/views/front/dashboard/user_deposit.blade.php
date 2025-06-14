@extends('layouts.web.dashboard.app')

@section('head_css')
@endsection
<style>
    .wd-quote-msg .wd-transport-lft {
        width: 45px;
    }

    .wd-quote-msg .wd-transport-txt {
        width: calc(100% - 58px);
    }

    .wd-deposit-title h1 {
        color: #000;
    }

    .wd-deposit-title-top {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .wd-deposit-title-top .wd-dlvr-id h2 {
        font-size: 38px;
        font-weight: 300;
        margin-bottom: 0;
    }

    .col-md-8.left_section,
    .deposit-area-secound-row .col-lg-8 {
        padding-right: 50px;
    }

    .series_rgt ul li.series_rgt_img img {
        border-radius: 6px;
        width: 162px;
        height: 108px;
        object-fit: cover;
    }

    .wd-resolve-btn {
        color: #fff !important;
        width: 80% !important;
        margin-bottom: 0;
    }

    .right_section .wd-dlvr-id {
        display: none;
    }

    .row.deposit-area-secound-row {
        margin-top: -110px;
    }

    .deposit-area-secound-row .col-lg-4 {
        display: none;
    }

    .wd-deposit-area tfoot tr td:first-child {
        gap: 0 !important;
    }

    @media(max-width: 1199px) {

        .col-md-8.left_section,
        .deposit-area-secound-row .col-lg-8 {
            padding-right: 15px;
        }

        .wd-deposit-title h1 {
            font-size: 22px !important;
        }

        .series-listing ul {
            gap: 15px;
        }

        .wd-deposit-title-top .wd-dlvr-id h2 {
            font-size: 30px;
        }

        .series_rgt ul li.series_rgt_img img {
            border-radius: 5px;
            width: 120px;
        }

        .right_section .wd-dlvr-dtls li a {
            font-size: 12px;
        }

        .right_section .wd-dlvr-dtls li p {
            font-size: 12px;
        }

        .wd-dlvr-profl {}

        .wd-dlvr-img {
            width: 30%;
        }

        .wd-dlvr-contact {
            width: 61%;
        }

        .wd-dlvr-profl .wd-dlvr-img img {
            width: 50px;
            height: 50px;
        }

        .wd-dlvr-img span {
            bottom: 0;
            top: 36px;
        }



    }

    @media(max-width: 991px) {
        .row.deposit-area-secound-row {
            margin-top: 0;
        }

        li.series_rgt_img {
            margin-bottom: 15px;
        }

    }

    @media(max-width: 767px) {
        .col-md-8.left_section {
            width: 70%;
        }

        .col-md-4.right_section {
            width: 30%;
        }

        .wd-deposit-title h1 {
            font-size: 20px !important;
        }


    }

    @media(max-width: 580px) {


        .right_section .wd-dlvr-img img {
            width: 38px;
            height: 38px;
        }

        .right_section .wd-dlvr-profl {
            gap: 7px;
        }

        .right_section .wd-dlvr-profl span {
            bottom: auto;
            top: 27px;
            right: -5px;
        }

        .right_section .wd-dlvr-contact h3 {
            font-size: 20px;
            color: #0356D6;
            margin-bottom: 0;
        }

        .right_section .wd-star-lst li svg {
            width: 15px;
            height: 15px;
        }

        .wd-dlvr-dtls li svg {
            width: 15px;
            height: 15px;
        }

        .wd-dlvr-dtls li {
            gap: 6px;
            align-items: center;
        }

        .right_section .wd-dlvr-dtls {
            margin: 15px 0 10px;
            padding-bottom: 5px;
        }

        .right_section .wd-resolve-btn {
            width: 90% !important;
            color: #FFFFFF !important;
        }

        .right_section .wd-dlvr-id h2 {
            font-size: 40px;
        }

        .right_section .wd-dlvr-id p {
            font-size: 14px;
        }

        .right_section {
            margin-bottom: 50px;
        }

        .left_section .series-listing ul {
            overflow: initial;
        }

        .left_section .series-listing ul p.dp_title {
            display: block !important;
            font-size: 14px;
        }

        .left_section .series-listing ul li.list_detail {
            display: block;
            margin: 20px 0;
        }

        .left_section .series-listing ul li.list_detail p b {
            font-size: 16px;
        }

        .left_section .series_flx.series-listing {
            border-bottom: 0;
        }

        .left_section .wd-deposit-title {
            display: block;
            margin-bottom: 10px;
        }

        .left_section .wd-deposit-title img.img-fluid {
            width: 133px;
            border-radius: 10px;
            margin-top: 15px;
            height: 80px;
            object-fit: cover;
        }

        .error {
            font-size: 12px;
            color: red;
            /* padding: 3px 15px; */
        }

        .resolve_bx .modal-header button.close {
            margin: 0 !important;
            position: absolute;
            right: -13px;
            top: -14px;
        }

        .resolve_bx .modal-header {
            position: relative;
        }

        .resolve_bx .form-group {
            position: relative;
        }

        .resolve_bx .form-group label.error {
            padding: 0 !important;
            position: absolute;
            left: 0;
        }

        .message-error {
            font-size: 14px;
            color: red;
            margin-top: -15px;
        }

        .send-msg {
            color: #fff !important;
        }

        .col-md-8.left_section {
            width: 40%;
        }

        .col-md-4.right_section {
            width: 60%;
        }

        .wd-deposit-title-top .wd-dlvr-id {
            display: none;
        }

        .right_section .wd-dlvr-id {
            display: block;
        }

        form#chat__form {
            border-bottom: 1px solid #C8C8C8;
            padding-bottom: 35px;
            margin-bottom: 35px;
        }

        form#chat__form textarea.form-control.textarea {
            height: 110px;
        }

        .wd-deposit-area tfoot tr td:first-child {
            grid-gap: 0 !important;
        }

        .wd-dlvr-img {
            width: auto;
        }


    }
</style>
@section('content')
    @include('layouts.web.dashboard.header')
    <section class="wd-deposit-area">
        <div class="row">
            <div class="col-md-8 left_section">
                <div class="wd-deposit-title">
                    <div class="wd-deposit-title-top">
                        <h1>{{ $user_info->vehicle_make }} {{ $user_info->vehicle_model }}
                            @if (!is_null($user_info->vehicle_make_1) && !is_null($user_info->vehicle_model_1))
                                / {{ $user_info->vehicle_make_1 }} {{ $user_info->vehicle_model_1 }}
                            @endif
                        </h1>
                        @php
                            $image = $user_info->image;
                            $defaultImage = asset('uploads/no_car_image.png');
                            $noQuoteImage = asset('uploads/no_quote.png');

                            if (is_null($image) || $image == $noQuoteImage) {
                                $image = $defaultImage;
                            }
                        @endphp
                        <div class="wd-dlvr-id">
                            <h2>£{{ roundBasedOnDecimal($quote_by_transporter->price) }}</h2>
                            <p>
                                @if (isset($delivery_info->delivery_reference_id))
                                    Delivery ID: {{ $delivery_info->delivery_reference_id }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="series_flx series-listing">
                    <!--  <div class="series_lft">
                        <div class="job-list-img p-0">
                            <img src="https://hexeros.com/dev/transport-any-car-new/assets/web/images/feedback.png" class="img-fluid" alt="book delivery">
                        </div>
                    </div> -->
                    <div class="series_rgt">
                        <ul>
                            <li class="series_rgt_img"><img src="{{ $image }}" class="img-fluid" alt="book delivery">
                            </li>
                            <li class="list_detail">
                                <span>
                                    <svg width="16" height="22" viewBox="0 0 16 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_580_1807)">
                                            <path
                                                d="M8.00018 0.160034C7.53626 0.160024 7.16017 0.536097 7.16016 1.00002C7.16015 1.46393 7.53622 1.84002 8.00014 1.84003L8.00018 0.160034ZM15.0002 7.91603H15.8402V7.91468L15.0002 7.91603ZM12.9492 12.8062L12.2712 12.3103C12.261 12.3243 12.2512 12.3386 12.2419 12.3531L12.9492 12.8062ZM10.9164 15.98L10.209 15.5269L10.2061 15.5316L10.9164 15.98ZM8.00016 20.6L7.29026 21.049C7.4443 21.2926 7.71241 21.4401 8.00056 21.44C8.28871 21.4399 8.55668 21.292 8.71049 21.0484L8.00016 20.6ZM5.08396 15.9898L5.79387 15.5407L5.79167 15.5373L5.08396 15.9898ZM3.05116 12.8104L3.75887 12.3579C3.74958 12.3434 3.73985 12.3291 3.72968 12.3152L3.05116 12.8104ZM5.32196 1.53063L5.63967 2.30823L5.64108 2.30765L5.32196 1.53063ZM8.0014 1.84003C8.46532 1.83935 8.84084 1.46271 8.84016 0.998797C8.83948 0.534879 8.46284 0.159352 7.99892 0.160035L8.0014 1.84003ZM8.00016 9.38185C7.53624 9.38185 7.16016 9.75793 7.16016 10.2218C7.16016 10.6857 7.53624 11.0618 8.00016 11.0618V9.38185ZM8.00016 4.77025C7.53624 4.77025 7.16016 5.14633 7.16016 5.61025C7.16016 6.07417 7.53624 6.45025 8.00016 6.45025V4.77025ZM8.02084 11.07C8.48461 11.0585 8.85132 10.6733 8.83989 10.2095C8.82845 9.74577 8.44322 9.37906 7.97944 9.39049L8.02084 11.07ZM7.97944 6.45978C8.44322 6.47122 8.82845 6.10452 8.83989 5.64074C8.85132 5.17696 8.48462 4.79173 8.02084 4.78029L7.97944 6.45978ZM8.00014 1.84003C8.80956 1.84005 9.61124 1.99762 10.3605 2.30395L10.9966 0.749026C10.0456 0.36018 9.02762 0.160056 8.00018 0.160034L8.00014 1.84003ZM10.3605 2.30395C11.4834 2.7635 12.4447 3.54507 13.124 4.55033L14.516 3.60973C13.651 2.32962 12.4264 1.33423 10.9966 0.749026L10.3605 2.30395ZM13.124 4.55033C13.7971 5.54409 14.1583 6.71713 14.1602 7.91738L15.8402 7.91468C15.8377 6.37948 15.3769 4.88081 14.516 3.60973L13.124 4.55033ZM14.1602 7.91603C14.1602 8.72869 14.0338 9.33195 13.757 9.95597C13.4678 10.608 13.004 11.3082 12.2712 12.3103L13.6272 13.3021C14.3616 12.298 14.9233 11.4701 15.2928 10.6371C15.6747 9.77611 15.8402 8.93737 15.8402 7.91603H14.1602ZM12.2419 12.3531L10.209 15.5269L11.6237 16.4331L13.6565 13.2593L12.2419 12.3531ZM10.2061 15.5316L7.28983 20.1516L8.71049 21.0484L11.6267 16.4284L10.2061 15.5316ZM8.71006 20.151L5.79387 15.5407L4.37406 16.4388L7.29026 21.049L8.71006 20.151ZM5.79167 15.5373L3.75887 12.3579L2.34345 13.2629L4.37625 16.4423L5.79167 15.5373ZM3.72968 12.3152C2.99643 11.3105 2.53256 10.6102 2.24323 9.95839C1.96649 9.33492 1.84016 8.73278 1.84016 7.92023L0.160156 7.9194C0.160156 8.94086 0.325728 9.77943 0.70769 10.6399C1.07706 11.4721 1.63869 12.2999 2.37264 13.3056L3.72968 12.3152ZM1.84016 7.92023C1.84135 6.71873 2.20205 5.54589 2.87585 4.55109L1.48487 3.60897C0.623043 4.88138 0.161683 6.38258 0.160156 7.9194L1.84016 7.92023ZM2.87585 4.55109C3.55567 3.5472 4.51731 2.76679 5.63967 2.30823L5.00425 0.753033C3.57504 1.33697 2.35056 2.3306 1.48487 3.60897L2.87585 4.55109ZM5.64108 2.30765C6.39004 2.00005 7.19173 1.84122 8.0014 1.84003L7.99892 0.160035C6.97117 0.161548 5.95354 0.363159 5.00284 0.753614L5.64108 2.30765ZM8.00016 11.0618C9.12405 11.0618 10.1626 10.4622 10.7245 9.48895L9.26958 8.64895C9.00774 9.10247 8.52384 9.38185 8.00016 9.38185V11.0618ZM10.7245 9.48895C11.2865 8.51563 11.2865 7.31646 10.7245 6.34315L9.26958 7.18315C9.53142 7.63667 9.53142 8.19543 9.26958 8.64895L10.7245 9.48895ZM10.7245 6.34315C10.1626 5.36983 9.12405 4.77025 8.00016 4.77025V6.45025C8.52384 6.45025 9.00774 6.72963 9.26958 7.18315L10.7245 6.34315ZM7.97944 9.39049C7.44731 9.40361 6.94989 9.12722 6.67997 8.66844L5.232 9.52036C5.81129 10.5049 6.87881 11.0981 8.02084 11.07L7.97944 9.39049ZM6.67997 8.66844C6.41005 8.20967 6.41005 7.64061 6.67997 7.18184L5.232 6.32992C4.6527 7.31451 4.6527 8.53578 5.232 9.52036L6.67997 8.66844ZM6.67997 7.18184C6.94989 6.72306 7.44731 6.44667 7.97944 6.45978L8.02084 4.78029C6.87881 4.75215 5.81129 5.34532 5.232 6.32992L6.67997 7.18184Z"
                                                fill="#52D017" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_580_1807">
                                                <rect width="16" height="22" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </span>
                                <p class="dp_title">Drop-off area:</p>
                                <p><b>{{ $user_info->drop_postcode ? extractPostcode($user_info->drop_postcode) : '-' }}</b>
                                </p>
                            </li>
                            <li class="list_detail">
                                <span>
                                    <svg width="16" height="22" viewBox="0 0 16 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.00018 0.160034C7.53626 0.160024 7.16017 0.536097 7.16016 1.00002C7.16015 1.46393 7.53622 1.84002 8.00014 1.84003L8.00018 0.160034ZM15.0002 7.91603H15.8402V7.91468L15.0002 7.91603ZM12.9492 12.8062L12.2712 12.3103C12.261 12.3243 12.2512 12.3386 12.2419 12.3531L12.9492 12.8062ZM10.9164 15.98L10.209 15.5269L10.2061 15.5316L10.9164 15.98ZM8.00016 20.6L7.29026 21.049C7.4443 21.2926 7.71241 21.4401 8.00056 21.44C8.28871 21.4399 8.55668 21.292 8.71049 21.0484L8.00016 20.6ZM5.08396 15.9898L5.79387 15.5407L5.79167 15.5373L5.08396 15.9898ZM3.05116 12.8104L3.75887 12.3579C3.74958 12.3434 3.73985 12.3291 3.72968 12.3152L3.05116 12.8104ZM5.32196 1.53063L5.63967 2.30823L5.64108 2.30765L5.32196 1.53063ZM8.0014 1.84003C8.46532 1.83935 8.84084 1.46271 8.84016 0.998797C8.83948 0.534879 8.46284 0.159352 7.99892 0.160035L8.0014 1.84003ZM8.00016 9.38185C7.53624 9.38185 7.16016 9.75793 7.16016 10.2218C7.16016 10.6857 7.53624 11.0618 8.00016 11.0618V9.38185ZM8.00016 4.77025C7.53624 4.77025 7.16016 5.14633 7.16016 5.61025C7.16016 6.07417 7.53624 6.45025 8.00016 6.45025V4.77025ZM8.02084 11.07C8.48461 11.0585 8.85132 10.6733 8.83989 10.2095C8.82845 9.74577 8.44322 9.37906 7.97944 9.39049L8.02084 11.07ZM7.97944 6.45978C8.44322 6.47122 8.82845 6.10452 8.83989 5.64074C8.85132 5.17696 8.48462 4.79173 8.02084 4.78029L7.97944 6.45978ZM8.00014 1.84003C8.80956 1.84005 9.61124 1.99762 10.3605 2.30395L10.9966 0.749026C10.0456 0.36018 9.02762 0.160056 8.00018 0.160034L8.00014 1.84003ZM10.3605 2.30395C11.4834 2.7635 12.4447 3.54507 13.124 4.55033L14.516 3.60973C13.651 2.32962 12.4264 1.33423 10.9966 0.749026L10.3605 2.30395ZM13.124 4.55033C13.7971 5.54409 14.1583 6.71713 14.1602 7.91738L15.8402 7.91468C15.8377 6.37948 15.3769 4.88081 14.516 3.60973L13.124 4.55033ZM14.1602 7.91603C14.1602 8.72869 14.0338 9.33195 13.757 9.95597C13.4678 10.608 13.004 11.3082 12.2712 12.3103L13.6272 13.3021C14.3616 12.298 14.9233 11.4701 15.2928 10.6371C15.6747 9.77611 15.8402 8.93737 15.8402 7.91603H14.1602ZM12.2419 12.3531L10.209 15.5269L11.6237 16.4331L13.6565 13.2593L12.2419 12.3531ZM10.2061 15.5316L7.28983 20.1516L8.71049 21.0484L11.6267 16.4284L10.2061 15.5316ZM8.71006 20.151L5.79387 15.5407L4.37406 16.4388L7.29026 21.049L8.71006 20.151ZM5.79167 15.5373L3.75887 12.3579L2.34345 13.2629L4.37625 16.4423L5.79167 15.5373ZM3.72968 12.3152C2.99643 11.3105 2.53256 10.6102 2.24323 9.95839C1.96649 9.33492 1.84016 8.73278 1.84016 7.92023L0.160156 7.9194C0.160156 8.94086 0.325728 9.77943 0.70769 10.6399C1.07706 11.4721 1.63869 12.2999 2.37264 13.3056L3.72968 12.3152ZM1.84016 7.92023C1.84135 6.71873 2.20205 5.54589 2.87585 4.55109L1.48487 3.60897C0.623043 4.88138 0.161683 6.38258 0.160156 7.9194L1.84016 7.92023ZM2.87585 4.55109C3.55567 3.5472 4.51731 2.76679 5.63967 2.30823L5.00425 0.753033C3.57504 1.33697 2.35056 2.3306 1.48487 3.60897L2.87585 4.55109ZM5.64108 2.30765C6.39004 2.00005 7.19173 1.84122 8.0014 1.84003L7.99892 0.160035C6.97117 0.161548 5.95354 0.363159 5.00284 0.753614L5.64108 2.30765ZM8.00016 11.0618C9.12405 11.0618 10.1626 10.4622 10.7245 9.48895L9.26958 8.64895C9.00774 9.10247 8.52384 9.38185 8.00016 9.38185V11.0618ZM10.7245 9.48895C11.2865 8.51563 11.2865 7.31646 10.7245 6.34315L9.26958 7.18315C9.53142 7.63667 9.53142 8.19543 9.26958 8.64895L10.7245 9.48895ZM10.7245 6.34315C10.1626 5.36983 9.12405 4.77025 8.00016 4.77025V6.45025C8.52384 6.45025 9.00774 6.72963 9.26958 7.18315L10.7245 6.34315ZM7.97944 9.39049C7.44731 9.40361 6.94989 9.12722 6.67997 8.66844L5.232 9.52036C5.81129 10.5049 6.87881 11.0981 8.02084 11.07L7.97944 9.39049ZM6.67997 8.66844C6.41005 8.20967 6.41005 7.64061 6.67997 7.18184L5.232 6.32992C4.6527 7.31451 4.6527 8.53578 5.232 9.52036L6.67997 8.66844ZM6.67997 7.18184C6.94989 6.72306 7.44731 6.44667 7.97944 6.45978L8.02084 4.78029C6.87881 4.75215 5.81129 5.34532 5.232 6.32992L6.67997 7.18184Z"
                                            fill="#ED1C24" />
                                    </svg>
                                </span>
                                <p class="dp_title">Pickup area:</p>
                                <p><b>{{ $user_info->pickup_postcode ? extractPostcode($user_info->pickup_postcode) : '-' }}</b>
                                </p>
                            </li>
                            <li class="list_detail">
                                <span>
                                    <svg width="19" height="22" viewBox="0 0 19 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.85714 4.33928C6.36012 4.33928 6.76786 3.93154 6.76786 3.42857C6.76786 2.9256 6.36012 2.51786 5.85714 2.51786V4.33928ZM13.1429 2.51786C12.6399 2.51786 12.2321 2.9256 12.2321 3.42857C12.2321 3.93154 12.6399 4.33928 13.1429 4.33928V2.51786ZM5.85686 2.51784C5.35389 2.51784 4.94615 2.92558 4.94615 3.42855C4.94615 3.93153 5.35389 4.33927 5.85686 4.33927V2.51784ZM13.1426 4.33927C13.6456 4.33927 14.0533 3.93153 14.0533 3.42855C14.0533 2.92558 13.6456 2.51784 13.1426 2.51784V4.33927ZM6.76744 3.42859C6.76744 2.92562 6.3597 2.51787 5.85672 2.51787C5.35375 2.51787 4.94601 2.92562 4.94601 3.42859L6.76744 3.42859ZM4.94601 4.64287C4.94601 5.14585 5.35375 5.55359 5.85672 5.55359C6.3597 5.55359 6.76744 5.14585 6.76744 4.64287L4.94601 4.64287ZM4.94601 3.42857C4.94601 3.93155 5.35375 4.33929 5.85672 4.33929C6.3597 4.33929 6.76744 3.93155 6.76744 3.42857L4.94601 3.42857ZM6.76744 1C6.76744 0.497026 6.3597 0.0892857 5.85672 0.0892857C5.35375 0.0892857 4.94601 0.497026 4.94601 1L6.76744 1ZM14.0536 3.42857C14.0536 2.9256 13.6458 2.51786 13.1429 2.51786C12.6399 2.51786 12.2321 2.9256 12.2321 3.42857H14.0536ZM12.2321 4.64286C12.2321 5.14583 12.6399 5.55357 13.1429 5.55357C13.6458 5.55357 14.0536 5.14583 14.0536 4.64286H12.2321ZM12.2321 3.42857C12.2321 3.93155 12.6399 4.33929 13.1429 4.33929C13.6458 4.33929 14.0536 3.93155 14.0536 3.42857H12.2321ZM14.0536 1C14.0536 0.497026 13.6458 0.0892857 13.1429 0.0892857C12.6399 0.0892857 12.2321 0.497026 12.2321 1H14.0536ZM5.85714 2.51786C2.67164 2.51786 0.0892849 5.10021 0.0892849 8.28571H1.91071C1.91071 6.10616 3.67759 4.33928 5.85714 4.33928V2.51786ZM0.0892849 8.28571V15.5714H1.91071V8.28571H0.0892849ZM0.0892849 15.5714C0.0892849 18.7569 2.67164 21.3393 5.85714 21.3393V19.5179C3.67759 19.5179 1.91071 17.751 1.91071 15.5714H0.0892849ZM5.85714 21.3393H13.1429V19.5179H5.85714V21.3393ZM13.1429 21.3393C16.3284 21.3393 18.9107 18.7569 18.9107 15.5714H17.0893C17.0893 17.751 15.3224 19.5179 13.1429 19.5179V21.3393ZM18.9107 15.5714V8.28571H17.0893V15.5714H18.9107ZM18.9107 8.28571C18.9107 5.10021 16.3284 2.51786 13.1429 2.51786V4.33928C15.3224 4.33928 17.0893 6.10616 17.0893 8.28571H18.9107ZM5.85686 4.33927L13.1426 4.33927V2.51784L5.85686 2.51784V4.33927ZM4.94601 3.42859V4.64287L6.76744 4.64287V3.42859L4.94601 3.42859ZM6.76744 3.42857V1L4.94601 1V3.42857L6.76744 3.42857ZM12.2321 3.42857V4.64286H14.0536V3.42857H12.2321ZM14.0536 3.42857V1H12.2321V3.42857H14.0536Z"
                                            fill="#008DD4" />
                                        <path d="M4.64258 11.9286L7.07115 15.5714L14.3569 9.5" stroke="#008DD4"
                                            stroke-width="1.82143" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <p class="dp_title">Delivery date:</p>
                                <p><b>
                                        @if ($user_info->delivery_timeframe_from)
                                            <span>{{ formatCustomDate($user_info->delivery_timeframe_from) }}</span>
                                        @else
                                            <span>{{ $user_info->delivery_timeframe }}</span>
                                        @endif
                                    </b>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 right_section">
                <div class="wd-dlvr-profl">
                    <div class="wd-dlvr-img">
                        <img src="{{ $transporter_detail->profile_image }}" alt="transporter delivery" class="img-fluid">
                        <span></span>
                    </div>
                    <div class="wd-dlvr-contact">
                         <h3>{{ $transporter_detail->username }}</h3>
                        {{-- <a href="{{ route('front.feedback_view', $quote_by_transporter->id) }}">  
                            <h3>{{ $transporter_detail->username }}</h3>
                        </a> --}}
                        @if ($percentage == 0)
                            <ul class="rating-star choose_quote_rating mb-3 d-none">
                                <li>
                                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.8 0L13.2248 7.46262L21.0714 7.46262L14.7233 12.0748L17.1481 19.5374L10.8 14.9252L4.45192 19.5374L6.87667 12.0748L0.528589 7.46262L8.37525 7.46262L10.8 0Z"
                                            fill="#D9D9D9" />
                                    </svg>
                                </li>
                                <li>
                                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.8 0L13.2248 7.46262L21.0714 7.46262L14.7233 12.0748L17.1481 19.5374L10.8 14.9252L4.45192 19.5374L6.87667 12.0748L0.528589 7.46262L8.37525 7.46262L10.8 0Z"
                                            fill="#D9D9D9" />
                                    </svg>
                                </li>
                                <li>
                                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.8 0L13.2248 7.46262L21.0714 7.46262L14.7233 12.0748L17.1481 19.5374L10.8 14.9252L4.45192 19.5374L6.87667 12.0748L0.528589 7.46262L8.37525 7.46262L10.8 0Z"
                                            fill="#D9D9D9" />
                                    </svg>
                                </li>
                                <li>
                                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.8 0L13.2248 7.46262L21.0714 7.46262L14.7233 12.0748L17.1481 19.5374L10.8 14.9252L4.45192 19.5374L6.87667 12.0748L0.528589 7.46262L8.37525 7.46262L10.8 0Z"
                                            fill="#D9D9D9" />
                                    </svg>
                                </li>
                                <li>
                                    <!-- <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.8 0L13.2248 7.46262L21.0714 7.46262L14.7233 12.0748L17.1481 19.5374L10.8 14.9252L4.45192 19.5374L6.87667 12.0748L0.528589 7.46262L8.37525 7.46262L10.8 0Z" fill="#FFA800"/>
                                </svg> -->
                                    <svg width="22" height="20" viewBox="0 0 44 44" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22 0L26.9393 15.2016H42.9232L29.992 24.5967L34.9313 39.7984L22 30.4033L9.06872 39.7984L14.008 24.5967L1.07676 15.2016H17.0607L22 0Z"
                                            fill="#DCDCDE" />
                                        <mask id="mask0_5_1268" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0"
                                            y="0" width="23" height="44">
                                            <rect width="23" height="44" fill="#D9D9D9" />
                                        </mask>
                                        <g mask="url(#mask0_5_1268)">
                                            <path
                                                d="M22 0L26.9393 15.2016H42.9232L29.992 24.5967L34.9313 39.7984L22 30.4033L9.06872 39.7984L14.008 24.5967L1.07676 15.2016H17.0607L22 0Z"
                                                fill="#D9D9D9" />
                                        </g>
                                    </svg>
                                </li>
                                <li><span class="ml-1">({{ $percentage }}%)</span></li>
                            </ul>
                        @else
                            @php
                                $totalStars = 5; // Total number of stars
                                $yellowStars = floor($rating_average); // Full yellow stars (integer part)
                                $hasHalfStar = $rating_average - $yellowStars >= 0.5; // Check if there is a half-star
                                $greyStars = $totalStars - $yellowStars - ($hasHalfStar ? 1 : 0); // Remaining grey stars
                            @endphp
                            <ul class="rating-star choose_quote_rating mb-3 d-none">
                                {{-- Render full yellow stars --}}
                                @for ($i = 1; $i <= $yellowStars; $i++)
                                    <li>
                                        <svg width="20" height="20" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                fill="#FFA800" />
                                        </svg>
                                    </li>
                                @endfor

                                {{-- Render half-star if applicable --}}
                                @if ($hasHalfStar)
                                    <li>
                                        <svg width="20" height="20" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <defs>
                                                <linearGradient id="halfStarGradient" x1="0%" y1="0%"
                                                    x2="100%" y2="0%">
                                                    <stop offset="50%" stop-color="#FFA800" />
                                                    <stop offset="50%" stop-color="#ccc" />
                                                </linearGradient>
                                            </defs>
                                            <path
                                                d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                fill="url(#halfStarGradient)" />
                                        </svg>
                                    </li>
                                @endif

                                {{-- Render grey stars --}}
                                @for ($i = 1; $i <= $greyStars; $i++)
                                    <li>
                                        <svg width="20" height="20" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                fill="#ccc" />
                                        </svg>
                                    </li>
                                @endfor

                                {{-- Display rating count and percentage --}}
                                <li class="user-feedback-rating-count">
                                    <span class="ml-1">{{ $percentage }}%</span>
                                </li>
                            </ul>
                        @endif

                        <a href="javascript:;" class="verify-btn d-none  align-items-center">
                            <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.41537 11.1567L0.190373 6.93169C-0.0634575 6.67786 -0.0634575 6.2663 0.190373 6.01245L1.10959 5.0932C1.36342 4.83935 1.775 4.83935 2.02883 5.0932L4.87499 7.93934L10.9712 1.8432C11.225 1.58937 11.6366 1.58937 11.8904 1.8432L12.8096 2.76245C13.0634 3.01628 13.0634 3.42783 12.8096 3.68169L5.33462 11.1567C5.08076 11.4105 4.6692 11.4105 4.41537 11.1567Z"
                                    fill="#52D017"></path>
                            </svg>Verified
                        </a>
                    </div>
                </div>
                <ul class="wd-dlvr-dtls">
                    <li>
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.7537 4.84453C12.8527 4.76582 13 4.83945 13 4.96387V10.1562C13 10.8291 12.4541 11.375 11.7812 11.375H1.21875C0.545898 11.375 0 10.8291 0 10.1562V4.96641C0 4.83945 0.144727 4.76836 0.246289 4.84707C0.815039 5.28887 1.56914 5.85 4.15898 7.73145C4.69473 8.12246 5.59863 8.94512 6.5 8.94004C7.40645 8.94766 8.32812 8.10723 8.84355 7.73145C11.4334 5.85 12.185 5.28633 12.7537 4.84453ZM6.5 8.125C7.08906 8.13516 7.93711 7.38359 8.36367 7.07383C11.733 4.62871 11.9895 4.41543 12.7664 3.80605C12.9137 3.6918 13 3.51406 13 3.32617V2.84375C13 2.1709 12.4541 1.625 11.7812 1.625H1.21875C0.545898 1.625 0 2.1709 0 2.84375V3.32617C0 3.51406 0.0863281 3.68926 0.233594 3.80605C1.01055 4.41289 1.26699 4.62871 4.63633 7.07383C5.06289 7.38359 5.91094 8.13516 6.5 8.125Z"
                                fill="#B1B1B1" />
                        </svg>
                        <a href="mailto:{{ $transporter_detail->email }}">{{ $transporter_detail->email }}</a>
                    </li>
                    <li>
                        <span>
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.5906 12.1698L12.7643 10.9585C12.6436 10.907 12.5094 10.8962 12.382 10.9276C12.2545 10.959 12.1407 11.031 12.0577 11.1326L10.8061 12.6618C8.84174 11.7357 7.2609 10.1548 6.33473 8.19049L7.86396 6.93884C7.96583 6.85599 8.03793 6.74221 8.06934 6.61471C8.10076 6.48722 8.08979 6.35296 8.03808 6.23227L6.82681 3.40597C6.77006 3.27586 6.66969 3.16963 6.543 3.1056C6.41632 3.04156 6.27127 3.02374 6.13285 3.0552L3.50843 3.66084C3.37498 3.69166 3.25592 3.76679 3.17067 3.87399C3.08543 3.98119 3.03903 4.11412 3.03906 4.25108C3.03906 10.7238 8.28538 15.96 14.748 15.96C14.885 15.9601 15.018 15.9138 15.1253 15.8285C15.2325 15.7433 15.3077 15.6242 15.3385 15.4907L15.9441 12.8663C15.9754 12.7272 15.9572 12.5815 15.8927 12.4544C15.8282 12.3273 15.7213 12.2266 15.5906 12.1698Z"
                                    fill="#B1B1B1" />
                            </svg>
                        </span>
                        <span class="tel_list">
                            <a
                                href="tel:{{ $transporter_detail->country_code }}{{ $transporter_detail->mobile }}">{{ $transporter_detail->country_code }}{{ $transporter_detail->mobile }}</a>
                        </span>
                    </li>

                    <li>
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.9214 6.17044C11.6975 3.78237 9.27445 2.16663 6.49999 2.16663C3.72553 2.16663 1.30179 3.7835 0.0785293 6.17067C0.0268999 6.2728 0 6.38563 0 6.50007C0 6.61451 0.0268999 6.72734 0.0785293 6.82947C1.30247 9.21755 3.72553 10.8333 6.49999 10.8333C9.27445 10.8333 11.6982 9.21642 12.9214 6.82925C12.9731 6.72712 13 6.61428 13 6.49985C13 6.38541 12.9731 6.27257 12.9214 6.17044ZM6.49999 9.74996C5.8572 9.74996 5.22884 9.55935 4.69438 9.20223C4.15992 8.84512 3.74336 8.33754 3.49738 7.74368C3.25139 7.14982 3.18703 6.49635 3.31244 5.86592C3.43784 5.23548 3.74737 4.65638 4.20189 4.20186C4.65641 3.74734 5.23551 3.43781 5.86594 3.31241C6.49638 3.18701 7.14985 3.25137 7.74371 3.49735C8.33757 3.74334 8.84515 4.1599 9.20226 4.69436C9.55938 5.22882 9.74999 5.85717 9.74999 6.49996C9.7502 6.92681 9.66627 7.34952 9.50302 7.74393C9.33976 8.13833 9.10038 8.49669 8.79855 8.79852C8.49672 9.10035 8.13836 9.33974 7.74395 9.50299C7.34955 9.66624 6.92684 9.75017 6.49999 9.74996ZM6.49999 4.33329C6.3066 4.336 6.11445 4.36477 5.92875 4.41883C6.08183 4.62685 6.15528 4.88283 6.1358 5.14036C6.11632 5.39789 6.00519 5.63992 5.82257 5.82254C5.63994 6.00516 5.39792 6.11629 5.14039 6.13577C4.88286 6.15525 4.62688 6.0818 4.41886 5.92873C4.30041 6.36513 4.32179 6.82768 4.48 7.2513C4.6382 7.67491 4.92527 8.03824 5.30079 8.29016C5.6763 8.54207 6.12137 8.66989 6.57333 8.65561C7.0253 8.64133 7.4614 8.48568 7.82027 8.21057C8.17914 7.93545 8.4427 7.55472 8.57385 7.12197C8.70501 6.68922 8.69715 6.22623 8.55139 5.79818C8.40563 5.37013 8.12931 4.99856 7.76131 4.73578C7.39331 4.47299 6.95218 4.33223 6.49999 4.33329Z"
                                fill="#B1B1B1" />
                        </svg>

                        <p> {{ $last_visited_at }}</p>
                    </li>
                </ul>
                <p class="issue-txt">Having an issue with this delivery?</p>
                <a href="javascript:;" class="wd-resolve-btn" data-toggle="modal" data-target="#resolve">Resolve now</a>
                <div class="wd-dlvr-id">
                    <h2>£{{ roundBasedOnDecimal($quote_by_transporter->price) }}</h2>
                    <p>
                        @if (isset($delivery_info->delivery_reference_id))
                            Delivery ID: {{ $delivery_info->delivery_reference_id }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="row deposit-area-secound-row">
            <div class="col-lg-8">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Deposit paid @if (isset($delivery_info->delivery_reference_id))
                                        [Ref no: {{ $delivery_info->delivery_reference_id }}]
                                    @endif
                                </td>
                                <td>£{{ roundBasedOnDecimal($quote_by_transporter->deposit) }}</td>
                            </tr>
                            <tr>
                                <td>Balance to be paid</td>
                                <td>£{{ roundBasedOnDecimal($quote_by_transporter->transporter_payment) }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                    <form id="download-form" action="{{ route('front.download_vat_receipt') }}"
                                        method="GET">
                                        <input type="hidden" name="payment_date"
                                            value="{{ $quote_by_transporter->updated_at }}">
                                        <input type="hidden" name="total"
                                            value="{{ $quote_by_transporter->deposit }}">
                                        <input type="hidden" name="vehicle_name"
                                            value="{{ $user_info->vehicle_make . ' ' . $user_info->vehicle_model }}">
                                    </form>
                                    <a href="#" id="download-vat-receipt">
                                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.3125 3.45312V0H2.23438C1.89668 0 1.625 0.27168 1.625 0.609375V12.3906C1.625 12.7283 1.89668 13 2.23438 13H10.7656C11.1033 13 11.375 12.7283 11.375 12.3906V4.0625H7.92188C7.58672 4.0625 7.3125 3.78828 7.3125 3.45312ZM8.9375 9.44531C8.9375 9.61289 8.80039 9.75 8.63281 9.75H4.36719C4.19961 9.75 4.0625 9.61289 4.0625 9.44531V9.24219C4.0625 9.07461 4.19961 8.9375 4.36719 8.9375H8.63281C8.80039 8.9375 8.9375 9.07461 8.9375 9.24219V9.44531ZM8.9375 7.82031C8.9375 7.98789 8.80039 8.125 8.63281 8.125H4.36719C4.19961 8.125 4.0625 7.98789 4.0625 7.82031V7.61719C4.0625 7.44961 4.19961 7.3125 4.36719 7.3125H8.63281C8.80039 7.3125 8.9375 7.44961 8.9375 7.61719V7.82031ZM8.9375 5.99219V6.19531C8.9375 6.36289 8.80039 6.5 8.63281 6.5H4.36719C4.19961 6.5 4.0625 6.36289 4.0625 6.19531V5.99219C4.0625 5.82461 4.19961 5.6875 4.36719 5.6875H8.63281C8.80039 5.6875 8.9375 5.82461 8.9375 5.99219ZM11.375 3.09512V3.25H8.125V0H8.27988C8.44238 0 8.59727 0.0634766 8.71152 0.177734L11.1973 2.66602C11.3115 2.78027 11.375 2.93516 11.375 3.09512Z"
                                                fill="#52D017" />
                                        </svg>
                                        Download VAT receipt
                                    </a>
                                </td>
                                <td>Total £{{ roundBasedOnDecimal($quote_by_transporter->price) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="wd-transport-box">
                    <div class="wd-transport-lft">
                        <img src="{{ $transporter_detail->profile_image }}" alt="transporter" class="img-fluid">
                        <span></span>
                    </div>
                    <div class="wd-transport-txt">
                        <div>
                            <h3>{{ $transporter_detail->username }}</h3>
                            <span>
                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_580_1850)">
                                        <path
                                            d="M0.8125 11.7812C0.8125 12.4541 1.3584 13 2.03125 13H10.9688C11.6416 13 12.1875 12.4541 12.1875 11.7812V4.875H0.8125V11.7812ZM8.9375 6.80469C8.9375 6.63711 9.07461 6.5 9.24219 6.5H10.2578C10.4254 6.5 10.5625 6.63711 10.5625 6.80469V7.82031C10.5625 7.98789 10.4254 8.125 10.2578 8.125H9.24219C9.07461 8.125 8.9375 7.98789 8.9375 7.82031V6.80469ZM8.9375 10.0547C8.9375 9.88711 9.07461 9.75 9.24219 9.75H10.2578C10.4254 9.75 10.5625 9.88711 10.5625 10.0547V11.0703C10.5625 11.2379 10.4254 11.375 10.2578 11.375H9.24219C9.07461 11.375 8.9375 11.2379 8.9375 11.0703V10.0547ZM5.6875 6.80469C5.6875 6.63711 5.82461 6.5 5.99219 6.5H7.00781C7.17539 6.5 7.3125 6.63711 7.3125 6.80469V7.82031C7.3125 7.98789 7.17539 8.125 7.00781 8.125H5.99219C5.82461 8.125 5.6875 7.98789 5.6875 7.82031V6.80469ZM5.6875 10.0547C5.6875 9.88711 5.82461 9.75 5.99219 9.75H7.00781C7.17539 9.75 7.3125 9.88711 7.3125 10.0547V11.0703C7.3125 11.2379 7.17539 11.375 7.00781 11.375H5.99219C5.82461 11.375 5.6875 11.2379 5.6875 11.0703V10.0547ZM2.4375 6.80469C2.4375 6.63711 2.57461 6.5 2.74219 6.5H3.75781C3.92539 6.5 4.0625 6.63711 4.0625 6.80469V7.82031C4.0625 7.98789 3.92539 8.125 3.75781 8.125H2.74219C2.57461 8.125 2.4375 7.98789 2.4375 7.82031V6.80469ZM2.4375 10.0547C2.4375 9.88711 2.57461 9.75 2.74219 9.75H3.75781C3.92539 9.75 4.0625 9.88711 4.0625 10.0547V11.0703C4.0625 11.2379 3.92539 11.375 3.75781 11.375H2.74219C2.57461 11.375 2.4375 11.2379 2.4375 11.0703V10.0547ZM10.9688 1.625H9.75V0.40625C9.75 0.182812 9.56719 0 9.34375 0H8.53125C8.30781 0 8.125 0.182812 8.125 0.40625V1.625H4.875V0.40625C4.875 0.182812 4.69219 0 4.46875 0H3.65625C3.43281 0 3.25 0.182812 3.25 0.40625V1.625H2.03125C1.3584 1.625 0.8125 2.1709 0.8125 2.84375V4.0625H12.1875V2.84375C12.1875 2.1709 11.6416 1.625 10.9688 1.625Z"
                                            fill="#919191" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_580_1850">
                                            <rect width="13" height="13" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                {{ $formattedDilveryDate }}
                            </span>
                        </div>

                    </div>
                </div>

                <div class="wd-delivr-box">
                    <span class="wd-date">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_580_1850)">
                                <path
                                    d="M0.8125 11.7812C0.8125 12.4541 1.3584 13 2.03125 13H10.9688C11.6416 13 12.1875 12.4541 12.1875 11.7812V4.875H0.8125V11.7812ZM8.9375 6.80469C8.9375 6.63711 9.07461 6.5 9.24219 6.5H10.2578C10.4254 6.5 10.5625 6.63711 10.5625 6.80469V7.82031C10.5625 7.98789 10.4254 8.125 10.2578 8.125H9.24219C9.07461 8.125 8.9375 7.98789 8.9375 7.82031V6.80469ZM8.9375 10.0547C8.9375 9.88711 9.07461 9.75 9.24219 9.75H10.2578C10.4254 9.75 10.5625 9.88711 10.5625 10.0547V11.0703C10.5625 11.2379 10.4254 11.375 10.2578 11.375H9.24219C9.07461 11.375 8.9375 11.2379 8.9375 11.0703V10.0547ZM5.6875 6.80469C5.6875 6.63711 5.82461 6.5 5.99219 6.5H7.00781C7.17539 6.5 7.3125 6.63711 7.3125 6.80469V7.82031C7.3125 7.98789 7.17539 8.125 7.00781 8.125H5.99219C5.82461 8.125 5.6875 7.98789 5.6875 7.82031V6.80469ZM5.6875 10.0547C5.6875 9.88711 5.82461 9.75 5.99219 9.75H7.00781C7.17539 9.75 7.3125 9.88711 7.3125 10.0547V11.0703C7.3125 11.2379 7.17539 11.375 7.00781 11.375H5.99219C5.82461 11.375 5.6875 11.2379 5.6875 11.0703V10.0547ZM2.4375 6.80469C2.4375 6.63711 2.57461 6.5 2.74219 6.5H3.75781C3.92539 6.5 4.0625 6.63711 4.0625 6.80469V7.82031C4.0625 7.98789 3.92539 8.125 3.75781 8.125H2.74219C2.57461 8.125 2.4375 7.98789 2.4375 7.82031V6.80469ZM2.4375 10.0547C2.4375 9.88711 2.57461 9.75 2.74219 9.75H3.75781C3.92539 9.75 4.0625 9.88711 4.0625 10.0547V11.0703C4.0625 11.2379 3.92539 11.375 3.75781 11.375H2.74219C2.57461 11.375 2.4375 11.2379 2.4375 11.0703V10.0547ZM10.9688 1.625H9.75V0.40625C9.75 0.182812 9.56719 0 9.34375 0H8.53125C8.30781 0 8.125 0.182812 8.125 0.40625V1.625H4.875V0.40625C4.875 0.182812 4.69219 0 4.46875 0H3.65625C3.43281 0 3.25 0.182812 3.25 0.40625V1.625H2.03125C1.3584 1.625 0.8125 2.1709 0.8125 2.84375V4.0625H12.1875V2.84375C12.1875 2.1709 11.6416 1.625 10.9688 1.625Z"
                                    fill="#919191" />
                            </g>
                            <defs>
                                <clipPath id="clip0_580_1850">
                                    <rect width="13" height="13" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        {{ $formattedDilveryDate }}
                    </span>
                    <div class="wd-dlvr-txt">
                        <img src="{{ asset('assets/web/images/delivery.png') }}" alt="delivery">
                        <h5>Delivery Booked</h5>
                        <p>{{ $transporter_detail->username }} has been notified about this booking.@if (isset($delivery_info->delivery_reference_id))
                                Your delivery reference is {{ $delivery_info->delivery_reference_id }}.
                            @endif
                        </p>
                    </div>
                </div>
                <div class="wd-delivr-box">
                    <span class="wd-date">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_580_1850)">
                                <path
                                    d="M0.8125 11.7812C0.8125 12.4541 1.3584 13 2.03125 13H10.9688C11.6416 13 12.1875 12.4541 12.1875 11.7812V4.875H0.8125V11.7812ZM8.9375 6.80469C8.9375 6.63711 9.07461 6.5 9.24219 6.5H10.2578C10.4254 6.5 10.5625 6.63711 10.5625 6.80469V7.82031C10.5625 7.98789 10.4254 8.125 10.2578 8.125H9.24219C9.07461 8.125 8.9375 7.98789 8.9375 7.82031V6.80469ZM8.9375 10.0547C8.9375 9.88711 9.07461 9.75 9.24219 9.75H10.2578C10.4254 9.75 10.5625 9.88711 10.5625 10.0547V11.0703C10.5625 11.2379 10.4254 11.375 10.2578 11.375H9.24219C9.07461 11.375 8.9375 11.2379 8.9375 11.0703V10.0547ZM5.6875 6.80469C5.6875 6.63711 5.82461 6.5 5.99219 6.5H7.00781C7.17539 6.5 7.3125 6.63711 7.3125 6.80469V7.82031C7.3125 7.98789 7.17539 8.125 7.00781 8.125H5.99219C5.82461 8.125 5.6875 7.98789 5.6875 7.82031V6.80469ZM5.6875 10.0547C5.6875 9.88711 5.82461 9.75 5.99219 9.75H7.00781C7.17539 9.75 7.3125 9.88711 7.3125 10.0547V11.0703C7.3125 11.2379 7.17539 11.375 7.00781 11.375H5.99219C5.82461 11.375 5.6875 11.2379 5.6875 11.0703V10.0547ZM2.4375 6.80469C2.4375 6.63711 2.57461 6.5 2.74219 6.5H3.75781C3.92539 6.5 4.0625 6.63711 4.0625 6.80469V7.82031C4.0625 7.98789 3.92539 8.125 3.75781 8.125H2.74219C2.57461 8.125 2.4375 7.98789 2.4375 7.82031V6.80469ZM2.4375 10.0547C2.4375 9.88711 2.57461 9.75 2.74219 9.75H3.75781C3.92539 9.75 4.0625 9.88711 4.0625 10.0547V11.0703C4.0625 11.2379 3.92539 11.375 3.75781 11.375H2.74219C2.57461 11.375 2.4375 11.2379 2.4375 11.0703V10.0547ZM10.9688 1.625H9.75V0.40625C9.75 0.182812 9.56719 0 9.34375 0H8.53125C8.30781 0 8.125 0.182812 8.125 0.40625V1.625H4.875V0.40625C4.875 0.182812 4.69219 0 4.46875 0H3.65625C3.43281 0 3.25 0.182812 3.25 0.40625V1.625H2.03125C1.3584 1.625 0.8125 2.1709 0.8125 2.84375V4.0625H12.1875V2.84375C12.1875 2.1709 11.6416 1.625 10.9688 1.625Z"
                                    fill="#919191" />
                            </g>
                            <defs>
                                <clipPath id="clip0_580_1850">
                                    <rect width="13" height="13" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        {{ $formattedDilveryDate }}
                    </span>
                    <div class="wd-dlvr-txt wd-transport-lft">
                        <img src="{{ Auth::user('web')->profile_image }}" alt="deliver user">
                        <p>{{ Auth::user('web')->username }} has been invited to join the conversation</p>
                    </div>
                </div>
                <div class="wd-quote-msg" id="chat_history_main"></div>
                <form id="chat__form" action="{{ route('front.message.quote_send_message') }}" method="post"
                    enctype='multipart/form-data'>
                    @csrf
                    <?php
                    $thread = App\Thread::where('user_id', Auth::user()->id)
                        ->where('friend_id', $quote_by_transporter->user_id)
                        ->where('user_quote_id', $quote_by_transporter->user_quote_id)
                        ->first();
                    ?>
                    <input type="hidden" name="form_page" id="form_page" value="delivery">
                    <input type="hidden" name="transporter_id" value="{{ $quote_by_transporter->user_id }}">
                    <input type="hidden" name="user_quote_id" value="{{ $quote_by_transporter->user_quote_id }}">
                    <input type="hidden" name="user_current_chat_id" id="user_current_chat_id"
                        value="{{ $thread ? $thread->id : 0 }}">
                    <div class="form-group">
                        <textarea class="form-control textarea" placeholder="Write something here..... "></textarea>
                    </div>
                    <div class="message-error" style="display:none">Please enter your message.</div>
                    <!-- <button type="submit" class="wd-submit-btn" onclick="sendMessage();" >
                        Send message
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.7637 3.65906L15.2551 15.4895C15.0658 16.3245 14.5722 16.5323 13.8709 16.1389L10.0486 13.3223L8.20428 15.0962C8.00018 15.3003 7.82947 15.471 7.43611 15.471L7.71072 11.5782L14.7949 5.17683C15.1029 4.90222 14.7281 4.75007 14.3162 5.02468L5.55838 10.5391L1.78807 9.35906C0.967949 9.103 0.953105 8.53894 1.95877 8.14558L16.706 2.46413C17.3888 2.20808 17.9863 2.61628 17.7637 3.65906Z" fill="white"/>
                        </svg>
                    </button> -->
                    <a href="javascript:;" class="send-msg" onclick="sendMessage();" id="send_message">Send message
                        <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.7637 1.65906L14.2551 13.4895C14.0658 14.3245 13.5722 14.5323 12.8709 14.1389L9.04861 11.3223L7.20428 13.0962C7.00018 13.3003 6.82947 13.471 6.43611 13.471L6.71072 9.5782L13.7949 3.17683C14.1029 2.90222 13.7281 2.75007 13.3162 3.02468L4.55838 8.53913L0.788066 7.35906C-0.0320513 7.103 -0.0468951 6.53894 0.958769 6.14558L15.706 0.464134C16.3888 0.208079 16.9863 0.616282 16.7637 1.65906Z"
                                fill="white" />
                        </svg>
                    </a>
                </form>

                <a href="{{ route('front.leave_feedback', $quote_by_transporter->id) }}" class="leave-feedback">
                    <svg width="24" height="21" viewBox="0 0 24 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.5 9V9.00042C0.49896 10.248 0.87167 11.4882 1.60286 12.6307C2.33497 13.7746 3.40937 14.7931 4.7574 15.6026L5 15.7483V16.0312C5 17.0737 4.80243 18.1787 4.5086 19.1214C4.36028 19.5973 4.18097 20.0527 3.97858 20.4457C6.49681 20.171 8.89534 18.8976 10.1464 17.6464L10.2929 17.5H10.5H12C15.0893 17.5 18.0326 16.5785 20.1853 14.964C22.3352 13.3515 23.5 11.2003 23.5 9C23.5 6.79969 22.3352 4.6485 20.1853 3.03604C18.0326 1.42152 15.0893 0.5 12 0.5C8.91071 0.5 5.96741 1.42152 3.81472 3.03604C1.66478 4.6485 0.5 6.79969 0.5 9Z"
                            stroke="#0356D6" />
                    </svg>
                    <span>Click here to leave feedback</span>
                </a>
            </div>
            <div class="col-lg-4">
            </div>
        </div>
    </section>
    @include('layouts.web.footer')
    <!-- Modal -->
    <div class="modal resolve_bx fade" id="resolve" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Resolve a delivery</h5>
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
                    <form id="resolveForm">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ Auth::guard('web')->user()->username }}" placeholder="Name*">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ Auth::guard('web')->user()->email }}" placeholder="Email*">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="delivery" name="delivery"
                                value="{{ $delivery_info->delivery_reference_id ?? '' }}" placeholder="Delivery ref*"
                                {{ isset($delivery_info->delivery_reference_id) ? 'disabled' : '' }}>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control help-msg" name="message" placeholder="How can we help?"></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button class="admin_snd_btn">Send message
                                <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.7637 1.65893L14.2551 13.4894C14.0658 14.3244 13.5722 14.5322 12.8709 14.1388L9.04861 11.3222L7.20428 13.096C7.00018 13.3001 6.82947 13.4708 6.43611 13.4708L6.71072 9.57807L13.7949 3.17671C14.1029 2.9021 13.7281 2.74995 13.3162 3.02456L4.55838 8.53901L0.788066 7.35893C-0.0320513 7.10288 -0.0468951 6.53882 0.958769 6.14546L15.706 0.464011C16.3888 0.207957 16.9863 0.61616 16.7637 1.65893Z"
                                        fill="white" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.40/moment-timezone-with-data.js"
        type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#resolveForm').validate({
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    delivery: {
                        required: true
                    },
                    message: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "Please enter name"
                    },
                    email: {
                        required: "Please enter email address",
                        email: "Please enter a valid email address"
                    },
                    delivery: {
                        required: "Please enter delivery reference"
                    },
                    message: {
                        required: "Please enter message"
                    }
                },
                submitHandler: function(form) {
                    $('.admin_snd_btn').text('Please wait!..');
                    $('.admin_snd_btn').attr('disabled', true);
                    const email = "support@transportanycar.com";
                    const template = 'mail.General.resolve-a-delivery';
                    const user = {
                        name: $('#name').val(),
                        email: $('#email').val(),
                        delivery_ref: $('#delivery').val(),
                        message: $('.help-msg').val(),
                    };

                    $.ajax({
                        url: "{{ route('send-email') }}",
                        type: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify({
                            email: email,
                            template: template,
                            subject: 'Resolve a delivery',
                            user: user
                        }),
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // If you're using Laravel's CSRF protection
                        },
                        success: function(response) {
                            $('.admin_snd_btn').text('Send message');
                            $('.admin_snd_btn').attr('disabled', false);
                            Swal.fire({
                                title: '<span class="swal-title">Thank You</span>',
                                html: '<span class="swal-text">Your request has been sent.</span>',
                                confirmButtonColor: '#52D017',
                                confirmButtonText: 'Ok',
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
                                    $(form)[0].reset();
                                    $('#resolve').modal('hide');
                                }
                            });
                        },
                        error: function(xhr, status, error) {}
                    });
                }
            });
        });
    </script>
    <script>
        function sendMessage() {
            $('#chat__form').submit();
        }

        function isEmptyOrSpaces(str) {
            return str === null || str.match(/^ *$/) !== null;
        }

        function getChatHistory(url, thisobj) {
            var elems = document.querySelector(".active");
            var timezone = moment.tz.guess();
            var from_page = $('#form_page').val();
            console.log(timezone);

            // if(elems !==null){
            //     elems.classList.remove("active");
            // }
            $(thisobj).find("li").addClass('active');
            $.ajax({
                url: url,
                data: {
                    "timezone": timezone,
                    'from_page': from_page
                },
                dataType: "json",
            }).done(function(response) {
                $('.msg-no').text(response.totalmessagecount);
                $("#chat_history_main").html(response.html);
                // $(thisobj).find(".kt-widget__item").find('.kt-widget__action').html('');
                // KTAppChat.init();
                // scrollToBottom();
                // getTotalUnreadMessage();
            });
        }


        var send_message = false;

        $('#chat__form').on('submit', function(e) {
            e.preventDefault();
            var message = $('.textarea').val();
            var send_message = false;
            if (!message.trim()) {
                $('.message-error').css('display', 'block');
                return;
            }
            if (!isEmptyOrSpaces(message)) {
                send_message = true;
            }
            if (send_message == true) {
                $("#send_message").prop("disabled", true);
                $("#send_message").text("Please Wait...");
                var file_type = $('#file_type').val();
                $('.textarea').val('');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    }
                });
                var timezone = moment.tz.guess();
                var data = new FormData(this);
                data.append('message', message);
                data.append('file_type', file_type);
                data.append('timezone', timezone);

                $.ajax({
                    url: $(this).attr('action'),
                    method: "POST",
                    data: data,
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                }).done(function(response) {
                    $("#send_message").prop("disabled", false);
                    $("#send_message").html(
                        "Send message <svg width='17' height='15' viewBox='0 0 17 15' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M16.7637 1.65906L14.2551 13.4895C14.0658 14.3245 13.5722 14.5323 12.8709 14.1389L9.04861 11.3223L7.20428 13.0962C7.00018 13.3003 6.82947 13.471 6.43611 13.471L6.71072 9.5782L13.7949 3.17683C14.1029 2.90222 13.7281 2.75007 13.3162 3.02468L4.55838 8.53913L0.788066 7.35906C-0.0320513 7.103 -0.0468951 6.53894 0.958769 6.14558L15.706 0.464134C16.3888 0.208079 16.9863 0.616282 16.7637 1.65906Z' fill='white'/></svg>"
                        );
                    if (response.status == "success") {
                        window.location.reload();
                    }
                    //scrollToBottom();
                    //$(".kt-avatar__cancel").click();
                });
            }
        });


        $(document).ready(function() {
            function updateChat() {
                var selected_chat_id = $("#user_current_chat_id").val();
                var url = "{{ route('front.message.quote_history', ':chat_id') }}";
                url = url.replace(':chat_id', selected_chat_id);
                getChatHistory(url, $(".get-chat-history")[0]);

                {{-- var url = "{{route('transporter.message.history',($latest_chat->id) ?? 0)}}" --}}
                {{-- getChatHistory(url,$(".get-chat-history")[0]); --}}
            }
            updateChat();
            $('.textarea').on('keyup', function() {
                $('.message-error').css('display', 'none');
            })
            //setInterval(updateChat, 5000);
        });
    </script>
    <script>
        $('#download-vat-receipt').on('click', function(e) {
            e.preventDefault();
            $('#download-form').submit();
        });
    </script>
    <script>
    window.addEventListener('load', function () {
        const params = new URLSearchParams(window.location.search);
        const shouldScroll = params.get('scroll');
 
        if (shouldScroll === 'true') {
            // Delay scroll to ensure all content is loaded/rendered
            setTimeout(() => {
                window.scrollTo({
                    top: document.documentElement.scrollHeight,
                    behavior: 'smooth'
                });
            }, 300); // Adjust delay if needed (e.g., 300ms to 1000ms)
        }
    });
</script>
@endsection
