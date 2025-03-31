<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('translation.Form_Layouts'); ?>
<?php $__env->stopSection(); ?>
<style>
    .password-toggle {
        position: absolute;
        top: 11px;
        right: 25px;
        /* transform: translateY(-50%); */
        cursor: default;
        color: #ccc;
    }

@media(max-width: 767px){
    .password-toggle {
        top: 16px;
    }
}
</style>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('components.breadcum', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form class="" name="main_form" id="main_form" class="main_form" method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.post_profile')); ?>">
                    <?php echo get_error_html($errors); ?>

                    <?php echo success_error_view_generator(); ?>

                    <?php echo csrf_field(); ?>
                    <div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label"><span class="text-danger">*</span>Profile Image</label>
                            <div class="col-md-8">
                                <input type="file" accept="image/*" id="profile_image" class="form-control" name="profile_image">
                            </div>
                            <div class="col-md-2">
                                <a target="_blank" href="<?php echo e($user->profile_image); ?>"><img src="<?php echo e($user->profile_image); ?>" alt="img" height="40" width="40" /></a>

                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label"><span class="text-danger">*</span><?php echo e(__('Name')); ?></label>
                            <div class="col-md-10">
                                <input type="text" name="name" id="name" value="<?php echo e($user->name); ?>" class="form-control" maxlength="25">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label"><span class="text-danger">*</span><?php echo e(__('Username')); ?></label>
                            <div class="col-md-10">
                                <input type="text" name="username" id="username" class="form-control" value="<?php echo e($user->username); ?>" maxlength="25">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label"><span class="text-danger">*</span><?php echo e(__('Email')); ?></label>
                            <div class="col-md-10">
                                <input type="email" name="email" id="email" class="form-control email" value="<?php echo e($user->email); ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Old Password</label>
                            <div class="col-md-10">
                                <input type="password" name="opassword" id="opassword" class="form-control password" placeholder="Please Enter Old Password." data-error-container="#error_opassword">
                                <i class="fas fa-eye password-toggle"></i>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">New Password</label>
                            <div class="col-md-10">
                            <input type="password" name="npassword" id="npassword" class="form-control password" placeholder="Please Enter New Password." data-error-container="#error_npassword">
                            <i class="fas fa-eye password-toggle" ></i>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Confirm Password</label>
                            <div class="col-md-10">
                            <input type="password" name="cpassword" id="cpassword" class="form-control password" placeholder="Please Enter Confirm Password." data-error-container="#error_cpassword">
                            <i class="fas fa-eye password-toggle"></i>
                            </div>
                        </div>

                    </div>
                    <div class="wd-sl-modalbtn">
                        <button type="submit" class="btn btn-primary waves-effect waves-light" id="save_changes">Save Changes</button>
                        <a href="<?php echo e(route(getDashboardRouteName())); ?>"><button type="button" class="btn btn-outline-secondary waves-effect">Close</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
$(document).ready(function() {
    // Custom validation method for secure password
    $.validator.addMethod("securePassword", function(value, element) {
        if (!value) {
            return true; // Return true for empty value
        }
        return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+}{"':;?/>.<,]).{6,}$/.test(value);
    }, "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.");        

    $("#main_form").validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                remote: {
                    type: 'get',
                    url: "<?php echo e(route('front.availability_checker')); ?>",
                    data: {
                        'type': "email",
                        'val': function() {
                            return $('#email').val();
                        }
                    },
                },
            },
            opassword: {
                required: function(element) {
                    return $("#npassword").val().length > 0;
                },
                remote: {
                    url: "<?php echo e(route('front.check_old_password')); ?>",
                    type: 'get',
                    data: {
                        opassword: function() {
                            return $("#opassword").val();
                        },
                        page_type: function() {
                            return 'admin'; // Assuming you have an input field with id="page_type"
                        }
                    }
                }
            },
            npassword: {
                minlength: 6,
                securePassword: true,
                remote: {
                    url: "<?php echo e(route('front.check_new_password')); ?>",
                    type: 'get',
                    data: {
                        npassword: function() {
                            return $("#npassword").val();
                        },
                        page_type: function() {
                            return 'admin'; // Assuming you have an input field with id="page_type"
                        }
                    }
                }
            },
            cpassword: {
                equalTo: "#npassword",
            },
            username: {
                required: true,
                remote: {
                    type: 'get',
                    url: "<?php echo e(route('front.availability_checker')); ?>",
                    data: {
                        'type': "username",
                        'val': function() {
                            return $('#username').val();
                        }
                    },
                },
            },
        },
        messages: {
            email: {
                required: 'Please Enter Email address',
                remote: "This email is already taken",
            },
            name: {
                required: 'Please Enter Name'
            },
            username: {
                remote: "This username is already taken",
            },
            opassword: {
                required: "Please Enter Old Password.",
            },
            npassword: {
                required: "Please Enter New Password.",
                minlength: "Please Enter minimum 6 characters for password",
            },
            cpassword: {
                required: "Please Enter Confirm Password.",
                equalTo: "Confirm Password does not match with new password.",
            }
        },
        invalidHandler: function(event, validator) {
            var alert = $('#kt_form_1_msg');
            alert.removeClass('kt--hide').show();
        },
        submitHandler: function(form) {
            if ($('.email').next('#api-error').length > 0) {
                return false; // Prevent form submission if email is invalid
            } else {
                addOverlay();
                form.submit();
            }
        }
    });

    // Validate email with external API on blur
    $('.email').on('blur', function() {
        $('.email').next('#api-error').remove();
        var email = $(this).val();
        if (!$('.email').hasClass('error') && email !== '') {
            validateEmailWithAPI(email);
        }
    });

    $('.email').on('keyup', function() {
        $('.email').next('#api-error').remove();
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
                    // Email is valid
                } else {
                    // Email is invalid, show error message
                    $('.email').after('<div class="error" id="api-error">Please enter a valid email address</div>');
                }
            },
            error: function() {
                console.error('Error occurred while validating email.');
            }
        });
    }

    // Function to check if any field has been modified
    function checkFormChanges() {
        var isFormDirty = false;
        $('#main_form input').each(function() {
            if ($(this).val() !== $(this).attr('defaultValue')) {
                isFormDirty = true;
                return false; // Exit the loop early
            }
        });
        return isFormDirty;
    }

    // Initially disable the "Save Changes" button
    $('#save_changes').prop('disabled', true);

    // Listen for keyup events in input fields
    $('#main_form input').on('keyup', function() {
        if (checkFormChanges()) {
            $('#save_changes').prop('disabled', false); // Enable the button
        } else {
            $('#save_changes').prop('disabled', true); // Disable the button
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
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/public_html/resources/views/general/profile.blade.php ENDPATH**/ ?>