@extends('layouts.web.app')

@section('head_css')
<style>
    /* .contact-footer .modal-title {
        font-size: 20px;
        line-height: 25px;
        font-weight: 500;
        text-align: left;
    } */
    .wd_contact_us h2 {
        font-size: 20px;
        line-height: 25px;
        font-weight: 500;
        margin-top: 25px;
        margin-bottom: 25px;
     }
    .contact-footer li {
        margin-bottom: 20px;
    }
    .contact-footer li > span {
        font-size: 16px;
        line-height: 20px;
        font-weight: 300;
    }
    .contact-footer li > span:first-child {
        font-weight: 500;
        margin-bottom: 5px;
    }
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
                                        <div class="form-group title">
                                            <input type="tel" class="form-control" name="mobile" placeholder="Enter your mobile">
                                            <span class="toggle-icon">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="How can we help?" name="message"></textarea>
                                        </div>
                                        <button type="submit" class="wd-login-btn send_btn">Submit <svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.51562 1.81055L8.20527 8.50019L1.51562 15.1898" stroke="white" stroke-width="2.00689" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <h2>Need help? Contact our support team:</h2>
                        <ul class="contact-footer row align-items-center">
                            <li class="col-12 col-md-6">
                                <span class="d-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.86343 6.36195C6.74343 5.43495 7.05443 5.17495 7.42943 5.05395C7.68895 4.98595 7.96112 4.98217 8.22243 5.04295C8.56643 5.14295 8.65743 5.21895 9.78543 6.34295C10.7764 7.32995 10.8754 7.43695 10.9704 7.62995C11.1521 7.96873 11.1805 8.36894 11.0484 8.72995C10.9484 9.00495 10.8064 9.18695 10.2054 9.78995L9.81343 10.183C9.71048 10.2876 9.68629 10.4464 9.75343 10.577C10.6244 12.0628 11.86 13.3019 13.3434 14.177C13.5142 14.2684 13.7245 14.2389 13.8634 14.104L14.2404 13.733C14.4734 13.4941 14.7202 13.2691 14.9794 13.059C15.3866 12.809 15.8939 12.7867 16.3214 13C16.5304 13.1 16.5994 13.162 17.6214 14.182C18.6754 15.233 18.7054 15.266 18.8214 15.507C19.0397 15.9059 19.0374 16.3891 18.8154 16.786C18.7024 17.01 18.6334 17.091 18.0404 17.697C17.6824 18.063 17.3454 18.397 17.2914 18.446C16.8022 18.851 16.1746 19.0497 15.5414 19C14.383 18.8944 13.2617 18.5363 12.2564 17.951C10.0296 16.7711 8.13383 15.0521 6.74243 12.951C6.43937 12.5112 6.16994 12.0492 5.93643 11.569C5.31001 10.4953 4.98653 9.27189 5.00043 8.02895C5.04825 7.37871 5.36008 6.77637 5.86343 6.36195Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>Call:</span>
                                </span>
                                <span class="d-block">0808 155 7979</span>
                            </li>
                            <li class="col-12 col-md-6">
                                <span class="d-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M19.2505 9.02905C19.2652 9.443 19.6127 9.76663 20.0267 9.75189C20.4406 9.73715 20.7643 9.38962 20.7495 8.97567L19.2505 9.02905ZM15.714 5.00236V5.75236C15.7224 5.75236 15.7307 5.75222 15.7391 5.75194L15.714 5.00236ZM9.286 5.00236L9.26095 5.75194C9.2693 5.75222 9.27765 5.75236 9.286 5.75236V5.00236ZM4.25048 8.97567C4.23573 9.38962 4.55936 9.73715 4.97331 9.75189C5.38726 9.76663 5.73478 9.443 5.74952 9.02905L4.25048 8.97567ZM20.75 9.00236C20.75 8.58815 20.4142 8.25236 20 8.25236C19.5858 8.25236 19.25 8.58815 19.25 9.00236H20.75ZM20 15.0024L20.7495 15.029C20.7498 15.0202 20.75 15.0113 20.75 15.0024H20ZM15.714 19.0024L15.7391 18.2528C15.7307 18.2525 15.7224 18.2524 15.714 18.2524V19.0024ZM9.286 19.0024V18.2524C9.27765 18.2524 9.2693 18.2525 9.26095 18.2528L9.286 19.0024ZM5 15.0024H4.25C4.25 15.0113 4.25016 15.0202 4.25048 15.029L5 15.0024ZM5.75 9.00236C5.75 8.58815 5.41421 8.25236 5 8.25236C4.58579 8.25236 4.25 8.58815 4.25 9.00236H5.75ZM20.3783 9.64996C20.736 9.44103 20.8565 8.98172 20.6476 8.62406C20.4387 8.2664 19.9794 8.14583 19.6217 8.35476L20.3783 9.64996ZM14.736 12.0774L14.3577 11.4297L14.3515 11.4334L14.736 12.0774ZM10.264 12.0774L10.6486 11.4334L10.6423 11.4298L10.264 12.0774ZM5.3783 8.35476C5.02064 8.14583 4.56133 8.2664 4.3524 8.62406C4.14347 8.98172 4.26404 9.44103 4.6217 9.64996L5.3783 8.35476ZM20.7495 8.97567C20.6534 6.27536 18.3895 4.16252 15.6889 4.25278L15.7391 5.75194C17.6129 5.68931 19.1838 7.15537 19.2505 9.02905L20.7495 8.97567ZM15.714 4.25236H9.286V5.75236H15.714V4.25236ZM9.31105 4.25278C6.61054 4.16252 4.34663 6.27536 4.25048 8.97567L5.74952 9.02905C5.81625 7.15537 7.38712 5.68931 9.26095 5.75194L9.31105 4.25278ZM19.25 9.00236V15.0024H20.75V9.00236H19.25ZM19.2505 14.9757C19.1838 16.8494 17.6129 18.3154 15.7391 18.2528L15.6889 19.7519C18.3895 19.8422 20.6534 17.7294 20.7495 15.029L19.2505 14.9757ZM15.714 18.2524H9.286V19.7524H15.714V18.2524ZM9.26095 18.2528C7.38712 18.3154 5.81624 16.8494 5.74952 14.9757L4.25048 15.029C4.34663 17.7294 6.61054 19.8422 9.31105 19.7519L9.26095 18.2528ZM5.75 15.0024V9.00236H4.25V15.0024H5.75ZM19.6217 8.35476L14.3577 11.4298L15.1143 12.725L20.3783 9.64996L19.6217 8.35476ZM14.3515 11.4334C13.2111 12.1145 11.7889 12.1145 10.6485 11.4334L9.87946 12.7213C11.4935 13.6852 13.5065 13.6852 15.1205 12.7213L14.3515 11.4334ZM10.6423 11.4298L5.3783 8.35476L4.6217 9.64996L9.8857 12.725L10.6423 11.4298Z" fill="black"/>
                                    </svg>
                                    <span>Email:</span>
                                </span>
                                <span class="d-block">support@transportanycar.com</span>
                            </li>
                            <li class="col-12 col-md-6">
                                <span class="d-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9997 19.0007C15.337 19.0009 18.2104 16.6451 18.8644 13.3725C19.5184 10.0998 17.7711 6.82062 14.69 5.53817C11.6089 4.25573 8.05095 5.32674 6.18976 8.0969C4.32856 10.8671 4.6818 14.5659 7.03367 16.9337C8.34765 18.2566 10.1351 19.0006 11.9997 19.0007Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.9106 10.1637V13.5757H14.1776" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>Opening hours:</span>
                                </span>
                                <span class="d-block">Monday - Sunday</span>
                                <span class="d-block">8am-7pm</span>
                            </li>
                            <li class="col-12 col-md-6">
                                <span class="d-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 4.25C11.5858 4.24999 11.25 4.58577 11.25 4.99998C11.25 5.4142 11.5858 5.74999 12 5.75L12 4.25ZM13.913 5.376L14.1971 4.68189L14.1968 4.68179L13.913 5.376ZM16.157 7.2L15.5356 7.61991L15.536 7.62059L16.157 7.2ZM17 9.94H17.75L17.75 9.9388L17 9.94ZM15.535 13.433L14.9296 12.9903C14.9205 13.0027 14.9118 13.0155 14.9034 13.0285L15.535 13.433ZM14.083 15.7L13.4514 15.2955L13.4488 15.2997L14.083 15.7ZM12 19L11.3662 19.4009C11.5037 19.6184 11.7431 19.7501 12.0004 19.75C12.2576 19.7499 12.4969 19.6179 12.6342 19.4003L12 19ZM9.917 15.707L10.5508 15.3061L10.5489 15.303L9.917 15.707ZM8.465 13.436L9.09689 13.032C9.08859 13.019 9.0799 13.0063 9.07082 12.9939L8.465 13.436ZM7 9.943L6.25 9.94226V9.943H7ZM7.843 7.2L8.46397 7.62059L8.46401 7.62053L7.843 7.2ZM10.087 5.379L10.3707 6.07329L10.3719 6.07277L10.087 5.379ZM12.0011 5.75C12.4153 5.74939 12.7506 5.41311 12.75 4.9989C12.7494 4.58468 12.4131 4.24939 11.9989 4.25L12.0011 5.75ZM12 10.837C11.5858 10.837 11.25 11.1728 11.25 11.587C11.25 12.0012 11.5858 12.337 12 12.337V10.837ZM12 7.543C11.5858 7.543 11.25 7.87879 11.25 8.293C11.25 8.70721 11.5858 9.043 12 9.043V7.543ZM12.0185 12.3428C12.4326 12.3326 12.76 11.9886 12.7498 11.5745C12.7396 11.1604 12.3956 10.833 11.9815 10.8432L12.0185 12.3428ZM10.5399 10.7817L11.1863 10.4014L10.5399 10.7817ZM10.5399 9.11131L9.89347 8.73099L10.5399 9.11131ZM11.9815 9.04977C12.3956 9.05998 12.7396 8.73257 12.7498 8.31848C12.76 7.90439 12.4326 7.56043 12.0185 7.55023L11.9815 9.04977ZM12 5.75C12.5587 5.75001 13.112 5.85877 13.6292 6.07021L14.1968 4.68179C13.4995 4.39667 12.7534 4.25002 12 4.25L12 5.75ZM13.6289 6.07011C14.4035 6.38715 15.067 6.92641 15.5356 7.61991L16.7784 6.78009C16.144 5.84118 15.2458 5.11111 14.1971 4.68189L13.6289 6.07011ZM15.536 7.62059C16 8.30566 16.2487 9.11379 16.25 9.94121L17.75 9.9388C17.7482 8.81231 17.4097 7.71209 16.778 6.77941L15.536 7.62059ZM16.25 9.94C16.25 10.5018 16.1632 10.9117 15.9749 11.3363C15.7755 11.7859 15.453 12.2747 14.9296 12.9903L16.1404 13.8757C16.665 13.1583 17.075 12.5556 17.3461 11.9445C17.6283 11.3083 17.75 10.6882 17.75 9.94H16.25ZM14.9034 13.0285L13.4514 15.2955L14.7146 16.1045L16.1666 13.8375L14.9034 13.0285ZM13.4488 15.2997L11.3658 18.5997L12.6342 19.4003L14.7172 16.1003L13.4488 15.2997ZM12.6338 18.5991L10.5508 15.3061L9.28316 16.1079L11.3662 19.4009L12.6338 18.5991ZM10.5489 15.303L9.09689 13.032L7.83311 13.84L9.28511 16.111L10.5489 15.303ZM9.07082 12.9939C8.54713 12.2763 8.22452 11.7875 8.02501 11.338C7.83673 10.9138 7.75 10.5047 7.75 9.943H6.25C6.25 10.6913 6.37177 11.3107 6.65399 11.9465C6.92498 12.557 7.33487 13.1597 7.85918 13.8781L9.07082 12.9939ZM7.75 9.94374C7.75082 9.11546 7.99948 8.30638 8.46397 7.62059L7.22203 6.77941C6.58965 7.71307 6.25112 8.81459 6.25 9.94226L7.75 9.94374ZM8.46401 7.62053C8.933 6.92797 9.59638 6.38964 10.3707 6.07329L9.80333 4.68471C8.75507 5.11301 7.85693 5.84184 7.22199 6.77947L8.46401 7.62053ZM10.3719 6.07277C10.8889 5.86045 11.4422 5.75082 12.0011 5.75L11.9989 4.25C11.2453 4.25111 10.4992 4.39894 9.80207 4.68523L10.3719 6.07277ZM12 12.337C12.8564 12.337 13.6477 11.8801 14.0759 11.1385L12.7768 10.3885C12.6166 10.666 12.3205 10.837 12 10.837V12.337ZM14.0759 11.1385C14.504 10.3969 14.504 9.48313 14.0759 8.7415L12.7768 9.4915C12.9371 9.76903 12.9371 10.111 12.7768 10.3885L14.0759 11.1385ZM14.0759 8.7415C13.6477 7.99987 12.8564 7.543 12 7.543V9.043C12.3205 9.043 12.6166 9.21397 12.7768 9.4915L14.0759 8.7415ZM11.9815 10.8432C11.6559 10.8513 11.3515 10.6821 11.1863 10.4014L9.89347 11.162C10.3349 11.9122 11.1483 12.3642 12.0185 12.3428L11.9815 10.8432ZM11.1863 10.4014C11.0211 10.1206 11.0211 9.77238 11.1863 9.49163L9.89347 8.73099C9.45207 9.48122 9.45207 10.4118 9.89347 11.162L11.1863 10.4014ZM11.1863 9.49163C11.3515 9.21088 11.6559 9.04175 11.9815 9.04977L12.0185 7.55023C11.1483 7.52878 10.3349 7.98076 9.89347 8.73099L11.1863 9.49163Z" fill="black"/>
                                    </svg>
                                    <span>Address:</span>
                                </span>
                                <span class="d-block">128 City Road,</span>
                                <span class="d-block">London, EC1V 2NX</span>
                            </li>
                        </ul>
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
