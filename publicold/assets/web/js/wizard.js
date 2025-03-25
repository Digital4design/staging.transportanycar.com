var selectedDeliveryTimeframe='';
$(document).on('change', '#delivery_timeframe', function() {
    // Update the delivery timeframe value
    selectedDeliveryTimeframe = $(this).val();
});
jQuery(document).ready(function() {
    // Click on next button
    jQuery('.form-wizard-next-btn').click(function() {
        var parentFieldset = jQuery(this).closest('.wizard-fieldset');
        var currentActiveStep = jQuery(this).closest('.form-wizard').find('.form-wizard-steps .active');
        var nextWizardStep = true;

        parentFieldset.find('.wizard-required').each(function(){
            var thisValue = jQuery(this).val();
            var message = jQuery(this).attr('data-message');

            if ($("#main_form").valid()) {
                jQuery(this).siblings(".wizard-form-error").slideUp();
            } else {
                jQuery(this).siblings(".wizard-form-error").slideDown();
                nextWizardStep = false;
            }

            if (thisValue.trim() === "") {
                jQuery(this).siblings(".wizard-form-error").slideDown();
                nextWizardStep = false;
            } else {
                jQuery(this).siblings(".wizard-form-error").slideUp();
            }
        });
        var deliveryDate = $("#delivery_timeframe_date").val().trim();
        if ((selectedDeliveryTimeframe === "On a Specific Date" || selectedDeliveryTimeframe === "Between Specific Dates") && deliveryDate === "") {
            $("#delivery_timeframe_date").siblings(".wizard-form-error").slideDown();
            nextWizardStep = false;
        } else {
            $("#delivery_timeframe_date").siblings(".wizard-form-error").slideUp();
        }
        if (nextWizardStep) {
            parentFieldset.removeClass("show");
            currentActiveStep.removeClass('active').addClass('activated').next().addClass('active');
            parentFieldset.next('.wizard-fieldset').addClass("show");
            jQuery(document).find('.wizard-fieldset').each(function(){
                if (jQuery(this).hasClass('show')) {
                    var formAtrr = jQuery(this).attr('data-tab-content');
                    jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
                        if (jQuery(this).attr('data-attr') == formAtrr) {
                            jQuery(this).addClass('active');
                            var innerWidth = jQuery(this).innerWidth();
                            var position = jQuery(this).position();
                            jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
                        } else {
                            jQuery(this).removeClass('active');
                        }
                    });
                }
            });
        }
    });

    // Click on previous button
    jQuery('.form-wizard-previous-btn').click(function() {
        var prev = jQuery(this);
        var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
        prev.parents('.wizard-fieldset').removeClass("show");
        prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show");
        currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active');
        jQuery(document).find('.wizard-fieldset').each(function(){
            if (jQuery(this).hasClass('show')) {
                var formAtrr = jQuery(this).attr('data-tab-content');
                jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
                    if (jQuery(this).attr('data-attr') == formAtrr) {
                        jQuery(this).addClass('active');
                        var innerWidth = jQuery(this).innerWidth();
                        var position = jQuery(this).position();
                        jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
                    } else {
                        jQuery(this).removeClass('active');
                    }
                });
            }
        });
    });

    // Click on form submit button
    jQuery(document).on("click", ".form-wizard .form-wizard-submit", function() {
        var parentFieldset = jQuery(this).parents('.wizard-fieldset');
        parentFieldset.find('.wizard-required').each(function() {
            var thisValue = jQuery(this).val();
            var message = jQuery(this).attr('data-message');
            if (thisValue == "") {
                jQuery(this).siblings(".wizard-form-error").slideDown();
            } else {
                jQuery(this).siblings(".wizard-form-error").slideUp();
            }
        });
    });

    // Focus on input field check empty or not
    jQuery(".form-control").on('focus', function() {
        var tmpThis = jQuery(this).val();
        if (tmpThis == '') {
            jQuery(this).parent().addClass("focus-input");
        } else if (tmpThis != '') {
            jQuery(this).parent().addClass("focus-input");
        }
    }).on('blur', function() {
        var tmpThis = jQuery(this).val();
        if (tmpThis == '') {
            jQuery(this).parent().removeClass("focus-input");
            jQuery(this).siblings('.wizard-form-error').slideDown("3000");
        } else if (tmpThis != '') {
            jQuery(this).parent().addClass("focus-input");
            jQuery(this).siblings('.wizard-form-error').slideUp("3000");
        }
    });
});

$(document).ready(function() {
    $('#add').click(function() {
        $('.add_formgrp').slideDown("slow").addClass("active");
    });
    $('#remove').click(function() {
        $('.add_formgrp').slideUp("slow").removeClass("active");
    });
});