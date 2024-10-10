@extends('layouts.web.dashboard.app')

@section('head_css')
@endsection
<style>
    .wd_leave_bx {
        padding:0!important;
        box-shadow: none!important;
        background: transparent!important;
        border: none!important;
    }
    .leave_inner h2 {
        font-size: 16px !important;
    }

    .leave_img img {
        object-fit: cover;
    }

    .feedback-error {
        color: red !important;
        font-size: 12px !important;
        margin-top: -22px;
        font-family: auto !important;
    }

    .verified_btns {
        font-size: 12px;
        font-weight: 500;
        color: #52D017;
    }

    .leave_inner_img::after {
        display: none;
    }

    .quote-accepted {
        font-size: 14px !important;
        color: #000000;
    }

    ul.lve_rate li {
        gap: 10px;
        margin-bottom: 0 !important;
    }

    ul.lve_rate li h5 {
        font-weight: 500;
        font-size: 16px;
        color: #000000;
    }

    .leave_inner .form-group label {
        font-size: 16px !important;
    }

    .leave_inner .form-group textarea {
        border: 1px solid #D9D9D9 !important;
        padding: 5px 10px !important;
        font-size: 14px;
        font-weight: 300;
        color: #C3C3C3;
    }

    button.lve_feed_btn {
        font-size: 14px;
        padding: 7px 60px !important;
    }

    .leave_txt h4 {
        color: #000000 !important;
    }

    .leave_rating {
        font-size: 12px !important;
        margin-bottom: 5px !important;
    }

    .lve_rate li {
        justify-content: flex-start !important;
    }

    ul.lve_rate li .starrating svg {
        width: 23px;
    }

    .lve_rate li .starrating label {
        margin-bottom: 2px !important;
    }

    ul.lve_rate li .starrating {
        gap: 2px;
        padding-right: 0 !important;
    }

    @media(max-width: 580px) {


        .user_feedback .wd_leave_bx {
            border: none;
            background: #fff;
            box-shadow: none;
            padding: 0;
        }

        .leave_body {
            padding: 20px !important;
            border-top: 0 !important;
        }

        .leave_rgt {
            width: 64%;
            justify-content: flex-end;
        }

        /* .leave_txt h4 {
            font-size: 18px !important;
            color: #000000 !important;
        } */



        .leave_body .leave_tabs span {
            font-size: 16px;
            margin-bottom: 15px;
            color: #606060;
        }

        .leave_body .leave_tabs p {
            font-size: 16px;
            line-height: 25px;
            color: #606060;
        }

        /* .leave_tabs {
            padding-top: 15px;
        } */

        .leave_tabs ul.nav li.nav-item {
            width: 100%;
        }

        .leave_tabs ul.nav li.nav-item a.nav-link {
            margin-bottom: 0;
        }




        /* ul.lve_rate li h5 {
            font-size: 16px;
            color: #000000;
        } */

        ul.lve_rate .starrating span {
            font-size: 16px;
        }

        /* ul.lve_rate li {
            margin-bottom: 4px;
        } */

        .leave_tabs ul.nav {
            margin-bottom: 30px;
        }

        .leave_inner .form-group label {
            font-size: 18px !important;
            font-weight: 600 !important;
            color: #383838 !important;
            margin-bottom: 10px !important;
        }

        /* .leave_inner .form-group textarea {
            border: 2px solid #CFCFCF !important;
            height: auto !important;
            padding: 7px !important;
        } */

        .leave_inner .form-group {
            margin-top: 12px;
        }

        .leave_tabs .nav-pills .nav-item:nth-child(2) .nav-link.active {
            border-color: #3d3d3d;
            color: #3d3d3d;
            background: #c5c5c5bf;
        }

        .leave_tabs .nav-pills .nav-item:nth-child(3) .nav-link.active {
            border-color: #ea0000;
            color: #ea0000;
            background: #fa60604d;
        }

        button.lve_feed_btn {
            display: block;
            margin: auto;
        }

        .user_feedback {
            padding-top: 20px !important;
        }

    }
