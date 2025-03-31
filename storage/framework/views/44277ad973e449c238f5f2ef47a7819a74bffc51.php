<?php $__env->startSection('head_css'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.transporter.head-web-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
    div.error {
    font-size: 12px;
    color: red;
    display: block;
    text-align: left;
}
.form-control option:selected {
    color: #000000 !important;
}


.info_sec {
    margin-left: 10px; position: relative;
}
.info_sec_details{
    display: none;
    padding-top: 20px;position: absolute;left: -17px;width: 300px;
    top: 66%;z-index: 1;  
}
.info_sec_details_contant{    
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
.info_sec:hover .info_sec_details{
    display:  block;
}
.info_sec span {
    display: flex;
    padding: 5px 0;
}
.required_document h3 {
    display: flex;
    align-items: center;
    margin-bottom: 0;
    font-size: 20px;
}

fa-eye:before {
    content: "\f06e";
    color: #7777;
}

.required_document ul li {
    list-style: disc;
    color: #777;
}

.required_document ul {
    padding-left: 20px;
    margin-top: 15px;
}

.required_document {
    border: 1px solid #CFCFCF;
    padding: 20px;
    border-radius: 10px;
    max-width: 350px;
    /* box-shadow: 0px 0px 1px 1px #CFCFCF; */
    margin-top: 20px;   
    margin-bottom: 25px;
}
.form-group {
    position: relative;
}

#passwordIcon {
    position: absolute;
    top: 13px;
    right: 15px;
    /* transform: translateY(-50%); */
    cursor: default;
    color: #ccc;
}

@media(max-width: 767px){
.requied_sec_row {
    width: 100%;
}
.info_sec_details {
    left: auto;
    right: -30px;
}
.info_sec_details:before {
    right: 31px;left: auto;
}
.requied_sec {
    margin-right: -15px;
    margin-left: -15px;
}
.requied_sec_row .document {
    justify-content: space-between;
}
.requied_sec_row .document span {
    font-size: 15px;
    margin-right: 0;
}
#passwordIcon {
    top: 16px;
}

.signnetwork .required_document{
    max-width: 100% !important;
}
.info_sec_details {
    left: 0;
    right: auto;
    transform: translateX(-62%);padding-top: 24px;    width: 390px;
}
.info_sec_details:before {
    right: 131px;
    left: auto;    top: 14px;
}


}

@media(max-width: 580px){
.info_sec_details {
    transform: translateX(-69%);
    width: 354px;
}
.info_sec_details:before {
    right: 88px;
}

.info_sec_details p {
    color: #ababab;
}

}

@media (max-width: 375px) {
    .info_sec_details {
        transform: translateX(-72%);
        width: 338px;
    }
    .info_sec_details:before {
    right: 74px;
}
}


