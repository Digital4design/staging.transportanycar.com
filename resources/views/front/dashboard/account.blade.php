@extends('layouts.web.dashboard.app')

@section('head_css')
@endsection

@section('content')
<style>
    .wd-active-job .container-job {
    padding-right: 25px !important;
}
#passwordIcon1,
#passwordIcon2 {
    position: absolute;
    top: 20px;
    right: 15px;
    /* transform: translateY(-50%); */
    cursor: pointer;
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
</style>
    @include('layouts.web.dashboard.header')
    <section class="wd-active-job admin_account">
        <div class="container-job">
            <div class="wd-deliver-box">
                <div class="row h-100">
                    <div class="col-lg-4">
                        <div class="wd-acc-profl-lft">
                            <div class="wd-acc-profl admin-profile-top">
                                <div class="admin-profile-area">
                                    <div class="edit-profile-photo">
                                        <img src="{{checkFileExist(Auth::guard('web')->user()->profile_image)}}" alt="edit profile image" class="img-fluid profile-pic">
                                        <div class="p-image">
                                            <svg class="upload-button" width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.334 3.60425V11.4792C14.334 12.2039 13.7461 12.7917 13.0215 12.7917H1.64648C0.921875 12.7917 0.333984 12.2039 0.333984 11.4792V3.60425C0.333984 2.87964 0.921875 2.29175 1.64648 2.29175H4.05273L4.38906 1.39214C4.58047 0.88081 5.06992 0.541748 5.6168 0.541748H9.04844C9.59531 0.541748 10.0848 0.88081 10.2762 1.39214L10.6152 2.29175H13.0215C13.7461 2.29175 14.334 2.87964 14.334 3.60425ZM10.6152 7.54175C10.6152 5.73159 9.14414 4.2605 7.33398 4.2605C5.52383 4.2605 4.05273 5.73159 4.05273 7.54175C4.05273 9.3519 5.52383 10.823 7.33398 10.823C9.14414 10.823 10.6152 9.3519 10.6152 7.54175ZM9.74023 7.54175C9.74023 8.86792 8.66016 9.948 7.33398 9.948C6.00781 9.948 4.92773 8.86792 4.92773 7.54175C4.92773 6.21558 6.00781 5.1355 7.33398 5.1355C8.66016 5.1355 9.74023 6.21558 9.74023 7.54175Z" fill="#52D017"/>
                                            </svg>
                                            <input class="file-upload" type="file" accept="image/*">
                                        </div>
                                    </div>
                                    <div>
                                        <h2>{{Auth::guard('web')->user()->username}}</h2>
                                        {{--<p><svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.99899 12.7377C1.30979 7.38946 0.625 6.84056 0.625 4.875C0.625 2.1826 2.8076 0 5.5 0C8.1924 0 10.375 2.1826 10.375 4.875C10.375 6.84056 9.69022 7.38946 6.00101 12.7377C5.75891 13.0874 5.24107 13.0874 4.99899 12.7377ZM5.5 6.90625C6.62183 6.90625 7.53125 5.99683 7.53125 4.875C7.53125 3.75317 6.62183 2.84375 5.5 2.84375C4.37817 2.84375 3.46875 3.75317 3.46875 4.875C3.46875 5.99683 4.37817 6.90625 5.5 6.90625Z" fill="white"/>
                                            </svg>
                                            London, UK</p>--}}
                                        <a href="{{route('front.logout')}}" class="logout_txt mob_view">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_650_1110)">
                                            <path d="M15.75 0H7.5C6.90381 0.00178057 6.33255 0.239405 5.91098 0.660977C5.48941 1.08255 5.25178 1.65381 5.25 2.25V6.75H12C12.5967 6.75 13.169 6.98705 13.591 7.40901C14.0129 7.83097 14.25 8.40326 14.25 9C14.25 9.59674 14.0129 10.169 13.591 10.591C13.169 11.0129 12.5967 11.25 12 11.25H5.25V15.75C5.25178 16.3462 5.48941 16.9175 5.91098 17.339C6.33255 17.7606 6.90381 17.9982 7.5 18H15.75C16.3462 17.9982 16.9175 17.7606 17.339 17.339C17.7606 16.9175 17.9982 16.3462 18 15.75V2.25C17.9982 1.65381 17.7606 1.08255 17.339 0.660977C16.9175 0.239405 16.3462 0.00178057 15.75 0Z" fill="white"/>
                                            <path d="M2.55772 9.75002H12.0002C12.1991 9.75002 12.3899 9.671 12.5305 9.53035C12.6712 9.38969 12.7502 9.19893 12.7502 9.00002C12.7502 8.8011 12.6712 8.61034 12.5305 8.46969C12.3899 8.32903 12.1991 8.25002 12.0002 8.25002H2.55772L3.53272 7.28252C3.67395 7.14129 3.75329 6.94974 3.75329 6.75002C3.75329 6.55029 3.67395 6.35874 3.53272 6.21752C3.39149 6.07629 3.19994 5.99695 3.00022 5.99695C2.80049 5.99695 2.60895 6.07629 2.46772 6.21752L0.217718 8.46752C0.0822483 8.61173 0.00683594 8.80215 0.00683594 9.00002C0.00683594 9.19788 0.0822483 9.3883 0.217718 9.53252L2.46772 11.7825C2.61133 11.9192 2.80198 11.9954 3.00022 11.9954C3.19845 11.9954 3.3891 11.9192 3.53272 11.7825C3.67323 11.6409 3.75208 11.4495 3.75208 11.25C3.75208 11.0505 3.67323 10.8591 3.53272 10.7175L2.55772 9.75002Z" fill="white"/>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0_650_1110">
                                            <rect width="18" height="18" fill="white"/>
                                            </clipPath>
                                            </defs>
                                            </svg>
                                            Logout
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('front.logout')}}" class="logout_txt desk_view">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_650_1110)">
                                <path d="M15.75 0H7.5C6.90381 0.00178057 6.33255 0.239405 5.91098 0.660977C5.48941 1.08255 5.25178 1.65381 5.25 2.25V6.75H12C12.5967 6.75 13.169 6.98705 13.591 7.40901C14.0129 7.83097 14.25 8.40326 14.25 9C14.25 9.59674 14.0129 10.169 13.591 10.591C13.169 11.0129 12.5967 11.25 12 11.25H5.25V15.75C5.25178 16.3462 5.48941 16.9175 5.91098 17.339C6.33255 17.7606 6.90381 17.9982 7.5 18H15.75C16.3462 17.9982 16.9175 17.7606 17.339 17.339C17.7606 16.9175 17.9982 16.3462 18 15.75V2.25C17.9982 1.65381 17.7606 1.08255 17.339 0.660977C16.9175 0.239405 16.3462 0.00178057 15.75 0Z" fill="white"/>
                                <path d="M2.55772 9.75002H12.0002C12.1991 9.75002 12.3899 9.671 12.5305 9.53035C12.6712 9.38969 12.7502 9.19893 12.7502 9.00002C12.7502 8.8011 12.6712 8.61034 12.5305 8.46969C12.3899 8.32903 12.1991 8.25002 12.0002 8.25002H2.55772L3.53272 7.28252C3.67395 7.14129 3.75329 6.94974 3.75329 6.75002C3.75329 6.55029 3.67395 6.35874 3.53272 6.21752C3.39149 6.07629 3.19994 5.99695 3.00022 5.99695C2.80049 5.99695 2.60895 6.07629 2.46772 6.21752L0.217718 8.46752C0.0822483 8.61173 0.00683594 8.80215 0.00683594 9.00002C0.00683594 9.19788 0.0822483 9.3883 0.217718 9.53252L2.46772 11.7825C2.61133 11.9192 2.80198 11.9954 3.00022 11.9954C3.19845 11.9954 3.3891 11.9192 3.53272 11.7825C3.67323 11.6409 3.75208 11.4495 3.75208 11.25C3.75208 11.0505 3.67323 10.8591 3.53272 10.7175L2.55772 9.75002Z" fill="white"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_650_1110">
                                <rect width="18" height="18" fill="white"/>
                                </clipPath>
                                </defs>
                                </svg>

                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="wd-acc-profl-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h1>Account</h1>
                                    <form action="{{ route('front.profile') }}" name="form_account" id="form_account" method="post" autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                        {!! get_error_html($errors) !!}
                                        <h2>
                                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_604_764)">
                                                    <path d="M9.5 10.6875C12.4502 10.6875 14.8438 8.29395 14.8438 5.34375C14.8438 2.39355 12.4502 0 9.5 0C6.5498 0 4.15625 2.39355 4.15625 5.34375C4.15625 8.29395 6.5498 10.6875 9.5 10.6875ZM14.25 11.875H12.2053C11.3814 12.2535 10.4648 12.4688 9.5 12.4688C8.53516 12.4688 7.62227 12.2535 6.79473 11.875H4.75C2.12637 11.875 0 14.0014 0 16.625V17.2188C0 18.2021 0.797852 19 1.78125 19H17.2188C18.2021 19 19 18.2021 19 17.2188V16.625C19 14.0014 16.8736 11.875 14.25 11.875Z" fill="#52D017"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_604_764">
                                                        <rect width="19" height="19" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>Account details
                                        </h2>
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email address" value="{{Auth::guard('web')->user()->email}}">
                                        </div>

                                        {{--<div class="form-group">
                                           <input type="text" class="form-control" placeholder="London UK">
                                        </div>--}}

                                        <h2>
                                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_604_767)">
                                                    <path d="M19 6.53129C19 10.1384 16.0759 13.0625 12.4688 13.0625C12.0524 13.0625 11.6453 13.0231 11.2506 12.9486L10.3595 13.9511C10.2759 14.0451 10.1734 14.1203 10.0587 14.1718C9.94394 14.2234 9.81959 14.25 9.69382 14.25H8.3125V15.7344C8.3125 16.2263 7.91376 16.625 7.42188 16.625H5.9375V18.1094C5.9375 18.6013 5.53876 19 5.04688 19H0.890625C0.39874 19 0 18.6013 0 18.1094V15.2127C0 14.9765 0.0938496 14.7499 0.260842 14.5829L6.26521 8.5785C6.05284 7.9345 5.9375 7.24638 5.9375 6.53125C5.9375 2.92414 8.86161 3.71097e-05 12.4687 3.5449e-10C16.0865 -3.7109e-05 19 2.91349 19 6.53129ZM12.4688 4.75C12.4688 5.73377 13.2662 6.53125 14.25 6.53125C15.2338 6.53125 16.0312 5.73377 16.0312 4.75C16.0312 3.76623 15.2338 2.96875 14.25 2.96875C13.2662 2.96875 12.4688 3.76623 12.4688 4.75Z" fill="#52D017"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_604_767">
                                                        <rect width="19" height="19" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>Change password
                                        </h2>

                                        <div class="form-group">
                                            <input type="hidden" class="form-control" placeholder="Current password" name="opassword" id="opassword" value="{{Auth::guard('web')->user()->getAuthPassword()}}" autocomplete="on">
                                        </div>

                                        <div class="form-group" style="position: relative;">
                                            <input type="password" class="form-control" placeholder="New password" name="npassword" id="npassword" autocomplete="on" style="padding-right: 30px;">
                                            <span id="togglePassword1">
                                                <i class="fas fa-eye" id="passwordIcon1"></i>
                                            </span>
                                        </div>
                                        
                                        <div class="form-group" style="position: relative;">
                                            <input type="password" class="form-control" placeholder="Confirm new password" name="cpassword" id="cpassword" autocomplete="on" style="padding-right: 30px;">
                                            <span id="togglePassword2">
                                                <i class="fas fa-eye" id="passwordIcon2"></i>
                                            </span>
                                        </div>

                                        <div class="wd-cstm-check">
                                            <div class="form-group">
                                            <input type="checkbox" id="check1" {{ Auth::guard('web')->check() && Auth::guard('web')->user()->job_email_preference == 1 ? 'checked' : '' }}>
                                                <label for="check1">I’m happy to receive emails related to my account.</label>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="wd-save-btn">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{asset('assets/web/js/admin.js')}}"></script>
    <script src="{{asset('/assets/admin/vendors/general/validate/jquery.validate.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
