@extends('layouts.web.dashboard.app')

@section('head_css')
@endsection
<style>
    .info_sec_details {
        display: none;
        padding-top: 20px;
        position: absolute;
        width: 300px;
        top: 37px;
        z-index: 1;
        transform: translateX(-26%);
    }
    .no-due {display: none;}
    .icon_hover_sec:hover .info_sec_details {
        display: block;
    }
    .popover-body{
        padding: 0!important;
        color:#777777!important;
         font-family: 'Outfit', sans-serif!important;
        font-size: 14px!important;
        font-weight: 200!important; }
    .popover,
    .info_sec_details_contant {
        background: #fff;
        border: 1px solid #cfcfcf!important;
        padding: 20px!important;
        text-align: center!important;
        border-radius: 10px!important;
        box-shadow: 0px 0px 3px 0px #cfcfcf!important;
        color:#777777!important;
        font-family: 'Outfit', sans-serif!important;
        font-size: 14px!important;
        font-weight: 200!important;
    }

    .info_sec_details p {
        font-size: 14px;
        font-weight: 200;
        color: #777;
        margin-bottom: 0;
    }

    .info_sec_details:before {
        content: '';
        display: block;
        position: absolute;
        top: 15px;
        width: 10px;
        height: 10px;
        background: white;
        transform: rotate(45deg);
        border: 1px solid #cfcfcfe0;
        border-bottom: 0;
        border-right: 0;
        right: 85px;
    }

    .wd-quote-data .accordion>.card {
        overflow: initial;
    }

    /* .rating-star li svg path {
    fill: #ffa800;
} */
    .message-error {
        font-size: 14px;
        color: red;
        margin-top: -15px;
    }

    .card_lft .rating-star li:last-child {
        margin-left: 0;
        /* padding-top: 2px; */
    }

    .card_lft .rating-star li:last-child span {
        font-size: 16px;
        line-height: 20px;
        font-weight: 400;
        color:#5f5f5f;
    }

    .wd-quote-data .card_lft h4 {
        width: 15%;
    }

    /* .wd-quote-head p.quote-table-transport {
        margin-left: -46px;
    }

    .wd-quote-head p.quote-table-Rating {
        margin-left: -63px;
    }

    .wd-quote-head p.quote-table-Verified {
        margin-left: -103px;
    } */

    .choose_quote_rating li svg {
        width: 12px;
        height: 12px;
    }
    .wd-quote-head {padding-left: 27px; padding-right: 29px;}
    .card .card-header .wd-quote-btn .wd-accepted-btn,
    .card .card-header .wd-quote-btn .wd-view-btn {color:#F3F8FF!important;}
    .card .card-header .wd-quote-btn .wd-view-btn {background: #9c9c9c!important; order:2;}
    .wd-accepted-btn {order: 1;}
    .verified-icon .icon_hover_sec {display: none;}
    .wd-quote-area .wd-quote-data .wd-quote-txt p {padding-left: 45px; padding-right: 45px;}
    .wd-quote-title h1 {
        font-size: 24px!important;
        line-height: 30px;
        margin-bottom: 20px!important;
    }
    .amount {
        font-size: 20px!important;
        line-height: 25px!important;
        font-weight: 500!important;
    }
    @media screen and (min-width: 581px) and (max-width: 1366px) {
        .card_lft .rating-star li:last-child span { font-size: 12px!important;line-height: 16px!important;}
        .wd-quote-data .accordion .card-header {flex-direction: column!important; padding-top: 19px!important; padding-bottom: 22px!important;}
        .wd-quote-data .card_lft,
        .wd-quote-btn,
        .wd-quote-head > div:first-child {width:100%!important;}
        .wd-quote-head > div:last-child {
            display: none!important;
        }
        .wd-quote-btn {justify-content: center; margin-top: 15px;}
        .delete_cross {
            position: absolute;
            right: 23px;
            top: 23px;
        } 
    }
    @media(max-width: 580px) {
        /* New Code starts */
        .wd-quote-form p {
            font-size: 10px!important;
        }
        .card_lft .rating-star li:last-child span { font-size: 12px;line-height: 16px;}
        .help {
            font-size: 16px;
            line-height: 20px;
            font-weight: 500;
            color:#F3F8FF;
            background: #0356D6;
            text-align: center;
            margin-bottom: 20px;
        }
        .help a:focus,
        .help a:hover,
        .help a {
            color:#F3F8FF;
        }
      
        .wd-quote-title p {
            font-size: 14px!important;
            line-height: 18px;
            font-weight: 300;
        }
        .no-due {
            display: inline-block;
            font-size: 12px;
            line-height: 15px;
            font-weight: 400;
            color:#000000;
        }
        .wd-accepted-btn,
        .wd-view-btn {
            font-size: 16px!important;
            line-height: 20px;
            font-weight: 500!important;
            color:#F3F8FF!important;
        }
        
        
        .hover_anchor{padding-left: 5px;}
        .wd-quote-msg {padding-top: 10px!important;}
        .text-note {display: none;}
        .verified-icon .icon_hover_sec {display: inline-block;}
        .right_mark {display: none;}
        .verified-icon .info_sec_details {
            top: 100px;
            transform: translateX(-58%)
        }
        .verified-icon .info_sec_details:before {right:110px;}
        .info_sec_details {
            top: 167px;
        }
        .wd-quote-data .accordion .card-header.active {
            background: #52D0170F!important;
        }
        .wd-quote-area {border-radius: 0!important; box-shadow: none!important;}
        .wd-quote-area .wd-quote-data {
            margin: 0 15px;
            border: 1px solid #CFCFCF;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 6px 3px 0px #8b8b8b54;
            border-bottom: 1px solid #CFCFCF;
            margin-bottom: 25px;
        }
        .wd-quote-area .wd-quote-data .wd-quote-txt {background: #ffffff;}
        .wd-quote-area .wd-quote-data .wd-quote-txt p {padding-left: 45px; position: relative; text-align: left; line-height:14px; padding-top: 10px; padding-bottom: 10px;}
        .wd-quote-area .wd-quote-data .wd-quote-txt p svg {position: absolute; left:15px; top:0; bottom:0; margin: auto;}
        .wd-quote-data .accordion .card-header.active {
            padding: 10px 15px 15px!important;
        }
        .wd-quote-data .accordion .card-body {padding: 10px 15px 15px!important;}
        .wd-quote-area .wd-quote-data .wd-quote-table-head {display: none;}
        .wd-quote-area .wd-quote-data .card_lft {
            flex-direction: column;
            width: 100%!important;
        }
        .wd-quote-area .wd-quote-data .card_lft .mobile-wrap {width:100%; text-align:left!important; max-width:100%!important; margin-top: 0!important; margin-bottom: 10px!important; align-items:center!important; display: flex; flex-wrap: wrap; margin-bottom: 10px;}
        .wd-quote-area .wd-quote-data .card_lft .mobile-wrap.rating-mobile-wrap {margin-bottom: 0; margin-top: 10px;}
        .wd-quote-area .wd-quote-data .card_lft .mobile-label {
            font-size: 16px;
            line-height: 20px;
            font-weight: 500;
            color:#444444;
        }
        .wd-quote-area .wd-quote-data .card_lft .mobile-label,
        .wd-quote-area .wd-quote-data .card_lft .mobile-label + * {width:50%;}
        .wd-quote-area .wd-quote-data .card_lft + .wd-quote-btn {
            flex-direction: column;
            gap:10px;
            margin-top: 10px;
            width: 100%!important;
        }
        .wd-quote-area .wd-quote-data .card_lft + .wd-quote-btn a {width: 100%; justify-content: center;}
        .wd-quote-area .wd-quote-data .accordion .card-body {background: #ffffff;}
        .delete_cross {
            position: absolute;
            top: 15px;
            right: 15px;
            width: auto!important;
        }
        /* New Code ends */
        
        .info_sec_details {
            transform: translateX(-50%);
        }

        .wd-quote-data .card_lft h4 {
            width: 21%;
        }

        .wd-quote-head p.quote-table-transport {
            margin-left: 0;
            width: 20%;
        }

        .wd-quote-head p.quote-table-Rating {
            margin-left: 0;
        }

        .wd-quote-head p.quote-table-Verified {
            margin-left: 0;
        }

        .wd-quote-table-head .wd-quote-head {
            padding: 0 10px;
            justify-content: space-between;
        }

        /* .card_lft .rating-star li:last-child {
            padding-top: 1px;
        } */

        /* .card_lft .rating-star li:last-child svg {
            padding-top: 0.5px;
        } */

    }

    @media(max-width: 430px) {
        /* .icon_hover_sec:hover .info_sec_details {
            transform: translateX(-50%);
        } */

        /* .icon_hover_sec:hover .info_sec_details:before {
            right: 35px;
        } */
    }

    @media(max-width: 340px) {
        /* .icon_hover_sec .info_sec_details {
            width: 260px;
        } */
        .verified-icon .info_sec_details {
        top: 120px;
        transform: translateX(-56%);
    }
        .icon_hover_sec .info_sec_details:before {
            right: 70px;
        }
        .verified-icon .info_sec_details:before {right: 90px;}
    }
    @media(min-width: 581px) {
        .wd-view-btn {order:1}
        .wd-accepted-btn {order: 2;}
        .delete_cross {order: 3;}
        
        /* .help {display: none;} */
        .first-mobile-wrap h4 {width: auto!important;}
        .mobile-label {display: none;}
        .first-mobile-wrap {gap:5px;}
        .card-header h5,
        .icon_hover_sec .flex_blog,
        .rating-star.choose_quote_rating {justify-content: center; text-align:center!important;}
    }
    @media(min-width: 576px) {
        .help {
            background: transparent;
            color:#000000;
            text-align: left;
        }
        .help a:focus, .help a:hover, .help a {color:#000000;}
    }
    @media(min-width: 768px) {
        .help {
            text-align: right;
        }
    }
    @media(min-width: 1281px) {
        .help {
            font-size: 24px;
            line-height: 30px;
        }
    }
</style>
@section('content')
    @include('layouts.web.dashboard.header')
    <section class="wd-quote-area bradius_10">
        <div class="row align-items-center align-items-md-end header-part">
            <div class="col-12 col-md-6">
                <div class="wd-quote-title">
                    <h1>Accept the best quote.</h1>
                    <p>You have received {{ count($quotes) }} quotes so far, choose the best one based on price and convenience and click accept to secure your booking.</p>
                </div>
            </div>
            <div class="help col-12 col-md-6 px-0 px-sm-3 py-3 pb-sm-0 py-md-0">Need help? Call us <a href="tel:08081557979">0808 155 7979</a></div>
        </div>
        <div class="wd-quote-data">
            <div class="wd-quote-table-head">
                <div class="wd-quote-head">
                    <div class="d-flex flex-wrap" style="width:calc(100% - 400px);">
                        <p class="quote-table-transport" style="max-width:20%; flex: 0 0 20%; text-align:left;">Transporter</p>
                        <p class="quote-table-Rating" style="max-width:20%; flex: 0 0 20%; text-align:center;">Rating</p>
                        <p class="quote-table-Verified" style="max-width:20%; flex: 0 0 20%; text-align:center;">Verified</p>
                        <p class="quote-table-Dates" style="max-width:20%; flex: 0 0 20%; text-align:center;">Dates</p>
                        <p class="quote-table-Quote" style="max-width:20%; flex: 0 0 20%; text-align:center;">Quote</p>
                    </div>
                    <div class="d-flex flex-wrap" style="width: 400px;">
                        <p class="quote-table-Quote" style="max-width:100%; flex: 0 0 100%; text-align:center;"></p>
                    </div>
                </div>
            </div>
            <div class="wd-quote-txt">
                <p>
                    <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.97229 12.0716C9.99069 12.4726 9.68153 12.8131 9.28062 12.8333H7.88646C7.48555 12.8131 7.17639 12.4726 7.19479 12.0716V10.5925C5.22916 9.87115 4.11383 7.7935 4.59884 5.75664C5.08385 3.71979 7.01584 2.36775 9.09561 2.60972C11.1754 2.85169 12.7454 4.61116 12.7498 6.70496C12.7443 8.4594 11.6302 10.0186 9.97229 10.5925V12.0716Z" stroke="#575757" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.97234 11.0925C10.2485 11.0925 10.4723 10.8686 10.4723 10.5925C10.4723 10.3163 10.2485 10.0925 9.97234 10.0925V11.0925ZM7.194 10.0925C6.91786 10.0925 6.694 10.3163 6.694 10.5925C6.694 10.8686 6.91786 11.0925 7.194 11.0925V10.0925ZM16.4998 7.20499C16.776 7.20499 16.9998 6.98113 16.9998 6.70499C16.9998 6.42885 16.776 6.20499 16.4998 6.20499V7.20499ZM14.8332 6.20499C14.557 6.20499 14.3332 6.42885 14.3332 6.70499C14.3332 6.98113 14.557 7.20499 14.8332 7.20499V6.20499ZM2.33317 7.20499C2.60931 7.20499 2.83317 6.98113 2.83317 6.70499C2.83317 6.42885 2.60931 6.20499 2.33317 6.20499V7.20499ZM0.666504 6.20499C0.390362 6.20499 0.166504 6.42885 0.166504 6.70499C0.166504 6.98113 0.390362 7.20499 0.666504 7.20499V6.20499ZM14.5328 1.52246C14.7293 1.32845 14.7313 1.01187 14.5373 0.815369C14.3433 0.618863 14.0267 0.616841 13.8302 0.810852L14.5328 1.52246ZM12.6485 1.97752C12.452 2.17153 12.45 2.48811 12.644 2.68461C12.838 2.88112 13.1546 2.88314 13.3511 2.68913L12.6485 1.97752ZM4.51829 11.4328C4.71453 11.2385 4.7161 10.9219 4.52181 10.7257C4.32752 10.5295 4.01094 10.5279 3.81471 10.7222L4.51829 11.4328ZM2.63638 11.8888C2.44015 12.0831 2.43857 12.3997 2.63286 12.5959C2.82715 12.7922 3.14373 12.7938 3.33996 12.5995L2.63638 11.8888ZM13.8322 12.5995C14.0284 12.7938 14.345 12.7922 14.5393 12.5959C14.7336 12.3997 14.732 12.0831 14.5358 11.8888L13.8322 12.5995ZM13.3575 10.7222C13.1612 10.5279 12.8447 10.5295 12.6504 10.7257C12.4561 10.9219 12.4576 11.2385 12.6539 11.4328L13.3575 10.7222ZM3.81522 2.68913C4.01172 2.88314 4.3283 2.88112 4.52231 2.68461C4.71632 2.48811 4.7143 2.17153 4.51779 1.97752L3.81522 2.68913ZM3.33613 0.810852C3.13962 0.616841 2.82304 0.618863 2.62903 0.815369C2.43502 1.01187 2.43704 1.32845 2.63355 1.52246L3.33613 0.810852ZM9.97234 10.0925H7.194V11.0925H9.97234V10.0925ZM16.4998 6.20499H14.8332V7.20499H16.4998V6.20499ZM2.33317 6.20499H0.666504V7.20499H2.33317V6.20499ZM13.8302 0.810852L12.6485 1.97752L13.3511 2.68913L14.5328 1.52246L13.8302 0.810852ZM3.81471 10.7222L2.63638 11.8888L3.33996 12.5995L4.51829 11.4328L3.81471 10.7222ZM14.5358 11.8888L13.3575 10.7222L12.6539 11.4328L13.8322 12.5995L14.5358 11.8888ZM4.51779 1.97752L3.33613 0.810852L2.63355 1.52246L3.81522 2.68913L4.51779 1.97752Z" fill="#575757"/>
                    </svg>                        
                    Transport providers get booked up and quotes are often withdrawn, book now to avoid missing out.
                </p>
            </div>
            <div class="accordion" id="accordionExample">
                @foreach ($quotes as $key => $quote)
                    @if ($quote->status != 'rejected')
                        <div class="card">
                            <div class="card-header @if ($key == 0) active @endif"
                                id="heading{{ $key }}">
                                <div class="card_lft" style="width:calc(100% - 400px);">
                                    <div class="d-flex flex-wrap align-items-center mobile-wrap first-mobile-wrap" style="max-width:20%; flex: 0 0 20%;">
                                        <span class="mobile-label">
                                            Transport Provider
                                        </span>
                                        {{-- <a href="{{ route('front.feedback_view', $quote->id) }}"> --}}
                                            <h4 style="line-height: 24px;">
                                                {{ $quote->getTransporters->username ?? '' }}</h4>
                                        {{-- </a> --}}
                                    </div>
                                        <div class="mobile-wrap rating-mobile-wrap" style="max-width:20%; flex: 0 0 20%; text-align:center;">
                                            <span class="mobile-label">Rating</span>
                                            {{-- @if ($quote->percentage == 0) --}}
                                                {{-- <ul class="rating-star choose_quote_rating">
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
                                                        <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10.8 0L13.2248 7.46262L21.0714 7.46262L14.7233 12.0748L17.1481 19.5374L10.8 14.9252L4.45192 19.5374L6.87667 12.0748L0.528589 7.46262L8.37525 7.46262L10.8 0Z"
                                                                fill="#D9D9D9" />
                                                        </svg>
                                                    </li> --}}
                                                    {{-- <li>
                                                       
                                                        <svg width="22" height="20" viewBox="0 0 44 44" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M22 0L26.9393 15.2016H42.9232L29.992 24.5967L34.9313 39.7984L22 30.4033L9.06872 39.7984L14.008 24.5967L1.07676 15.2016H17.0607L22 0Z"
                                                                fill="#DCDCDE" />
                                                            <mask id="mask0_5_1268" style="mask-type:alpha"
                                                                maskUnits="userSpaceOnUse" x="0" y="0" width="23"
                                                                height="44">
                                                                <rect width="23" height="44" fill="#D9D9D9" />
                                                            </mask>
                                                            <g mask="url(#mask0_5_1268)">
                                                                <path
                                                                    d="M22 0L26.9393 15.2016H42.9232L29.992 24.5967L34.9313 39.7984L22 30.4033L9.06872 39.7984L14.008 24.5967L1.07676 15.2016H17.0607L22 0Z"
                                                                    fill="#D9D9D9" />
                                                            </g>
                                                        </svg>
                                                    </li> --}}
                                                    {{-- <li><span class="ml-1">({{ $quote->percentage }}%)</span></li> --}}
                                                    {{-- <li><span class="ml-1">({{ $quote->percentage }}%)</span></li>
                                                </ul> --}}
                                            {{-- @else
                                                @php
                                                    $totalStars = 5; // Total number of stars
                                                    $yellowStars = round($quote->rating_average); // Full yellow stars
                                                @endphp
                                                <ul class="rating-star choose_quote_rating">

                                                    @for ($i = 1; $i <= $totalStars; $i++)
                                                        <li>
                                                            <svg width="20" height="20" viewBox="0 0 12 12"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                    fill="{{ $i <= $yellowStars ? '#FFA800' : '#ccc' }}" />
                                                            </svg>
                                                        </li>
                                                    @endfor --}}
                                                    {{-- <li>
                                            <!-- <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.8 0L13.2248 7.46262L21.0714 7.46262L14.7233 12.0748L17.1481 19.5374L10.8 14.9252L4.45192 19.5374L6.87667 12.0748L0.528589 7.46262L8.37525 7.46262L10.8 0Z" fill="#FFA800"/>
                                            </svg> -->
                                            <svg width="22" height="20" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22 0L26.9393 15.2016H42.9232L29.992 24.5967L34.9313 39.7984L22 30.4033L9.06872 39.7984L14.008 24.5967L1.07676 15.2016H17.0607L22 0Z" fill="#DCDCDE"/>
                                                <mask id="mask0_5_1268" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="23" height="44">
                                                <rect width="23" height="44" fill="#D9D9D9"/>
                                                </mask>
                                                <g mask="url(#mask0_5_1268)">
                                                <path d="M22 0L26.9393 15.2016H42.9232L29.992 24.5967L34.9313 39.7984L22 30.4033L9.06872 39.7984L14.008 24.5967L1.07676 15.2016H17.0607L22 0Z" fill="#FFB902"/>
                                                </g>
                                            </svg>
                                        </li> --}}
                                                    {{-- <li><span class="ml-1">100%</span></li>
                                                </ul>
                                            @endif --}}

                                            @php
                                            $totalStars = 5; // Total number of stars
                                            $yellowStars = 5; // Full yellow stars
                                            @endphp
                                            <ul class="rating-star choose_quote_rating">

                                                @for ($i = 1; $i <= $totalStars; $i++)
                                                    <li>
                                                        <svg width="20" height="20" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                fill="{{ $i <= $yellowStars ? '#FFA800' : '#ccc' }}" />
                                                        </svg>
                                                    </li>
                                                @endfor 
                                             <li><span class="ml-1 d-inline-block">(100%)</span></li>
                                        </ul>
                                        </div>
                                    {{-- </div> --}}
                                    <div class="mobile-wrap" style="max-width:20%; flex: 0 0 20%; text-align:center;">
                                        <span class="mobile-label">Verified</span>
                                        <span class="verified-icon">
                                            <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9965 5.3326C17.1504 13.7554 12.1262 17.3386 9.2776 18.184C9.08891 18.2401 8.88795 18.2401 8.69926 18.184C5.89741 17.3534 1.01723 13.876 1 5.75221C1.01688 5.05019 1.41171 4.41206 2.03239 4.08364C6.36869 1.63494 8.45439 1 8.98474 1C9.51509 1 11.7657 1.67555 16.3899 4.32236C16.756 4.52867 16.9865 4.91248 16.9965 5.3326Z" stroke="#52D017" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M5.30664 9.63198L7.76765 12.093L12.6897 7.16113" stroke="#52D017" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>   
                                            <div class="icon_hover_sec">
                                                <a class="hover_anchor">
                                                    <img src="{{ asset('assets/web/images/question.png') }}" alt="question" />
                                                </a>
                                                <div class="info_sec_details" id="infos-details">
                                                    <div class="info_sec_details_contant">
                                                        <p>We have verified this transport providers insurance cover and drivers license to protect you and transport vehicles safe and securely.</p>
                                                    </div>
                                                </div>
                                            </div>                                        
                                        </span>
                                        {{-- <img src="{{ asset('assets/web/images/right-mark.png') }}" class="right_mark"
                                        alt="right mark"> --}}
                                    </div>
                                    <div class="mobile-wrap" style="max-width:20%; flex: 0 0 20%;">
                                        <span class="mobile-label">Availability</span>
                                        <div class="icon_hover_sec">
                                            <div class="flex_blog "><span>Flexible</span>
                                                <a class="hover_anchor" 
                                                    data-toggle="popover" data-placement="bottom" data-content="Accept the quote and the transporter will contact you to arrange a convenient time and date."><img
                                                        src="{{ asset('assets/web/images/question.png') }}"
                                                        alt="question"></a>
                                            </div>
                                            {{-- <div class="info_sec_details" id="info-details">
                                                <div class="info_sec_details_contant">
                                                    <p>Accept the quote and the transporter will contact you to arrange a convenient time and date.</p>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="mobile-wrap" style="max-width:20%; flex: 0 0 20%; text-align:center;">
                                        <span class="mobile-label">Quote Amount</span>
                                        <h5 class="amount">£{{ $quote->price }} <span class="no-due">(No fees)</span></h5>
                                    </div>
                                    <!-- <a href="javascript:;" class="d-lg-none" data-toggle="modal" data-target="#delete_quote_{{ $quote->id }}">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2C10.0222 2 8.08879 2.58649 6.4443 3.6853C4.79981 4.78412 3.51809 6.3459 2.76121 8.17317C2.00433 10.0004 1.8063 12.0111 2.19215 13.9509C2.578 15.8907 3.53041 17.6725 4.92894 19.0711C6.32746 20.4696 8.10929 21.422 10.0491 21.8079C11.9889 22.1937 13.9996 21.9957 15.8268 21.2388C17.6541 20.4819 19.2159 19.2002 20.3147 17.5557C21.4135 15.9112 22 13.9778 22 12C22 10.6868 21.7413 9.38642 21.2388 8.17317C20.7363 6.95991 19.9997 5.85752 19.0711 4.92893C18.1425 4.00035 17.0401 3.26375 15.8268 2.7612C14.6136 2.25866 13.3132 2 12 2ZM15.21 13.79C15.3037 13.883 15.3781 13.9936 15.4289 14.1154C15.4797 14.2373 15.5058 14.368 15.5058 14.5C15.5058 14.632 15.4797 14.7627 15.4289 14.8846C15.3781 15.0064 15.3037 15.117 15.21 15.21C15.117 15.3037 15.0064 15.3781 14.8846 15.4289C14.7627 15.4797 14.632 15.5058 14.5 15.5058C14.368 15.5058 14.2373 15.4797 14.1154 15.4289C13.9936 15.3781 13.883 15.3037 13.79 15.21L12 13.41L10.21 15.21C10.117 15.3037 10.0064 15.3781 9.88458 15.4289C9.76272 15.4797 9.63202 15.5058 9.5 15.5058C9.36799 15.5058 9.23729 15.4797 9.11543 15.4289C8.99357 15.3781 8.88297 15.3037 8.79 15.21C8.69628 15.117 8.62188 15.0064 8.57111 14.8846C8.52034 14.7627 8.49421 14.632 8.49421 14.5C8.49421 14.368 8.52034 14.2373 8.57111 14.1154C8.62188 13.9936 8.69628 13.883 8.79 13.79L10.59 12L8.79 10.21C8.6017 10.0217 8.49591 9.7663 8.49591 9.5C8.49591 9.2337 8.6017 8.9783 8.79 8.79C8.97831 8.6017 9.2337 8.49591 9.5 8.49591C9.76631 8.49591 10.0217 8.6017 10.21 8.79L12 10.59L13.79 8.79C13.9783 8.6017 14.2337 8.49591 14.5 8.49591C14.7663 8.49591 15.0217 8.6017 15.21 8.79C15.3983 8.9783 15.5041 9.2337 15.5041 9.5C15.5041 9.7663 15.3983 10.0217 15.21 10.21L13.41 12L15.21 13.79Z" fill="#ED1C24"/>
                                    </svg>
                                </a> -->
                                </div>
                                <div class="wd-quote-btn" style="width: 400px;">
                                    <a href="javascript:;" class="wd-view-btn messageShow justify-content-center"
                                        data-msgkey="{{ $key }}" type="button" data-toggle="collapse"
                                        data-target="#collapse{{ $key }}" aria-expanded="true"
                                        aria-controls="collapseOne">View messages
                                        {{-- <span class="msg_{{ $quote->thread_id ?? 0 }}">0</span> --}}
                                    </a>
                                    @if ($quote->status == 'pending' && !$hasAcceptedQuote)
                                        <a href="javascript:;"
                                            onclick="quoteChangeStatus({{ $quote->id }}, 'accept');"
                                            class="wd-accepted-btn">Accept
                                            <svg width="9" height="15" id="accept-svg" viewBox="0 0 9 15"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.45029 8.19736L2.87217 13.7755C2.48662 14.161 1.86318 14.161 1.48174 13.7755L0.554785 12.8485C0.169238 12.463 0.169238 11.8396 0.554785 11.4581L4.50869 7.5042L0.554785 3.55029C0.169238 3.16475 0.169238 2.54131 0.554785 2.15986L1.47764 1.22471C1.86318 0.83916 2.48662 0.83916 2.86807 1.22471L8.44619 6.80283C8.83584 7.18838 8.83584 7.81182 8.45029 8.19736Z"
                                                    fill="#F3F8FF" />
                                            </svg>
                                        </a>
                                        <a href="javascript:;" data-toggle="modal"
                                            data-target="#delete_quote_{{ $quote->id }}" class="d-lg-block delete_cross">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 2C10.0222 2 8.08879 2.58649 6.4443 3.6853C4.79981 4.78412 3.51809 6.3459 2.76121 8.17317C2.00433 10.0004 1.8063 12.0111 2.19215 13.9509C2.578 15.8907 3.53041 17.6725 4.92894 19.0711C6.32746 20.4696 8.10929 21.422 10.0491 21.8079C11.9889 22.1937 13.9996 21.9957 15.8268 21.2388C17.6541 20.4819 19.2159 19.2002 20.3147 17.5557C21.4135 15.9112 22 13.9778 22 12C22 10.6868 21.7413 9.38642 21.2388 8.17317C20.7363 6.95991 19.9997 5.85752 19.0711 4.92893C18.1425 4.00035 17.0401 3.26375 15.8268 2.7612C14.6136 2.25866 13.3132 2 12 2ZM15.21 13.79C15.3037 13.883 15.3781 13.9936 15.4289 14.1154C15.4797 14.2373 15.5058 14.368 15.5058 14.5C15.5058 14.632 15.4797 14.7627 15.4289 14.8846C15.3781 15.0064 15.3037 15.117 15.21 15.21C15.117 15.3037 15.0064 15.3781 14.8846 15.4289C14.7627 15.4797 14.632 15.5058 14.5 15.5058C14.368 15.5058 14.2373 15.4797 14.1154 15.4289C13.9936 15.3781 13.883 15.3037 13.79 15.21L12 13.41L10.21 15.21C10.117 15.3037 10.0064 15.3781 9.88458 15.4289C9.76272 15.4797 9.63202 15.5058 9.5 15.5058C9.36799 15.5058 9.23729 15.4797 9.11543 15.4289C8.99357 15.3781 8.88297 15.3037 8.79 15.21C8.69628 15.117 8.62188 15.0064 8.57111 14.8846C8.52034 14.7627 8.49421 14.632 8.49421 14.5C8.49421 14.368 8.52034 14.2373 8.57111 14.1154C8.62188 13.9936 8.69628 13.883 8.79 13.79L10.59 12L8.79 10.21C8.6017 10.0217 8.49591 9.7663 8.49591 9.5C8.49591 9.2337 8.6017 8.9783 8.79 8.79C8.97831 8.6017 9.2337 8.49591 9.5 8.49591C9.76631 8.49591 10.0217 8.6017 10.21 8.79L12 10.59L13.79 8.79C13.9783 8.6017 14.2337 8.49591 14.5 8.49591C14.7663 8.49591 15.0217 8.6017 15.21 8.79C15.3983 8.9783 15.5041 9.2337 15.5041 9.5C15.5041 9.7663 15.3983 10.0217 15.21 10.21L13.41 12L15.21 13.79Z"
                                                    fill="#9C9C9C" />
                                            </svg>
                                        </a>
                                    @elseif($quote->status == 'accept')
                                        @if ($job_status != 'completed')
                                            <a
                                                href="{{ route('front.booking_confirm_page', $user_quote_id) }}"class="wd-accepted-btn">Go
                                                to booking</a>
                                        @else
                                            <a
                                                href="{{ route('front.user_deposit', ['id' => $quote->id]) }}"class="wd-accepted-btn">Go
                                                to booking</a>
                                        @endif
                                    @endif
                                    
                                </div>
                            </div>

                            <!-- delete quote Modal -->
                            <div class="modal fade mark_bx" id="delete_quote_{{ $quote->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">
                                                    <svg width="19" height="19" viewBox="0 0 19 19"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M0.93934 15.9393C0.353553 16.5251 0.353553 17.4749 0.93934 18.0607C1.52513 18.6464 2.47487 18.6464 3.06066 18.0607L0.93934 15.9393ZM10.5607 10.5607C11.1464 9.97487 11.1464 9.02513 10.5607 8.43934C9.97487 7.85355 9.02513 7.85355 8.43934 8.43934L10.5607 10.5607ZM8.43934 8.43934C7.85355 9.02513 7.85355 9.97487 8.43934 10.5607C9.02513 11.1464 9.97487 11.1464 10.5607 10.5607L8.43934 8.43934ZM18.0607 3.06066C18.6464 2.47487 18.6464 1.52513 18.0607 0.93934C17.4749 0.353553 16.5251 0.353553 15.9393 0.93934L18.0607 3.06066ZM10.5607 8.43934C9.97487 7.85355 9.02513 7.85355 8.43934 8.43934C7.85355 9.02513 7.85355 9.97487 8.43934 10.5607L10.5607 8.43934ZM15.9393 18.0607C16.5251 18.6464 17.4749 18.6464 18.0607 18.0607C18.6464 17.4749 18.6464 16.5251 18.0607 15.9393L15.9393 18.0607ZM8.43934 10.5607C9.02513 11.1464 9.97487 11.1464 10.5607 10.5607C11.1464 9.97487 11.1464 9.02513 10.5607 8.43934L8.43934 10.5607ZM3.06066 0.93934C2.47487 0.353553 1.52513 0.353553 0.93934 0.93934C0.353553 1.52513 0.353553 2.47487 0.93934 3.06066L3.06066 0.93934ZM3.06066 18.0607L10.5607 10.5607L8.43934 8.43934L0.93934 15.9393L3.06066 18.0607ZM10.5607 10.5607L18.0607 3.06066L15.9393 0.93934L8.43934 8.43934L10.5607 10.5607ZM8.43934 10.5607L15.9393 18.0607L18.0607 15.9393L10.5607 8.43934L8.43934 10.5607ZM10.5607 8.43934L3.06066 0.93934L0.93934 3.06066L8.43934 10.5607L10.5607 8.43934Z"
                                                            fill="#CFCFCF" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h3 class="d-block text-center">Are you sure you want to <br /> reject this
                                                quote ?</h3>
                                        </div>
                                        <div class="modal-footer p-0">
                                            <a href="javascript:;" class="no_btn" data-dismiss="modal">No</a>
                                            <a href="javascript:void(0)"
                                                onclick="quoteChangeStatus({{ $quote->id }}, 'rejected');"
                                                class="yes_btn">Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="collapse{{ $key }}"
                                class="collapse @if ($key == 0) show @endif"
                                aria-labelledby="heading{{ $key }}" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form id="chat__form_{{ $key }}"
                                        action="{{ route('front.message.quote_send_message') }}" method="post"
                                        enctype='multipart/form-data'>
                                        @csrf
                                        <?php
                                        $thread = App\Thread::where('user_id', Auth::user()->id)
                                            ->where('friend_id', $quote->user_id)
                                            ->where('user_quote_id', $quote->user_quote_id)
                                            ->first();
                                        ?>
                                        <input type="hidden" name="form_page" value="quote">
                                        <input type="hidden" name="transporter_id" value="{{ $quote->user_id }}">
                                        <input type="hidden" name="user_quote_id" value="{{ $quote->user_quote_id }}">
                                        <input type="hidden" name="user_current_chat_id"
                                            id="user_current_chat_id_{{ $key }}"
                                            value="{{ $thread ? $thread->id : 0 }}">
                                        <div class="wd-quote-form">
                                            <div class="form-group">
                                                <p class="font-weight-light d-flex flex-wrap align-items-center text-left position-relative" style="font-size:14px; padding-left:20px; margin-bottom: 5px; color:#444444;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none" class="position-absolute" style="left:0;">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.95833 8.70834V10.2917C3.95833 12.915 6.08498 15.0417 8.70833 15.0417H10.2917C12.915 15.0417 15.0417 12.915 15.0417 10.2917V8.70834C15.0417 6.08499 12.915 3.95834 10.2917 3.95834H8.70833C6.08498 3.95834 3.95833 6.08499 3.95833 8.70834Z" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M8.75 12.6667C8.75 13.0809 9.08579 13.4167 9.5 13.4167C9.91421 13.4167 10.25 13.0809 10.25 12.6667H8.75ZM9.5 8.70834H10.25C10.25 8.29413 9.91421 7.95834 9.5 7.95834V8.70834ZM8.70833 7.95834C8.29412 7.95834 7.95833 8.29413 7.95833 8.70834C7.95833 9.12256 8.29412 9.45834 8.70833 9.45834V7.95834ZM9.5 13.4167C9.91421 13.4167 10.25 13.0809 10.25 12.6667C10.25 12.2525 9.91421 11.9167 9.5 11.9167V13.4167ZM8.70833 11.9167C8.29412 11.9167 7.95833 12.2525 7.95833 12.6667C7.95833 13.0809 8.29412 13.4167 8.70833 13.4167V11.9167ZM9.5 11.9167C9.08579 11.9167 8.75 12.2525 8.75 12.6667C8.75 13.0809 9.08579 13.4167 9.5 13.4167V11.9167ZM10.2917 13.4167C10.7059 13.4167 11.0417 13.0809 11.0417 12.6667C11.0417 12.2525 10.7059 11.9167 10.2917 11.9167V13.4167ZM10.25 6.33334C10.25 5.91913 9.91421 5.58334 9.5 5.58334C9.08579 5.58334 8.75 5.91913 8.75 6.33334H10.25ZM8.75 7.12501C8.75 7.53922 9.08579 7.87501 9.5 7.87501C9.91421 7.87501 10.25 7.53922 10.25 7.12501H8.75ZM10.25 12.6667V8.70834H8.75V12.6667H10.25ZM9.5 7.95834H8.70833V9.45834H9.5V7.95834ZM9.5 11.9167H8.70833V13.4167H9.5V11.9167ZM9.5 13.4167H10.2917V11.9167H9.5V13.4167ZM8.75 6.33334V7.12501H10.25V6.33334H8.75Z" fill="#444444"></path>
                                                    </svg>
                                                    Accept a quote to receive the transport providers contact details. 
                                                </p>
                                                {{-- <div class="wd-form-btn">
                                                    <p>Accept a quote to receive the transport providers contact details.</p>
                                                </div>                                                --}}
                                                <textarea class="form-control textarea" id="message"
                                                    placeholder="Type any question you have about this quote here."></textarea>
                                                    <p class="chat-note text-left font-weight-normal position-relative" style="font-size:14px; padding-left:20px; margin-top: 5px; color:#444444;">
                                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg" class="position-absolute" style="left:0; top:0;">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5631 12.2653L10.9587 4.78559C10.655 4.27279 10.1032 3.95831 9.50721 3.95831C8.91121 3.95831 8.35943 4.27279 8.05569 4.78559L3.45057 12.2653C3.10235 12.8105 3.07241 13.5003 3.37208 14.0737C3.67176 14.647 4.25525 15.0163 4.90169 15.0416H14.1119C14.7584 15.0163 15.3419 14.647 15.6416 14.0737C15.9412 13.5003 15.9113 12.8105 15.5631 12.2653Z" stroke="#5B5B5B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M9.50682 10.2916V6.33329" stroke="#5B5B5B" stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path d="M9.50682 12.6666V11.875" stroke="#5B5B5B" stroke-width="1.5" stroke-linecap="round"></path>
                                                        </svg>                           
                                                        Do not share your contact details or personal information here.
                                                    </p>
                                            </div>
                                            <div class="message-error" style="display:none">Please enter your message.
                                            </div>
                                            <div class="wd-form-btn">
                                                {{--                                    <button type="submit" href="javascript:;" class="send-msg" id="send_message">Send message --}}
                                                {{--                                        <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg"> --}}
                                                {{--                                            <path d="M16.7637 1.65906L14.2551 13.4895C14.0658 14.3245 13.5722 14.5323 12.8709 14.1389L9.04861 11.3223L7.20428 13.0962C7.00018 13.3003 6.82947 13.471 6.43611 13.471L6.71072 9.5782L13.7949 3.17683C14.1029 2.90222 13.7281 2.75007 13.3162 3.02468L4.55838 8.53913L0.788066 7.35906C-0.0320513 7.103 -0.0468951 6.53894 0.958769 6.14558L15.706 0.464134C16.3888 0.208079 16.9863 0.616282 16.7637 1.65906Z" fill="white"/> --}}
                                                {{--                                        </svg> --}}
                                                {{--                                    </button> --}}
                                                <a href="javascript:;" class="send-msg"
                                                    onclick="sendMessage({{ $key }});" id="send_message">Send
                                                    message
                                                    <svg width="17" height="15" viewBox="0 0 17 15"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16.7637 1.65906L14.2551 13.4895C14.0658 14.3245 13.5722 14.5323 12.8709 14.1389L9.04861 11.3223L7.20428 13.0962C7.00018 13.3003 6.82947 13.471 6.43611 13.471L6.71072 9.5782L13.7949 3.17683C14.1029 2.90222 13.7281 2.75007 13.3162 3.02468L4.55838 8.53913L0.788066 7.35906C-0.0320513 7.103 -0.0468951 6.53894 0.958769 6.14558L15.706 0.464134C16.3888 0.208079 16.9863 0.616282 16.7637 1.65906Z"
                                                            fill="white" />
                                                    </svg>
                                                </a>
                                                <p class="text-note d-none"><span>Note:</span> Please do not share any contact information here,
                                                    details are exchanged after you have accepted the quote.</p>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="wd-quote-msg" id="chat_history_main_{{ $key }}">

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <!-- <div>
                    <p class="wd-view-txt">View declined, withdraw & expired quotes (5)</p>
                </div> -->
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('assets/web/js/admin.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.40/moment-timezone-with-data.js"
        type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js"></script>
    <script>
        $(document).ready(()=>{
            $('[data-toggle="popover"]').popover({trigger:'hover'});
        });
        function quoteChangeStatus(quote_id, status) {
            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("quote_id", quote_id);
            formData.append("status", status);
            $.ajax({
                url: "{{ route('front.quote_change_status') }}",
                data: formData,
                processData: false,
                contentType: false,
                type: "POST",
                beforeSend: function() {
                    addOverlay();
                },
                complete: function() {
                    removeOverlay();
                },
                success: function(res) {
                    if (res.success == true) {
                        if (status == 'accept') {
                            var url = "{{ route('front.checkout', ['id' => ':quote_id']) }}";
                            url = url.replace(':quote_id', quote_id);
                            window.location.href = url;
                            return;
                        } else {
                            window.location.reload();
                        }

                    } else {
                        toastr.error(res.message);
                    }
                },
                error: function(data) {
                    toastr.clear();
                    toastr.error(data.message);
                }
            });
        }
    </script>
    <script>
        const fileImage = document.querySelector('.photo-preview__src');
        const filePreview = document.querySelector('.photo-preview');

        fileImage.onchange = function() {
            const reader = new FileReader();

            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                filePreview.style.backgroundImage = "url(" + e.target.result + ")";
                filePreview.classList.add("has-image");
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
    </script>
    <script>
        function isEmptyOrSpaces(str) {
            return str === null || str.match(/^ *$/) !== null;
        }

        function getChatHistory(url, id) {
            var elems = document.querySelector(".active");
            var timezone = moment.tz.guess();
            console.log(timezone);

            // if(elems !==null){
            //     elems.classList.remove("active");
            // }
            //$(thisobj).find("li").addClass('active');
            $.ajax({
                url: url,
                data: {
                    "timezone": timezone
                },
                dataType: "json",
            }).done(function(response) {
                $("#chat_history_main_" + id).html(response.html);
                if (response.messageCounts) {
                    console.log('Message Counts:', response.messageCounts);
                    for (const [threadId, count] of Object.entries(response.messageCounts)) {
                        const messageCountElem = document.querySelector('.msg_' + threadId);
                        if (messageCountElem) {
                            messageCountElem.textContent = count;
                        }
                    }
                }
                // $(thisobj).find(".kt-widget__item").find('.kt-widget__action').html('');
                // KTAppChat.init();
                // scrollToBottom();
                // getTotalUnreadMessage();
            });
        }
        var send_message = false;

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


        $(document).ready(function() {
            updateChat();
            $('.textarea').on('keyup', function() {
                $('.message-error').css('display', 'none');
            })
            //setInterval(updateChat, 5000);

            function updateChat() {
                var id = 0;
                var selected_chat_id = $("#user_current_chat_id_0").val();
                if (selected_chat_id) {
                    var url = "{{ route('front.message.quote_history', ':chat_id') }}";
                    url = url.replace(':chat_id', selected_chat_id);
                    getChatHistory(url, id);
                }

                {{-- var url = "{{route('transporter.message.history',($latest_chat->id) ?? 0)}}" --}}
                {{-- getChatHistory(url,$(".get-chat-history")[0]); --}}
            }

            $('#message').on('keydown paste input', function(event) {
                if (event.type === 'keydown' && event.key >= '0' && event.key <= '9') {
                    event.preventDefault();
                }
                if (event.type === 'paste') {
                    let pastedData = event.originalEvent.clipboardData.getData('text');
                    if (/\d/.test(pastedData)) {
                        event.preventDefault();
                    }
                }
                if (event.type === 'input') {
                    let newValue = $(this).val().replace(/[0-9]/g, '');
                    $(this).val(newValue);
                }
            });
        });
        $('.messageShow').on('click', function() {
            var id = $(this).attr('data-msgkey');
            var selected_chat_id = $("#user_current_chat_id_" + id).val();
            if (selected_chat_id) {
                var url = "{{ route('front.message.quote_history', ':chat_id') }}";
                url = url.replace(':chat_id', selected_chat_id);
                getChatHistory(url, id);
            }
        })
      
    </script>
@endsection
