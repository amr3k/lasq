/*global console,$,alert,prompt,confirm*/
$(function () {
    "use strict";
    // Showing confirmation message when clicking an element contains 'confirm' class :
    $('.confirm').on('click', function () {
        confirm("Are you sure? This can't be undone");
    });
    // Hide Placeholder on focus
    $('[placeholder]').focus(function () {
        $(this).attr('data-text', $(this).attr('placeholder'));
        $(this).attr('placeholder', '');
    }).blur(function () {
        $(this).attr('placeholder', $(this).attr('data-text'));
    });
    // Form Validation
    /*
    var submitBtn   =   $('input[type= "submit"]');
    submitBtn.attr("disabled", "disabled");
    // Username validation
    $('input[name*="user"]').blur(function () {
        var userInput   =   $('input[name*="user"]'),
            userName    =   userInput.val(),
            userPattern =   new RegExp('^([a-z0-9]{6,20})$');
        if (userPattern.test(userName)) {
            $('.form-v').remove();
            submitBtn.removeAttr('disabled');
        } else {
            $('.form-v').remove();
            $(this).after('<span class="text-center form-v col-lg-2" role="alert">Bad</span>');
        }
    })();
    // Name Validation
    $('input[name*="name"]').blur(function () {
        var nameInput   =   $('input[name*="name"]'),
            name        =   nameInput.val(),
            namePattern =   new RegExp('^([a-zA-Z]{6,32})/$');
        if (namePattern.test(name)) {
            $('.form-v').remove();
            submitBtn.removeAttr('disabled');
        } else {
            $('.form-v').remove();
            $(this).after('<span class="text-center form-v col-lg-2" role="alert">Bad</span>');
            alert("Bad");
        }
    })();
    */
    // Inserting an eye icon after each password field
    $('[name*="pass"]').each(function () {
        if ($(this).attr('type') === 'password') {
            $(this).after('<i passid="' + $(this).attr("id") + '" class="show-pass fa fa-eye fa-2x"></i>');
        }
    });
    // Converting password field to text when clicking on eye icon :
    $('.show-pass').on("click", function () {
        var passid  =   '#' + $(this).attr('passid');
        if ($(this).hasClass('fa-eye')) {
            $(passid).attr("type", 'text');
            $(this).removeClass('show-pass fa fa-eye fa-2x').attr("class", "show-pass fa fa-eye-slash fa-2x");
        } else {
            $(passid).attr("type", 'password');
            $(this).removeClass('show-pass fa fa-eye-slash fa-2x').attr("class", "show-pass fa fa-eye fa-2x");
        }
    });
});