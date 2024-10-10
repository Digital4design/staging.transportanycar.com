@extends('layouts.transporter.dashboard.app')

@section('head_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/web/vendors/owl.carousel/css/owl.carousel.min.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .deshbord-job-listing {
            padding: 0px 20px 0;
            box-shadow: 0px 0px 4px 0px #00000040;
            margin: 0px 0px 20px 0px;
            /* margin: 0px -15px 20px -15px; */
            border-radius: 10px;
        }

        .tab-content .deshbord-job-listing li {
            box-shadow: none !important;
        }

        .deshbord-job-listing .bidding_new_design {
            padding: 0 0px 20px;
        }

        ul.pagination li {
            padding: 0 !important;
            border: none !important;
            box-shadow: none !important;
            margin: 0 !important;
        }

        .admin_job_bx .tab-content ul li a {
            display: flex;
            grid-gap: 30px;
            color: #fff;
            top: -20px;
        }

        #main_form .modal-body .form-group {
            margin-bottom: 1.5rem;
        }

        #main_form .modal-body .icon_includes {
            height: 49px;
        }

        #main_form .modal-body .icon_includes~.form-control {
            height: 49px;
        }

        #main_form .modal-body span#quote_amount-error {
            position: absolute;
            left: 0;
            padding-left: 0;
        }

        .admin_job_bx .view_btn:hover {
            background: #52D017;
        }

        .job_list_desh_mobile .list_img {
            width: 7.8%;
        }

        .job_list_desh_mobile .list_detail {
            width: 13%;
        }

        /* 17-08-2024 */
        .modal_current {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: -5px;
        }

        .modal_current p {
            margin: 0;
            font-weight: normal;
            font-size: 13px;
            color: #000000d6;
        }

        .modal_current p span {
            color: #52D017;
        }

        .modal_current p span.red {
            color: #0356D6;
        }

        /* 28-08-2024 */

        .edit_budding_sec {
            display: flex;
            flex-wrap: wrap;
            border-radius: .25rem;
            position: relative;
        }

        #main_form .modal-body .edit_budding_sec .icon_includes {
            position: inherit;
        }

        #main_form .modal-body .edit_budding_sec .icon_includes~.form-control {
            width: calc(100% - 45px);
            padding: 15px 10px 15px 15px !important;
            font-size: 1rem;
            border-radius: 0;
            border-top-right-radius: .25rem;
            border-bottom-right-radius: .25rem;
        }

        .edit_border {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25);
        }

        #main_form .modal-body .edit_budding_sec .icon_includes~.form-control:focus {
            outline: none;
            box-shadow: none;
            border-color: #ced4da;
        }

        #main_form .modal-body .edit_budding_sec span#quote_amount-error {
            top: 100%;
        }

        .admin_job_bx .tab-content .deshbord-job-listing .list_img img {
            width: 100%;
        }

        .my_job_pagination .pagination a.page-link {
            top: 0px;
            color: #484848;
        }

        .my_job_space {
            padding-bottom: 0px;
        }

        .job-data span {
            color: #9C9C9C;
            font-size: 15px;
        }

        .job-data {
            margin-left: 0px;
            margin-bottom: 8px;
        }

        .admin_job_bx .view_btn {
            padding: 6px 15px;
            font-size: 12px;
            border-radius: 7px;
            white-space: nowrap;
        }


        .admin_job_bx .tab-content ul .job_list_desh_mobile li {
            padding: 10px 0px 0 !important;
        }




        @media screen and (min-device-width: 1400px) and (max-device-width: 1600px) {
            .admin_job_bx .tab-content .deshbord-job-listing .list_img img {
                width: 100%;
                height: 66px;
            }

            .job_list_desh_mobile .list_img span {
                font-size: 8px;
            }

        }

        @media(max-width: 1400px) {
            .job_list_desh_mobile .list_img {
                width: 12.5%;
            }

            .admin_job_bx .tab-content ul .deshbord-job-listing.job_list_desh_mobile li {
                margin-bottom: 10px;
            }

            .admin_job_bx .tab-content ul li .list_detail p,
            .admin_job_bx .tab-content ul li .list_detail p b {
                font-size: 14px;
            }
        }

        @media (max-width: 1280px) {
            .admin_job_bx .tab-content ul li {
                overflow: unset !important;
                flex-wrap: wrap;
            }

            .job_list_desh_mobile .list_img {
                width: 15%;
            }

            .job_list_desh_mobile .list_detail {
                width: 17%;
            }

            .deshbord-job-listing .bidding_new_design {
                flex-wrap: wrap;
            }

            .deshbord-job-listing .bidding_new_design .bidding_new_design_grid {
                width: 50%;
            }
        }


        /* @media(max-width: 767px) {
            .deshbord-job-listing {border-radius: 0!important; margin-bottom: 10px!important;}
        } */
        @media(max-width: 580px) {
            .new_job_list_mobile {
                width: 100%;
            }

            .deshbord-job-listing.job_list_desh_mobile {
                border-radius: 10px;
                padding: 5px 10px 10px;
                margin-bottom: 20px;
            }

            .new_job_list_mobile .deshbord-job-listing.job_list_desh_mobile li {
                display: flex;
                overflow: hidden;
                clear: both;
                justify-content: space-between;
                flex-wrap: wrap;
                gap: 0px;
                padding: 10px;
                align-items: self-start;
                position: relative;
                row-gap: 32px;
            }

            .job_list_desh_mobile .list_img {
                width: 36%;
                order: 1;
                /* width: 92px;
                max-width: 92px;
                min-height: 57px;
                max-height: 57px; */
                /* margin: auto; */
            }

            .job_list_desh_mobile .list_detail {
                width: 46%;
                order: 3;
            }

            .new_job_list_mobile .deshbord-job-listing.job_list_desh_mobile li .list_img img {
                width: 100%;
                height: auto;
                /* width: 92px;
                max-width: 92px;
                min-height: 57px;
                max-height: 57px; */
            }

            .new_job_list_mobile .deshbord-job-listing.job_list_desh_mobile li .list_img p {
                top: 50%;
                transform: translateY(-50%);
            }

            .job_list_desh_mobile .won_details {
                order: 2;
                width: 55%;
                display: flex;
            }

            .job_list_desh_mobile .won_details a.view_btn {
                width: 130px;
                text-align: center;
                justify-content: center;
            }

            .job_list_desh_mobile .won_message {
                position: absolute;
                right: auto;
                top: 60px;
                width: 35% !important;
                left: 45%;
            }

            .job_list_desh_mobile .won_message a {
                justify-content: center;
                width: 130px;
            }

            a.delete_btn_mobile {
                position: absolute;
                right: 0;
            }

            a.view_btn.cancel_btn_mobile {
                order: 2;
                opacity: 0;
            }

            .admin_job_bx .tab-content ul .deshbord-job-listing.job_list_desh_mobile li {
                padding: 10px 10px 0;
                margin-bottom: 0;
                overflow: unset;
            }

            .job_list_desh_mobile .list_img span {
                color: #9C9C9C;
                font-size: 12px;
            }

            /* 17-08-2024 */

            .admin_job_bx .tab-content ul .deshbord-job-listing.job_list_desh_mobile li p {
                font-weight: 300;
                color: #000000ba;
                margin-bottom: 0;
                top: 29px;
            }

        }
    </style>
