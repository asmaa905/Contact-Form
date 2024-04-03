/*global $, alert, console */
$(function () {
    'use strict';
    var userError = true,
        emailError = true,
        msgError = true; //setting error status

    $('.username').blur(function() {
        if( $(this).val().length < 4 ) { // Show Error
            $(this).css('border', '1px solid #f00')
            .parent().find('.custom-alert').fadeIn(200).end()
            .find('.asterisx').fadeIn(100);
            userError = true;
        } else {  // No Errors
            $(this).css('border', '1px solid #080')
            .parent().find('.custom-alert').fadeOut(200).end()
            .find('.asterisx').fadeOut(100);
            userError = false;

        }
    });
    $('.email').blur(function() {
        if( $(this).val() === '' ) { //this is wrong
            $(this).css('border', '1px solid #f00');
            $(this).parent().find('.custom-alert').fadeIn(200);
            $(this).parent().find('.asterisx').fadeIn(100);
            emailError = true;


        } else {
            $(this).css('border', '1px solid #080');
            $(this).parent().find('.custom-alert').fadeOut(200);
            $(this).parent().find('.asterisx').fadeOut(100);
            emailError = false;

        }

    });
    $('.descripton').blur(function() {
        if( $(this).val().length < 10 ) { //this is wrong
            $(this).css('border', '1px solid #f00');
            $(this).parent().find('.custom-alert').fadeIn(200);
            $(this).parent().find('.asterisx').fadeIn(100);
            msgError =true;

        } else {
            $(this).css('border', '1px solid #080');
            $(this).parent().find('.custom-alert').fadeOut(200);
            $(this).parent().find('.asterisx').fadeOut(100);
            msgError = false;

        }

    });
    // Submit Form Validation

    $('.contact-form').submit(function (e) {
        if(userError === true || emailError === true || msgError === true ) {
            e.preventDefault();
            $('username','descripton','email').blur();

        } 
    })
});