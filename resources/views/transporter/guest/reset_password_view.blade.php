@extends('layouts.web.app')

@section('head_css')
@endsection
<style>
.reset_heading{
    margin-bottom: 30px;
}

.password-toggle {
    position: absolute;
    top: 14px;
    right: 25px;
    cursor: default;
    color: #ccc;
}

.reset_psss #kt_login_signin_submit {
    padding: 0;
    text-decoration: underline;
    text-underline-offset: 5px;
}
.reset_psss #kt_login_forgot_cancel {
    margin: 0 0 0 26px !important;
    text-decoration: underline;
    text-underline-offset: 5px;
    padding: 0 !important;
}
.reset_psss {
    display: flex;
    align-items: flex-end;
    justify-content: center;
}
.signnetwork .form-control{
    margin-bottom: 3px !important;
}
.trans_login_blog .signnetwork .col-lg-12.eyeicon{
    margin-bottom: 19px !important;
}
.error-message {
    font-size: 12px;
    color: red;
    display: block;
    text-align: left;
}

.trans_forgotpass .kt-login__btn-secondary {
    width: max-content;
    margin-left: auto;
    padding: 0;
    color: #0077FF;
    text-decoration: underline;
    line-height: normal;
    margin-top: -19px;
    margin-right: 15px;
}
.trans_forgotpass .btngroup {
    margin-top: 34px;
}
.trans_forgotpass p{
    margin-top: 5px !important;
}
.join_network_main .banner_newtext {
    font-size: 45px !important;
}
.reset_psss #kt_login_signin_submit {
    text-decoration: none;
    text-underline-offset: 5px;
    background: #52D017;
    font-size: 24px;
    color: #fff;
    padding: 8px 47px 10px;
    border-radius: 33px;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: normal;
    width: 220px;
    
}
.reset_psss #kt_login_signin_submit svg {
    margin-left: 10px;
}
@media(max-width: 767px){
.join_network_main .banner_newtext {
    font-size: 40px !important;
}

}


</style>

@section('content')
    @include('layouts.transporter.head-web-menu')
    <main>
        <section class="join_network_main trans_forgotpass position-relative">
            <div class="container">
            <div class="position-relative text-center reset_heading">
                <h1 class="banner_newtext d-block text-center">Password reset</h1>
                <p>Enter your new password</p>
            </div>
                <form class="trans_login_blog" name="form_login" id="guest_form" method="post" autocomplete="off">
                    <input type="hidden" name="reset_token" value="{{$token}}">
                    @csrf
                    <div class="signnetwork">
                        <div class="row m-0">
                            <div class="col-lg-12 eyeicon">
                                <input type="password" class="form-control password" placeholder="New password" name="password" id="password" value="" autofocus>
                                <i class="fas fa-eye password-toggle"></i>
                            </div>
                            <div class="col-lg-12 eyeicon">
                                <input type="password" class="form-control password" placeholder="Confirm password" name="cnf_password" id="cnf_password" />
                               <i class="fas fa-eye password-toggle"></i>
                            </div>
                            <div class="col-lg-12 response_api" style="display: none;">
                               <span id="response-message" class="error-message" ></span>
                            </div>
                            <a href="{{route('transporter.login')}}" id="kt_login_forgot_cancel"
                            class="btn btn-pill kt-login__btn-secondary">Account login
                            </a>
                        </div>
                        <div class="btngroup">
                        <div class="kt-login__actions reset_psss">
                            <!-- <button id="kt_login_signin_submit" class="btn btn-pill kt-login__btn-primary">{{__('Reset Password')}}</button> -->
                            <button id="kt_login_signin_submit" class="btn btn-pill kt-login__btn-primary">Save <svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.01562 1.80859L7.70527 8.49824L1.01562 15.1879" stroke="white" stroke-width="2.00689" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
            <img src="{{asset('assets/web/images/home/trans_account_img.png')}}" alt="image" class="bgright_img" />
        </section>
    </main>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        // // Custom validation method for secure password
        // $.validator.addMethod("securePassword", function(value, element) {
        //     if (!value) {
        //         return true; // Return true for empty value
        //     }
        //     return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+}{"':;?/>.<,]).{6,}$/.test(value);
        // }, "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character."); 

        $("#guest_form").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 6,
                    //securePassword: true,
                },
                cnf_password: {required: true, equalTo: "#password"}
            },
            messages: {
                password: {required: 'Please enter new password'},
                cnf_password: {
                    required: 'Please enter Confirm password',
                    equalTo: "confirm password does not match"
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.insertAfter($(element));
            },
            submitHandler: function (form) {
                var formData = $(form).serialize();
                $.ajax({
                    url: '{{ route('transporter.trans_update_password') }}',
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        console.log(response);
                       if(response.status) {
                           Swal.fire({
                               title: '<span class="help-title">Thank You.</span>',
                               html: '<span class="help-text">Password reset successfully.</span>',
                               confirmButtonColor: '#52D017',
                               confirmButtonText: 'Login',
                               customClass: {
                                   title: 'swal-title',
                                   htmlContainer: 'swal-text-container',
                                   popup: 'swal-popup'
                               },
                               showCloseButton: true,
                               //allowOutsideClick: false
                           }).then((result) => {
                               if (result.isConfirmed) {
                                   window.location.href = '{{ route('transporter.login') }}';
                               }
                           });
                       } else {
                            $('.response_api').css('display', 'block');
                            $('#response-message').text('Invalid password token');
                       }
                    },
                    error: function (xhr) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something went wrong!.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });

        $(".password-toggle").on("click", function() {
            const passwordField = $(this).siblings(".password");
            const fieldType = passwordField.attr("type");
            const newFieldType = fieldType === "password" ? "text" : "password";
            passwordField.attr("type", newFieldType);

            // Toggle eye icon class
            $(this).toggleClass("fa-eye fa-eye-slash");
        });

        $('#password, #cnf_password').on('keyup', function() {
            // Hide the response_api div if it is currently displayed
            if ($('.response_api').css('display') === 'block') {
                $('.response_api').hide();
            }
        });
    </script>
@endsection