document.getElementById("togglePassword1").addEventListener("click", function () {
    const passwordField = document.getElementById("npassword");
    const icon = document.getElementById("passwordIcon1");

    // Toggle the password visibility
    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        passwordField.type = "password";
        icon.classList.replace("fa-eye-slash", "fa-eye");
    }
});

document.getElementById("togglePassword2").addEventListener("click", function () {
    const passwordField = document.getElementById("cpassword");
    const icon = document.getElementById("passwordIcon2");

    // Toggle the password visibility
    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        passwordField.type = "password";
        icon.classList.replace("fa-eye-slash", "fa-eye");
    }
});

        function uploadImage(image)
        {
            var formData = new FormData();
            formData.append("_token", "{{csrf_token()}}");
            formData.append("image", image);
            $.ajax({
                url: "{{route('front.update_profile_image')}}",
                data: formData,
                processData: false,
                contentType: false,
                type: "POST",
                success: function (res) {
                    if(res.success == true) {
                        toastr.success(res.message);
                    } else {
                        toastr.error(res.message);
                    }
                },
                error: function (data) {
                    toastr.clear();
                    toastr.error(data.message);
                }
            });
        }
        // upload image
        $(document).ready(function() {

            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.profile-pic').attr('src', e.target.result);
                        uploadImage(e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(".file-upload").on('change', function(){
                readURL(this);
            });

            $(".upload-button").on('click', function() {
                $(".file-upload").click();
            });
            $('body').addClass('account-scroll');
        });

        $('#check1').on('change', function() {
            var isChecked = $(this).is(':checked');
            var emailType = 'user';
            var value = isChecked ? 1 : 0; // Set value based on the checkbox state

            $.ajax({
                url: '{{route('front.update_email_preference')}}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    email_type: emailType,
                    value: value
                },
                success: function(response) {                       
                    Swal.fire({
                        title: 'Thank you.',
                        text: 'Email preference updated successfully!',
                        confirmButtonText: 'Dismiss',
                        showCloseButton: true,
                    })
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while updating your preference.',
                        confirmButtonText: 'Dismiss',
                        showCloseButton: true,
                    })
                }
            });
        });
    </script>
    <script>
        //const fileImage = document.querySelector('.input-preview__src');
       // const filePreview = document.querySelector('.input-preview');

        // fileImage.onchange = function () {
        //     const reader = new FileReader();
        //
        //     reader.onload = function (e) {
        //         // get loaded data and render thumbnail.
        //         filePreview.style.backgroundImage  = "url("+e.target.result+")";
        //         filePreview.classList.add("has-image");
        //     };
        //
        //     // read the image file as a data URL.
        //     reader.readAsDataURL(this.files[0]);
        // };
        let id = "{{Auth::guard('web')->user()->id}}";
        $(function () {
            $(document).on('submit', '#form_account', function () {
                $('#form_account').validate({
                    rules: {
                        opassword: {
                            required: true,
                        },
                        npassword: {
                            required: true,
                            minlength: 6,
                        },
                        cpassword: {
                            required: true,
                            equalTo: "#npassword",
                        },
                        email: {
                            required: true,
                            maxlength: 50,
                            remote: {
                                type: 'get',
                                url: "{{route('front.user_availability_checker')}}",
                                data: {
                                    id: id,
                                    email: function () {
                                        return $('#email').val();
                                    }
                                }
                            },
                        },
                    },
                    messages: {
                        opassword: {
                            required: "Please enter old password.",
                        },
                        npassword: {
                            required: "Please enter new password.",
                            minlength: "Please enter minimum 6 character for password",
                        },
                        cpassword: {
                            required: "Please enter confirm password.",
                            equalTo: "Confirm password does not match with new password.",
                        },
                        email: {required: 'Please enter email', remote: "This email is already taken"},
                    }
                });
                return $('#form_account').valid();
            });
        });
    </script>
@endsection