</style>
    <main>
        <section class="join_network_main trans_signup_main">
            <div class="container">
                <div class="network_top_includes position-relative text-center">
                    <h1 class="banner_newtext d-block text-center">Join our <b>network</b>
                    </h1>
                </div>
                <form class="trans_sigup_blog" action="<?php echo e(route('transporter.signup_post')); ?>" name="form_register" id="form_register" method="post" autocomplete="off" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo get_error_html($errors); ?>

                    <a href="<?php echo e(route('transporter.home')); ?>" class="backtologin">
                        <svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 11.5L1 6.5L6 1.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>Back </a>
                    <div class="signnetwork">
                        <input type="hidden" name="main_email" id="main_email" value="">
                        <input type="hidden" name="hidden_city" id="hidden_city">
                        <input type="hidden" name="hidden_country" id="hidden_country">
                        <h6>Enter your details</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group form-error">
                                    <input type="text" placeholder="Full name" name="full_name" id="full_name" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group form-error">
                                    <input type="text" placeholder="Company name" name="company_name" id="company_name" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group form-error">
                                    
                                    
                                    <input 
                                                        type="tel" 
                                                        id="phone" 
                                                        class="form-control" 
                                                        placeholder="Mobile Phone" 
                                                        name="mobile" 
                                                        value="<?php echo e(old('mobile', $user->mobile ?? '')); ?>" 
                                                        pattern="^0[0-9]{9}$" 
                                                        title="Mobile number must start with 0 and have exactly 10 digits."
                                                        required 
                                                    />
                                </div>
                            </div>
                            <div class="col-lg-6 desk_input">
                                <div class="form-group form-error">
                                    <input type="email" placeholder="Email address" name="email" class="form-control email" />
                                </div>
                            </div>
                        </div>
                        <h6>Account details</h6>
                        <div class="row">
                            <div class="col-lg-6 order-md-1 order-1">
                                <div class="form-group form-error">
                                    <input type="text" placeholder="Create username" name="username" id="username" class="form-control" />
                                    <span style="color: #777;font-size: 12px;" class="error_msg">Do not use company names as your username </span>
                                </div>
                            </div>
                            <div class="col-lg-6 order-md-2 order-3">
                                <div class="form-group eyeicon form-error">
                                <input type="password" id="password" name="password" class="form-control no_margin" placeholder="Enter your password">
                                <i class="fas fa-eye" id="passwordIcon"></i>
                                <a href="#" id="togglePassword" style="bottom:0px;right:0px;" ></a>
                                </div>
                            </div>
                            <?php if(isMobile()): ?>
                                <div class="col-lg-6 res_input order-md-3 order-2">
                                    <div class="form-group form-error">
                                        <input type="email" placeholder="Email address" name="email" class="form-control email" />
                                    </div>
                                </div>
                            <?php endif; ?>
                            <!-- <div class="col-lg-6 order-md-4 order-4">
                                <div class="form-group form-error">
                                    <input type="password" placeholder="Confirm password" name="confirm_password" id="confirm_password" class="form-control" />
                                </div>
                            </div> -->
                        </div>
                        <!-- <div class="address_block" style="display: none;">
                            <h6 class="trans_address_link">Your address <a href="javascript:;" id="postcode_add" class="manual_link">Try address search</a></h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" placeholder="Address line 1" name="address_line1" id="address_line1" class="form-control" />
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" placeholder="Address line 2 (optional)" name="address_line2" id="address_line2" class="form-control" />
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Town" name="city" id="city" class="form-control" />
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="County" name="country" id="country" class="form-control" />
                                </div>
                                <div class="col-lg-12 res_input d-md-none d-block">
                                    <input type="text" placeholder="Postcode" name="postcode" id="postcode" class="form-control" />
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="postcode_block">
                            <h6>Your address</h6>
                            <div class="row mb-0">
                                <div class="col-lg-6">
                                    <div class="form-group form-error">
                                        <input type="text" placeholder="Postcode" name="postcode" id="postcode" class="form-control"  oninput="getAddresses(this.value)" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input_group form-group form-error">
                                        <label class="labelup">Select Address</label>
                                        <input type="text" placeholder="Street address" name="address_line1" id="address_line1" class="form-control" />
                                        <select id="address" name="address" class="form-control">
                                            <option value="">-- Select an Address --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-error">
                                        <input type="text" placeholder="Town" name="city" id="city" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-error">
                                        <input type="text" placeholder="County" name="country" id="country" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- commented document section as per requirment -->
                        <!-- <div class="upload_documents">
                            <h6>Upload Documents</h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group form-error">
                                        <a href="javascript:;" class="addmore_btn" id="add">
                                            <input type="file" accept=".pdf, .png, .jpg, .jpeg" name="driver_license" id="driver_license">
                                            <svg class="addicon" width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.5078 6.3189C13.1094 6.3189 12.5817 6.3099 11.9247 6.3099C10.3224 6.3099 9.00489 4.9572 9.00489 3.3075V0.4131C9.00489 0.1854 8.82579 0 8.60563 0H3.93849C1.76044 0 0 1.8234 0 4.0581V13.7556C0 16.1001 1.84431 18 4.12022 18H11.0694C13.2404 18 15 16.1883 15 13.9518V6.7239C15 6.4953 14.8218 6.3108 14.5999 6.3117C14.2277 6.3144 13.7795 6.3189 13.5078 6.3189Z" fill="#0077FF"></path>
                                                <path d="M11.1036 0.510633C10.8398 0.230733 10.3792 0.423333 10.3792 0.811233V3.18453C10.3792 4.17993 11.183 4.99893 12.158 4.99893C12.7739 5.00613 13.628 5.00793 14.3533 5.00613C14.7248 5.00523 14.9136 4.55253 14.656 4.27893C13.7251 3.29163 12.0583 1.52223 11.1036 0.510633Z" fill="#0077FF"></path>
                                                <path d="M9.5888 9.21259H8.06409V7.65829C8.06409 7.28839 7.77027 6.98779 7.40762 6.98779C7.04498 6.98779 6.75027 7.28839 6.75027 7.65829V9.21259H5.22645C4.8638 9.21259 4.56998 9.51319 4.56998 9.88309C4.56998 10.253 4.8638 10.5536 5.22645 10.5536H6.75027V12.107C6.75027 12.4769 7.04498 12.7775 7.40762 12.7775C7.77027 12.7775 8.06409 12.4769 8.06409 12.107V10.5536H9.5888C9.95145 10.5536 10.2462 10.253 10.2462 9.88309C10.2462 9.51319 9.95145 9.21259 9.5888 9.21259Z" fill="#fff"></path>
                                            </svg> Drivers license </a>
                                        <span id="driver_license_success" class="d-none" style="color: #52D017">Upload Successful</span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group form-error">
                                        <a href="javascript:;" class="addmore_btn" id="add">
                                            <input type="file" accept=".pdf, .png, .jpg, .jpeg" name="motor_trade_insurance" id="motor_trade_insurance">
                                            <svg class="addicon" width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.5078 6.3189C13.1094 6.3189 12.5817 6.3099 11.9247 6.3099C10.3224 6.3099 9.00489 4.9572 9.00489 3.3075V0.4131C9.00489 0.1854 8.82579 0 8.60563 0H3.93849C1.76044 0 0 1.8234 0 4.0581V13.7556C0 16.1001 1.84431 18 4.12022 18H11.0694C13.2404 18 15 16.1883 15 13.9518V6.7239C15 6.4953 14.8218 6.3108 14.5999 6.3117C14.2277 6.3144 13.7795 6.3189 13.5078 6.3189Z" fill="#0077FF"></path>
                                                <path d="M11.1036 0.510633C10.8398 0.230733 10.3792 0.423333 10.3792 0.811233V3.18453C10.3792 4.17993 11.183 4.99893 12.158 4.99893C12.7739 5.00613 13.628 5.00793 14.3533 5.00613C14.7248 5.00523 14.9136 4.55253 14.656 4.27893C13.7251 3.29163 12.0583 1.52223 11.1036 0.510633Z" fill="#0077FF"></path>
                                                <path d="M9.5888 9.21259H8.06409V7.65829C8.06409 7.28839 7.77027 6.98779 7.40762 6.98779C7.04498 6.98779 6.75027 7.28839 6.75027 7.65829V9.21259H5.22645C4.8638 9.21259 4.56998 9.51319 4.56998 9.88309C4.56998 10.253 4.8638 10.5536 5.22645 10.5536H6.75027V12.107C6.75027 12.4769 7.04498 12.7775 7.40762 12.7775C7.77027 12.7775 8.06409 12.4769 8.06409 12.107V10.5536H9.5888C9.95145 10.5536 10.2462 10.253 10.2462 9.88309C10.2462 9.51319 9.95145 9.21259 9.5888 9.21259Z" fill="#fff"></path>
                                            </svg> Motor trade insurance </a>
                                        <span id="motor_trade_insurance_success" class="d-none" style="color: #52D017">Upload Successful</span>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="required_document" style="<?php echo e(isMobile()? '' : 'max-width: 265px!important;'); ?>">
                            <h3>Required documents
                                <div class="info_sec">
                                    <span class="forMobile" id="info-icon">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg"> 
                                            <circle cx="11.5" cy="11.5" r="11.5" fill="#D9D9D9"/>
                                            <path d="M9.89286 18V9.26786H13.0179V18H9.89286ZM11.4464 8.25C10.9821 8.25 10.5952 8.09524 10.2857 7.78571C9.97619 7.46428 9.82143 7.06548 9.82143 6.58928C9.82143 6.125 9.97619 5.73214 10.2857 5.41071C10.5952 5.08928 10.9821 4.92857 11.4464 4.92857C11.9345 4.92857 12.3274 5.08928 12.625 5.41071C12.9345 5.73214 13.0893 6.125 13.0893 6.58928C13.0893 7.06548 12.9345 7.46428 12.625 7.78571C12.3274 8.09524 11.9345 8.25 11.4464 8.25Z" fill="#FDFFFA"/>
                                        </svg>
                                    </span>
                                    <div class="info_sec_details" id="info-details">
                                        <div class="info_sec_details_contant">
                                            <p>In order to be one of our transport providers you need the following documents. This is to protect not only you but the customer from damage or loss. If you’re unable to provide these documents unfortunately your application will not be considered. If you have any questions about the required documents please contact us
                                            <a href="mailto:info@transportanycar.com" style="color:#007bff !important">info@transportanycar.com</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </h3>
                            <ul>
                                <li>Valid driving licence</li>
                                <li>Goods in transit insurance</li>
                                <!-- <li>Vehicle insurance</li> -->
                            </ul>
                        </div>
                    </div>
                    
                    <div class="form-group form-check custom_check">
                        <div class="form-error">
                            <input type="checkbox" class="form-check-input" name="exampleCheck2" id="exampleCheck2" required>
                            <label class="form-check-label" for="exampleCheck2"><span>Please tick here to confirm you’ve read and accepted our <a target="_blank" href="<?php echo e(route('front.term_condition')); ?>">terms & conditions</a>.</span></label>
                        </div>
                    </div>
                    <div class="btngroup">
                        <button type="submit" class="getqt_btnincld">Sign Up Free <svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.4848 1.62323L8.35854 8.49696L1.4848 15.3707" stroke="white" stroke-width="2.06212" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/web/js/main.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXiRBNeXSlj2AjrGBL8yIqMGSekCtCBuk&libraries=places"></script>
    <script>
        var isMobile = "<?php echo e(isMobile()); ?>";
        if(isMobile) {
            document.addEventListener("DOMContentLoaded", function() {
                var infoIcon = document.getElementById("info-icon");
                var infoDetails = document.getElementById("info-details");
    
                infoIcon.addEventListener("click", function() {
                    // Toggle the 'show' class to display or hide the tooltip
                    infoDetails.classList.toggle("show");
                });
    
                // Close the tooltip if clicked outside
                document.addEventListener("click", function(event) {
                    if (!infoIcon.contains(event.target) && !infoDetails.contains(event.target)) {
                        infoDetails.classList.remove("show");
                    }
                });
            });
        }
        document.addEventListener("DOMContentLoaded", function() {
            const passwordInput = document.getElementById("password");
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
        // const driver_license = document.getElementById('driver_license');
        // const motor_trade_insurance = document.getElementById('motor_trade_insurance');
        // const previewPhoto = () => {
        //     const file = driver_license.files;
        //     $('#driver_license_success').addClass('d-none');
        //     if (file && file.length > 0) {
        //         $('#driver_license_success').removeClass('d-none');
        //         $('#form_register').validate().element('#driver_license');
        //         // toastr.success('Upload successful');
        //     }
        // }
        // const previewInsurance = () => {
        //     const file = motor_trade_insurance.files;
        //     $('#motor_trade_insurance_success').addClass('d-none');
        //     if (file && file.length > 0) {
        //         $('#motor_trade_insurance_success').removeClass('d-none');
        //         $('#form_register').validate().element('#motor_trade_insurance');
        //         // toastr.success('Upload successful');
        //     }
        // }
        // driver_license.addEventListener("change", previewPhoto);
        // motor_trade_insurance.addEventListener("change", previewInsurance);

        $('#username').on('keypress', function(e) {
            if (e.which == 32){
                return false;
            }
        });

        // Remove error message on keyup in username field
        $('#username').on('keyup', function() {
            $('.error_msg').text('Do not use company names as your username');
            $('.error_msg').css('color','');
        });

        var is_picked = false;

        var input_new = document.getElementById("address_line1");
        var autocomplete = new google.maps.places.Autocomplete(input_new);
        var geocoder = new google.maps.Geocoder();
        console.log(geocoder)
        autocomplete.addListener("place_changed", () => {
            const place = autocomplete.getPlace();
            if (!place) {
                return;
            }
            $('#latitude').val('');
            $('#longitude').val('');
            document.getElementById('latitude').value = place.geometry.location.lat();
            document.getElementById('longitude').value = place.geometry.location.lng();
            is_picked = true;
        });

        $.validator.addMethod('isPickedPicker', function (value, element, param) {
            return is_picked;
        }, "Please pick proper address from place picker");

        // $('#phone').intlTelInput({
        //     nationalMode: false,
        //     separateDialCode: true,
        //     formatOnDisplay: false,
        //     preferredCountries: ['GB'],
        // }).on("countrychange", function () {
        //     $('#country_code').val('+' + $(this).intlTelInput("getSelectedCountryData").dialCode);
        // });

        // $(document).ready(function() {
        //     $("#add_address").click(function() {
        //         $(".address_block").show();
        //         $(".postcode_block").hide();
        //         $('#address_line1').rules( "add", {
        //             required: true,
        //             messages: {
        //                 required: "Please enter address.",
        //             }
        //         });
        //         $('#city').rules( "add", {
        //             required: true,
        //             messages: {
        //                 required: "Please enter city.",
        //             }
        //         });
        //         $('#country').rules( "add", {
        //             required: true,
        //             messages: {
        //                 required: "Please enter country.",
        //             }
        //         });
        //         $('#address').rules("remove");
        //         $('#latitude').rules("remove");
        //         $('#longitude').rules("remove");
        //     });

        //     $(document).ready(function() {
        //         $("#postcode_add").click(function() {
        //             $(".postcode_block").show();
        //             $(".address_block").hide();
        //             $('#address').rules( "add", {
        //                 required: true,
        //                 messages: {
        //                     required: "Please enter address.",
        //                 }
        //             });
        //             $('#latitude').rules( "add", {
        //                 required: true,
        //                 messages: {
        //                     required: "Please enter address.",
        //                 }
        //             });
        //             $('#longitude').rules( "add", {
        //                 required: true,
        //                 messages: {
        //                     required: "Please enter address.",
        //                 }
        //             });
        //             $('#address_line1').rules("remove");
        //             $('#city').rules("remove");
        //             $('#country').rules("remove");
        //         });
        //     });
        // });

        $(function () {
            // jQuery.validator.addMethod("validateEmail", function (value, element) {
            //     var atPos = value.indexOf("@");
            //     var dotPos = value.lastIndexOf(".");
            //     return atPos > 0 && dotPos > atPos + 1 && dotPos < value.length - 1;
            // }, "Please enter valid email address");

            let phone = $('#phone').val();

            $('#form_register').validate({
                rules: {
                    full_name: {required: true},
                    company_name: {required: true},
                    address: {required: true},
                    username: {
                        required: true,
                        remote: {
                            type: 'get',
                            url: "<?php echo e(route('front.user_availability_checker')); ?>",
                            data: {
                                username: function () {
                                    return $('#username').val();
                                }
                            }
                        },
                    },
                    mobile: {
                        required: true,
                        digits: true,
                        maxlength: 11,
                        minlength: 11,
                        remote: {
                            type: 'get',
                            url: "<?php echo e(route('front.user_availability_checker')); ?>",
                            data: {
                                // country_code: function () {
                                //     return $('#country_code').val();
                                // },
                                number: function () {
                                    return $('#phone').val();
                                }
                            }
                        },
                    },
                    email: {
                        required: true,
                        maxlength: 50,
                        //validateEmail:true,
                        // remote: {
                        //     type: 'get',
                        //     url: "<?php echo e(route('front.user_availability_checker')); ?>",
                        //     data: {
                        //         email: function () {
                        //             return $('#main_email').val();
                        //         }
                        //     }
                        // },
                    },
                    password: {required: true, minlength:6},
                    //confirm_password: {required: true,equalTo: "#password"},
                    exampleCheck2: {required: true},
                    //driver_license: {required: true},
                    //motor_trade_insurance: {required: true},
                    //address_line1: {required: true},
                    postcode: {required: true},
                    //city: {required: true},
                   // country: {required: true},
                },
                messages: {
                    full_name: {required: 'Please enter full name'},
                    company_name: {required: 'Please enter company name'},
                    address: {required: 'Please select address'},
                    email: {required: 'Please enter email'},
                    //email: {required: 'Please enter email', remote: "This email is already taken"},
                    mobile: {required: 'Please enter mobile', remote: "This number is already taken", maxlength: "Please enter a valid mobile number",
                    minlength:"Please enter a valid mobile number"},
                    username: {required: 'Please enter username', remote: "This username is already taken"},
                    password: {required: 'Please enter password'},
                    //confirm_password: {required: 'Please enter confirm password',equalTo:'Password and confirm password is not same'},
                    exampleCheck2: {required: 'Please accept terms & conditions'},
                    driver_license: {required: 'Please upload your drivers license'},
                    //motor_trade_insurance: {required: 'Please upload your insurance'},
                    //address_line1: {required: 'Please enter street address'},
                    postcode: {required: 'Please enter postcode'},
                   // city: {required: 'Please enter city.'},
                   // country: {required: 'Please enter country.'},
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    // if (element.attr("name") == "mobile") {
                    //     error.insertAfter($(element).parent());
                    // } else if (element.attr("name") == "exampleCheck2") {
                    //     error.insertAfter($(element).parent());
                    // } else if (element.attr("name") == "driver_license" || element.attr("name") == "motor_trade_insurance") {
                    //     error.insertAfter($(element).parent().parent());
                    // } else {
                    //     error.insertAfter($(element));
                    // }

                    if (element.attr("name") == "mobile") {
                        error.insertAfter($(element).parent());
                    } else {
                        $(element).parents('.form-error').append(error);
                    }

                },
                submitHandler: function(form) {
                    // If email is valid, submit the form
                    var companyName = $('#company_name').val().trim().toLowerCase();
                    var username = $('#username').val().trim().toLowerCase();
                    var errorMsg = $('.error_msg');
                    // Check if company name and username are the same
                    if(companyName == username) {
                        errorMsg.text('Do not use company names as your username');
                        errorMsg.css('color', 'red');
                        return false;
                    }

                    // Check if username is an email address
                    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if(emailPattern.test(username)) {
                        errorMsg.text('Username can not be an email address');
                        errorMsg.css('color', 'red');
                        return false;
                    }

                    // Check if username is greater than 15 characters
                    if(username.length > 15) {
                        errorMsg.text('Username can not be more than 15 characters');
                        errorMsg.css('color', 'red');
                        return false;
                    }
                    if ($('.email').next('#api-error').length > 0) {
                        $('html, body').animate({
                            scrollTop: $('#api-error').offset().top - 300 // Scroll to the error message with a slight offset
                        }, 500); // Adjust the duration as needed
                        return false; // Prevent form submission if email is invalid
                    } else {
                        addOverlay();
                        form.submit();
                    }
                }
            });
        });

        // $('.email').on('keyup',function() {
        //     $('#main_email').val($(this).val());
        // });

        $(document).on('keyup', '.email', function() {
            $('#main_email').val($(this).val());
            //if ($('#api-error').hasClass('error')) 
            $('.email').next('#api-error').remove();
        });
        
        function getAddresses(pincode) {
            const api_key = '_S3UXVi3XkuVon-_WONZ5Q41730';
            const api_url = 'https://api.getaddress.io/autocomplete/' +pincode+ '?api-key=' + api_key + '&all=true';

            const addressDropdown = $("#address");
            addressDropdown.empty().append('<option value="">-- Select an Address --</option>');

            $.ajax({
                url: api_url,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                // Check if the API response contains addresses
                if (response.suggestions.length > 0) {
                    $.each(response.suggestions, function(index, address) {
                    addressDropdown.append('<option value="' + address.address + '" data-addid="'+address.id+'" >' + address.address + '</option>');
                    });
                } else {
                    addressDropdown.append('<option value="No addresses found">No addresses found</option>');
                }
                },
                error: function() {
                addressDropdown.append('<option value="Error fetching addresses">Error fetching addresses</option>');
                }
            });
        }
        $(document).on('change', '#address', function() {
            const add_id = $(this).find(':selected').data('addid');
            getAddressDetails(add_id);
        });
        function getAddressDetails(add_id) {
            const api_key = '_S3UXVi3XkuVon-_WONZ5Q41730';
            const api_url = 'https://api.getaddress.io/get/' +add_id+ '/?api-key=' + api_key;
            $.ajax({
                url: api_url,
                type: 'GET',
                success: function(response) {
                    const town = response.town_or_city;
                    const country = response.country;
                    $('#hidden_city').val(town);
                    $('#hidden_country').val(country);

                },
                error: function() {
                console.error('Error fetching address details');
                }
            });
        }

        $('.email').on('blur', function() {
            var email = $(this).val();
            if(!$('.email').hasClass('error') && email !== '')
                validateEmailWithAPI(email);
        });

        // Function to validate email using external API
        function validateEmailWithAPI(email) {
            $('.email').next('#api-error').remove();
            $.ajax({
                url: 'https://services.postcodeanywhere.co.uk/EmailValidation/Interactive/Validate/v2.00/json3.ws',
                method: 'POST',
                dataType: 'json',
                data: {
                    Key: "<?php echo e(config('constants.email_validate_key')); ?>",
                    Timeout: 15000,
                    Email: email
                },
                success: function(response) {
                    if (response.Items && response.Items.length > 0 && response.Items[0].ResponseCode === 'Valid') {
                        isEmailAvailable(email);
                        // Email is valid, no need to show error message
                        //$('.email').removeClass('error').next('.error').remove();
                    } else {
                        // Email is invalid, show error message
                         isEmailAvailable(email);
                        //$('.email').after('<div class="error" id="api-error">Please enter a valid email address</div>');
                    }
                },
                error: function() {
                    // Handle error
                    console.error('Error occurred while validating email.');
                }
            });
        }

        function isEmailAvailable(email) {
            $('.email').next('#api-error').remove(); // Remove previous error message, if any
            $.ajax({
                url: "<?php echo e(route('front.user_availability_checker')); ?>",
                method: 'get',
                data: {
                    email: email // Adjust the parameter name as per the API's requirements
                },
                success: function(response) {
                    if (response == "false") {
                        $('.email').after('<div class="error" id="api-error">This email is already taken</div>');
                    }
                },
                error: function() {
                    // Handle error
                    console.error('Error occurred while validating email.');
                }
            });
        }
    </script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.transporter.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/public_html/resources/views/transporter/guest/signup.blade.php ENDPATH**/ ?>