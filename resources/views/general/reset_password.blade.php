@extends('layouts.transporter.app')

@section('head_css')
@endsection
<style>
.reset_heading{
    margin-bottom: 30px;
}

.password-toggle {
    position: absolute;
    top: 11px;
    right: 25px;
    /* transform: translateY(-50%); */
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

.error-message {
    font-size: 12px;
    color: red;
    display: block;
    text-align: left;
}

</style>

@section('content')
    @include('layouts.transporter.head-web-menu')
    <main>
        <section class="join_network_main trans_forgotpass position-relative">
            <div class="container">
            <div class="position-relative text-center reset_heading">
                <h1 class="banner_newtext d-block text-center">Password reset</h1>
            </div>
                <form class="trans_login_blog" name="form_login" id="form_form" method="post" autocomplete="off">
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
                            <div class="col-lg-12">
                               <span id="response-message" class="error-message" ></span>
                            </div>
                        </div>
                        <div class="btngroup">
                        <div class="kt-login__actions reset_psss">
                            <button id="kt_login_signin_submit"
                                    class="btn btn-pill kt-login__btn-primary">{{__('Reset Password')}}</button>
                            <a href="{{route('admin.login')}}" id="kt_login_forgot_cancel"
                            class="btn btn-pill kt-login__btn-secondary">Login
                            </a>
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
        // Custom validation method for secure password
        $.validator.addMethod("securePassword", function(value, element) {
            if (!value) {
                return true; // Return true for empty value
            }
            return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+}{"':;?/>.<,]).{6,}$/.test(value);
        }, "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character."); 

        $("#form_form").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 6,
                    securePassword: true,
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
                    url: '{{ route('front.admin_update_password') }}',
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
                                   window.location.href = '{{ route('admin.login') }}';
                               }
                           });
                       } else {
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
    </script>
@endsection

