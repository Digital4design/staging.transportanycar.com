@extends('layouts.transporter.dashboard.app')

@section('head_css')
    <style>
        .how-title {
            font-size: 16px;
            font-weight: 600;
            color: #000000;
        }

        .how-desc {
            font-size: 14px;
            font-weight: 300;
            color: #000000;
        }

        .how-works { counter-reset: item-counter;}

        .how-works .content-wrap {
            counter-increment: item-counter;
            list-style: none;
            position: relative;
            padding-left: 50px;
            margin-bottom: 30px;
        }

        .how-works .content-wrap::before {
            content: counter(item-counter);
            background-color:#0356D6;
            width: 37px;
            height: 37px;
            line-height:37px;
            border-radius: 100%;
            display: flex;
            flex-wrap: wrap;
            font-size: 24px;
            font-weight: 600;
            color:#ffffff;
            align-items: center;
            justify-content: center;
            position: absolute;
            left:0;
            top:5px;
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
            <div class="content_container">

                <div class="job_container job_container_watchList">
                    <div class="admin_job_bx find_trans_newjob list_of_items" id="style-1">
                        <div class="admin_job_top flex-column header-banner">
                            <h3 class="mb-md-3">How it works</h3>
                            <p class="pera_srch d-md-none" style="border-bottom: 1px solid #CFCFCF; width: 100px; margin: 0 auto 50px ;"> </p>
                        </div>

                        <div class="container">
                            <div class="row how-works">
                                <div class="col-12">
                                    <div class="content-wrap">
                                        <p class="how-title mb-1">Finding Transport Jobs</p>
                                        <p class="how-desc">You will see all available jobs in the ‘Find jobs’ section or
                                            search for jobs by collection and delivery areas. Save your searches and receive
                                            an email when a new job is posted that matches your saved search.</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="content-wrap">
                                        <p class="how-title mb-1">Placing Your Bids</p>
                                        <p class="how-desc">Once you've found a job to bid on, you can click the ‘Place bid’ button and send a professional message. We recommend bidding as low as possible, even if it means making a loss or breaking even for the first few jobs to build your reputation and feedback.</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="content-wrap">
                                        <p class="how-title mb-1">Messaging Customers</p>
                                        <p class="how-desc">You can send messages and ask questions about the job, any replies will be sent to you by email. DO NOT share any contact details such as phone numbers, emails, company names etc. Contact details are exchanged after a user accepts your quote.</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="content-wrap">
                                        <p class="how-title mb-1">Winning a Transport Job</p>
                                        <p class="how-desc">Only after a user accepts your bid, we provide their contact details so you can carry out the job.</p>
                                        <p class="how-desc">The user pays a deposit to us when accepting the quote to secure the booking, they will then pay the remaining full quote amount directly to you via your usual preferred payment method and terms.</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="content-wrap">
                                        <p class="how-title mb-1">What Do We Charge?</p>
                                        <p class="how-desc">Our commission is the lowest in the industry, we add approx 10% on top of your bid, the user will pay this in the form of a deposit so you don't need to pay us anything directly.</p>
                                        <p class="how-desc">For example, if you bid £200 and its accepted, the user pays a £20 deposit to us and £200 directly to you. We keep the £20 deposit as our commission and you get paid your total bid amount of £200.</p>
                                        <p class="how-desc">The commission we charge covers our advertising costs so that we can continue to supply you with transport leads.</p>
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
@endsection
