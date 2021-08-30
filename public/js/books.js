(function ($) {

	'use strict';

    $('.add-book-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
    	var button = $('.add-book-button');
    	var spinner = $('.add-book-spinner');
    	var message = $('.add-book-message');
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
            if (response.status === 0 && response.field === 'title') {
                handleButton(button, spinner);
                handleErrors($('.title'), $('.title-error'), response.info);

            }else if (response.status === 0 && response.field === 'caption') {
                handleButton(button, spinner);
                handleErrors($('.caption'), $('.caption-error'), response.info);

            }else if (response.status === 0 && response.field === 'author') {
                handleButton(button, spinner);
                handleErrors($('.author'), $('.author-error'), response.info);

            }else if (response.status === 0 && response.field === 'price') {
                handleButton(button, spinner);
                handleErrors($('.price'), $('.price-error'), response.info);

            }else if (response.status === 0 && response.field === 'description') {
                handleButton(button, spinner);
                handleErrors($('.description'), $('.description-error'), response.info);

            } else if (response.status === 1) {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html(response.info).fadeIn();
                window.location.reload();

            } else if (response.status === 0) {
                handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
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

    $('.edit-book-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
        var button = $('.edit-book-button');
        var spinner = $('.edit-book-spinner');
        var message = $('.edit-book-message');
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
            if (response.status === 0 && response.field === 'name') {
                handleButton(button, spinner);
                handleErrors($('.name'), $('.name-error'), response.info);

            } else if (response.status === 1) {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html(response.info).fadeIn();
                window.location.reload();

            } else if (response.status === 0 && response.field === undefined) {
                handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
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

    $('.delete-book').on('click', function() {
        var caller = $(this);
        if(confirm('Are You Sure To Delete?')) {
            var request = $.ajax({
                method: 'post',
                url: caller.attr('data-url'),
                processData: false,
                contentType: false
            });

            request.done(function(response) {
                if (response.status === 1) {
                    alert(response.info);
                    window.location.reload();
                } else if (response.status === 0) {
                    alert(response.info);
                }
            });

            request.fail(function() {
                alert('Network Error. Try Again.');
            });
        }
    });

})(jQuery);
