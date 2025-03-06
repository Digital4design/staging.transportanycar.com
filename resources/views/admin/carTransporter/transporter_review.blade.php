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
        /* #listResults_filter {
                display: none;
            } */

        .lve_feed_btn {
            border: 1px solid #52D017;
            color: #fff;
            border-radius: 5px;
            background: #52D017;
            display: inline-block;
            font-size: 14px;
            padding: 7px 60px;
        }

        /* #listResults ~ .dataTables_paginate a.paginate_button.current {
            background:linear-gradient(to bottom, #585858 0%, #111 100%);
            color:#ffffff;
            border: 1px solid #111111;
        } */
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

        .leave_inner .form-group input[type="date"]::-webkit-input-placeholder,
        .leave_inner .form-group input[type="text"]::-webkit-input-placeholder,
        .leave_inner .form-group textarea::-webkit-input-placeholder {
            color: #C3C3C3;
        }

        .leave_inner .form-group input[type="date"]::-moz-placeholder,
        .leave_inner .form-group input[type="text"]::-moz-placeholder,
        .leave_inner .form-group textarea::-moz-placeholder {
            color: #C3C3C3;
        }

        .leave_inner .form-group input[type="date"]:-ms-input-placeholder,
        .leave_inner .form-group input[type="text"]:-ms-input-placeholder,
        .leave_inner .form-group textarea:-ms-input-placeholder {
            color: #C3C3C3;
        }

        .leave_inner .form-group input[type="date"]:-moz-placeholder,
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
                <h4 class="mb-sm-0 font-size-18"> Review</h4> 
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        
                    </ol>
                </div>
                
            </div>
            <div class="alert alert-success alert-dismissible d-none" id="alert-dismissible" role="alert">
                <div class="alert-text"></div>
                <div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>
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
                <div class="table-responsive ">
                    <table id="listResults" class="table dt-responsive mb-4  nowrap w-100 mb-">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Profile Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                {{-- <th> Actual Review</th>
                            <th>Fake Review</th> --}}
                                <th> Actual job completed</th>
                                <th>Fake Job completed</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
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
                    <h5 class="modal-title" style="padding: 20px 0; font-size: 22px;" id="exampleModalLabel">New review</h5>
                    <form class="leave_inner">
                        @csrf
                        <input type="hidden" name="user_id" id="userId">
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
                    <h5 class="modal-title" style="padding: 20px 0; font-size: 22px;" id="jobCompletedLabel">Job
                        completed</h5>
                    <form class="leave_inner">
                        @csrf
                        <input type="hidden" name="user_id" id="user_job_id">
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let baseUrl = "{{ url('/') }}"; // Define Laravel base URL in JavaScript

            oTable = $('#listResults').DataTable({
                "processing": true,
                "serverSide": true,
                "draw": 1,
                "pageLength": 10,
                "order": [[0, "DESC"]],
                "lengthMenu": [[10, 25, 50], [10, 25, 50]], 
                "ajax": {
                    "url": "{{ route('admin.carTransporter.review_data') }}",
                    "type": "GET",
                    "data": function(d) {
                        d.start = d.start || 0;
                        d.length = d.length || 10;
                    }
                },
                "columns": [{
                        "data": "id",
                        searchable: false,
                        sortable: false
                    },
                    {
                        "data": "profile_image",
                        searchable: false,
                        sortable: false
                    },
                    {
                        "data": "name",
                        sortable: true
                    },

                    {
                        "data": "email",
                        searchable: true,
                        sortable: true
                    },

                    {
                        "data": "actual_completed_job",
                        sortable: true
                    },
                    {
                        "data": "fake_completed_job",
                        sortable: true
                    },

                    {
                        "data": "action",
                        "searchable": false,
                        "sortable": false,
                        "render": function(data, type, row) {
                            return `
                        <div class="wd-sl-modalbtn mb-0 text-start">  
                            <a href="${baseUrl}/admin/carTransporter/review_show/${row.user_id}" 
                                    class="btn btn-orange waves-effect waves-light">
                                    View
                            </a>
                            <button class="btn btn-orange waves-effect waves-light showModelOne" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="${row.id}" data-user-id="${row.user_id}" data-name="${row.name}"" data-content="${row.model_one_data}">
                                Add Review
                            </button>
                            <button class="btn btn-orange waves-effect waves-light showModelTwo" data-bs-toggle="modal" data-bs-target="#jobCompleted" data-id="${row.id}" data-user-id="${row.user_id}" data-content="${row.model_two_data}">
                                Add Jobs Completed
                            </button>
                        </div>
                        `;
                        }
                    }
                ]
            });
            
            $(document).on('click', '.showModelOne, .showModelTwo', function() {
                let userId = $(this).data('user-id'); // Get user_id from the button
                let first_name = $(this).data('name');
                // Check which button was clicked
                if ($(this).hasClass('showModelOne')) {

                    $('#exampleModal #userId').val(userId);
                    // $('#exampleModal #first_name').val(first_name);

                } else if ($(this).hasClass('showModelTwo')) {
                    $('#jobCompleted #user_job_id').val(userId); // Store user_id in the modal

                }
            });

            $(document).on('click', '.lve_feed_btn', function(e) {
                e.preventDefault(); // Prevent the default form submission

                // Get the form data
                let userId = $('#userId').val();
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
                    user_id: userId,
                    rating: rating,
                    pos_comment: comment,
                    first_name: firstName,
                    vehical_name: vehicalName,
                    date: Date,
                };

                $.ajax({
                    url: '{{ route('admin.carTransporter.review_data_save') }}',
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
                                $("#alert-dismissible").removeClass("d-none").find(".alert-text").text(response.message)
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

            $(document).on('click', '.jobCompleted_form', function(e) {
                e.preventDefault();
                let userId = $('#user_job_id').val();
                let jobCompleted = $('#job_completed').val();
                // let firstName = $('#first_name').val();

                // Prepare the data to send in the AJAX request
                let formData = {
                    user_id: userId,
                    job_Completed: jobCompleted,
                    // first_name:firstName
                };

                $.ajax({
                    url: '{{ route('admin.carTransporter.custom_jobCompleted') }}',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            $('#jobCompleted').modal('hide');
                            oTable.ajax.reload();
                            $('#job_completed').val('');
                            $('input[name="rating"]').prop('checked',
                                false); // Deselect the rating
                        } else {
                            if (response.errors.pos_comment) {
                                $('#jobComplete').text(response.errors.job_completed[0]);
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr
                            .responseText);
                    }
                });
            });
        });
    </script>
@endsection
