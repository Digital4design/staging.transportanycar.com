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
            align-items: flex-start;
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
            .adjust_spacing {
                padding-top: 70px;
            }

            .set_banner_position {
                position: relative;
                padding-top: 15px;
                /* overflow: hidden; */
            }

            .banner {
                right: -45px;
                top: 25px;
            }
        }

        @media(max-width: 767px) {
            .banner {
                right: -50px;
                top: 18px;
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
            <div class="content_container adjust_spacing">
                <div class="inner_content set_banner_position">
                    <div class="wd-white-box">
                        @if ($completed_job >= 0 && $completed_job <= 10)
                            <div class="banner new_member">New Member</div>
                        @elseif($completed_job >= 11 && $completed_job <= 50)
                            <div class="banner pro_member">Pro Member</div>
                        @elseif($completed_job >= 51)
                            <div class="banner vip_member">ViP Member</div>
                        @endif
                        <div class="wd-feedback-box border-0 rounded-0 p-0">
                            <div class="row wd-pb pb-5 mx-0">
                                <div class="col-lg-12">
                                    <div class="wd-transport-dtls adjust-space-in-mobile">
                                        <div class="row mx-0 align-items-center user-feedback-header-wrap mb-3">
                                            <div class="w-auto wd-transport-img pt-0">
                                                <img src="{{ $user->profile_image }}" width="58" height="58"
                                                    alt="trasporter feedback" class="img-fluid">
                                            </div>
                                            <div class="">
                                                <h1 class="user-feedback-name mb-0">{{ $user->name ?? '-' }} <img
                                                        src="{{ asset('/assets/images/user-verified.png') }}" alt=""
                                                        width="20" height="20" class="ml-1" />
                                                    <!-- <span>({{ count($feedback) }})</span> -->
                                                </h1>
                                                <ul class="wd-star-lst user-feedback-stars">
                                                    <li>
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                fill="#FFA800" />
                                                        </svg>
                                                    </li>
                                                    <li>
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                fill="#FFA800" />
                                                        </svg>
                                                    </li>
                                                    <li>
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                fill="#FFA800" />
                                                        </svg>
                                                    </li>
                                                    <li>
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                fill="#FFA800" />
                                                        </svg>
                                                    </li>
                                                    <li>
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                fill="#FFA800" />
                                                        </svg>
                                                    </li>
                                                    <li class="user-feedback-rating-count">
                                                        <span>({{ count($feedback) }})</span></li>

                                                </ul>
                                                <div>Member since: <span
                                                        class="font-weight-light user-feedback-member-from">{{ $user->created_at->format('m/d/Y') }}</span>
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
                                                            @endif
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
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/web/js/admin.js') }}"></script>
    <script>
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
