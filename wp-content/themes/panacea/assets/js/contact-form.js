/**
 * Contact Form
 */
jQuery(document).ready(function ($) {
    var showErrors = true; //show text errors?
    var sendingMessage = '';
    var sendMessage = 'send';
    var sendMessageNewsletter = 'added';
    var debug = false; //show system errors

    $('.contactForm, .newsletterForm').submit(function () {
        var $f = $(this);
        var $submit = $f.find('input[type="submit"]');

        //prevent double click
        if ($submit.hasClass('disabled')) {
            return false;
        }

        $submit.attr('data-value', $submit.val()).val(sendingMessage ? sendingMessage : $submit.val()).addClass('disabled');

        $.ajax({
            url: $f.attr('action'),
            method: 'post',
            data: $f.serialize(),
            dataType: 'json',
            success: function (data) {
                $('input.error', $f).removeClass('error');
                $('span.error', $f).remove();

                if (data.errors) {
                    $.each(data.errors, function (i, k) {
                        var input = $('input[name=' + i + ']', $f).addClass('error');
                    });
                } else {
                    $submit.val($f.hasClass('newsletterForm') ? sendMessageNewsletter : sendMessage);
                    return false;
                }

                $submit.val($submit.attr('data-value')).removeClass('disabled');
            },
            error: function (data) {
                if (debug) {
                    alert(data.responseText);
                }
                $submit.val($submit.attr('data-value')).removeClass('disabled');
            }
        });

        return false;
    });
});