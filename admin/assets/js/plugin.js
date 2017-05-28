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
     * I have no luxury to do this, I'm back-end developer :)
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