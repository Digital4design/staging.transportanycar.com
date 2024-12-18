@extends('layouts.web.app')

@section('head_css')
<style>
    .error {
    font-size: 15px;
    color: red;
    font-weight: 300;
}
    section.wd_contact_us {
        padding-top: 10px;
    }
    .contact_title {
        text-align: center;
        margin-bottom: 33px;
    }
    .contact_title h2 {
        font-size: 45px;
        font-weight: 700;
        margin-bottom: 20px;
    }
    .contact_title p {
        font-size: 15px;
        color: #4b4b4b;
        font-weight: 300;
        margin-bottom: 0;
    }
    .wd_email_form {
        border: 1.5px solid #cfcfcf;
    }
    .wd-login-form .form-group .form-control,
    .wd_email_form .form-group textarea.form-control {
        border: 2.05px solid #CFCFCF;
        font-size: 16px;
        font-weight: 300;
    }
    button.wd-login-btn svg {
    margin-left: 12px;
}
button.wd-login-btn {
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 15px;
}
</style>
@endsection

@section('content')
    @include('layouts.web.head-web-menu-without-mobile')
    <main>

        <section class="wd_contact_us">
            <div class="container">
                <div class="contact_title">
                    <h2>Contact us</h2>
                    <p>Fill out the form below and a member of our team will get back to you as soon as possible to help with your enquiry.</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="wd_email_form">
                            <div class="wd_title">
                                <h3>Send us a message</h3>
                            </div>
                            <form class="wd-login-form p-0" action="{{route('front.inquiry')}}" id="inquirySubmit" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group title">
                                            <input type="text" class="form-control" name="name" placeholder="Enter your name">
                                            <span class="toggle-icon">
                                            <!-- <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                              <circle r="4" transform="matrix(-1 0 0 1 8 5)" fill="#0073ca" stroke="#0073ca" stroke-width="1.5"></circle>
                                              <path d="M1 14.9347C1 14.0743 1.54085 13.3068 2.35109 13.0175C6.00404 11.7128 9.99596 11.7128 13.6489 13.0175C14.4591 13.3068 15 14.0743 15 14.9347V16.2502C15 17.4376 13.9483 18.3498 12.7728 18.1818L11.8184 18.0455C9.28565 17.6837 6.71435 17.6837 4.18162 18.0455L3.22721 18.1818C2.0517 18.3498 1 17.4376 1 16.2502V14.9347Z" fill="#aad5f5" stroke="#aad5f5" stroke-width="1.5"></path>
                                            </svg> -->
                                        </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group title">
                                            <input type="email" class="form-control" name="email" placeholder="Enter your email">
                                            <span class="toggle-icon">
                                                <!-- <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="1" d="M17 20.5H7C4 20.5 2 19 2 15.5V8.5C2 5 4 3.5 7 3.5H17C20 3.5 22 5 22 8.5V15.5C22 19 20 20.5 17 20.5Z" fill="#aad5f5"></path>
                                                    <path d="M12 12.87C11.16 12.87 10.31 12.61 9.66003 12.08L6.53002 9.57997C6.21002 9.31997 6.15003 8.84997 6.41003 8.52997C6.67003 8.20997 7.14003 8.14997 7.46003 8.40997L10.59 10.91C11.35 11.52 12.64 11.52 13.4 10.91L16.53 8.40997C16.85 8.14997 17.33 8.19997 17.58 8.52997C17.84 8.84997 17.79 9.32997 17.46 9.57997L14.33 12.08C13.69 12.61 12.84 12.87 12 12.87Z" fill="#0073ca"></path>
                                                </svg> -->
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Start typing..." name="message"></textarea>
                                        </div>
                                        <button type="submit" class="wd-login-btn send_btn">Submit <svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.51562 1.81055L8.20527 8.50019L1.51562 15.1898" stroke="white" stroke-width="2.00689" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <div class="row wd-cont-detail">
                    <div class="col-lg-4">
                        <div class="wd-loc-icon">
                            <div class="map-icon">
                                <img src="{{asset('assets/web/images/icon6.png')}}">
                            </div>
                            <div class="wd-map-txt">
                                <h3> Email</h3>
                                <p>info@transportanycar.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="wd-loc-icon">
                            <div class="map-icon">
                                <img src="{{asset('assets/web/images/icon5.png')}}">
                            </div>
                            <div class="wd-map-txt">
                                <h3> Phone</h3>
                                <p>0808 155 7979</p>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>
    </main>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $("#inquirySubmit").validate({
            //ignore: [],
            rules: {
                name: { required: true },
                email: { required: true },
                message: { required: true },
            },
            messages: {
                name: {required: 'Please enter name'},
                email: {required: 'Please enter email'},
                message: {required: 'Please enter message'},
            },
            submitHandler: function(form) {
                event.preventDefault();
                $('.send_btn').attr('disabled', true);
                var formData = $(form).serialize();
                var actionUrl = $(form).attr('action');
                $.ajax({
                    type: 'POST',
                    url: actionUrl,
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: '<span class="help-title">Message Sent</span>',
                                html: '<span class="help-text">We will be in touch shortly.</span>',
                                confirmButtonColor: '#52D017',
                                confirmButtonText: 'OK',
                                customClass: {
                                    title: 'swal-title',
                                    htmlContainer: 'swal-text-container',
                                    popup: 'swal-popup'
                                },
                                showCloseButton: true,
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            // Show SweetAlert error message
                            Swal.fire({
                                title: '<span class="help-title">Error</span>',
                                html: '<span class="help-text">' + response.message + '</span>',
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
                      $('.send_btn').attr('disabled', false);
                    },
                    error: function(xhr) {
                        // Handle error response
                        Swal.fire({
                            title: '<span class="help-title">An Error Occurred</span>',
                            html: '<span class="help-text">Please try again.</span>',
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
            }
        });
    </script>
@endsection
