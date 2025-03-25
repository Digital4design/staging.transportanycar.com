// for passowrd hide show
jQuery(".toggle-hide-show").click(function() {
    jQuery(this).toggleClass("fa-eye fa-eye-slash");
    input = jQuery(this).parent().find("input");
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

// for tel
// var input = document.querySelector("#phone");
// var iti = window.intlTelInput(input, {
//     separateDialCode: true,
//     utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/utils.js",
// });

// // store the instance variable so we can access it in the console e.g. window.iti.getNumber()
// window.iti = iti;

function getValue() {
    var iti = intlTelInput(input);
    var number = iti.getNumber();
    alert(number);
}
//login validation

$(function () {
    $(document).on('submit', '#form_login', function () {
        
        if ($('.login-error').text().trim() !== '') {
            $('.login-error').text(''); // Clear the text content
        }
        $(this).validate({
            rules: {
                email: {required: true,maxlength: 50},
                password: {required: true, minlength:6}
            },
            messages: {
                email: {required: 'Please enter your email address'},
                password: {required: 'Please enter password'}
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.insertAfter($(element));
            },
        });
        return $(this).valid();
    });
});
$(document).ready(function() {
    // Remove general error message on keyup in any field
    $('.form-control').keyup(function() {
        $(this).closest('.signnetwork').find('#general-error').text('');
    });

    // Remove email error message on keyup
    $('#email').keyup(function() {
        $(this).closest('.col-lg-12').find('.login-error').text('');
    });

    // Remove password error message on keyup
    $('#password').keyup(function() {
        $(this).closest('.col-lg-12').find('.login-error').text('');
    });
});
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