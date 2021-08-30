(function ($) {

	'use strict';

    $('.sample-book-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
    	var button = $('.sample-book-button');
    	var spinner = $('.sample-book-spinner');
    	var message = $('.sample-book-message');
        button.attr('disabled', true);
        spinner.removeClass('d-none');
        message.hasClass('d-none') ? '' : message.fadeOut();

        var request = $.ajax({
            method: form.attr('method'),
            url: form.attr('data-action'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            dataType: 'json'
        });

        request.done(function(response){
            if (response.status === 0 && response.field === 'samplemail') {
                handleButton(button, spinner);
                handleErrors($('.samplemail'), $('.samplemail-error'), response.info);

            } else if (response.status === 1) {
                handleButton(button, spinner);
                message.removeClass('d-none text-danger').addClass('text-success');
                message.html(response.info).fadeIn();
                // window.location.reload();

            } else if (response.status === 0) {
                handleButton(button, spinner);
                message.removeClass('d-none text-success').addClass('text-danger');
                message.html(response.info).fadeIn();

            } else {
                handleButton(button, spinner);
                alert('Network Error. Try Again');
            }
        });

        request.fail(function() {
            handleButton(button, spinner);
            alert('Network Error. Try Again');
        });
    });

})(jQuery);