</style>
@section('content')
    @include('layouts.web.dashboard.header')
    <section class="user_feedback">
        <div class="container">
            <div class="wd_leave_bx">
                <form id="ratingForm" action="javescript:void(0)" class="leave_inner">
                    @csrf
                    <input type="hidden" id="quote_by_transporter_id" name="quote_by_transporter_id"
                        value="{{ $data->id }}">
                    <h2>Leave feedback</h2>
                    <div class="leave_body">
                        <h3>{{ $quote_info->vehicle_make }} {{ $quote_info->vehicle_model }}
                            @if (!is_null($quote_info->vehicle_make_1) && !is_null($quote_info->vehicle_model_1))
                                / {{ $quote_info->vehicle_make_1 }} {{ $quote_info->vehicle_model_1 }}
                            @endif
                        </h3>
                        <div class="leave_header">
                            <div class="leave_img">
                                @php
                                    $image = $quote_info->image;
                                    $defaultImage = asset('uploads/no_car_image.png');
                                    $noQuoteImage = asset('uploads/no_quote.png');

                                    if (is_null($image) || $image == $noQuoteImage) {
                                        $image = $defaultImage;
                                    }
                                @endphp
                                <img src="{{ $image }}" class="img-fluid" alt="book delivery">
                            </div>
                            <div class="leave_rgt">
                                <div class="leave_inner_img">
                                    @if ( $transporter_detail->profile_image)
                                    <img src="{{ $transporter_detail->profile_image }}">
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="#5B5B5B" class="size-6" width="43" height="43">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                   @endif 
                                </div>
                                <div class="leave_txt">
                                    <h4>{{ $transporter_detail->username }} <img
                                            src="{{ asset('/assets/images/user-verified.png') }}" width="18"
                                            height="18" alt="" class="ml-1" /></h4>
                                    <div class="leave_rating">
                                        <span>
                                            <svg width="13" height="13" viewBox="0 0 10 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.92593 0L6.03186 3.40373H9.61076L6.71537 5.50735L7.82131 8.91108L4.92593 6.80746L2.03054 8.91108L3.13648 5.50735L0.241092 3.40373H3.81999L4.92593 0Z"
                                                    fill="#FFA800" />
                                            </svg>
                                        </span>
                                        <span>
                                            <svg width="13" height="13" viewBox="0 0 10 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.92593 0L6.03186 3.40373H9.61076L6.71537 5.50735L7.82131 8.91108L4.92593 6.80746L2.03054 8.91108L3.13648 5.50735L0.241092 3.40373H3.81999L4.92593 0Z"
                                                    fill="#FFA800" />
                                            </svg>
                                        </span>
                                        <span>
                                            <svg width="13" height="13" viewBox="0 0 10 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.92593 0L6.03186 3.40373H9.61076L6.71537 5.50735L7.82131 8.91108L4.92593 6.80746L2.03054 8.91108L3.13648 5.50735L0.241092 3.40373H3.81999L4.92593 0Z"
                                                    fill="#FFA800" />
                                            </svg>
                                        </span>
                                        <span>
                                            <svg width="13" height="13" viewBox="0 0 10 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.92593 0L6.03186 3.40373H9.61076L6.71537 5.50735L7.82131 8.91108L4.92593 6.80746L2.03054 8.91108L3.13648 5.50735L0.241092 3.40373H3.81999L4.92593 0Z"
                                                    fill="#FFA800" />
                                            </svg>
                                        </span>
                                        <span>
                                            <svg width="13" height="13" viewBox="0 0 10 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.92593 0L6.03186 3.40373H9.61076L6.71537 5.50735L7.82131 8.91108L4.92593 6.80746L2.03054 8.91108L3.13648 5.50735L0.241092 3.40373H3.81999L4.92593 0Z"
                                                    fill="#FFA800" />
                                            </svg>
                                        </span>
                                        (12)
                                        <!-- ({{ $transporter_feedback['overall_percentage'] }}%) -->
                                        {{-- ({{ 100 }}%) --}}
                                    </div>
                                    <a href="javascript:;" class="verified_btns">
                                        <svg width="10" height="10" viewBox="0 0 9 7" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.0568 6.72412L0.131796 3.79912C-0.0439321 3.6234 -0.0439321 3.33847 0.131796 3.16273L0.768177 2.52633C0.943906 2.35058 1.22885 2.35058 1.40458 2.52633L3.375 4.49673L7.59542 0.276328C7.77114 0.100599 8.05609 0.100599 8.23182 0.276328L8.8682 0.912726C9.04392 1.08845 9.04392 1.37338 8.8682 1.54912L3.6932 6.72414C3.51745 6.89987 3.23253 6.89987 3.0568 6.72412Z"
                                                fill="#52D017" />
                                        </svg>
                                        Verified
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="leave_tabs">
                            <!-- <span>Accepted:  08/01/2024 19:20</span> -->
                            <p class="quote-accepted">Quote accepted: 08/01/2024 19:20</p>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="positive" role="tabpanel"
                                    aria-labelledby="positive-tab">
                                    <ul class="lve_rate">
                                        <li>
                                            <h5>Click to rate:</h5>
                                            <div class="starrating">
                                                <input type="radio" id="star5_comm_pos" name="rating_comm_positive"
                                                    value="5" /><label for="star5_comm_pos" title="5 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>

                                                </label>
                                                <input type="radio" id="star4_comm_pos" name="rating_comm_positive"
                                                    value="4" /><label for="star4_comm_pos" title="4 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star3_comm_pos" name="rating_comm_positive"
                                                    value="3" /><label for="star3_comm_pos" title="3 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star2_comm_pos" name="rating_comm_positive"
                                                    value="2" /><label for="star2_comm_pos" title="2 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                <input type="radio" id="star1_comm_pos" name="rating_comm_positive"
                                                    value="1" /><label for="star1_comm_pos" title="1 star">
                                                    <svg width="36" height="33" viewBox="0 0 36 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                            fill="#D9D9D9" />
                                                    </svg>
                                                </label>
                                                {{-- <span class="rating-display">(0/5)</span> --}}
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Write a review</label>
                                        <textarea id="pos_comment" name="pos_comment" placeholder="Describe your experience... "></textarea>
                                    </div>
                                    <!-- <button class="lve_feed_btn">Leave feedback</button> -->
                                </div>
                                
                              
                                <span class="feedback-error d-none"></span>
                                <button class="lve_feed_btn">Leave feedback</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('assets/web/js/admin.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('input[type=radio]').on('click', function() {
                var rating = $(this).val();
                $(this).closest('.starrating').find('.rating-display').text(`(${rating}/5)`);
            });
            $('#ratingForm').submit(function(e) {
                e.preventDefault();

                var positiveRatings = [];
                var negativeRatings = [];
                var neutralRatings = [];

                function extractActiveTabRatings() {
                    var activeTabId = $('.nav-link.active').attr('href');
                    var activeTab = $(activeTabId);
                    positiveRatings = [];
                    negativeRatings = [];
                    neutralRatings = [];
                    activeTab.find('input[type=radio]:checked').each(function() {
                        var category = $(this).attr('name');
                        var value = $(this).val();
                        if (activeTabId === '#positive') {
                            positiveRatings.push({
                                category: category,
                                value: value
                            });
                        } else if (activeTabId === '#negative') {
                            negativeRatings.push({
                                category: category,
                                value: value
                            });
                        } else if (activeTabId === '#neutral') {
                            neutralRatings.push({
                                category: category,
                                value: value
                            });
                        }
                    });
                }

                function getFeedbackComments() {
                    var activeTabId = $('.nav-link.active').attr('href');
                    var comments = '';
                    if (activeTabId === '#positive') {
                        comments = $('#pos_comment').val().trim();
                    } else if (activeTabId === '#negative') {
                        comments = $('#neg_comment').val().trim();
                    } else if (activeTabId === '#neutral') {
                        comments = $('#neu_comment').val().trim();
                    }
                    return comments;
                }

                function validateForm() {
                    var ratingsProvided = positiveRatings.length > 0 || negativeRatings.length > 0 ||
                        neutralRatings.length > 0;
                    var feedbackComments = getFeedbackComments();
                    if (!ratingsProvided) {
                        $('.feedback-error').removeClass('d-none');
                        $('.feedback-error').text('Please provide ratings before submitting.');
                        return false;
                    }
                    if (feedbackComments === '') {
                        $('.feedback-error').removeClass('d-none');
                        $('.feedback-error').text('Please provide feedback comments before submitting.');
                        return false;
                    }
                    return true;
                }

                // Clear any previous error messages
                $('.feedback-error').addClass('d-none').text('');

                extractActiveTabRatings();
                var feedback = getFeedbackComments();

                if (!validateForm()) {
                    return; // Exit submission process
                }
                // Example: AJAX submission
                $.ajax({
                    url: "{{ route('front.save_feedback_quote') }}",
                    method: 'POST',
                    data: {
                        positiveRatings: positiveRatings,
                        negativeRatings: negativeRatings,
                        neutralRatings: neutralRatings,
                        feedback: feedback,
                        _token: "{{ csrf_token() }}",
                        quote_by_transporter_id: $('#quote_by_transporter_id').val()
                    },
                    success: function(response) {
                        if (response.status) {
                            Swal.fire({
                                title: '<span class="help-title">Thank You.</span>',
                                html: '<span class="help-text">Your feedback has been submitted.</span>',
                                confirmButtonColor: '#52D017',
                                confirmButtonText: 'OK',
                                customClass: {
                                    title: 'swal-title',
                                    htmlContainer: 'swal-text-container',
                                    popup: 'swal-popup'
                                },
                                showCloseButton: true,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    history.back();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: '<span class="help-title">Error</span>',
                                html: '<span class="help-text">Invalid feedback data!.. Please try again</span>',
                                confirmButtonColor: '#d33',
                                confirmButtonText: 'OK',
                                customClass: {
                                    title: 'swal-title',
                                    htmlContainer: 'swal-text-container',
                                    popup: 'swal-popup'
                                },
                                showCloseButton: true,
                                allowOutsideClick: false
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: '<span class="help-title">Error</span>',
                            html: '<span class="help-text">Something went wrong!.. Please try again</span>',
                            confirmButtonColor: '#d33',
                            confirmButtonText: 'OK',
                            customClass: {
                                title: 'swal-title',
                                htmlContainer: 'swal-text-container',
                                popup: 'swal-popup'
                            },
                            showCloseButton: true,
                            allowOutsideClick: false
                        });
                    }
                });
            });
            // Clear error message on change
            $('#positive, #negative, #neutral').on('change', 'input[type=radio], textarea', function() {
                $('.feedback-error').addClass('d-none').text(''); // Remove error message on change
            });
            $('.nav-link').on('click', function() {
                $('.feedback-error').addClass('d-none').text('');
            })
            $('#ratingForm').on('keyup', 'textarea', function() {
                var activeTabId = $('.nav-link.active').attr('href'); // Get the ID of the active tab
                var textareaId = $(this).attr('id'); // Get the ID of the changed textarea

                // Check if the active tab ID matches the textarea ID
                if (
                    (activeTabId === '#positive' && textareaId === 'pos_comment') ||
                    (activeTabId === '#negative' && textareaId === 'neg_comment') ||
                    (activeTabId === '#neutral' && textareaId === 'neu_comment')
                ) {
                    $('.feedback-error').addClass('d-none').text(''); // Remove error message
                }
            });
        });
    </script>
@endsection
