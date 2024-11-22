@extends('layouts.transporter.dashboard.app')

@section('head_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/web/vendors/owl.carousel/css/owl.carousel.min.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@endsection

@section('content')
    <style>
        .document-status {
            position: relative;
            display: inline-block;
        }
        select.form-control {
            padding: 9px 20px!important;
            height:44px!important;
        }

        .wd-cstm-check .form-group span {
            line-height: 13px;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 16px !important;
            font-weight: bold;
            color: white;
            text-transform: uppercase;
        }

        .admin-profile-box .requied_sec {
            box-shadow: none;
            padding-bottom: 0;
        }

        .pending {
            background-color: #ffc107;
            /* Blue color for pending */
        }

        .reject {
            background-color: #dc3545;
            /* Red color for reject */
        }

        .approve {
            background-color: #28a745;
            /* Green color for approve */
        }

        .subtitle {
            font-size: 14px;
            color: #777;
            margin-bottom: 15px;
        }

        .subtitle.message {
            font-size: 12px !important;
        }

        .upload-section {
            display: flex;
            justify-content: space-between;
        }

        .document {
            display: flex;
            flex-direction: column;
            align-items: center;

            border-radius: 8px;
            border: 2px solid #CFCFCF;
            background: #FFF;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 16px;
            margin-bottom: 4px;
            gap: 5px;
        }

        /* .document span {
                                            font-size: 14px;
                                            margin-bottom: 10px;
                                        } */

        /* .upload-btn {
                                            background-color: #f0f0f0;
                                            border: 1px solid #ddd;
                                            border-radius: 5px;
                                            padding: 5px 10px;
                                            font-size: 14px;
                                            cursor: pointer;
                                            display: flex;
                                            align-items: center;
                                        }

                                        .upload-btn img {
                                            margin-left: 5px;
                                            width: 16px;
                                            height: 16px;
                                        } */

        .form-group {
            position: relative;
        }

        #passwordIcon {
            position: absolute;
            top: 8px;
            right: 15px;
            /* transform: translateY(-50%); */
            cursor: default;
            color: #ccc;
        }

        #togglePassword {
            position: absolute;
            top: 0;
            bottom: 7px;
            right: 15px;
            z-index: 1;
            cursor: pointer;
            width: 45px;
        }


        /* new css*/

        .admin-profile-box>.row {
            margin: 0;
        }

        .uploaded-documents,
        .requied_sec h2 {
            font-size: 24px;
            margin-bottom: 3px;
            display: flex;
        }

        .requied_sec .subtitle {
            font-size: 14px;
        }

        .requied_sec .upload-section {
            flex-wrap: wrap;
        }

        /* .requied_sec_row .document {
                                            display: flex;
                                            flex-direction: row;
                                            align-items: center;
                                            border: 1px solid #CFCFCF;
                                            border-radius: 8px;
                                            padding: 12px;
                                            justify-content: space-around;
                                        } */
        .requied_sec_row .document a,
        .requied_sec_row .document span {
            color: #717171;
            color: #000000;
            padding: 4px 20px;
            font-size: 12px;
            font-weight: 300;
            display: flex;
            align-items: center;
            gap: 5px;
            box-shadow: 0px 0px 35px 0px rgba(0, 0, 0, 0.20), 0 5px 5px rgba(0, 0, 0, 0.20);

            cursor: pointer;
            background-color: #FDFFFA;
            border-radius: 5px;
        }

        .requied_sec_row .document a:hover,
        .requied_sec_row .document span:hover {
            background-color: #52D017;
            color: #ffffff;
        }

        .requied_sec_row .document span:hover svg path {
            fill: #ffffff;
        }

        .requied_sec_row {
            width: 100%;
        }

        /* .requied_sec_row .upload-btn {
                                            box-shadow: 0px 0px 13px 5px #cfcfcf9c;
                                            font-size: 15px;
                                            background: #fff;
                                            padding: 6px 17px;
                                        } */
        .info_sec {
            margin-left: 10px;
            position: relative;
        }

        .info_sec_details {
            display: none;
            padding-top: 20px;
            position: absolute;
            left: -17px;
            width: 300px;
            top: 66%;
            z-index: 1;
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
            font-size: 16px;
            font-weight: 200;
            color: #777;
            margin-bottom: 0;
        }

        .info_sec_details:before {
            content: '';
            display: block;
            position: absolute;
            top: 10px;
            left: 19px;
            width: 20px;
            height: 20px;
            background: white;
            transform: rotate(45deg);
            border: 1px solid #cfcfcfe0;
            border-bottom: 0;
            border-right: 0;
        }

        .info_sec:hover .info_sec_details {
            display: block;
        }

        .info_sec span {
            display: flex;
            padding: 5px 0;
        }

        .requied_sec {
            margin-top: 30px;
        }

        .requied_sec_row .document label {
            display: flex;
            justify-content: space-between;
            width: 100%;
            align-items: center;
            margin-bottom: 0;

        }

        .document-list {
            background-color: #f9f9f9;
            padding: 20px;
        }

        h2#swal2-title {
            margin-bottom: 0;
            padding: 0;
        }

        h2#swal2-title span.swal-title {
            color: #FF0000;
            font-weight: 700;
        }

        div#swal2-html-container {
            padding: 30px 15px 0;
        }

        div#spam-banner {
            width: 85%;
            display: none;
        }



        /* start 16-09-2024 */

        .upload-heading {
            font-weight: 600;
        }

        .sub_heading {
            font-size: 12px;
            font-weight: 300;
            color: #717171;
        }

        .upload-btn-wrapper {
            cursor: pointer;
            position: relative;
            overflow: hidden;
            display: inline-block;
            box-shadow: 0px 0px 35px 0px rgba(0, 0, 0, 0.20), 0 5px 5px rgba(0, 0, 0, 0.20);
            background-color: #FDFFFA;
            border-radius: 5px;
        }

        .upload-btn-wrapper .btn {
            color: #000000;
            padding: 4px 20px;
            font-size: 12px;
            font-weight: 300;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 5px;
        }

        .upload-btn-wrapper input[type=file] {
            /* font-size: 100px; */
            width: 100%;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }

        .doc-wrap {
            border-radius: 8px;
            border: 2px solid #CFCFCF;
            background: #FFF;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            padding: 16px;
            margin-bottom: 4px;
            gap: 5px;
        }

        .requied_sec_row .document span.send-link {
            border-radius: 5px;
            background: #52D017;
            box-shadow: 0px 0px 35px 0px rgba(0, 0, 0, 0.20);
            font-size: 12px;
            color: #ffffff;
            border: none;
            padding: 5px 25px;
        }

        /* .adjust-space-mobile-padding {padding-left: 60px!important; padding-right: 60px!important;} */


        @media screen and (min-width: 1200px) {
            .admin-profile-box>.row {
                margin-right: -16px;
                margin-left: -16px;
            }
        }

        @media screen and (min-width: 992px) and (max-width: 1600px) {
            .upload_docs .upload-section .requied_sec_row {
                width: 100%;
            }

            .doc-wrap {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media screen and (min-width: 768px) and (max-width: 1100px) {

            /* .upload_docs .upload-section .requied_sec_row {
                                    width:49%;
                                } */
            .admin-profile-box .col-lg-8 {
                flex: auto;
                max-width: 100%;
            }

            /* .wd-profile-form form#form_account {
                                    padding-left: 33.33%;
                                } */

            /* .wd-admin-profile {
                                    max-width: 33.333333%;
                                    position: absolute;
                                    left: 0;
                                    bottom: 0;
                                    margin-left: 15px;
                                } */


        }

        /* end 16-09-2024 */
        /* @media(max-width: 1600px) {
                                .requied_sec_row {
                                    width: 100%;
                                }
                            } */

        @media(max-width: 1199px) {
            .admin-profile-box a.logout_txt.mob_view {
                display: block;
            }

            .admin-profile-box a.logout_txt.desk_view {
                display: none;
            }

            .admin-profile-box h3 {
                margin-top: 60px;
            }

            .logout_txt {
                font-weight: 300;
            }

            .document-list {
                display: flex;
                align-items: center;
                padding: 10px;
                justify-content: space-between;
                margin-bottom: 0 !important;
            }

            .wd-profile-form .form-group a.view-pdf {
                /* width: 25%; */
                font-size: 14px;
                text-align: right;
            }

            /* .wd-profile-form .form-group span {
                                                font-size: 14px;
                                                width: 68%;
                                            } */
            /* .requied_sec_row .document {
                                                padding: 10px 8px;
                                            } */
            .requied_sec_row .document label.addmore_btn {
                flex-wrap: wrap;
                font-size: 14px;
            }

            .info_sec_details {
                left: auto;
                right: -48px;
            }

            .info_sec_details:before {
                left: 77%;
            }
            .uploaded-documents  {
                font-size: 16px!important;
                line-height: 20px;
            }
        }

        @media(max-width: 991px) {
            .wd-cstm-check {
                justify-content: space-between;
            }
            .wd-cstm-check li {
                flex: 0 0 33.333%;
                /* max-width: 33.333%;
                flex: 0 0 33.333%; */
            }
            

            .admin-profile-box .requied_sec {
                padding: 0;
            }

            .wd-admin-profile {
                margin-left: 16px;
                margin-right: 16px;
            }

            .profile_content {
                padding-left: 0;
                padding-right: 0;
            }

            .admin-profile-box .requied_sec.verify_email_sec {
                margin-bottom: 60px;
            }

            .document-list {
                margin-bottom: 15px !important;
            }

            .wd-admin-profile .wd-profl-botm {
                flex-wrap: wrap;
            }

            /* start 16-09-2024 */
            /* .wd-profile-form .form-group span {
                                                width: 100%;
                                                } */
            /* end 16-09-2024 */
            .wd-profile-form .form-group label.addmore_btn span {
                width: auto;
            }

            .wd-profile-form .form-control {
                font-size: 18px;
            }
        }

        @media(max-width: 767px) {
            .wd-cstm-check .form-group label {max-width: 100px;}
            .wd-cstm-check li {
                flex: 0 0 auto;
            }
            .upload-section .requied_sec_row:first-child .form-group {
                margin-bottom: 0;
            }


            .requied_sec_row {
                width: 100%;
            }

            .info_sec_details {
                left: auto;
                right: -30px;
            }

            .info_sec_details:before {
                right: 31px;
                left: auto;
            }

            /* .requied_sec {
                                    margin-right: -15px;
                                    margin-left: -15px;
                                } */

            .requied_sec_row .document {
                justify-content: space-between;
            }

            .requied_sec_row .document span {
                font-size: 15px;
                margin-right: 0;
            }

            .requied_sec h2 {
                align-items: center;
            }

            .requied_sec {
                margin-top: 15px;
            }

            .document-item .col-lg-6 .form-group {
                text-align: center;
            }

            .document-item {
                width: 100%;
            }

           /* #passwordIcon {
                top: 16px;
            }*/



        }

        @media(max-width: 580px) {

            .info_sec_details {
                left: 50%;
                right: auto;
                transform: translateX(-66%);
                width: 389px;
                padding-top: 23px;
            }

            .info_sec_details:before {
                right: 124px;
                left: auto;
                top: 13px;
            }

            .info_sec_details p {
                color: #ababab;
            }

            .verify_email_sec input[type="email"],
            .requied_sec_row .document label.addmore_btn {
                font-size: 15px;
            }

            .content_container {
                padding-bottom: 50px !important;
            }
        }

        @media (max-width: 420px) {
            .info_sec_details {
                transform: translateX(-68.5%);
            }

            .info_sec_details:before {
                right: 114px;
            }
        }

        @media (max-width: 400px) {
            .info_sec_details {
                left: 0;
                right: auto;
                transform: translateX(-70%);
                width: 350px;
                padding-top: 23px;
            }

            .info_sec_details:before {
                right: 85px;
            }

        }

        @media (max-width: 375px) {
            .info_sec_details {
                transform: translateX(-74%);
                width: 329px;
                padding-top: 23px;
            }

            .info_sec_details:before {
                right: 65px;
            }

            .wd-cstm-check li {
                max-width: 50%;
                flex: 0 0 50%;
            }
        }
    </style>
    <div id="wrapper">
        <!-- SIDEBAR -->
        @include('layouts.transporter.dashboard.sidebar')
        <div id="page-content-wrapper">
            @include('layouts.transporter.dashboard.top_head')
            <!-- content part -->
            <div class="content_container">
                <div class="banner" id="spam-banner">
                    <h2 class="spam-title">Check your spam.</h2>
                    <p>Please check your spam or junk folder and mark email as ‘not spam’ so that you don’t miss out on any
                        important email notifications. You can unsubscribe from job alert emails at any time within your
                        profile.</p>
                    <button onclick="hideBanner()" class="btn btn-success">Ok, got it</button>
                </div>
                <div class="profile_content">
                    <div class="admin-profile-box">
                        <div class="row">
                            {{-- @if (!isMobile()) --}}
                            <div class="col-xl-4 pr-0 d-none d-xl-block">
                                <div class="wd-admin-profile">
                                    <div class="admin-profile-top">
                                        <div class="admin-profile-area">
                                            <div class="edit-profile-photo">
                                                <img src="@if ($user->profile_image) {{ checkFileExist($user->profile_image) }} @endif"
                                                    alt="edit profile image" class="img-fluid profile-pic">
                                                <div class="p-image">
                                                    <svg class="upload-button" width="15" height="13"
                                                        viewBox="0 0 15 13" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M14.334 3.60425V11.4792C14.334 12.2039 13.7461 12.7917 13.0215 12.7917H1.64648C0.921875 12.7917 0.333984 12.2039 0.333984 11.4792V3.60425C0.333984 2.87964 0.921875 2.29175 1.64648 2.29175H4.05273L4.38906 1.39214C4.58047 0.88081 5.06992 0.541748 5.6168 0.541748H9.04844C9.59531 0.541748 10.0848 0.88081 10.2762 1.39214L10.6152 2.29175H13.0215C13.7461 2.29175 14.334 2.87964 14.334 3.60425ZM10.6152 7.54175C10.6152 5.73159 9.14414 4.2605 7.33398 4.2605C5.52383 4.2605 4.05273 5.73159 4.05273 7.54175C4.05273 9.3519 5.52383 10.823 7.33398 10.823C9.14414 10.823 10.6152 9.3519 10.6152 7.54175ZM9.74023 7.54175C9.74023 8.86792 8.66016 9.948 7.33398 9.948C6.00781 9.948 4.92773 8.86792 4.92773 7.54175C4.92773 6.21558 6.00781 5.1355 7.33398 5.1355C8.66016 5.1355 9.74023 6.21558 9.74023 7.54175Z"
                                                            fill="#52D017" />
                                                    </svg>
                                                    <input class="file-upload" type="file" accept="image/*">
                                                </div>
                                            </div>
                                            <div>
                                                <h2>{{ $user->name }}</h2>
                                                <a href="{{ route('transporter.logout') }}" class="logout_txt desk_view">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_650_1110)">
                                                            <path
                                                                d="M15.75 0H7.5C6.90381 0.00178057 6.33255 0.239405 5.91098 0.660977C5.48941 1.08255 5.25178 1.65381 5.25 2.25V6.75H12C12.5967 6.75 13.169 6.98705 13.591 7.40901C14.0129 7.83097 14.25 8.40326 14.25 9C14.25 9.59674 14.0129 10.169 13.591 10.591C13.169 11.0129 12.5967 11.25 12 11.25H5.25V15.75C5.25178 16.3462 5.48941 16.9175 5.91098 17.339C6.33255 17.7606 6.90381 17.9982 7.5 18H15.75C16.3462 17.9982 16.9175 17.7606 17.339 17.339C17.7606 16.9175 17.9982 16.3462 18 15.75V2.25C17.9982 1.65381 17.7606 1.08255 17.339 0.660977C16.9175 0.239405 16.3462 0.00178057 15.75 0Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M2.55772 9.75002H12.0002C12.1991 9.75002 12.3899 9.671 12.5305 9.53035C12.6712 9.38969 12.7502 9.19893 12.7502 9.00002C12.7502 8.8011 12.6712 8.61034 12.5305 8.46969C12.3899 8.32903 12.1991 8.25002 12.0002 8.25002H2.55772L3.53272 7.28252C3.67395 7.14129 3.75329 6.94974 3.75329 6.75002C3.75329 6.55029 3.67395 6.35874 3.53272 6.21752C3.39149 6.07629 3.19994 5.99695 3.00022 5.99695C2.80049 5.99695 2.60895 6.07629 2.46772 6.21752L0.217718 8.46752C0.0822483 8.61173 0.00683594 8.80215 0.00683594 9.00002C0.00683594 9.19788 0.0822483 9.3883 0.217718 9.53252L2.46772 11.7825C2.61133 11.9192 2.80198 11.9954 3.00022 11.9954C3.19845 11.9954 3.3891 11.9192 3.53272 11.7825C3.67323 11.6409 3.75208 11.4495 3.75208 11.25C3.75208 11.0505 3.67323 10.8591 3.53272 10.7175L2.55772 9.75002Z"
                                                                fill="white"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_650_1110">
                                                                <rect width="18" height="18" fill="white">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    Logout
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wd-profl-botm">
                                        <div class="wd-profl-lst">
                                            <p>Jobs completed</p>
                                            <span>{{ $jobs_completed_count }}</span>
                                        </div>
                                        <div class="wd-profl-lst">
                                            <p>Total earnings</p>
                                            <span>£{{ $total_earning_count }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- @endif --}}
                            <div class="col-xl-8 pl-xl-0">
                                <form action="{{ route('transporter.profile_post') }}" name="form_account" id="form_account"
                                    method="post" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    <div class="wd-profile-form pb-0 px-0">
                                        <input type="hidden" name="country_code" id="country_code"
                                            value="{{ empty($user->country_code) ? '+44' : $user->country_code }}">



                                        @if ($user->is_status == '' || $user->is_status == 'pending')
                                            @if ($user->is_status == 'pending' && ($user->driver_license != null && $user->goods_in_transit_insurance != null && $user->email_verify_status == '1'))
                                                <div class="requied_sec px-md-3 mx-xl-4" style="color:red">
                                                    <h2>Account approval pending</h2>
                                                </div>
                                            @endif
                                            <div class="row mx-0 mx-xl-4">
                                                @if (($user->is_status != 'approved' && $user->is_status != 'pending') || ($user->driver_license == null || $user->goods_in_transit_insurance == null))
                                                    <div class="col-md-6 col-xl-6 requied_sec mb-0 upload_docs px-0 px-md-3 pl-lg-0 px-xl-3"
                                                        style="{{ $user->is_status == 'approved' ? 'display:block' : '' }}">
                                                        <h2 class="upload-heading">Upload Documents:
                                                            <div class="info_sec">
                                                                <span class="info-popup">
                                                                    <svg width="23" height="23" viewBox="0 0 23 23"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <circle cx="11.5" cy="11.5" r="11.5"
                                                                            fill="#D9D9D9" />
                                                                        <path
                                                                            d="M9.89286 18V9.26786H13.0179V18H9.89286ZM11.4464 8.25C10.9821 8.25 10.5952 8.09524 10.2857 7.78571C9.97619 7.46428 9.82143 7.06548 9.82143 6.58928C9.82143 6.125 9.97619 5.73214 10.2857 5.41071C10.5952 5.08928 10.9821 4.92857 11.4464 4.92857C11.9345 4.92857 12.3274 5.08928 12.625 5.41071C12.9345 5.73214 13.0893 6.125 13.0893 6.58928C13.0893 7.06548 12.9345 7.46428 12.625 7.78571C12.3274 8.09524 11.9345 8.25 11.4464 8.25Z"
                                                                            fill="#FDFFFA" />
                                                                    </svg>
                                                                </span>
                                                                <div class="info_sec_details">
                                                                    <div class="info_sec_details_contant">
                                                                        <p>In order to be one of our transport providers you
                                                                            need
                                                                            the following documents. This is to protect not
                                                                            only
                                                                            you
                                                                            but the customer from damage or loss. If you’re
                                                                            unable
                                                                            to provide these documents unfortunately your
                                                                            application will not be considered. If you have
                                                                            any
                                                                            questions about the required documents please
                                                                            email
                                                                            us
                                                                            <a href="mailto:info@transportanycar.com"
                                                                                style="color:#007bff !important">info@transportanycar.com</a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </h2>
                                                        
                                                        <p class="subtitle">You must upload your documents before you can
                                                            start
                                                            bidding.</p>
                                                        <p class="subtitle text-danger message">Upload your documents</p>
                                                        <div class="upload-section">
                                                        @if ($user->driver_license == null)
                                                            <div class="requied_sec_row">
                                                                <div class="form-group">
                                                                    <div class="document border-danger">
                                                                        <!-- <span>Valid driving license</span> -->
                                                                        <label for="driver_license"
                                                                            class="addmore_btn font-weight-light"
                                                                            id="add"
                                                                            title="Click to upload the document">
                                                                            Valid driving license
                                                                            <span class="upload-btn">Upload
                                                                                <svg width="15" height="15"
                                                                                    viewBox="0 0 15 15" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M3.875 9.375C3.875 8.96079 3.53921 8.625 3.125 8.625C2.71079 8.625 2.375 8.96079 2.375 9.375H3.875ZM3.125 10H2.375H3.125ZM12.625 9.375C12.625 8.96079 12.2892 8.625 11.875 8.625C11.4608 8.625 11.125 8.96079 11.125 9.375H12.625ZM8.08565 3.59352C8.34441 3.27007 8.29197 2.79811 7.96852 2.53935C7.64507 2.28059 7.17311 2.33303 6.91435 2.65648L8.08565 3.59352ZM4.41435 5.78148C4.15559 6.10493 4.20803 6.57689 4.53148 6.83565C4.85493 7.09441 5.32689 7.04197 5.58565 6.71852L4.41435 5.78148ZM8.08565 2.65648C7.82689 2.33303 7.35493 2.28059 7.03148 2.53935C6.70803 2.79811 6.65559 3.27007 6.91435 3.59352L8.08565 2.65648ZM9.41435 6.71852C9.67311 7.04197 10.1451 7.09441 10.4685 6.83565C10.792 6.57689 10.8444 6.10493 10.5857 5.78148L9.41435 6.71852ZM8.25 3.125C8.25 2.71079 7.91421 2.375 7.5 2.375C7.08579 2.375 6.75 2.71079 6.75 3.125H8.25ZM6.75 10C6.75 10.4142 7.08579 10.75 7.5 10.75C7.91421 10.75 8.25 10.4142 8.25 10H6.75ZM2.375 9.375V10H3.875V9.375H2.375ZM2.375 10C2.375 11.4497 3.55025 12.625 5 12.625V11.125C4.37868 11.125 3.875 10.6213 3.875 10H2.375ZM5 12.625H10V11.125H5V12.625ZM10 12.625C11.4497 12.625 12.625 11.4497 12.625 10H11.125C11.125 10.6213 10.6213 11.125 10 11.125V12.625ZM12.625 10V9.375H11.125V10H12.625ZM6.91435 2.65648L4.41435 5.78148L5.58565 6.71852L8.08565 3.59352L6.91435 2.65648ZM6.91435 3.59352L9.41435 6.71852L10.5857 5.78148L8.08565 2.65648L6.91435 3.59352ZM6.75 3.125V10H8.25V3.125H6.75Z"
                                                                                        fill="#52D017" />
                                                                                </svg>
                                                                            </span>
                                                                            <input type="file"
                                                                                accept=".pdf, .png, .jpg, .jpeg"
                                                                                name="driver_license" id="driver_license"
                                                                                style="display: none;">
                                                                        </label>
                                                                    </div>
                                                                    <span id="driver_license_success"
                                                                        class="d-none success_msg"
                                                                        style="color: #52D017;">Uploaded
                                                                        Successfully</span>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($user->goods_in_transit_insurance == null)
                                                            <div class="requied_sec_row">
                                                                <div class="form-group">
                                                                    <div class="document border-danger">
                                                                        <label for="goods_in_transit_insurance"
                                                                            class="addmore_btn font-weight-light"
                                                                            id="add"
                                                                            title="Click to upload the document">
                                                                            Goods in transit insurance
                                                                            <!-- <span>Goods in transit insurance</span> -->
                                                                            <span class="upload-btn">Upload
                                                                                <svg width="15" height="15"
                                                                                    viewBox="0 0 15 15" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M3.875 9.375C3.875 8.96079 3.53921 8.625 3.125 8.625C2.71079 8.625 2.375 8.96079 2.375 9.375H3.875ZM3.125 10H2.375H3.125ZM12.625 9.375C12.625 8.96079 12.2892 8.625 11.875 8.625C11.4608 8.625 11.125 8.96079 11.125 9.375H12.625ZM8.08565 3.59352C8.34441 3.27007 8.29197 2.79811 7.96852 2.53935C7.64507 2.28059 7.17311 2.33303 6.91435 2.65648L8.08565 3.59352ZM4.41435 5.78148C4.15559 6.10493 4.20803 6.57689 4.53148 6.83565C4.85493 7.09441 5.32689 7.04197 5.58565 6.71852L4.41435 5.78148ZM8.08565 2.65648C7.82689 2.33303 7.35493 2.28059 7.03148 2.53935C6.70803 2.79811 6.65559 3.27007 6.91435 3.59352L8.08565 2.65648ZM9.41435 6.71852C9.67311 7.04197 10.1451 7.09441 10.4685 6.83565C10.792 6.57689 10.8444 6.10493 10.5857 5.78148L9.41435 6.71852ZM8.25 3.125C8.25 2.71079 7.91421 2.375 7.5 2.375C7.08579 2.375 6.75 2.71079 6.75 3.125H8.25ZM6.75 10C6.75 10.4142 7.08579 10.75 7.5 10.75C7.91421 10.75 8.25 10.4142 8.25 10H6.75ZM2.375 9.375V10H3.875V9.375H2.375ZM2.375 10C2.375 11.4497 3.55025 12.625 5 12.625V11.125C4.37868 11.125 3.875 10.6213 3.875 10H2.375ZM5 12.625H10V11.125H5V12.625ZM10 12.625C11.4497 12.625 12.625 11.4497 12.625 10H11.125C11.125 10.6213 10.6213 11.125 10 11.125V12.625ZM12.625 10V9.375H11.125V10H12.625ZM6.91435 2.65648L4.41435 5.78148L5.58565 6.71852L8.08565 3.59352L6.91435 2.65648ZM6.91435 3.59352L9.41435 6.71852L10.5857 5.78148L8.08565 2.65648L6.91435 3.59352ZM6.75 3.125V10H8.25V3.125H6.75Z"
                                                                                        fill="#52D017" />
                                                                                </svg>
                                                                            </span>
                                                                            <input type="file"
                                                                                accept=".pdf, .png, .jpg, .jpeg"
                                                                                name="goods_in_transit_insurance"
                                                                                id="goods_in_transit_insurance"
                                                                                style="display: none;">
                                                                        </label>
                                                                    </div>
                                                                    <span id="goods_in_transit_insurance_success"
                                                                        class=" success_msg d-none"
                                                                        style="color: #52D017;">Uploaded
                                                                        Successfully</span>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($user->driver_license != null || $user->goods_in_transit_insurance != null || $user->motor_trade_insurance != null)
                                                    <div class="col-md-6 col-xl-6 mb-0 px-0 px-md-3 mt-3 pt-2 requied_sec ">
                                                        <h2 class="upload-heading p-0 m-0">Uploaded documents</h2>
                                                        <p class="subtitle text-success message">Documents uploaded</p>

                                                        <div class="row flex-column mx-0">
                                                            @if ($user->driver_license != null)
                                                                <div class="col-xl-12  my-0 upload_docs px-0">
                                                                    <div class="requied_sec_row">
                                                                        <div class="form-group">
                                                                            <div class="document">
                                                                                <label for=""
                                                                                    class="font-weight-light">
                                                                                    Valid driving license
                                                                                    <a class="view-pdf"
                                                                                        href="{{ url($user->driver_license) }}"
                                                                                        data-toggle="modal"
                                                                                        data-target="#pdfModal"
                                                                                        data-url="{{ url($user->driver_license) }}">View</a>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($user->goods_in_transit_insurance != null)
                                                                <div class="col-xl-12  my-0 upload_docs px-0">
                                                                    <div class="requied_sec_row">
                                                                        <div class="form-group">
                                                                            <div class="document">
                                                                                <label for=""
                                                                                    class="font-weight-light">
                                                                                    Goods in transit insurance
                                                                                    <a class="view-pdf"
                                                                                        href="{{ url($user->goods_in_transit_insurance) }}"
                                                                                        data-toggle="modal"
                                                                                        data-target="#pdfModal"
                                                                                        data-url="{{ url($user->goods_in_transit_insurance) }}"
                                                                                        style="float:right">View</a>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="col-md-6 col-xl-6 requied_sec verify_email_sec px-0 px-md-3  mt-3 pt-2"
                                                    style="{{ $user->is_status == 'approved' ? 'display:block' : '' }}">
                                                    <h2 class="upload-heading mb-0">Verify email:</h2>
                                                   
                                                    @if ($user->email_verify_status == 0)
                                                        <p class="subtitle">You must verify your email address before you
                                                            can start bidding.</p>
                                                        <p class="subtitle text-danger message">Please verify your email
                                                        </p>
                                                        <div class="upload-section">
                                                            <div class="requied_sec_row w-100">
                                                                <div class="form-group">
                                                                    <div class="document flex-row border-danger">
                                                                        <label for="email_verify"
                                                                            class="w-auto font-weight-light">
                                                                            Verify your email address

                                                                        </label>

                                                                        <span class="send-link" id="sendLinkBtn"
                                                                            style="cursor: pointer;">Send Link</span>

                                                                        <div id="message" style="display: none;"></div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <p class="subtitle text-success message">Email verified</p>
                                                        <div class="upload-section ">
                                                            <div class="requied_sec_row w-100">
                                                                <div class="form-group">
                                                                    <div class="document flex-row">
                                                                        <label for="email_verify"
                                                                            class="w-auto font-weight-light">
                                                                            Verify your email address

                                                                        </label>

                                                                        <span id=""
                                                                            style="cursor: pointer;">Verified</span>

                                                                        <div id="message" style="display: none;"></div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif

                                        {{-- @if (isMobile()) --}}
                                        <div class="wd-admin-profile d-xl-none">
                                            <div class="admin-profile-top">
                                                <div class="admin-profile-area">
                                                    <div class="edit-profile-photo">
                                                        <img src="@if ($user->profile_image) {{ checkFileExist($user->profile_image) }} @endif"
                                                            alt="edit profile image" class="img-fluid profile-pic">
                                                        <div class="p-image">
                                                            <svg class="upload-button" width="15" height="13"
                                                                viewBox="0 0 15 13" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M14.334 3.60425V11.4792C14.334 12.2039 13.7461 12.7917 13.0215 12.7917H1.64648C0.921875 12.7917 0.333984 12.2039 0.333984 11.4792V3.60425C0.333984 2.87964 0.921875 2.29175 1.64648 2.29175H4.05273L4.38906 1.39214C4.58047 0.88081 5.06992 0.541748 5.6168 0.541748H9.04844C9.59531 0.541748 10.0848 0.88081 10.2762 1.39214L10.6152 2.29175H13.0215C13.7461 2.29175 14.334 2.87964 14.334 3.60425ZM10.6152 7.54175C10.6152 5.73159 9.14414 4.2605 7.33398 4.2605C5.52383 4.2605 4.05273 5.73159 4.05273 7.54175C4.05273 9.3519 5.52383 10.823 7.33398 10.823C9.14414 10.823 10.6152 9.3519 10.6152 7.54175ZM9.74023 7.54175C9.74023 8.86792 8.66016 9.948 7.33398 9.948C6.00781 9.948 4.92773 8.86792 4.92773 7.54175C4.92773 6.21558 6.00781 5.1355 7.33398 5.1355C8.66016 5.1355 9.74023 6.21558 9.74023 7.54175Z"
                                                                    fill="#52D017" />
                                                            </svg>
                                                            <input class="file-upload" type="file" accept="image/*">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h2>{{ $user->name }}</h2>
                                                        <a href="{{ route('transporter.logout') }}"
                                                            class="logout_txt mob_view">
                                                            <svg width="18" height="18" viewBox="0 0 18 18"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_650_1110)">
                                                                    <path
                                                                        d="M15.75 0H7.5C6.90381 0.00178057 6.33255 0.239405 5.91098 0.660977C5.48941 1.08255 5.25178 1.65381 5.25 2.25V6.75H12C12.5967 6.75 13.169 6.98705 13.591 7.40901C14.0129 7.83097 14.25 8.40326 14.25 9C14.25 9.59674 14.0129 10.169 13.591 10.591C13.169 11.0129 12.5967 11.25 12 11.25H5.25V15.75C5.25178 16.3462 5.48941 16.9175 5.91098 17.339C6.33255 17.7606 6.90381 17.9982 7.5 18H15.75C16.3462 17.9982 16.9175 17.7606 17.339 17.339C17.7606 16.9175 17.9982 16.3462 18 15.75V2.25C17.9982 1.65381 17.7606 1.08255 17.339 0.660977C16.9175 0.239405 16.3462 0.00178057 15.75 0Z"
                                                                        fill="white"></path>
                                                                    <path
                                                                        d="M2.55772 9.75002H12.0002C12.1991 9.75002 12.3899 9.671 12.5305 9.53035C12.6712 9.38969 12.7502 9.19893 12.7502 9.00002C12.7502 8.8011 12.6712 8.61034 12.5305 8.46969C12.3899 8.32903 12.1991 8.25002 12.0002 8.25002H2.55772L3.53272 7.28252C3.67395 7.14129 3.75329 6.94974 3.75329 6.75002C3.75329 6.55029 3.67395 6.35874 3.53272 6.21752C3.39149 6.07629 3.19994 5.99695 3.00022 5.99695C2.80049 5.99695 2.60895 6.07629 2.46772 6.21752L0.217718 8.46752C0.0822483 8.61173 0.00683594 8.80215 0.00683594 9.00002C0.00683594 9.19788 0.0822483 9.3883 0.217718 9.53252L2.46772 11.7825C2.61133 11.9192 2.80198 11.9954 3.00022 11.9954C3.19845 11.9954 3.3891 11.9192 3.53272 11.7825C3.67323 11.6409 3.75208 11.4495 3.75208 11.25C3.75208 11.0505 3.67323 10.8591 3.53272 10.7175L2.55772 9.75002Z"
                                                                        fill="white"></path>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_650_1110">
                                                                        <rect width="18" height="18"
                                                                            fill="white">
                                                                        </rect>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                            Logout
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wd-profl-botm">
                                                <div class="wd-profl-lst">
                                                    <p>Jobs completed</p>
                                                    <span>{{ $jobs_completed_count }}</span>
                                                </div>
                                                <div class="wd-profl-lst">
                                                    <p>Total earnings</p>
                                                    <span>£{{ $total_earning_count }}</span>
                                                </div>
                                            </div>

                                            <a href="{{ route('transporter.logout') }}" class="logout_txt desk_view">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_650_1110)">
                                                        <path
                                                            d="M15.75 0H7.5C6.90381 0.00178057 6.33255 0.239405 5.91098 0.660977C5.48941 1.08255 5.25178 1.65381 5.25 2.25V6.75H12C12.5967 6.75 13.169 6.98705 13.591 7.40901C14.0129 7.83097 14.25 8.40326 14.25 9C14.25 9.59674 14.0129 10.169 13.591 10.591C13.169 11.0129 12.5967 11.25 12 11.25H5.25V15.75C5.25178 16.3462 5.48941 16.9175 5.91098 17.339C6.33255 17.7606 6.90381 17.9982 7.5 18H15.75C16.3462 17.9982 16.9175 17.7606 17.339 17.339C17.7606 16.9175 17.9982 16.3462 18 15.75V2.25C17.9982 1.65381 17.7606 1.08255 17.339 0.660977C16.9175 0.239405 16.3462 0.00178057 15.75 0Z"
                                                            fill="white"></path>
                                                        <path
                                                            d="M2.55772 9.75002H12.0002C12.1991 9.75002 12.3899 9.671 12.5305 9.53035C12.6712 9.38969 12.7502 9.19893 12.7502 9.00002C12.7502 8.8011 12.6712 8.61034 12.5305 8.46969C12.3899 8.32903 12.1991 8.25002 12.0002 8.25002H2.55772L3.53272 7.28252C3.67395 7.14129 3.75329 6.94974 3.75329 6.75002C3.75329 6.55029 3.67395 6.35874 3.53272 6.21752C3.39149 6.07629 3.19994 5.99695 3.00022 5.99695C2.80049 5.99695 2.60895 6.07629 2.46772 6.21752L0.217718 8.46752C0.0822483 8.61173 0.00683594 8.80215 0.00683594 9.00002C0.00683594 9.19788 0.0822483 9.3883 0.217718 9.53252L2.46772 11.7825C2.61133 11.9192 2.80198 11.9954 3.00022 11.9954C3.19845 11.9954 3.3891 11.9192 3.53272 11.7825C3.67323 11.6409 3.75208 11.4495 3.75208 11.25C3.75208 11.0505 3.67323 10.8591 3.53272 10.7175L2.55772 9.75002Z"
                                                            fill="white"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_650_1110">
                                                            <rect width="18" height="18" fill="white">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                Logout
                                            </a>
                                        </div>
                                        {{-- @endif --}}

                                        @if ($user->is_status == 'approved')
                                            <div class="row mx-4">
                                                <div class="col-md-6 col-xl-6 mb-0 pl-0 pl-xl-3 px-0 pr-md-3 mt-3 pt-2">
                                                    <h2 class="uploaded-documents p-0 m-0">Uploaded documents</h2>
                                                    <p class="subtitle text-success message">Documents uploaded</p>

                                                    <div class="row flex-column mx-0">
                                                        @if ($user->driver_license != null)
                                                            <div class="col-xl-12  my-0 upload_docs px-0">
                                                                <div class="requied_sec_row">
                                                                    <div class="form-group">
                                                                        <div class="document">
                                                                            <label for="" class="font-weight-light">
                                                                                Valid driving license
                                                                                <a class="view-pdf"
                                                                                    href="{{ url($user->driver_license) }}"
                                                                                    data-toggle="modal"
                                                                                    data-target="#pdfModal"
                                                                                    data-url="{{ url($user->driver_license) }}">View</a>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($user->goods_in_transit_insurance != null)
                                                            <div class="col-xl-12  my-0 upload_docs px-0">
                                                                <div class="requied_sec_row">
                                                                    <div class="form-group">
                                                                        <div class="document">
                                                                            <label for="" class="font-weight-light">
                                                                                Goods in transit insurance
                                                                                <a class="view-pdf"
                                                                                    href="{{ url($user->goods_in_transit_insurance) }}"
                                                                                    data-toggle="modal"
                                                                                    data-target="#pdfModal"
                                                                                    data-url="{{ url($user->goods_in_transit_insurance) }}"
                                                                                    style="float:right">View</a>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xl-6 requied_sec verify_email_sec mb-0 pl-md-3  mt-3 pt-2">
                                                    <h2 class="uploaded-documents p-0 m-0">Verify email:</h2>
                                                    <p class="subtitle text-success message">Email verified</p>
                                                    <div class="upload-section ">
                                                        <div class="requied_sec_row w-100">
                                                            <div class="form-group">
                                                                <div class="document flex-row">
                                                                    <label for="email_verify"
                                                                        class="w-auto font-weight-light">
                                                                        Verify your email address
                                                                    </label>

                                                                    <span id=""
                                                                        style="cursor: pointer;">Verified</span>

                                                                    <div id="message" style="display: none;"></div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <h3 class="adjust-space-mobile-padding"><p>Company details</p>
                                        </h3>
                                        <div class="row align-items-end mx-4">
                                            <div class="col-lg-6 pr-lg-3">
                                                <div class="form-group">
                                                    <label for="" class="mb-1">GIT insurance cover</label>
                                                    <select class="form-control" name="git_insurance_cover" id="git_insurance_cover">
                                                        <option value="" disabled {{ old('git_insurance_cover', optional($companyDetail)->git_insurance_cover) == '' ? 'selected' : '' }}>Select git insurance cover</option>
                                                        @foreach ([10000, 20000, 30000, 40000, 50000, 60000, 70000, 80000, 90000, 100000, 200000, 300000, 400000, 500000, 600000, 700000, 800000, 900000] as $amount)
                                                            <option value="{{ number_format($amount) }}" {{ old('git_insurance_cover', optional($companyDetail)->git_insurance_cover) == number_format($amount) ? 'selected' : '' }}>
                                                                £{{ number_format($amount) }}
                                                            </option>
                                                        @endforeach
                                                        <option value="1,000,000+" {{ old('git_insurance_cover', optional($companyDetail)->git_insurance_cover) == '1,000,000+' ? 'selected' : '' }}>£1,000,000+</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="mb-1">Years established</label>
                                                    <select class="form-control" name="years_established" id="years_established">
                                                        <option value="" disabled {{ old('years_established', optional($companyDetail)->years_established) == '' ? 'selected' : '' }}>Years established</option>
                                                        @foreach (range(1, 9) as $year)
                                                            <option value="{{ $year }}" {{ old('years_established', optional($companyDetail)->years_established) == (string)$year ? 'selected' : '' }}>{{ $year }}</option>
                                                        @endforeach
                                                        <option value="10+" {{ old('years_established', optional($companyDetail)->years_established) == '10+' ? 'selected' : '' }}>10+</option>
                                                    </select>
                                                </div>
                                            </div>
                                        
                                            <div class="col-lg-6 pl-lg-3">
                                                <div class="form-group">
                                                    <label for="" class="mb-1">No of tow trucks</label>
                                                    <select class="form-control" name="no_of_tow_trucks" id="no_of_tow_trucks">
                                                        <option value="" disabled {{ old('no_of_tow_trucks', optional($companyDetail)->no_of_tow_trucks) == '' ? 'selected' : '' }}>Number of tow trucks</option>
                                                        @foreach (range(1, 9) as $number)
                                                            <option value="{{ $number }}" {{ old('no_of_tow_trucks', optional($companyDetail)->no_of_tow_trucks) == (string)$number ? 'selected' : '' }}>{{ $number }}</option>
                                                        @endforeach
                                                        <option value="10+" {{ old('no_of_tow_trucks', optional($companyDetail)->no_of_tow_trucks) == '10+' ? 'selected' : '' }}>10+</option>
                                                    </select>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="mb-1">No of drivers</label>
                                                    <select class="form-control" name="no_of_drivers" id="no_of_drivers">
                                                        <option value="" disabled {{ old('no_of_drivers', optional($companyDetail)->no_of_drivers) == '' ? 'selected' : '' }}>Number of drivers</option>
                                                        @foreach (range(1, 9) as $number)
                                                            <option value="{{ $number }}" {{ old('no_of_drivers', optional($companyDetail)->no_of_drivers) == (string)$number ? 'selected' : '' }}>{{ $number }}</option>
                                                        @endforeach
                                                        <option value="10+" {{ old('no_of_drivers', optional($companyDetail)->no_of_drivers) == '10+' ? 'selected' : '' }}>10+</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                       
                                        <h3 class="adjust-space-mobile-padding d-none d-lg-block">Account details</h3>
                                        <div class="row mx-4">
                                            <div class="col-lg-6 pr-lg-3 order-2 order-lg-1">
                                                <h3 class="adjust-space-mobile-padding d-lg-none px-3 mt-4">Account details</h3>
                                                <div class="form-group">
                                                    <label for="" class="mb-1">Name</label>
                                                    <input type="text" class="form-control sticky-data"
                                                        placeholder="Full name" name="name"
                                                        value="{{ $user->first_name }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="mb-1">Company name</label>
                                                    <input type="text" class="form-control" placeholder="Company name"
                                                        name="company_name" id="company_name"
                                                        value="{{ $user->name }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="" class="mb-1">Email address</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Email address" name="email" id="email_verify"
                                                        value="{{ $user->email }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 pl-lg-3 order-3 order-lg-2">
                                                <div class="form-group">
                                                    <label for="" class="mb-1">Username</label>
                                                    <input type="text" class="form-control sticky-data"
                                                        placeholder="Username" name="username"
                                                        value="{{ $user->username }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                   
                                                        <label for="" class="mb-1">Mobile phone</label>
                                                        <input type="tel" id="mobile" class="form-control"
                                                        placeholder="Mobile Phone" name="mobile"
                                                        value="{{ old('mobile', ($user->mobile ?? '')) ? '0' . ltrim(old('mobile', $user->mobile), '0') : '' }}" />
                                                 
                                                  
                                                </div>
                                                <div class="form-group" style="position: relative;">
                                                    <label for="npassword" class="mb-1">New password</label>
                                                    <input type="password" class="form-control" placeholder="New password" name="npassword" id="npassword">
                                                    
                                                    <!-- Toggle Password Icon -->
                                                    <span id="togglePassword" style="position: absolute; right: 10px; top: 35px; cursor: pointer;">
                                                        <i class="fas fa-eye" id="passwordIcon"></i>
                                                    </span>
                                                </div>
                                                
                                            </div>
                                            <div class="col-lg-6 pr-lg-3 order-4 order-lg-3 mt-3 mt-lg-0">
                                                <h5>Email notifications preferences:</h5>
                                                <ul class="wd-cstm-check">
                                                    <li>
                                                        <div class="form-group">
                                                            <input type="checkbox" id="check3"
                                                                data-email-type="outbid_email_unsubscribe"
                                                                {{ $user->outbid_email_unsubscribe == 1 ? 'checked' : '' }}>
                                                            <label for="check3"><span>Outbid Alerts</span></label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <input type="checkbox" id="check4"
                                                                data-email-type="summary_of_leads"
                                                                {{ $user->summary_of_leads == 1 ? 'checked' : '' }}>
                                                            <label for="check4"><span>Summary of leads</span></label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <input type="checkbox" id="check5"
                                                                data-email-type="saved_search_alerts"
                                                                {{ $user->job_email_preference == 1 ? 'checked' : '' }}>
                                                            <label for="check5"><span>Saved search alerts</span></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6 pl-lg-3 order-1 order-lg-4">
                                                <h5>Payment methods:</h5>
                                                @php
                                                    $payment_methods = $user->payment_methods
                                                        ? explode(',', $user->payment_methods)
                                                        : [];
                                                @endphp
                                                
                                                <ul class="wd-cstm-check">
                                                    <li>
                                                        <div class="form-group">
                                                            <input type="checkbox" id="payment1"
                                                                name="payment_methods[]" value="Cash"
                                                                {{ empty($payment_methods) || in_array('Cash', $payment_methods) ? 'checked' : '' }}>
                                                            <label for="payment1"></label>
                                                            <span>Cash</span>
                                                        </div>
                                                        
                                                    </li>


                                                    <li>
                                                        <div class="form-group">
                                                            <input type="checkbox" id="payment2"
                                                                name="payment_methods[]" value="Bank Transfer"
                                                                {{ empty($payment_methods) || in_array('Bank Transfer', $payment_methods) ? 'checked' : '' }}>
                                                            <label for="payment2"></label>
                                                            <span>Bank Transfer</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <input type="checkbox" id="payment3"
                                                                name="payment_methods[]" value="Visa Card"
                                                                {{ in_array('Visa Card', $payment_methods) ? 'checked' : '' }}>
                                                            <label for="payment3"></label>
                                                            <span> Card Payment</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="wd-save-btn">Save Changes</button>
                                        </div>
                                    </div>
                                </forphonem>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">Document</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe id="pdfIframe" style="width: 100%; height: 500px; border: none;"></iframe>
                    <img class="pdf_image" style="max-width:100%;">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- custome Jquery -->
    <script src="{{ asset('assets/web/js/admin.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
    <script>
        $('.view-pdf').on('click', function(e) {
            e.preventDefault();
            var pdfUrl = $(this).data('url');
            var isImage = /\.(jpg|jpeg|png|gif|bmp|svg)$/.test(pdfUrl.toLowerCase());
            if (isImage) {
                // If it's an image, set the src of the image element and show the image
                $('.pdf_image').attr('src', pdfUrl).show();
                $('#pdfIframe').hide(); // Hide the iframe if it was shown
            } else {
                // If it's not an image, load the URL in the iframe
                $('#pdfIframe').attr('src', pdfUrl).show();
                $('.pdf_image').hide(); // Hide the image element if it was shown
            }

        });

        document.addEventListener("DOMContentLoaded", function() {
            const passwordInput = document.getElementById("npassword");
            const passwordIcon = document.getElementById("passwordIcon");
            const togglePassword = document.getElementById("togglePassword");

            if (passwordIcon && togglePassword) {
                passwordIcon.addEventListener("click", togglePasswordVisibility);
                togglePassword.addEventListener("click", togglePasswordVisibility);
            }

            function togglePasswordVisibility(event) {
                event.preventDefault(); // Prevent anchor tag from following the href
                const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
                passwordInput.setAttribute("type", type);
                // Toggle the icon
                passwordIcon.classList.toggle("fa-eye");
                passwordIcon.classList.toggle("fa-eye-slash");
            }
        });

        $('#sendLinkBtn').on('click', function() {
            const email = $('#email_verify').val();
            // const email = "{{ config('constants.default.admin_email') }}";
            // const template = 'mail.General.transporter-email-verify';
            const user = {
                first_name: "{{ $user->first_name }}",
                name: "{{ $user->name }}",
                username: "{{ $user->username }}",
            };
            // alert('yesssss');
            $.ajax({
                url: "{{ route('sendVerifyEmail') }}",
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    email: email,
                    subject: 'Verify Your Email and Activate Your TransportAnyCar.com Account.',
                    user: user
                }),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // If you're using Laravel's CSRF protection
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Thank you.',
                        text: 'Please check your email inbox or spam folder and then verify your email address.',
                        confirmButtonText: 'Dismiss',
                        showCloseButton: true,
                        customClass: {
                            confirmButton: 'swal2-confirm'
                        },
                        //allowOutsideClick: false, // Prevent modal from closing when clicking outside
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                },
                error: function(xhr, status, error) {}
            });

        });

        const driver_license = document.getElementById('driver_license');
        //const motor_trade_insurance = document.getElementById('motor_trade_insurance');
        const goods_in_transit_insurance = document.getElementById('goods_in_transit_insurance');

        const previewPhoto = () => {
            const file = driver_license.files[0];
            $('#driver_license_success').addClass('d-none');
            if (file) {
                uploadDocuments(file, 'driver_license');
            }
        }

        const previewGoodPhoto = () => {
            const file = goods_in_transit_insurance.files[0];
            $('#goods_in_transit_insurance_success').addClass('d-none');
            if (file) {
                uploadDocuments(file, 'goods_in_transit_insurance');
            }
        }

        if (driver_license) {
            driver_license.addEventListener("change", previewPhoto);
        }

        if (goods_in_transit_insurance) {
            goods_in_transit_insurance.addEventListener("change", previewGoodPhoto);
        }
        // upload documents
        function uploadDocuments(docs, str = '') {
            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            if (str == 'goods_in_transit_insurance')
                formData.append("goods_in_transit_insurance", docs);
            else
                formData.append("driver_license", docs);
            $.ajax({
                url: "{{ route('transporter.update_profile_docs') }}",
                data: formData,
                processData: false,
                contentType: false,
                type: "POST",
                success: function(res) {
                    if (res.success == true) {
                        if (str == 'goods_in_transit_insurance') {
                            localStorage.setItem("goods_in_transit_insurance", true);
                            $('#goods_in_transit_insurance_success').removeClass('d-none');
                        } else {
                            localStorage.setItem("driver_license", true);
                            $('#driver_license_success').removeClass('d-none');
                        }
                        checkDocsUploaded();
                    }
                },
                error: function(data) {}
            });
        }
        var user_id = {{ $user->id }};

        function uploadImage(image) {
            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("image", image);
            $.ajax({
                url: "{{ route('transporter.update_profile_image') }}",
                data: formData,
                processData: false,
                contentType: false,
                type: "POST",
                success: function(res) {
                    Swal.fire({
                        title: 'Thank you.',
                        text: 'Profile image upload successfully',
                        confirmButtonText: 'Dismiss',
                        showCloseButton: true,
                        customClass: {
                            confirmButton: 'swal2-confirm'
                        },
                        //allowOutsideClick: false, // Prevent modal from closing when clicking outside
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                },
                error: function(data) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Something went wrong! please try again',
                        confirmButtonText: 'Dismiss',
                        showCloseButton: true,
                        customClass: {
                            confirmButton: 'swal2-confirm'
                        },
                        //allowOutsideClick: false, // Prevent modal from closing when clicking outside
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            });
        }

        $('.view-pdf').on('click', function(e) {
            e.preventDefault();
            var pdfUrl = $(this).attr('href');
            $('#pdfFrame').attr('src', pdfUrl);
        });

        function checkDocsUploaded() {
            var driver_license = localStorage.getItem("driver_license");
            var goods_in_transit_insurance = localStorage.getItem("goods_in_transit_insurance");
            if (driver_license && goods_in_transit_insurance) {
                sendEmail();
                Swal.fire({
                    title: 'Thank you.',
                    text: 'Your documents have been uploaded successfully, we will review your documents and send you an email with an account status update.',
                    confirmButtonText: 'Dismiss',
                    //showCloseButton: true,
                    customClass: {
                        confirmButton: 'swal2-confirm'
                    },
                    allowOutsideClick: false, // Prevent modal from closing when clicking outside
                }).then((result) => {
                    if (result.isConfirmed) {
                        localStorage.removeItem("driver_license");
                        localStorage.removeItem("goods_in_transit_insurance");
                        location.reload();
                    }
                });
            }

        }

        function sendEmail() {
            const email = "{{ config('constants.default.admin_email') }}";
            const template = 'mail.General.transporter-upload-documents';
            const user = {
                first_name: "{{ $user->first_name }}",
                name: "{{ $user->name }}",
                username: "{{ $user->username }}",
            };

            $.ajax({
                url: "{{ route('send-email') }}",
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    email: email,
                    template: template,
                    subject: 'Verify Transporter Documents',
                    user: user
                }),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // If you're using Laravel's CSRF protection
                },
                success: function(response) {
                    console.log('Email sent successfully.')
                },
                error: function(xhr, status, error) {}
            });
        }
        // upload image
        $(document).ready(function() {
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.profile-pic').attr('src', e.target.result);
                        uploadImage(e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".file-upload").on('change', function() {
                readURL(this);
            });

            $(".upload-button").on('click', function() {
                $(".file-upload").click();
            });
            // Show SweetAlert popup if session variable is set
            @if (session('show_transporter_alert'))
                Swal.fire({
                    title: '<span class="swal-title">Important notice</span>',
                    html: '<span class="swal-text">Do not use company names or share contact information, we will provide you with the customer contact details after they have accepted your bid. If you are found attempting to operate outside of this platform then you will be banned immediately.</span>',
                    confirmButtonColor: '#52D017',
                    confirmButtonText: 'OK, got it',
                    customClass: {
                        title: 'swal-title',
                        htmlContainer: 'swal-text-container',
                        popup: 'swal-popup', // Add custom class for the popup
                    },
                    showConfirmButton: true, // Show the confirm button
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        @php session()->forget('show_transporter_alert'); @endphp
                    }
                });
            @endif

            $('#check2, #check3, #check4, #check5').change(function() {

                updateEmailPrefrence.call(this); // Use .call to set the correct context
            });

            $('body').addClass('account-scroll');

            $('.info-popup').on('click', function(e) {
                e.stopPropagation();
                var $infoSecDetails = $('.info_sec_details');
                var $this = $(this);
                $this.toggleClass('active');
                if ($this.hasClass('active')) {
                    $infoSecDetails.show();
                } else {
                    $infoSecDetails.hide();
                }
            });
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.info-popup').length) {
                    $('.info-popup').removeClass('active');
                    $('.info_sec_details').hide();
                }
            });

        });

        function updateEmailPrefrence() {
        // alert('yeeeeeeeeeeeeeee');
            var isChecked = $(this).is(':checked');
            var emailType = $(this).data('email-type');
            var value = isChecked ? 1 : 0; // Set value based on the checkbox state
            $.ajax({
                url: '{{ route('transporter.update_email_preference') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    email_type: emailType,
                    value: value
                },
                success: function(response) {
                    // Swal.fire({
                    //     title: 'Verification email sent.',
                    //     text: 'Please check your email inbox or spam folder and then verify your email address !',
                    //     confirmButtonText: 'Dismiss',
                    //     showCloseButton: true,
                    // })
                },
                error: function(xhr) {
                    // Swal.fire({
                    //     title: 'Error',
                    //     text: 'An error occurred while updating your preference.',
                    //     confirmButtonText: 'Dismiss',
                    //     showCloseButton: true,
                    // })
                }
            });
        }

        $(function() {
            jQuery.validator.addMethod("validateEmail", function(value, element) {
                var atPos = value.indexOf("@");
                var dotPos = value.lastIndexOf(".");
                return atPos > 0 && dotPos > atPos + 1 && dotPos < value.length - 1;
            }, "Please enter valid email address");

            let phone = $('#phone').val();

            $('#form_account').validate({
                rules: {
                    address: {
                        required: true
                    },
                    mobile: {
                        required: true,
                        digits: true,
                        minlength: 11,
                        maxlength: 12,
                        remote: {
                            type: 'get',
                            url: "{{ route('front.user_availability_checker') }}",
                            data: {
                                id: function() {
                                    return user_id;
                                },
                                country_code: function() {
                                    return $('#country_code').val();
                                },
                                number: function() {
                                    return $('#phone').val();
                                }
                            },
                             complete: function(response) {
                              console.log("Remote validation response:", response.responseText); // Logs the server response
                            }
                        },
                    },
                    email: {
                        required: true,
                        maxlength: 50,
                        validateEmail: true,
                        remote: {
                            type: 'get',
                            url: "{{ route('front.user_availability_checker') }}",
                            data: {
                                id: function() {
                                    return user_id;
                                }
                            }
                        },
                    },
                    // opassword: {
                    //     remote: {
                    //         url: "{{ route('front.check_old_password') }}",
                    //         type: 'get',
                    //         data: {
                    //             opassword: function () {
                    //                 return $("#opassword").val();
                    //             }
                    //         }
                    //     }
                    // },
                    npassword: {
                        // required: true,
                        minlength: 6,
                        remote: {
                            url: "{{ route('front.check_new_password') }}",
                            type: 'get',
                            data: {
                                npassword: function() {
                                    return $("#npassword").val();
                                },
                                page_type: function() {
                                    return 'transporter'; // Assuming you have an input field with id="page_type"
                                }
                            }
                        }
                    },
                    // cpassword: {
                    //     required: true,
                    //     minlength: 6,
                    //     equalTo: "#npassword"
                    // },
                },
                messages: {
                    //address: {required: 'Please enter address'},
                    email: {
                        required: 'Please enter email',
                        remote: "This email is already taken"
                    },
                    mobile: {
                        required: 'Please enter mobile',
                        remote: "This number is already taken",
                        maxlength: "Please enter a valid mobile number",
                        minlength:"Please enter a valid mobile number"
                    },
                    // opassword: {
                    //     required: 'Old password is required',
                    //     remote: "Old password dose not match"
                    // },
                    npassword: {
                        required: 'New password is required',
                        remote: "This password already used. Try another password"
                    },
                    // cpassword: {
                    //     required: 'Confirm password is required',
                    //     equalTo: "Password and confirm password must match"
                    // },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "mobile") {
                        error.insertAfter($(element).parent());
                    } else {
                        error.insertAfter($(element));
                    }
                },
                submitHandler: function(form) {
                    // addOverlay();
                    form.submit();
                }
            });
        });
        document.getElementById("togglePassword").addEventListener("click", function() {
    const passwordInput = document.getElementById("npassword");
    const passwordIcon = document.getElementById("passwordIcon");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordIcon.classList.remove("fa-eye");
        passwordIcon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        passwordIcon.classList.remove("fa-eye-slash");
        passwordIcon.classList.add("fa-eye");
    }
});
    </script
@endsection
