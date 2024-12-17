@extends('layouts.transporter.dashboard.app')

@section('head_css')
    <style>
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
            background: #fff000;
            color: #000000;
        }

        .wd-transport-dtls h1 {
            text-transform: capitalize;
        }

        .wd-transport-rght ul li {
            /* align-items: flex-start; */
            margin: 12px 0;
        }

        .wd-transport-rght ul li:last-child {
            margin-bottom: 0;
        }

        /* .wd-transport-area {
                                        align-items: self-start;
                                    } */

        ul.wd-star-lst {
            margin-bottom: 0;
        }

        .wd-transport-img {
            padding-top: 11px;
        }

        .feedback-time-line .table-responsive {
            border-radius: 5px;
            border: 1px solid #C3C3C3;
        }

        .feedback-time-line table {
            border: none;
        }

        .wd-transport-rght ul li p {
            font-weight: 300;
        }

        .wd-transport-rght ul li span {
            font-weight: 500;
            margin-left: 10px;
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

        @media(min-width: 992px) {
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
            #page-content-wrapper {
                position: relative;
                overflow: hidden;
            }

            .adjust_spacing {
                padding-top: 65px;
            }

            .set_banner_position {
                position: relative;
                padding: 0;
                /* padding-top: 15px; */
                /* overflow: hidden; */
            }

            .banner {
                right: -50px;
                top: 90px;
                z-index: 2;
                /* position: fixed; */
            }

            #transporter-feedback .navbar {
                position: relative !important;
            }

            #transporter-feedback .content_container {
                padding-top: 0;
            }
        }

        @media(max-width: 767px) {
            .banner {
                right: -50px;
                top: 85px;
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

            @media (max-width: 575px) {
                .adjust-space-in-mobile {
                    padding-left: 0;
                    padding-right: 0;
                }
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
            <!-- content part -->
            @if ($completed_job >= 0 && $completed_job <= 10)
                <div class="banner new_member d-lg-none">New Member</div>
            @elseif($completed_job >= 11 && $completed_job <= 50)
                <div class="banner pro_member d-lg-none">Pro Member</div>
            @elseif($completed_job >= 51)
                <div class="banner vip_member d-lg-none">ViP Member</div>
            @endif
            <div class="content_container adjust_spacing">
                <div class="inner_content set_banner_position">
                    <div class="wd-white-box">
                        @if ($completed_job >= 0 && $completed_job <= 10)
                            <div class="banner new_member d-none d-lg-inline-block">New Member</div>
                        @elseif($completed_job >= 11 && $completed_job <= 50)
                            <div class="banner pro_member d-none d-lg-inline-block">Pro Member</div>
                        @elseif($completed_job >= 51)
                            <div class="banner vip_member d-none d-lg-inline-block">ViP Member</div>
                        @endif
                        <div class="wd-feedback-box border-0 rounded-0 p-0">
                            <div class="row wd-pb pb-3 pb-md-5 mx-0">
                                <div class="col-lg-12">
                                    <div class="wd-transport-dtls adjust-space-in-mobile">
                                        <div class="row mx-0 align-items-center user-feedback-header-wrap mb-3">
                                            <div class="w-auto wd-transport-img pt-0">
                                                <img src="{{ $user->profile_image }}" width="58" height="58"
                                                    alt="trasporter feedback" class="img-fluid">
                                            </div>
                                            <div class="">
                                                <h1 class="user-feedback-name mb-0">{{ $user->username ?? '-' }} <img
                                                        src="{{ asset('/assets/images/user-verified.png') }}" alt=""
                                                        width="20" height="20" class="ml-1" />
                                                    <!-- <span>({{ count($feedback) }})</span> -->
                                                </h1>
                                                @if ($rating_percentage == 0)
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
                                                            <span>({{ count($feedback) }})</span><span
                                                                class="ml-1">{{ number_format($rating_percentage,0) }}%</span>
                                                        </li>

                                                        {{-- <li>({{ number_format($overall_percentage, 0) }}%)</li> --}}


                                                    </ul>
                                                    @else
                                                    @php
                                                        $totalStars = 5; // Total number of stars
                                                        $yellowStars = floor($rating_average); // Full yellow stars
                                                        $hasHalfStar = $rating_average - $yellowStars >= 0.5; // Check if there's a half-star
                                                        $greyStars = $totalStars - $yellowStars - ($hasHalfStar ? 1 : 0); // Calculate remaining grey stars
                                                    @endphp
                                                    <ul class="wd-star-lst user-feedback-stars">
                                                        {{-- Render full yellow stars --}}
                                                        @for ($i = 1; $i <= $yellowStars; $i++)
                                                            <li>
                                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                        fill="#FFA800" />
                                                                </svg>
                                                            </li>
                                                        @endfor
                                                
                                                        {{-- Render half-star if applicable --}}
                                                        @if ($hasHalfStar)
                                                            <li>
                                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <defs>
                                                                        <linearGradient id="halfStarGradient" x1="0%" y1="0%" x2="100%" y2="0%">
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
                                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                        fill="#ccc" />
                                                                </svg>
                                                            </li>
                                                        @endfor
                                                
                                                        {{-- Display rating count and percentage --}}
                                                        <li class="user-feedback-rating-count">
                                                            <span>({{ count($feedback) }})</span><span class="ml-1">{{ number_format($rating_percentage,0) }}%</span>
                                                        </li>
                                                    </ul>
                                                @endif
                                                <div>Member since: <span
                                                        class="font-weight-light user-feedback-member-from">{{ $user->created_at->format('d/m/Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wd-transport-area pb-0">

                                            <div class="wd-transport-rght">
                                                <ul>
                                                    <li>
                                                        <p>Insurance:</p>
                                                        <span>
                                                            @if ($user->goods_in_transit_insurance)
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="13"
                                                                    height="13" viewBox="0 0 13 13" fill="none">
                                                                    <path
                                                                        d="M4.41537 11.1567L0.190373 6.93169C-0.0634575 6.67786 -0.0634575 6.2663 0.190373 6.01245L1.10959 5.0932C1.36342 4.83935 1.775 4.83935 2.02883 5.0932L4.87499 7.93934L10.9712 1.8432C11.225 1.58937 11.6366 1.58937 11.8904 1.8432L12.8096 2.76245C13.0634 3.01628 13.0634 3.42783 12.8096 3.68169L5.33462 11.1567C5.08076 11.4105 4.6692 11.4105 4.41537 11.1567Z"
                                                                        fill="#52D017" />
                                                                </svg>
                                                                <div data-toggle="popover"
                                                                    class="queston-mark d-inline-block p-0 cursor-pointer insurance_popover ml-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24" fill="#D9D9D9" width="18"
                                                                        height="18">
                                                                        <path fill-rule="evenodd"
                                                                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 0 1-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 0 1-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 0 1-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584ZM12 18a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </div>
                                                            @endif
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <p>Photo ID:</p>
                                                        <span>
                                                            @if ($user->profile_image)
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="13"
                                                                    height="13" viewBox="0 0 13 13" fill="none">
                                                                    <path
                                                                        d="M4.41537 11.1567L0.190373 6.93169C-0.0634575 6.67786 -0.0634575 6.2663 0.190373 6.01245L1.10959 5.0932C1.36342 4.83935 1.775 4.83935 2.02883 5.0932L4.87499 7.93934L10.9712 1.8432C11.225 1.58937 11.6366 1.58937 11.8904 1.8432L12.8096 2.76245C13.0634 3.01628 13.0634 3.42783 12.8096 3.68169L5.33462 11.1567C5.08076 11.4105 4.6692 11.4105 4.41537 11.1567Z"
                                                                        fill="#52D017" />
                                                                </svg>
                                                                <div data-toggle="popover"
                                                                    class="queston-mark d-inline-block p-0 cursor-pointer photo_id_popover ml-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24" fill="#D9D9D9" width="18"
                                                                        height="18">
                                                                        <path fill-rule="evenodd"
                                                                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 0 1-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 0 1-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 0 1-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584ZM12 18a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </div>
                                                            @endif
                                                    </li>
                                                    <li>
                                                        <p>Positive feedback:</p>
                                                        <span>{{ number_format($rating_percentage,0) }}%</span>
                                                    </li>
                                                    <li>
                                                        <p>Total reviews:</p>
                                                        <span>{{ count($feedback) }}</span>
                                                    </li>
                                                    <li>
                                                        <p>Jobs completed:</p>
                                                        <span>{{ $completed_job }}</span>
                                                    </li>
                                                    <li>
                                                        <p>Miles travelled:</p>
                                                        <span>{{ $distance }} </span>
                                                    </li>
                                                    <li>
                                                        <p>Total earnings:</p>
                                                        <span>£{{ $total_earning }}</span>
                                                    </li>
                                                    <li>
                                                        <p>Payment method:</p>
                                                        <span>
                                                            {{ str_replace(',', ', ', $user->payment_methods) }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row wd-pb py-3 py-md-5 mx-0" style="border-top: 1px solid #D9D9D9;">
                                <div class="col-lg-12">
                                    <div class="wd-transport-dtls adjust-space-in-mobile">
                                        <div class="wd-transport-area pb-0">

                                            <div class="wd-transport-rght">
                                                <ul>
                                                    <li class="mt-0">
                                                        <p>Insurance cover:</p>
                                                        <span>
                                                            @if (!empty($company_detail) && $company_detail->git_insurance_cover !== null)
                                                                £{{ $company_detail->git_insurance_cover }}
                                                            @endif
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <p>Years established:</p>
                                                        <span>
                                                            {{ $company_detail->years_established ?? '' }}
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <p>Recovery trucks:</p>
                                                        <span> {{ $company_detail->no_of_tow_trucks ?? '' }}</span>
                                                    </li>
                                                    <li>
                                                        <p>Drivers:</p>
                                                        <span>{{ $company_detail->no_of_drivers ?? '' }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-0">
                                <div class="col-lg-12">
                                    <div class="feedback-tbl border-none bg-white border-0 rounded-0"
                                        id="feedback_listing">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/web/js/admin.js') }}"></script>

    <script>
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

        function fetch_data(page) {
            $.ajax({
                url: globalSiteUrl + "/transporter/feedback_listing?page=" + page + '&' + params(),
                success: function(res) {
                    let result = res.data;
                    if (result) {
                        $('#feedback_listing').html(result.html);
                    }
                }
            });
        }

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
                var parentTr = $(this).closest('tr');
                var readMoreContent = parentTr.find('.read_more_content');
                $(this).addClass('d-none');
                readMoreContent.removeClass('d-none');
                parentTr.find('.read_more_less').removeClass('d-none');
            });
            $(document).on('click', '.read_more_less', function() {
                var parentTr = $(this).closest('tr');
                var readMoreContent = parentTr.find('.read_more_content');
                parentTr.find('.read_more_show').removeClass('d-none');
                readMoreContent.addClass('d-none');
                $(this).addClass('d-none');
            });
        });
    </script>
@endsection
