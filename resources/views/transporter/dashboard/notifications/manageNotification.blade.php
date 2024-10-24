@extends('layouts.transporter.dashboard.app')

@section('head_css')
    <style>
        .notification-settings {
            border: 1px solid #DADADA;
            border-radius: 8px;
            padding: 20px 25px;
            max-width: 550px;
            margin: auto;
        }
        .notification-settings ul {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            gap: 15px;
        }
        .notification-settings ul li {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }

        .switch {
            display: inline-block;
            position: relative;
            width: 60px;
            height: 30px;
            border-radius: 20px;
            background: #0356D6;
            transition: background 0.28s cubic-bezier(0.4, 0, 0.2, 1);
            vertical-align: middle;
            cursor: pointer;
            margin-bottom: 0;
        }

        .switch::before {
            content: '';
            position: absolute;
            top: 4px;
            left: 5px;
            width: 22px;
            height: 22px;
            background: #fafafa;
            border-radius: 50%;
            transition: left 0.28s cubic-bezier(0.4, 0, 0.2, 1), background 0.28s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .switch:active::before {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.28), 0 0 0 20px rgba(128, 128, 128, 0.1);
        }

        input:checked+.switch {
            background: #72da67;
        }

        input:checked+.switch::before {
            left: 27px;
            background: #fff;
        }

        input:checked+.switch:active::before {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.28), 0 0 0 20px rgba(0, 150, 136, 0.2);
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
                        <div class="admin_job_top flex-column header-banner">
                            <h3 class="mb-md-3">Notifications</h3>
                            <p class="pera_srch">Manage your notification preferences</p>
                        </div>
                        <div class="notification-settings">
                            <ul>
                                <li>
                                    <span>Summary of leads</span>
                                    <input type="checkbox" hidden="hidden" id="username">
                                    <label class="switch" for="username"></label>
                                </li>
                                <li>
                                    <span>Outbid alerts</span>
                                    <input type="checkbox" hidden="hidden" id="username">
                                    <label class="switch" for="username"></label>
                                </li>
                                <li>
                                    <span>Saved search alerts</span>
                                    <input type="checkbox" hidden="hidden" id="username">
                                    <label class="switch" for="username"></label>
                                </li>
                            </ul>
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
