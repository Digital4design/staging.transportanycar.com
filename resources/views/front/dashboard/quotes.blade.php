@extends('layouts.web.dashboard.app')

@section('head_css')
@endsection
<style>
    .rating-modal .modal-dialog {
        max-width: 393px;
    }
    .rating-modal .modal-dialog .modal-content {border-radius: 0;}
    .wd-quote-data {background:#ffffff!important;}
    .wd-quote-data .accordion .card-header {
        padding: 5px 0!important;
    }
    .table-head-wrap,
    .card_lft {
        width:calc(100% - 400px)!important;
    }
    .quote-wrap,
    .wd-quote-btn {
        width: 400px;
    }
    .data-wrap {
        max-width:20%;
        flex: 0 0 20%;
    }
    .banner.pro_member {
        background: #000000;
    }
    .banner {
        font-size: 16px;
        line-height: 20px;
        color: #ffffff;
        background: #52D017;
        text-transform: capitalize;
        position: absolute;
        right: -60px;
        top: 30px;
        transform: rotate(40deg);
        padding: 8px 70px;
        display: inline-block;
    }
    .banner.new_member {
        background: #52D017;
    }

    .banner.pro_member {
        background: #000000;
    }

    .banner.vip_member {
        background: linear-gradient(90deg, #C5B358 65.5%, #525225 100%);
        color: #000000;
    }

    .need_help_wrap {
        gap:5px!important;
    }
    .need_help {
        font-weight: 500;
        color:#000000;
    }
    .need_help:hover {color:#007BFF;}
    .user-feedback-header-wrap {
        gap: 16px;
    }

    .info_sec_details {
        display: none;
        padding-top: 20px;
        position: absolute;
        width: 300px;
        top: 37px;
        z-index: 1;
        transform: translateX(-50%);
    }

    .icon_hover_sec:hover .info_sec_details {
        display: block;
    }

    .info_sec_details_contant {
        background: #fff;
        border: 1px solid #cfcfcf;
        padding: 20px;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0px 0px 3px 0px #cfcfcf;
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
        top: 10px;
        width: 20px;
        height: 20px;
        background: white;
        transform: rotate(45deg);
        border: 1px solid #cfcfcfe0;
        border-bottom: 0;
        border-right: 0;
        right: 71px;
    }

    .wd-quote-data .accordion>.card {
        overflow: initial;
    }
    .rating-star {
        line-height: 14px;
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
        font-size: 14px;
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
    p.verified {
        color:#282828;
    }

    .choose_quote_rating li svg {
        width: 12px;
        height: 12px;
    }
    @media screen and (max-width: 1400px) {
        .card-header {
            flex-direction: column;
        }
        .table-head-wrap,
        .wd-quote-btn,
        .card_lft {
            width:calc(100% - 30px)!important;
        }
        .quote-wrap {width: 30px;}
        .card_lft {overflow: visible!important;}
        .wd-quote-btn {
            justify-content: center!important;
            margin-top: 25px;
        }
        .wd-quote-data .accordion .card-header {
            padding: 20px 0!important;
        }
    }
    @media screen and (max-width: 767px) {
        .delete_btn {
            position: absolute;
            top: 16px;
            right: 20px;
        }
        .data-wrap {
            max-width: initial;
            flex: 0 1 20%;
        }
        .data-wrap.col-two {
            flex: 0 1 30%;
        }
        .data-wrap.col-three {
            flex: 0 1 18%;
        }
        .data-wrap.col-five {
            flex: 0 1 10%;
        }
        .wd-quote-data .accordion .card-header {
            padding: 20px !important;
        }
        .table-head-wrap {
            /* padding: 0 20px; */
            justify-content: space-between;
        }
        .card_lft .rating-star li:last-child span,
        .card-header h4 {
            font-size: 12px!important;
            line-height: 15px!important;
        }
        .wd-quote-data .card_lft {
            grid-gap:0!important;
        }
        .wd-quote-table-head .wd-quote-head {padding: 0 20px;}
        .wd-quote-btn {width:100%!important;}
    }

    @media(max-width: 580px) {
        .wd-quote-txt p {
            line-height: 10px;
        }
        .info_sec_details {
            transform: translateX(-56%);
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
            /* padding: 0 10px; */
            justify-content: space-between;
        }

        .card_lft .rating-star li:last-child {
            padding-top: 1px;
        }

        .card_lft .rating-star li:last-child svg {
            padding-top: 0.5px;
        }
        .need_help_wrap {
            flex-direction: column;
            align-items: center;            
        }

    }

    @media(max-width: 430px) {
        .icon_hover_sec:hover .info_sec_details {
            transform: translateX(-67%);
        }

        .icon_hover_sec:hover .info_sec_details:before {
            right: 35px;
        }
    }

    @media(max-width: 340px) {
        .icon_hover_sec .info_sec_details {
            width: 260px;
        }

        .icon_hover_sec .info_sec_details:before {
            right: 52px;
        }
    }
</style>
@section('content')
    @include('layouts.web.dashboard.header')
    <section class="wd-quote-area bradius_10">
        <div class="row">
            <div class="col-lg-12">
                <div class="wd-quote-title">
                    <h1>Choose the best quote</h1>
                    <p>You have received {{ count($quotes) }} quotes so far, feel free to check them all out below and
                        choose the best one based on price and convenience.</p>
                </div>
            </div>
        </div>
        <div class="wd-quote-data">
            <div class="wd-quote-table-head">
                <div class="wd-quote-head">
                    <div class="d-flex flex-wrap table-head-wrap">
                        <p class="quote-table-transport data-wrap" style="text-align:center;">Transporter</p>
                        <p class="quote-table-Rating data-wrap col-two" style="text-align:center;">Rating</p>
                        <p class="quote-table-Verified data-wrap col-three" style="text-align:center;">Verified</p>
                        <p class="quote-table-Dates data-wrap" style="text-align:center;">Dates</p>
                        <p class="quote-table-Quote data-wrap col-five" style="text-align:center;">Quote</p>
                    </div>
                    <div class="d-flex flex-wrap quote-wrap">
                        {{-- <p class="quote-table-Quote" style="max-width:100%; flex: 0 0 100%; text-align:center;"></p> --}}
                    </div>
                </div>
            </div>
            <div class="wd-quote-txt">
                <p>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.167 18.086C13.1891 18.5672 12.8181 18.9757 12.337 19H10.664C10.1829 18.9757 9.81191 18.5672 9.83399 18.086V16.311C7.47523 15.4454 6.13685 12.9522 6.71885 10.508C7.30086 8.06376 9.61925 6.44131 12.115 6.73167C14.6107 7.02203 16.4947 9.13341 16.5 11.646C16.4934 13.7513 15.1565 15.6224 13.167 16.311V18.086Z" stroke="#575757" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.167 16.811C13.4431 16.811 13.667 16.5871 13.667 16.311C13.667 16.0349 13.4431 15.811 13.167 15.811V16.811ZM9.833 15.811C9.55686 15.811 9.333 16.0349 9.333 16.311C9.333 16.5871 9.55686 16.811 9.833 16.811V15.811ZM21 12.146C21.2761 12.146 21.5 11.9221 21.5 11.646C21.5 11.3699 21.2761 11.146 21 11.146V12.146ZM19 11.146C18.7239 11.146 18.5 11.3699 18.5 11.646C18.5 11.9221 18.7239 12.146 19 12.146V11.146ZM4 12.146C4.27614 12.146 4.5 11.9221 4.5 11.646C4.5 11.3699 4.27614 11.146 4 11.146V12.146ZM2 11.146C1.72386 11.146 1.5 11.3699 1.5 11.646C1.5 11.9221 1.72386 12.146 2 12.146V11.146ZM18.5693 5.3558C18.7658 5.16179 18.7678 4.84522 18.5738 4.64871C18.3798 4.45221 18.0632 4.45018 17.8667 4.6442L18.5693 5.3558ZM16.4487 6.0442C16.2522 6.23821 16.2502 6.55478 16.4442 6.75129C16.6382 6.94779 16.9548 6.94982 17.1513 6.7558L16.4487 6.0442ZM6.55179 17.2483C6.74802 17.054 6.7496 16.7374 6.55531 16.5412C6.36102 16.345 6.04444 16.3434 5.84821 16.5377L6.55179 17.2483ZM4.43421 17.9377C4.23798 18.132 4.2364 18.4486 4.43069 18.6448C4.62498 18.841 4.94156 18.8426 5.13779 18.6483L4.43421 17.9377ZM17.8692 18.6483C18.0654 18.8426 18.382 18.841 18.5763 18.6448C18.7706 18.4486 18.769 18.132 18.5728 17.9377L17.8692 18.6483ZM17.1588 16.5377C16.9626 16.3434 16.646 16.345 16.4517 16.5412C16.2574 16.7374 16.259 17.054 16.4552 17.2483L17.1588 16.5377ZM5.84871 6.7558C6.04522 6.94982 6.36179 6.94779 6.5558 6.75129C6.74982 6.55478 6.74779 6.23821 6.55129 6.0442L5.84871 6.7558ZM5.13329 4.6442C4.93678 4.45018 4.62021 4.45221 4.4262 4.64871C4.23218 4.84522 4.23421 5.16179 4.43071 5.3558L5.13329 4.6442ZM13.167 15.811H9.833V16.811H13.167V15.811ZM21 11.146H19V12.146H21V11.146ZM4 11.146H2V12.146H4V11.146ZM17.8667 4.6442L16.4487 6.0442L17.1513 6.7558L18.5693 5.3558L17.8667 4.6442ZM5.84821 16.5377L4.43421 17.9377L5.13779 18.6483L6.55179 17.2483L5.84821 16.5377ZM18.5728 17.9377L17.1588 16.5377L16.4552 17.2483L17.8692 18.6483L18.5728 17.9377ZM6.55129 6.0442L5.13329 4.6442L4.43071 5.3558L5.84871 6.7558L6.55129 6.0442Z" fill="#575757"/>
                    </svg>
                        
                    {{-- <svg width="19" height="25" viewBox="0 0 19 25" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d_580_2223)">
                            <path
                                d="M7.06648 18.4953C7.06679 18.6854 7.1234 18.8716 7.22963 19.03L7.74982 19.8065C7.83869 19.9393 7.95922 20.0481 8.10069 20.1234C8.24216 20.1987 8.40018 20.2382 8.5607 20.2382H10.439C10.5996 20.2382 10.7576 20.1987 10.8991 20.1234C11.0405 20.0481 11.1611 19.9393 11.2499 19.8065L11.7701 19.03C11.8763 18.8716 11.9331 18.6856 11.9333 18.4953L11.9345 17.3361H7.06496L7.06648 18.4953ZM4.14258 10.0818C4.14258 11.423 4.64329 12.6465 5.46847 13.5814C5.97131 14.1512 6.75784 15.3415 7.05766 16.3456C7.05887 16.3535 7.05979 16.3613 7.061 16.3692H11.9384C11.9397 16.3613 11.9406 16.3538 11.9418 16.3456C12.2416 15.3415 13.0281 14.1512 13.531 13.5814C14.3562 12.6465 14.8569 11.423 14.8569 10.0818C14.8569 7.13808 12.4495 4.75292 9.48298 4.76199C6.37797 4.77136 4.14258 7.26986 4.14258 10.0818ZM9.49972 7.66371C8.15709 7.66371 7.06466 8.74853 7.06466 10.0818C7.06466 10.349 6.84672 10.5654 6.57764 10.5654C6.30857 10.5654 6.09063 10.349 6.09063 10.0818C6.09063 8.21504 7.61985 6.69647 9.49972 6.69647C9.7688 6.69647 9.98673 6.91289 9.98673 7.18009C9.98673 7.44729 9.7688 7.66371 9.49972 7.66371Z"
                                fill="#FFA800" />
                        </g>
                        <defs>
                            <filter id="filter0_d_580_2223" x="0.142578" y="0.761963" width="18.7148" height="23.4761"
                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feColorMatrix in="SourceAlpha" type="matrix"
                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                <feOffset />
                                <feGaussianBlur stdDeviation="2" />
                                <feComposite in2="hardAlpha" operator="out" />
                                <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 0.66 0 0 0 0 0 0 0 0 1 0" />
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_580_2223" />
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_580_2223"
                                    result="shape" />
                            </filter>
                        </defs>
                    </svg> --}}
                    Transport providers to get booked up and quotes are often withdrawn, book now to avoid missing out.
                    {{-- Transport providers get booked up and quotes are often withdrawn, book now to avoid missing out. --}}
                </p>
            </div>
            <div class="accordion" id="accordionExample">
                @foreach ($quotes as $key => $quote)
                    @if ($quote->status != 'rejected')
                        <div class="card">
                            <div class="card-header @if ($key == 0) active @endif"
                                id="heading{{ $key }}">
                                <div class="card_lft">
                                    @php
                                        $totalStars = 5; // Total number of stars
                                        $percentage = 0;
                                        $rating = 0; // Default rating

                                        // Set percentage based on $key (example for different keys)
                                        switch ($key) {
                                            case 0:
                                                $percentage = 97.8;
                                                break;
                                            case 1:
                                                $percentage = 95.9;
                                                break;
                                            case 2:
                                                $percentage = 98.3;
                                                break;
                                            case 3:
                                                $percentage = 97.9;
                                                break;
                                            case 4:
                                                $percentage = 98.6;
                                                break;
                                            case 5:
                                                $percentage = 99.2;
                                                break;
                                            case 6:
                                                $percentage = 96.9;
                                                break;
                                            case 7:
                                                $percentage = 97.9;
                                                break;
                                            case 8:
                                                $percentage = 98.6;
                                                break;
                                            case 9:
                                                $percentage = 99.2;
                                                break;
                                            default:
                                                $percentage = 0;
                                                break;
                                        }

                                        // Calculate rating based on percentage
                                        $rating = ($percentage / 100) * 5;

                                        // Calculate number of full, half, and empty stars
                                        $fullStars = floor($rating); // Full stars (whole number part of the rating)
                                        $halfStar = $rating - $fullStars >= 0.5 ? 1 : 0; // Half star if the decimal part is >= 0.5
                                        $emptyStars = $totalStars - $fullStars - $halfStar; // Empty stars are remaining
                                    @endphp
                                    {{-- model --}}
                                    <div class="modal fade get_quote rating-modal" id="ratingModal_{{$key}}" tabindex="-1" aria-labelledby="ratingModal_{{ $key }}" aria-hidden="true" >
                                        <div class="modal-dialog modal-dialog-centered wd-transport-dtls" role="document">
                                            <div class="modal-content overflow-hidden border-0">
                                                @if (in_array($key, [0,1, 2, 3]))
                                                <div class="banner pro_member d-none d-lg-inline-block">Pro Member</div>
                                                @endif
                                                @if (in_array($key, [4,5]))
                                                <div class="banner vip_member d-none d-lg-inline-block">ViP Member</div>
                                                @endif
                                               
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close" onclick="closeModal()">
                                                        <span aria-hidden="true">
                                                            <svg width="12" height="12" viewBox="0 0 12 12"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M10.6584 0.166626L6.00008 4.82496L1.34175 0.166626L0.166748 1.34163L4.82508 5.99996L0.166748 10.6583L1.34175 11.8333L6.00008 7.17496L10.6584 11.8333L11.8334 10.6583L7.17508 5.99996L11.8334 1.34163L10.6584 0.166626Z"
                                                                    fill="#000" />
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="row mx-0 align-items-center user-feedback-header-wrap mb-3">
                                                    <div class=" rounded-circle wd-transport-img pt-0"
                                                        style="width:58px; height:58px; overflow:hidden;">
                                                        <img src="https://transportanycar.com/uploads/user/957214c41e514ea6925a310612f2c3ed.png"
                                                            width="58" height="58" alt="trasporter feedback"
                                                            class="img-fluid" style="object-fit: cover; height: 100%;">
                                                    </div>
                                                    <div class="">
                                                        <h1 class="user-feedback-name mb-1" id="modalUsername">
                                                            {{ $quote->getTransporters->username ?? '' }}
                                                            <img src="https://transportanycar.com/assets/images/user-verified.png"
                                                                alt="" width="20" height="20" class="ml-1">
                                                        </h1>
                                                        <ul class="rating-star choose_quote_rating">
                                                            <!-- Full Stars -->
                                                            @for ($i = 1; $i <= $fullStars; $i++)
                                                                <li>
                                                                    <svg width="20" height="20" viewBox="0 0 12 12"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                            fill="#FFA800" />
                                                                    </svg>
                                                                </li>
                                                            @endfor
                
                                                            <!-- Half Star -->
                                                            @if ($halfStar)
                                                            <li>
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="eY4730ZrcPO1" viewBox="0 0 12 12" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" project-id="bd566e51b26b4c7582530bea3bccfc1f" export-id="0a7d211c1147405aaa0155ebff6e4366" cached="false"><path d="M4.068354,3.992715L0.1,4.56755L2.913924,7.298013L2.264557,11.25L5.8,9.381788L5.8,0.4L4.068354,3.992715Z" transform="translate(-.1-.45)" fill="#ffa800"/></svg>
                                                            </li>
                                                            @endif
                
                                                            <!-- Empty Stars -->
                                                            @for ($i = 1; $i <= $emptyStars; $i++)
                                                                <li>
                                                                    <svg width="20" height="20" viewBox="0 0 12 12"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                            fill="#ccc" />
                                                                    </svg>
                                                                </li>
                                                            @endfor
                
                                                            <li><span class="ml-1">({{ number_format($percentage, 1) }}%)</span></li>
                                                        </ul>
                                                        <p class="verified mt-1">
                                                            <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14 4.521C14.125 11.366 10.042 14.278 7.727 14.965C7.57366 15.0106 7.41034 15.0106 7.257 14.965C4.98 14.29 1.014 11.464 1 4.862C1.01372 4.29149 1.33458 3.7729 1.839 3.506C5.363 1.516 7.058 1 7.489 1C7.92 1 9.749 1.549 13.507 3.7C13.8045 3.86767 13.9918 4.17958 14 4.521Z" stroke="#5B5B5B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M4.5 8.01502L6.5 10.015L10.5 6.00702" stroke="#5B5B5B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                            Verified
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="wd-transport-area pb-0 mt-4">

                                                    <div class="wd-transport-rght">
                                                        <ul>
                                                            <li>
                                                                <p class="font-weight-light">Insurance:</p>
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="13"
                                                                        height="13" viewBox="0 0 13 13" fill="none">
                                                                        <path
                                                                            d="M4.41537 11.1567L0.190373 6.93169C-0.0634575 6.67786 -0.0634575 6.2663 0.190373 6.01245L1.10959 5.0932C1.36342 4.83935 1.775 4.83935 2.02883 5.0932L4.87499 7.93934L10.9712 1.8432C11.225 1.58937 11.6366 1.58937 11.8904 1.8432L12.8096 2.76245C13.0634 3.01628 13.0634 3.42783 12.8096 3.68169L5.33462 11.1567C5.08076 11.4105 4.6692 11.4105 4.41537 11.1567Z"
                                                                            fill="#000000"></path>
                                                                    </svg>
                                                                    <div data-toggle="popover"
                                                                        class="queston-mark d-inline-block p-0 cursor-pointer insurance_popover ml-2"
                                                                        data-original-title="" title="">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 24 24" fill="#D9D9D9"
                                                                            width="18" height="18">
                                                                            <path fill-rule="evenodd"
                                                                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 0 1-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 0 1-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 0 1-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584ZM12 18a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                                                                clip-rule="evenodd"></path>
                                                                        </svg>
                                                                    </div>
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <p class="font-weight-light">Photo ID:</p>
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="13"
                                                                        height="13" viewBox="0 0 13 13"
                                                                        fill="none">
                                                                        <path
                                                                            d="M4.41537 11.1567L0.190373 6.93169C-0.0634575 6.67786 -0.0634575 6.2663 0.190373 6.01245L1.10959 5.0932C1.36342 4.83935 1.775 4.83935 2.02883 5.0932L4.87499 7.93934L10.9712 1.8432C11.225 1.58937 11.6366 1.58937 11.8904 1.8432L12.8096 2.76245C13.0634 3.01628 13.0634 3.42783 12.8096 3.68169L5.33462 11.1567C5.08076 11.4105 4.6692 11.4105 4.41537 11.1567Z"
                                                                            fill="#000000"></path>
                                                                    </svg>
                                                                    <div data-toggle="popover"
                                                                        class="queston-mark d-inline-block p-0 cursor-pointer photo_id_popover ml-2"
                                                                        data-original-title="" title="">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 24 24" fill="#D9D9D9"
                                                                            width="18" height="18">
                                                                            <path fill-rule="evenodd"
                                                                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 0 1-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 0 1-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 0 1-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584ZM12 18a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                                                                clip-rule="evenodd"></path>
                                                                        </svg>
                                                                    </div>
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <p class="font-weight-light">Positive feedback:</p>
                                                                <span style="font-weight: 500;">{{ number_format($percentage, 1) }}%</span>
                                                            </li>
                                                            <li>
                                                                <p class="font-weight-light">Jobs completed:</p>
                                                                <span style="font-weight: 500;">11</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="w-75 mx-auto my-4">
                                                    @if ($quote->status == 'pending' && !$hasAcceptedQuote)
                                                        <a href="javascript:;"
                                                            onclick="quoteChangeStatus({{ $quote->id }}, 'accept');"
                                                            class="wd-accepted-btn font-weight-light">Accept Quote
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
                                                <p class="justify-content-center font-weight-light need_help_wrap">
                                                    <span>Need help?</span> <span>Call our team on <a href="tel:08081557979" class="need_help">0808 155 7979</a></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-wrap align-items-center data-wrap" style="gap:5px; justify-content:center">
                                        <a href="javascript:void(0);"
                                            data-toggle="modal" data-target="#ratingModal_{{ $key }}"
                                            {{-- onclick="openModal({{ $quote->id }}, '{{ $quote->getTransporters->username ?? '' }}','{{ $quote->getTransporters->image ?? '' }}', {{ $fullStars }}, {{ $halfStar }}, {{ $emptyStars }})" --}}
                                            >
                                            <h4 style="width: 100%; line-height: 24px;">
                                                {{ $quote->getTransporters->username ?? '' }}
                                            </h4>
                                        </a>
                                    </div>
                                    <div class="data-wrap col-two" style="text-align:center;">
                                        <ul class="rating-star choose_quote_rating justify-content-center">
                                            <!-- Full Stars -->
                                            @for ($i = 1; $i <= $fullStars; $i++)
                                                <li>
                                                    <svg width="20" height="20" viewBox="0 0 12 12"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                            fill="#FFA800" />
                                                    </svg>
                                                </li>
                                            @endfor

                                            <!-- Half Star -->
                                            @if ($halfStar)
                                                <li>
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="eY4730ZrcPO1" viewBox="0 0 12 12" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" project-id="bd566e51b26b4c7582530bea3bccfc1f" export-id="0a7d211c1147405aaa0155ebff6e4366" cached="false"><path d="M4.068354,3.992715L0.1,4.56755L2.913924,7.298013L2.264557,11.25L5.8,9.381788L5.8,0.4L4.068354,3.992715Z" transform="translate(-.1-.45)" fill="#ffa800"/></svg>
                                                </li>
                                            @endif

                                            <!-- Empty Stars -->
                                            @for ($i = 1; $i <= $emptyStars; $i++)
                                                <li>
                                                    <svg width="20" height="20" viewBox="0 0 12 12"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                            fill="#ccc" />
                                                    </svg>
                                                </li>
                                            @endfor

                                            <li><span class="ml-1">({{ number_format($percentage, 1) }}%)</span></li>
                                            {{-- <li><span class="ml-1">({{ number_format($rating, 1) }}/{{ $totalStars }})</span></li> <!-- Rating as a fraction --> --}}
                                        </ul>


                                    </div>
                                    <div class="data-wrap col-three" style="text-align:center;">
                                        <svg width="15" height="16" viewBox="0 0 15 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M14 4.521C14.125 11.366 10.042 14.278 7.727 14.965C7.57366 15.0106 7.41034 15.0106 7.257 14.965C4.98 14.29 1.014 11.464 1 4.862C1.01372 4.29149 1.33458 3.7729 1.839 3.506C5.363 1.516 7.058 1 7.489 1C7.92 1 9.749 1.549 13.507 3.7C13.8045 3.86767 13.9918 4.17958 14 4.521Z"
                                                stroke="#5B5B5B" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M4.5 8.01502L6.5 10.015L10.5 6.00702" stroke="#5B5B5B" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="icon_hover_sec d-flex align-item-center justify-content-center data-wrap">
                                        <div class="flex_blog "><span>Flexible</span>
                                            <a href="javascript:;" class="hover_anchor" data-toggle="modal"
                                                data-target="#anchor"><img
                                                    src="{{ asset('assets/web/images/question.png') }}"
                                                    alt="question"></a>
                                        </div>
                                        <div class="info_sec_details" id="info-details">
                                            <div class="info_sec_details_contant">
                                                <p>Transport providers are able to carry out the job on various dates so we
                                                    recommend messaging them first to confirm availability
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="data-wrap col-five" style="text-align:center;">£{{ $quote->price }}</h5>
                                    <!-- <a href="javascript:;" class="d-lg-none" data-toggle="modal" data-target="#delete_quote_{{ $quote->id }}">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 2C10.0222 2 8.08879 2.58649 6.4443 3.6853C4.79981 4.78412 3.51809 6.3459 2.76121 8.17317C2.00433 10.0004 1.8063 12.0111 2.19215 13.9509C2.578 15.8907 3.53041 17.6725 4.92894 19.0711C6.32746 20.4696 8.10929 21.422 10.0491 21.8079C11.9889 22.1937 13.9996 21.9957 15.8268 21.2388C17.6541 20.4819 19.2159 19.2002 20.3147 17.5557C21.4135 15.9112 22 13.9778 22 12C22 10.6868 21.7413 9.38642 21.2388 8.17317C20.7363 6.95991 19.9997 5.85752 19.0711 4.92893C18.1425 4.00035 17.0401 3.26375 15.8268 2.7612C14.6136 2.25866 13.3132 2 12 2ZM15.21 13.79C15.3037 13.883 15.3781 13.9936 15.4289 14.1154C15.4797 14.2373 15.5058 14.368 15.5058 14.5C15.5058 14.632 15.4797 14.7627 15.4289 14.8846C15.3781 15.0064 15.3037 15.117 15.21 15.21C15.117 15.3037 15.0064 15.3781 14.8846 15.4289C14.7627 15.4797 14.632 15.5058 14.5 15.5058C14.368 15.5058 14.2373 15.4797 14.1154 15.4289C13.9936 15.3781 13.883 15.3037 13.79 15.21L12 13.41L10.21 15.21C10.117 15.3037 10.0064 15.3781 9.88458 15.4289C9.76272 15.4797 9.63202 15.5058 9.5 15.5058C9.36799 15.5058 9.23729 15.4797 9.11543 15.4289C8.99357 15.3781 8.88297 15.3037 8.79 15.21C8.69628 15.117 8.62188 15.0064 8.57111 14.8846C8.52034 14.7627 8.49421 14.632 8.49421 14.5C8.49421 14.368 8.52034 14.2373 8.57111 14.1154C8.62188 13.9936 8.69628 13.883 8.79 13.79L10.59 12L8.79 10.21C8.6017 10.0217 8.49591 9.7663 8.49591 9.5C8.49591 9.2337 8.6017 8.9783 8.79 8.79C8.97831 8.6017 9.2337 8.49591 9.5 8.49591C9.76631 8.49591 10.0217 8.6017 10.21 8.79L12 10.59L13.79 8.79C13.9783 8.6017 14.2337 8.49591 14.5 8.49591C14.7663 8.49591 15.0217 8.6017 15.21 8.79C15.3983 8.9783 15.5041 9.2337 15.5041 9.5C15.5041 9.7663 15.3983 10.0217 15.21 10.21L13.41 12L15.21 13.79Z" fill="#ED1C24"/>
                                            </svg>
                                        </a> -->
                                </div>
                                <div class="wd-quote-btn">
                                    <a href="javascript:;" class="wd-view-btn messageShow"
                                        data-msgkey="{{ $key }}" type="button" data-toggle="collapse"
                                        data-target="#collapse{{ $key }}" aria-expanded="true"
                                        aria-controls="collapseOne">View messages
                                        <span class="msg_{{ $quote->thread_id ?? 0 }}">0</span>
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
                                            data-target="#delete_quote_{{ $quote->id }}" class="d-lg-block delete_btn">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 2C10.0222 2 8.08879 2.58649 6.4443 3.6853C4.79981 4.78412 3.51809 6.3459 2.76121 8.17317C2.00433 10.0004 1.8063 12.0111 2.19215 13.9509C2.578 15.8907 3.53041 17.6725 4.92894 19.0711C6.32746 20.4696 8.10929 21.422 10.0491 21.8079C11.9889 22.1937 13.9996 21.9957 15.8268 21.2388C17.6541 20.4819 19.2159 19.2002 20.3147 17.5557C21.4135 15.9112 22 13.9778 22 12C22 10.6868 21.7413 9.38642 21.2388 8.17317C20.7363 6.95991 19.9997 5.85752 19.0711 4.92893C18.1425 4.00035 17.0401 3.26375 15.8268 2.7612C14.6136 2.25866 13.3132 2 12 2ZM15.21 13.79C15.3037 13.883 15.3781 13.9936 15.4289 14.1154C15.4797 14.2373 15.5058 14.368 15.5058 14.5C15.5058 14.632 15.4797 14.7627 15.4289 14.8846C15.3781 15.0064 15.3037 15.117 15.21 15.21C15.117 15.3037 15.0064 15.3781 14.8846 15.4289C14.7627 15.4797 14.632 15.5058 14.5 15.5058C14.368 15.5058 14.2373 15.4797 14.1154 15.4289C13.9936 15.3781 13.883 15.3037 13.79 15.21L12 13.41L10.21 15.21C10.117 15.3037 10.0064 15.3781 9.88458 15.4289C9.76272 15.4797 9.63202 15.5058 9.5 15.5058C9.36799 15.5058 9.23729 15.4797 9.11543 15.4289C8.99357 15.3781 8.88297 15.3037 8.79 15.21C8.69628 15.117 8.62188 15.0064 8.57111 14.8846C8.52034 14.7627 8.49421 14.632 8.49421 14.5C8.49421 14.368 8.52034 14.2373 8.57111 14.1154C8.62188 13.9936 8.69628 13.883 8.79 13.79L10.59 12L8.79 10.21C8.6017 10.0217 8.49591 9.7663 8.49591 9.5C8.49591 9.2337 8.6017 8.9783 8.79 8.79C8.97831 8.6017 9.2337 8.49591 9.5 8.49591C9.76631 8.49591 10.0217 8.6017 10.21 8.79L12 10.59L13.79 8.79C13.9783 8.6017 14.2337 8.49591 14.5 8.49591C14.7663 8.49591 15.0217 8.6017 15.21 8.79C15.3983 8.9783 15.5041 9.2337 15.5041 9.5C15.5041 9.7663 15.3983 10.0217 15.21 10.21L13.41 12L15.21 13.79Z"
                                                    fill="#ED1C24" />
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
                                                <p class="mb-2 font-weight-light d-flex flex-wrap align-items-center text-left position-relative" style="font-size:10px; padding-left:20px; color:#444444;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none" class="position-absolute" style="left:0;">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.95833 8.70834V10.2917C3.95833 12.915 6.08498 15.0417 8.70833 15.0417H10.2917C12.915 15.0417 15.0417 12.915 15.0417 10.2917V8.70834C15.0417 6.08499 12.915 3.95834 10.2917 3.95834H8.70833C6.08498 3.95834 3.95833 6.08499 3.95833 8.70834Z" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M8.75 12.6667C8.75 13.0809 9.08579 13.4167 9.5 13.4167C9.91421 13.4167 10.25 13.0809 10.25 12.6667H8.75ZM9.5 8.70834H10.25C10.25 8.29413 9.91421 7.95834 9.5 7.95834V8.70834ZM8.70833 7.95834C8.29412 7.95834 7.95833 8.29413 7.95833 8.70834C7.95833 9.12256 8.29412 9.45834 8.70833 9.45834V7.95834ZM9.5 13.4167C9.91421 13.4167 10.25 13.0809 10.25 12.6667C10.25 12.2525 9.91421 11.9167 9.5 11.9167V13.4167ZM8.70833 11.9167C8.29412 11.9167 7.95833 12.2525 7.95833 12.6667C7.95833 13.0809 8.29412 13.4167 8.70833 13.4167V11.9167ZM9.5 11.9167C9.08579 11.9167 8.75 12.2525 8.75 12.6667C8.75 13.0809 9.08579 13.4167 9.5 13.4167V11.9167ZM10.2917 13.4167C10.7059 13.4167 11.0417 13.0809 11.0417 12.6667C11.0417 12.2525 10.7059 11.9167 10.2917 11.9167V13.4167ZM10.25 6.33334C10.25 5.91913 9.91421 5.58334 9.5 5.58334C9.08579 5.58334 8.75 5.91913 8.75 6.33334H10.25ZM8.75 7.12501C8.75 7.53922 9.08579 7.87501 9.5 7.87501C9.91421 7.87501 10.25 7.53922 10.25 7.12501H8.75ZM10.25 12.6667V8.70834H8.75V12.6667H10.25ZM9.5 7.95834H8.70833V9.45834H9.5V7.95834ZM9.5 11.9167H8.70833V13.4167H9.5V11.9167ZM9.5 13.4167H10.2917V11.9167H9.5V13.4167ZM8.75 6.33334V7.12501H10.25V6.33334H8.75Z" fill="#444444"></path>
                                                        </svg>
                                                    Accept a quote to receive the transport providers contact details. 
                                                </p>
                                                <textarea class="form-control textarea" id="message"
                                                    placeholder="Type any question you have about this quote here."></textarea>
                                                <p class="mb-2 font-weight-light d-flex flex-wrap align-items-center text-left position-relative mt-2" style="font-size:10px; padding-left:20px; color:#444444;">
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
                                                {{-- <p><span>Note:</span> Please do not share any contact information here,
                                                    details are exchanged after you have accepted the quote.</p> --}}
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

        function openModal(quoteId, username, image, fullStars, halfStar, emptyStars) {
            console.log(quoteId, username, fullStars, halfStar, emptyStars, 'holadear');
            // Set username in modal
            document.getElementById('modalUsername').innerText = username;

            // Clear existing stars
            const starContainer = document.getElementById('modalStars');
            starContainer.innerHTML = '';

            // Append full stars
            for (let i = 0; i < fullStars; i++) {
                starContainer.innerHTML += `
            <li>
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                        fill="#FFA800" />
                </svg>
            </li>`;
            }

            // Append half star if applicable
            if (halfStar) {
                starContainer.innerHTML += `
            <li>
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="halfStarGradient">
                            <stop offset="50%" stop-color="#FFA800"/>
                            <stop offset="50%" stop-color="#ccc"/>
                        </linearGradient>
                    </defs>
                    <path
                        d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                        fill="url(#halfStarGradient)" />
                </svg>
            </li>`;
            }

            // Append empty stars
            for (let i = 0; i < emptyStars; i++) {
                starContainer.innerHTML += `
            <li>
                <svg width="20" height="20" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                        fill="#ccc" />
                </svg>
            </li>`;
            }

            // Show the modal
            document.getElementById('ratingModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('ratingModal').style.display = 'none';
        }
    </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script>
        $(function() {
            $('.photo_id_popover').popover({
                content: 'We have a copy of this transporters valid drivers license photo I.D to protect you and ensuring a safe market place for transporting your vehicle.',
                container: 'body', 
                trigger: 'hover',
                html: true,
                placement: 'bottom',
                template: '<div class="popover" role="tooltip"><div class="arrow center"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
            })
            $('.insurance_popover').popover({
                content: 'We have verified this transport providers insurance to ensure they have the correct goods in transit (GIT) cover to protect you and transport vehicles safe and securely.',
                container: 'body', 
                trigger: 'hover',
                html: true,
                placement: 'bottom',
                template: '<div class="popover" role="tooltip"><div class="arrow center"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
            })
        })
    </script>
@endsection