@endsection

@section('content')
    <div id="wrapper">
        <!-- SIDEBAR -->
        @include('layouts.transporter.dashboard.sidebar')
        <div id="page-content-wrapper">
            @include('layouts.transporter.dashboard.top_head')
            <!-- content part -->
            <div class="content_container my_job_space">
                <div class="banner" id="spam-banner" style="display:none">
                    <h2 class="spam-title">Check your spam.</h2>
                    <p>Please check your spam or junk folder and mark email as ‘not spam’ so that you don’t miss out on any
                        important email notifications. You can unsubscribe from job alert emails at any time within your
                        profile.</p>
                    <button onclick="hideBanner()" class="btn btn-success">Ok, got it</button>
                </div>
                <div class="job_container">
                    <div class="admin_job_bx my_job_pagination" id="style-1">
                        <div class="admin_job_top">
                            <h3>My jobs</h3>
                            <form id="searchForm">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="search" placeholder="Search jobs">
                                    <button class="search_btn">
                                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1 7.6448C0.999557 4.71363 3.06975 2.19034 5.94452 1.6181C8.81929 1.04585 11.698 2.58403 12.82 5.29194C13.9421 7.99984 12.995 11.1233 10.558 12.752C8.12104 14.3808 4.87287 14.0612 2.8 11.9888C1.64763 10.8368 1.00014 9.27422 1 7.6448Z"
                                                stroke="#F9FFF1" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M11.4893 11.9897L15.0003 15.5007" stroke="#F9FFF1" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Search
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="nav nav-pills">
                            <a class="nav-link active job_type" data-toggle="pill" href="#won" data-type="won"
                                role="tab" aria-controls="pills-won" aria-selected="true">Won</a>
                            <a class="nav-link job_type" data-toggle="pill" href="#bidding" data-type="bidding"
                                role="tab" aria-controls="pills-bidding" aria-selected="false">Bidding</a>
                            <a class="nav-link job_type" data-toggle="pill" href="#cancel" data-type="cancel" role="tab"
                                aria-controls="pills-cancel" aria-selected="false">Cancelled</a>
                        </div>
                        <div class="tab-content new_job_list_mobile">
                            <div class="tab-pane fade show active" id="won" role="tabpanel" aria-labelledby="won-tab">
                                <ul id="idWonLoadData">
                                    {{--                                    <li> --}}
                                    {{--                                        <div class="list_img"> --}}
                                    {{--                                            <img src="{{asset('assets/web/images/dashboard/1.png')}}"> --}}
                                    {{--                                            <p>£267</p> --}}
                                    {{--                                        </div> --}}
                                    {{--                                        <div class="list_detail"> --}}
                                    {{--                      <span> --}}
                                    {{--                        <img src="{{asset('assets/web/images/dashboard/car-icon.svg')}}" alt="Car Icon"> --}}
                                    {{--                      </span> --}}
                                    {{--                                            <p>Make & model:</p> --}}
                                    {{--                                            <p><b>BMW 1 Series</b></p> --}}
                                    {{--                                        </div> --}}
                                    {{--                                        <div class="list_detail"> --}}
                                    {{--                      <span> --}}
                                    {{--                        <img src="{{asset('assets/web/images/dashboard/map-icon.svg')}}" alt="Map Icon"> --}}
                                    {{--                      </span> --}}
                                    {{--                                            <p>Pick-up postcode:</p> --}}
                                    {{--                                            <p><b>CM13 4UP</b></p> --}}
                                    {{--                                        </div> --}}
                                    {{--                                        <div class="list_detail"> --}}
                                    {{--                      <span> --}}
                                    {{--                        <img src="{{asset('assets/web/images/dashboard/red-map-icon.svg')}}" alt="Map Icon"> --}}
                                    {{--                      </span> --}}
                                    {{--                                            <p>Drop-off postcode:</p> --}}
                                    {{--                                            <p><b>NW1 5TU</b></p> --}}
                                    {{--                                        </div> --}}
                                    {{--                                        <div class="list_detail"> --}}
                                    {{--                      <span> --}}
                                    {{--                        <img src="{{asset('assets/web/images/dashboard/calendar.svg')}}" alt="calendar Icon"> --}}
                                    {{--                      </span> --}}
                                    {{--                                            <p>Delivery date:</p> --}}
                                    {{--                                            <p><b>8th Jan 2024</b></p> --}}
                                    {{--                                        </div> --}}
                                    {{--                                        <a href="javascript:;" class="view_btn"> View details </a> --}}
                                    {{--                                    </li> --}}
                                </ul>
                            </div>
                            <!-- bidding -->
                            <div class="tab-pane fade" id="bidding" role="tabpanel" aria-labelledby="bidding-tab">
                                <ul id="idBidingLoadData">
                                    {{--                                    <li> --}}
                                    {{--                                        <div class="list_img"> --}}
                                    {{--                                            <img src="{{asset('assets/web/images/dashboard/1.png')}}"> --}}
                                    {{--                                            <p>£267</p> --}}
                                    {{--                                        </div> --}}
                                    {{--                                        <div class="list_detail"> --}}
                                    {{--                                          <span> --}}
                                    {{--                                            <img src="{{asset('assets/web/images/dashboard/car-icon.svg')}}" alt="Car Icon"> --}}
                                    {{--                                          </span> --}}
                                    {{--                                            <p>Make & model:</p> --}}
                                    {{--                                            <p><b>BMW 1 Series</b></p> --}}
                                    {{--                                        </div> --}}
                                    {{--                                        <div class="list_detail"> --}}
                                    {{--                                              <span> --}}
                                    {{--                                                <img src="{{asset('assets/web/images/dashboard/map-icon.svg')}}" alt="Map Icon"> --}}
                                    {{--                                              </span> --}}
                                    {{--                                            <p>Pick-up postcode:</p> --}}
                                    {{--                                            <p><b>CM13 4UP</b></p> --}}
                                    {{--                                        </div> --}}
                                    {{--                                        <div class="list_detail"> --}}
                                    {{--                                          <span> --}}
                                    {{--                                            <img src="{{asset('assets/web/images/dashboard/red-map-icon.svg')}}" alt="Map Icon"> --}}
                                    {{--                                          </span> --}}
                                    {{--                                            <p>Drop-off postcode:</p> --}}
                                    {{--                                            <p><b>NW1 5TU</b></p> --}}
                                    {{--                                        </div> --}}
                                    {{--                                        <div class="list_detail"> --}}
                                    {{--                                          <span> --}}
                                    {{--                                            <img src="{{asset('assets/web/images/dashboard/calendar.svg')}}" alt="calendar Icon"> --}}
                                    {{--                                          </span> --}}
                                    {{--                                            <p>Delivery date:</p> --}}
                                    {{--                                            <p><b>8th Jan 2024</b></p> --}}
                                    {{--                                        </div> --}}
                                    {{--                                        <a href="javascript:;" class="view_btn"> Edit Quote </a> --}}
                                    {{--                                    </li> --}}
                                </ul>
                            </div>
                            <!-- cancel -->
                            <div class="tab-pane fade" id="cancel" role="tabpanel" aria-labelledby="cancel-tab">
                                <ul id="idCancelLoadData">
                                    {{--                                    <li> --}}
                                    {{--                                        <div class="list_img"> --}}
                                    {{--                                            <img src="{{asset('assets/web/images/dashboard/1.png')}}"> --}}
                                    {{--                                            <p>£267</p> --}}
                                    {{--                                        </div> --}}
                                    {{--                                        <div class="list_detail"> --}}
                                    {{--                                              <span> --}}
                                    {{--                                                <img src="{{asset('assets/web/images/dashboard/car-icon.svg')}}" alt="Car Icon"> --}}
                                    {{--                                              </span> --}}
                                    {{--                                            <p>Make & model:</p> --}}
                                    {{--                                            <p><b>BMW 1 Series</b></p> --}}
                                    {{--                                        </div> --}}
                                    {{--                                        <div class="list_detail"> --}}
                                    {{--                                              <span> --}}
                                    {{--                                                <img src="{{asset('assets/web/images/dashboard/map-icon.svg')}}" alt="Map Icon"> --}}
                                    {{--                                              </span> --}}
                                    {{--                                            <p>Pick-up postcode:</p> --}}
                                    {{--                                            <p><b>CM13 4UP</b></p> --}}
                                    {{--                                        </div> --}}
                                    {{--                                        <div class="list_detail"> --}}
                                    {{--                                              <span> --}}
                                    {{--                                                <img src="{{asset('assets/web/images/dashboard/red-map-icon.svg')}}" alt="Map Icon"> --}}
                                    {{--                                              </span> --}}
                                    {{--                                            <p>Drop-off postcode:</p> --}}
                                    {{--                                            <p><b>NW1 5TU</b></p> --}}
                                    {{--                                        </div> --}}
                                    {{--                                        <div class="list_detail"> --}}
                                    {{--                                              <span> --}}
                                    {{--                                                <img src="{{asset('assets/web/images/dashboard/calendar.svg')}}" alt="calendar Icon"> --}}
                                    {{--                                              </span> --}}
                                    {{--                                            <p>Delivery date:</p> --}}
                                    {{--                                            <p><b>8th Jan 2024</b></p> --}}
                                    {{--                                        </div> --}}
                                    {{--                                        <a href="javascript:;" class="view_btn"> View details </a> --}}
                                    {{--                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="idType" value="" />

    <div class="modal get_quote fade" id="quote" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit bid</h5>
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
                <form id="main_form" method="post" action="{{ route('transporter.edit_quote_amount') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="edit_budding_sec">
                                <span class="icon_includes">£</span>
                                <input type="number" class="form-control" id="quote_amount"
                                    placeholder="Enter your bid" aria-describedby="emailHelp"
                                    placeholder="Enter quote amount" name="amount" pattern="\d*">
                            </div>
                        </div>
                        <div class="modal_current">
                            <p>Current lowest bid: <span class="lowAmount">£0</span></p>
                            <p>Transporters bidding: <span class="red bidCount">0</span></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="quote_id" id="quote_id" value="">
                        <button type="submit" class="submit_btn">Submit bid</button>
                    </div>
                </form>
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
                url: globalSiteUrl + "/transporter/my_job?page=" + page + '&' + params(),
                success: function(res) {
                    let result = res.data;
                    if (result.type == 'won') {
                        $('#idWonLoadData').html(result.html);
                    }
                    if (result.type == 'bidding') {
                        $('#idBidingLoadData').html(result.html);
                    }
                    if (result.type == 'cancel') {
                        $('#idCancelLoadData').html(result.html);
                    }
                }
            });
        }

        function params() {
            var search = $('#search').val();
            var type = $('#idType').val();
            return "search=" + search + "&type=" + type;
        }

        $(document).ready(function() {
            var type = $('.job_type').data('type');
            $('#idType').val(type);

            $('.job_type').on('click', function() {
                var type = $(this).data('type');
                $('#idType').val(type);
                $('#search').val('');
                fetch_data(1);
            });

            fetch_data(1);
        });

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('#page').val(page);
            fetch_data(page);
        });

        $(document).on('submit', '#searchForm', function(event) {
            event.preventDefault();
            fetch_data(1);
        });

        $('#search').on('input', function() {
            var search = $(this).val();
            if (search === '') {
                fetch_data(1);
            }
        });
        $.validator.addMethod("noPhoneOrEmail", function(value, element) {
            var contains_email = /\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b/i.test(value);
            var contains_six_or_more_digits = value.replace(/\s+/g, '').match(/\d{7,}/);
            return !(contains_email || contains_six_or_more_digits);
        });
        $.validator.addMethod("greaterThanZero", function(value, element) {
            return this.optional(element) || parseFloat(value) > 0;
        }, "You must enter an amount greater than zero");
        $("#main_form").validate({
            rules: {
                amount: {
                    required: true,
                    greaterThanZero: true,
                    noPhoneOrEmail: true,
                },
            },
            messages: {
                amount: {
                    required: 'Please enter amount',
                    noPhoneOrEmail: `Do not share contact information or you will be banned.`,
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.insertAfter($(element));
            },
            submitHandler: function(form) {
                var formData = $(form).serialize();
                $('.submit_btn').prop('disabled', true).text('Submitting...');
                $.ajax({
                    url: $(form).attr('action'),
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if (response.status) {
                            Swal.fire({
                                title: '<span class="swal-title">Bid updated</span>',
                                html: '<span class="swal-text">Your bid has been updated successfully.</span>',
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
                                    localStorage.setItem('activateBiddingTab', 'true');
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                html: '<span class="swal-text">' + response.message +
                                    '</span>',
                                confirmButtonColor: '#52D017',
                                confirmButtonText: 'Dismiss',
                                customClass: {
                                    title: 'swal-title',
                                    htmlContainer: 'swal-text-container',
                                    popup: 'swal-popup',
                                    cancelButton: 'swal-button--cancel'
                                },
                                showCloseButton: true,
                                showConfirmButton: true,
                                allowOutsideClick: false
                            });
                            $('.submit_btn').prop('disabled', false).text('Submit');
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Error',
                            text: 'Something went wrong. Please try again.',
                            confirmButtonColor: '#52D017',
                            confirmButtonText: 'Dismiss',
                            customClass: {
                                title: 'swal-title',
                                htmlContainer: 'swal-text-container',
                                popup: 'swal-popup',
                                cancelButton: 'swal-button--cancel'
                            },
                            showCloseButton: true,
                            showConfirmButton: true,
                            allowOutsideClick: false
                        });
                        $('.submit_btn').prop('disabled', false).text('Submit');
                    }
                });

                return false; // Prevent form submission
            }
        });

        function edit_quote_amount(element, id) {
            var amount = $(element).data('amount');
            var lowestBid = $(element).data('lowbid');
            var bidCount = $(element).data('bidcount');
            $('.lowAmount').text('£' + lowestBid);
            $('.bidCount').text(bidCount);
            //$('#quote_amount').val(amount);
            $('#quote_id').val(id);
            $('#quote').modal('show');
        }

        // Activate Bidding tab if required
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const source = urlParams.get('source');
            const quoteId = urlParams.get('quote-id');
            if ((source === 'email' || source === 'notification') && quoteId) {
                localStorage.setItem('activateBiddingTab', 'true');
                setTimeout(function() {
                    const elementId = `#edit_quote_${quoteId}`;
                    const scrollElementId = `#edit_bid_${quoteId}`;
                    const $scrollElement = $(scrollElementId);
                    if ($(elementId).length) {
                        $(elementId).trigger('click');
                        $('html, body').animate({
                            scrollTop: $scrollElement.offset().top - 100
                        }, 500); // Adjust duration as needed
                    }
                }, 1100); // Adjust delay as needed
                if (history.pushState) {
                    const cleanUrl = window.location.protocol + "//" + window.location.host + window.location
                        .pathname;
                    window.history.pushState({
                        path: cleanUrl
                    }, '', cleanUrl);
                }
            }
            if (localStorage.getItem('activateBiddingTab') === 'true') {
                $('a[data-toggle="pill"]').removeClass('active');
                $('#bidding').addClass('show active');
                $('#won').removeClass('show active');
                $('a[href="#bidding"]').addClass('active');
                $('a[href="#bidding"]').addClass('active').trigger('click');
                localStorage.removeItem('activateBiddingTab');
            }

            $('#quote_amount').focus(function() {
                $(this).closest('.edit_budding_sec').addClass('edit_border');
            }).blur(function() {
                $(this).closest('.edit_budding_sec').removeClass('edit_border');
            });
            $('body').addClass('account-scroll');
            $('a[href="#bidding"]').trigger('click');
        });

        function quoteChangeStatus(quote_id, status) {
            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("quote_id", quote_id);
            formData.append("status", status);
            $.ajax({
                url: "{{ route('transporter.quote_change_status') }}",
                data: formData,
                processData: false,
                contentType: false,
                type: "POST",
                success: function(res) {
                    if (res.success == true) {
                        window.location.reload();
                        localStorage.setItem('activateBiddingTab', 'true');
                    } else {

                    }
                },
                error: function(data) {}
            });
        }
    </script>
@endsection
