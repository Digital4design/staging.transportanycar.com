@extends('layouts.master')
@section('title')
    @lang('translation.Data_Tables')
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/admin/vendors/general/datatable/jquery.dataTables.min.css') }}" id="bootstrap-style"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.css" />
    <style>
        .overall-review {
            border-top: 1px solid #D9D9D9;
        }

        .overall-review .total-review {
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 0;
        }

        .total-review-count,
        .overall-review .total-rating {
            font-size: 16px;
            font-weight: 500;
        }

        .review-count-bar li {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            padding-left: 10px;
            border-left: 1px solid #D9D9D9;
        }

        .review-count-bar li span {
            font-size: 16px;
            font-weight: 400;
            color: #000000;
        }

        .review-count-bar span {
            margin-right: 10px;
        }

        .review-steps {
            width: 10px;
        }

        .review-base-bar {
            background-color: #D9D9D9;
            width: 90px;
            height: 5px;
            border-radius: 10px;
            margin-left: 12px;
            margin-right: 12px;
            position: relative;
            overflow: hidden;
        }

        .review-active-bar {
            background-color: #FFA800;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            width: 0;
            transition: width 0.25s ease-in-out 0.25s;
            border-radius: 0 10px 10px 0;
        }

        .review-count-bar li span {
            font-size: 16px;
            font-weight: 400;
            color: #000000;
        }

        .review-count-bar span {
            margin-right: 10px;
        }

        .total-review-count,
        .overall-review .total-rating {
            font-size: 16px;
            font-weight: 500;
        }

        .review-outer-wrap {
            padding: 30px 0;
            border-bottom: 1px solid #D9D9D9;
        }

        .feedback-user-name {
            font-size: 16px;
            font-weight: 500;
            color: #000000;
        }

        .wd-star-lst {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .wd-star-lst li {
            color: #4A4A4A;
            font-size: 14px;
            font-weight: 400;
            padding: 0 1px;
            line-height: 18px;
        }

        .feedback-user-verified {
            font-size: 12px;
            font-weight: 500;
            color: #52D017;
            margin-left: 14px;
        }

        .feedback-item {
            color: #000000;
            font-weight: 500;
        }

        .feedback-item,
        .other-reviews.user-feedback-stars {
            margin-top: 14px;
            margin-bottom: 14px;
        }

        #listResults_filter {
            display: none;
        }

        .lve_feed_btn {
            border: 1px solid #52D017;
            color: #fff;
            border-radius: 5px;
            background: #52D017;
            display: inline-block;
            font-size: 14px;
            padding: 7px 60px;
        }

        .wd_leave_bx {
            padding: 0 !important;
            box-shadow: none !important;
            background: transparent !important;
            border: none !important;
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

        .leave_inner .form-group {
            margin-bottom: 22px;
        }

        .leave_inner .form-group label {
            font-size: 16px !important;
            font-weight: 500;
            line-height: 23px;
            letter-spacing: 0em;
            text-align: left;
            color: #000;
            margin-bottom: 20px;
            display: block;
        }

        .leave_inner .form-group input[type="date"],
        .leave_inner .form-group input[type="number"],
        .leave_inner .form-group input[type="text"],
        .leave_inner .form-group textarea {
            border: 2px solid #D9D9D9 !important;
            padding: 5px 10px !important;
            font-size: 14px;
            font-weight: 300;
            color: #000000;
            /* height: 111px; */
            width: 100%;
            border-radius: 5.54px;
        }

        .leave_inner .form-group textarea {
            height: 111px;
        }

        .leave_inner .form-group input[type="text"]::-webkit-input-placeholder,
        .leave_inner .form-group textarea::-webkit-input-placeholder {
            color: #C3C3C3;
        }

        .leave_inner .form-group input[type="text"]::-moz-placeholder,
        .leave_inner .form-group textarea::-moz-placeholder {
            color: #C3C3C3;
        }

        .leave_inner .form-group input[type="text"]:-ms-input-placeholder,
        .leave_inner .form-group textarea:-ms-input-placeholder {
            color: #C3C3C3;
        }

        .leave_inner .form-group input[type="text"]:-moz-placeholder,
        .leave_inner .form-group textarea:-moz-placeholder {
            color: #C3C3C3;
        }

        .lve_rate {
            display: block !important;
            padding-left: 0;
        }

        .lve_rate li {
            display: flex;
            align-items: center;
            /* justify-content: space-between; */
            margin-bottom: 20px;
        }

        .lve_rate li h5 {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 12px;
            color: #000000;
            line-height: 30px;
            letter-spacing: 0em;
            text-align: left;
            margin-bottom: 0;
        }

        .leave_tabs .nav-pills .nav-link.active,
        .leave_tabs .nav-pills .show>.nav-link {
            border: 1px solid #00BC29;
            background: #EAFFEE;
            color: #00BC29;
        }

        .lve_rate .starrating {
            display: flex;
            align-items: center;
            gap: 2px;
            padding-right: 0;
            flex-direction: row-reverse;
            position: relative;
        }

        .lve_rate .starrating>input {
            display: none;
        }

        ul.lve_rate li .starrating label {
            margin-bottom: 0;
        }

        ul.lve_rate li .starrating svg {
            width: 14px;
        }

        .lve_rate .starrating>input:checked~label svg path {
            fill: #ffca08;
        }

        .lve_rate .starrating>input:hover~label {
            color: #ffca08;
        }

        .lve_rate .starrating span {
            font-family: 'Poppins', sans-serif;
            font-size: 22px;
            font-weight: 300;
            line-height: 33px;
            letter-spacing: 0em;
            text-align: left;
            margin-bottom: 0;
        }

        .fake-review {
            border: 1px solid #D9D9D9;
            background: #FFFFFF;
            padding: 35px 50px;
            text-align: center;
            border-top: none;
        }

        .modal-header.fake-header {
            background: transparent;
            border: none;
            padding: 0;
        }

        .modal-header.fake-header button {
            margin: 0;
            position: absolute;
            right: -10px;
            top: -10px;
            z-index: 9;
            background-color: #fff;
            border: none;
        }

        @media screen and (max-width: 575px) {
            .modal-dialog {
                max-width: 90%;
                margin: 30px auto !important;
            }
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18"> Fake Review</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            {!! success_error_view_generator() !!}
        </div>
        <div class="card">
            <div class="card-body">
                <div class="mb-2 text-right">
                </div>
                <div class="table-responsive">
                    <div class="overall-review py-3 py-md-5">
                        <h2 class="total-review">Reviews (<span id="reviewCount">0</span>)</h2>
                        <span class="total-rating my-2 d-block" id="averageRating">0/5</span>
                        <ul class="wd-star-lst user-feedback-stars list-inline" id="starRatingContainer">
                            <!-- Dynamic stars will be injected here -->
                        </ul>
                    </div>

                    <ul class="review-count-bar list-inline">
                        <li>
                            <span class="review-steps">5</span>
                            <div class="review-base-bar">
                                <div id="rating-5-bar" class="review-active-bar"></div>
                            </div>
                            <span class="review-percentage" id="rating-5-percentage">0%</span>
                        </li>
                        <li>
                            <span class="review-steps">4</span>
                            <div class="review-base-bar">
                                <div id="rating-4-bar" class="review-active-bar"></div>
                            </div>
                            <span class="review-percentage" id="rating-4-percentage">0%</span>
                        </li>
                        <li>
                            <span class="review-steps">3</span>
                            <div class="review-base-bar">
                                <div id="rating-3-bar" class="review-active-bar"></div>
                            </div>
                            <span class="review-percentage" id="rating-3-percentage">0%</span>
                        </li>
                        <li>
                            <span class="review-steps">2</span>
                            <div class="review-base-bar">
                                <div id="rating-2-bar" class="review-active-bar"></div>
                            </div>
                            <span class="review-percentage" id="rating-2-percentage">0%</span>
                        </li>
                        <li>
                            <span class="review-steps">1</span>
                            <div class="review-base-bar">
                                <div id="rating-1-bar" class="review-active-bar"></div>
                            </div>
                            <span class="review-percentage" id="rating-1-percentage">0%</span>
                        </li>
                    </ul>

                    <div id="reviewsContainer"></div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header fake-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body fake-review">
                    <h5 class="modal-title" style="padding: 20px 0; font-size: 22px;" id="exampleModalLabel">Edit review
                    </h5>
                    <form class="leave_inner">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <ul class="lve_rate mb-0">
                            <li>
                                <h5>Click to rate:</h5>
                                <div class="starrating">
                                    <input type="radio" id="star5_comm_pos" name="rating" value="5"><label
                                        for="star5_comm_pos" title="5 star">
                                        <svg width="36" height="33" viewBox="0 0 36 33" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                fill="#D9D9D9"></path>
                                        </svg>

                                    </label>
                                    <input type="radio" id="star4_comm_pos" name="rating" value="4"><label
                                        for="star4_comm_pos" title="4 star">
                                        <svg width="36" height="33" viewBox="0 0 36 33" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                fill="#D9D9D9"></path>
                                        </svg>
                                    </label>
                                    <input type="radio" id="star3_comm_pos" name="rating" value="3"><label
                                        for="star3_comm_pos" title="3 star">
                                        <svg width="36" height="33" viewBox="0 0 36 33" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                fill="#D9D9D9"></path>
                                        </svg>
                                    </label>
                                    <input type="radio" id="star2_comm_pos" name="rating" value="2"><label
                                        for="star2_comm_pos" title="2 star">
                                        <svg width="36" height="33" viewBox="0 0 36 33" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                fill="#D9D9D9"></path>
                                        </svg>
                                    </label>
                                    <input type="radio" id="star1_comm_pos" name="rating" value="1"><label
                                        for="star1_comm_pos" title="1 star">
                                        <svg width="36" height="33" viewBox="0 0 36 33" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 0L22.7822 11.4178L35.119 12.4377L25.7378 20.5142L28.5801 32.5623L18 26.136L7.41987 32.5623L10.2622 20.5142L0.880983 12.4377L13.2178 11.4178L18 0Z"
                                                fill="#D9D9D9"></path>
                                        </svg>
                                    </label>

                                </div>
                                <div class="text-danger" id="ratingError"></div>
                            </li>
                        </ul>
                        <div class="form-group">
                            <input type="text" class="mb-2" placeholder="Name" id="first_name"
                                name="first_name" />
                            <div class="text-danger" id="firstName"></div>
                            <input type="text" class="mb-2" placeholder="Vehical Name" id="vehical_name"
                                name="vehical_name" />
                            <div class="text-danger" id="vehicalName"></div>
                            <input type="date" class="mb-2" placeholder="Date" id="date" name="date" />
                            <div class="text-danger" id="vehicalName"></div>
                            <textarea id="pos_comment" name="pos_comment" placeholder="Review"></textarea>
                            <div class="text-danger" id="commentError"></div>
                            <button class="lve_feed_btn mt-4">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="jobCompleted" tabindex="-1" aria-labelledby="jobCompletedLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header fake-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body fake-review">
                    <h5 class="modal-title" style="padding: 20px 0; font-size: 22px;" id="jobCompletedLabel">Edit Job
                        completed</h5>
                    <form class="leave_inner">
                        @csrf
                        <input type="hidden" name="feedbackid" id="feedbackid" value="">
                        <div class="form-group">
                            <input type="number" class="mb-2" placeholder="Job completed no" name="job_completed"
                                id ="job_completed" required />
                            <div class="text-danger" id="jobComplete"></div>
                            <button class="jobCompleted_form lve_feed_btn mt-4">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ asset('/assets/admin/vendors/general/validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/assets/admin/vendors/general/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // let userId = "{{ $data->id }}";
            // console.log( {{ $data->id }});
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let userId = "{{ $data->id }}"; // Get user ID from Blade
            let baseUrl = "{{ url('/') }}";

            $(document).ready(function() {
                let userId = "{{ $data->id }}"; // Assuming the user ID is available in Blade
                loadReviews(userId);
            });

            function loadReviews(userId) {
                $.ajax({
                    url: "{{ route('admin.carTransporter.review_show_data', ':id') }}".replace(':id',
                        userId), // Dynamic ID
                    method: "GET",
                    success: function(response) {
                        let reviews = response.data;
                        let html = "";

                        if (reviews.length > 0) {
                            reviews.forEach(function(review) {
                                let stars = generateStars(review
                                    .rating); // Function to generate star ratings

                                html += `
                        <div class="review-outer-wrap d-flex flex-wrap align-items-center justify-content-between w-100">
                            <div class="review-wrap">
                                <div class="feedback-user-name">${review.first_name}</div>
                                <ul class="wd-star-lst user-feedback-stars other-reviews list-inline">
                                    ${stars}
                                    <div class="feedback-user-verified">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="9" viewBox="0 0 11 9" fill="none">
                                            <path d="M3.73608 8.04173L0.161084 4.46672C-0.0536948 4.25195 -0.0536948 3.90371 0.161084 3.6889L0.938883 2.91108C1.15366 2.69628 1.50192 2.69628 1.7167 2.91108L4.125 5.31935L9.28329 0.161084C9.49807 -0.0536948 9.84633 -0.0536948 10.0611 0.161084L10.8389 0.938905C11.0537 1.15368 11.0537 1.50192 10.8389 1.71672L4.51391 8.04175C4.2991 8.25653 3.95086 8.25653 3.73608 8.04173Z" fill="#52D017"></path>
                                        </svg>
                                        <span>Verified</span>
                                    </div>
                                </ul>
                                <div class="font-weight-light" style="font-size:13px;">${review.date}</div>
                                <div class="feedback-item" style="font-size:14px;">${review.vehical_name}</div>
                                <div class="font-weight-light">${review.comment}</div>
                            </div>
                            <div class="wd-sl-modalbtn mb-0 text-start">
                                <button class="btn btn-orange waves-effect waves-light showModelOne"
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"
                                    data-id="${review.feedback_id}"
                                    data-user-id="${review.transporter_id}"
                                    data-name="${review.first_name}"
                                    data-vehical="${review.vehical_name}"
                                    data-date="${review.date}"
                                    data-comment="${review.comment}"
                                    data-rating="${review.rating}">
                                    Edit Review
                                </button>
                            </div>
                        </div>`;
                            });

                            // Insert reviews into the container
                            $("#reviewsContainer").html(html);

                            // Display ratings breakdown
                            $('#reviewCount').text(response.recordsFiltered);
                            displayRatingBreakdown(response.ratings);
                            displayAverageRating(response.average_rating);
                        } else {
                            html = `<p>No reviews found.</p>`;
                            $("#reviewsContainer").html(html);
                        }
                        displayStarsInContainer(response.average_rating);
                    },
                    error: function(error) {
                        console.error("Error fetching reviews:", error);
                    }
                });
            }

            function generateStars(rating) {
                let starsHtml = "";
                for (let i = 1; i <= 5; i++) {
                    if (i <= rating) {
                        starsHtml += `
                <li>
                    <svg width="20" height="20" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z" fill="#FFA800"></path>
                    </svg>
                </li>`;
                    } else {
                        starsHtml += `
                <li>
                    <svg width="20" height="20" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z" fill="#ccc"></path>
                    </svg>
                </li>`;
                    }
                }
                return starsHtml;
            }

            function displayRatingBreakdown(ratings) {
                ['5', '4', '3', '2', '1'].forEach(function(rating) {
                    let percentage = ratings['star_' + rating] || 0;
                    $(`#rating-${rating}-bar`).css('width', percentage + '%');
                    $(`#rating-${rating}-percentage`).text(percentage.toFixed(0) + '%');
                });
            }

            function displayAverageRating(averageRating) {
                $("#averageRating").text(averageRating + "/5");
            }

            function displayStarsInContainer(rating) {
                let stars = generateStars(rating);
                $("#starRatingContainer").html(`
                    <ul class="wd-star-lst user-feedback-stars list-inline">
                        ${stars}
                    </ul>
                `);
            }


            $(document).on('click', '.showModelOne', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let vehical = $(this).data('vehical');
                let date = $(this).data('date');
                let comment = $(this).data('comment');
                let rating = $(this).data('rating');

                // Set form values
                $('#id').val(id);
                $('#first_name').val(name);
                $('#vehical_name').val(vehical);
                $('#date').val(date);
                $('#pos_comment').val(comment);

                // Check the correct rating radio button
                $('input[name="rating"]').prop('checked', false); // Uncheck all first
                if (rating) {
                    $(`input[name="rating"][value="${rating}"]`).prop('checked', true);
                }

                // Show modal
                $('#exampleModal').modal('show');
            });

            $(document).on('click', '.lve_feed_btn', function(e) {
                e.preventDefault(); // Prevent the default form submission

                // Get the form data
                let Id = $('#id').val();
                let rating = $('input[name="rating"]:checked').val(); // Get the selected rating
                let comment = $('#pos_comment').val();
                let Date = $('#date').val();
                let firstName = $('#first_name').val(); // Get the first name
                let vehicalName = $('#vehical_name').val();

                // Clear previous error messages
                $('#ratingError').text('');
                $('#commentError').text('');


                // Prepare the data to send in the AJAX request
                let formData = {
                    id: Id,
                    rating: rating,
                    pos_comment: comment,
                    first_name: firstName,
                    vehical_name: vehicalName,
                    date: Date,
                };

                $.ajax({
                    url: '{{ route('admin.carTransporter.review_data_update') }}',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            $('#exampleModal').modal('hide'); // Close the modal
                            $('#pos_comment').val(''); // Clear the comment field
                            $('#first_name').val('');
                            $('#vehical_name').val('');
                            $('#date').val('');
                            $('input[name="rating"]').prop('checked',
                                false); // Deselect the rating
                            loadReviews(userId);
                        } else {
                            if (response.errors.rating) {
                                $('#ratingError').text(response.errors.rating[0]);
                            }
                            if (response.errors.pos_comment) {
                                $('#commentError').text(response.errors.pos_comment[0]);
                            }

                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr
                            .responseText);
                    }
                });
            });

            $(document).on('click', '.showModelTwo', function() {
                let id = $(this).data('id');
                let completedJobs = $(this).data('job-completed');

                // Set values in the modal
                $('#job_completed').val(completedJobs);
                $('#feedbackid').val(id);

                // Show modal
                $('#jobCompleted').modal('show');
            });

            // $(document).on('click', '.jobCompleted_form', function(e) {
            //     e.preventDefault(); // Prevent default form submission

            //     let formData = {
            //         user_id: $('#feedbackid').val(),
            //         job_Completed: $('#job_completed').val(),
            //         _token: "{{ csrf_token() }}" // Include CSRF token
            //     };

            //     // Clear previous error messages
            //     $('#jobComplete').text('');

            //     $.ajax({
            //         url: "{{ route('admin.carTransporter.update_job_completed') }}", // Update this route
            //         method: 'POST',
            //         data: formData,
            //         success: function(response) {
            //             if (response.success) {
            //                 alert('Jobs Completed updated successfully!');
            //                 $('#jobCompleted').modal('hide'); // Close modal
            //                 $('#listResults').DataTable().ajax.reload(); // Reload DataTable
            //             } else {
            //                 $('#jobComplete').text(response.message || 'Failed to update.');
            //             }
            //         },
            //         error: function(xhr) {
            //             let errors = xhr.responseJSON.errors;
            //             if (errors && errors.job_Completed) {
            //                 $('#jobComplete').text(errors.job_Completed[
            //                 0]); // Show validation error
            //             } else {
            //                 $('#jobComplete').text('An error occurred.');
            //             }
            //         }
            //     });
            // });

        });
    </script>
@endsection
