<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!-- COMPULSORY META TAGS -->
        <meta charset="utf-8">
        <meta name="_token" content="{{ csrf_token() }}" />
        <meta http-equiv='cache-control' content='no-cache'>
        <meta http-equiv='expires' content='0'>
        <meta http-equiv='pragma' content='no-cache'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon/android-chrome-192x192.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
        <link rel="manifest" href="/favicon/site.webmanifest">
        <!-- SITE TITLE -->
        <title>{{ isset($title) ? $title : 'Building Capacity For Greater Success.'; }}</title>
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
        <!-- General CSS -->
        <link rel="stylesheet" type="text/css" href="/css/common.css">
        <!-- Stype CSS -->
        <link rel="stylesheet" type="text/css" href="/css/index.css">
        <!-- ico font css -->
        <link rel="stylesheet" type="text/css" href="/icofont/icofont.min.css">
        <!-- summernote CSS -->
        <link rel="stylesheet" type="text/css" href="/summernote/summernote-lite.min.css">
    </head>
    <body>
        <div class="wrapper bg-light min-vh-100">
            @include('layouts.navbar')
            @yield('content')
            @include('layouts.footer')
        </div>
        <script src="/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <!-- Articles JS -->
        <script src="/js/articles.js"></script>
        <!-- Summernote -->
        <script src="/summernote/summernote-lite.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            var addArticle = $('#add-article-description');
            if (addArticle) {
                addArticle.summernote({
                    tabsize: 4,
                    height: 600
                });
            }

            <?php if(!empty($articles)): ?>
                <?php foreach($articles as $article): ?>
                    <?php $id = empty($article->id) ? 0 : $article->id; ?>
                    var editArticle = $('#edit-article-description-<?= $id; ?>');
                    if (editArticle) {
                        editArticle.summernote({
                            tabsize: 4,
                            height: 600
                        });
                    }
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if(!empty($articles)): ?>
                <?php foreach($articles as $article): ?>
                    <?php $id = empty($article->id) ? 0 : $article->id; ?>
                    var addArticleImageButton = $('.add-article-image-<?= $id; ?>');
                    if (addArticleImageButton) {
                        addArticleImageButton.click(function(event) {
                            if (confirm('Change Image?')) {
                                var id = $(this).attr('data-id');
                                var input = $('.article-image-input-'+id);
                                var loader = $('.add-article-image-loader-'+id);

                                input.trigger('click');
                                input.change(function(event) {
                                    loader.removeClass('d-none').fadeIn();
                                    var files = event.target.files
                                    var formData = new FormData();
                                    formData.append('image', files[0]);

                                    var request = $.ajax({
                                        method: 'post',
                                        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                                        url: input.attr('data-url'),
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        dataType: 'json'
                                    });

                                    request.done(function(response){
                                        if (response.status === 1) {
                                            var imagePreview = $('.article-image-preview-'+id);
                                            imagePreview.file = files[0];    
                                            var reader = new FileReader();
                                            reader.onload = (function(picture) { 
                                                return (function(event) { 
                                                    picture.attr('src', event.target.result);
                                                    loader.addClass('d-none').fadeOut(); 
                                                });
                                            })(imagePreview);
                                            reader.readAsDataURL(files[0]);
                                        }else {
                                            loader.addClass('d-none').fadeOut();
                                            alert(response.info);
                                        }
                                    });

                                    request.fail(function(response) {
                                        loader.addClass('d-none').fadeOut();
                                        alert('Network Error. Try Again');
                                    });
                                });
                            }
                        });
                    }
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if(!empty($allBooks)): ?>
                <?php foreach($allBooks as $book): ?>
                    <?php $id = empty($book->id) ? 0 : $book->id; ?>
                    var addBookImageButton = $('.add-book-image-<?= $id; ?>');
                    if (addBookImageButton) {
                        addBookImageButton.click(function(event) {
                            if (confirm('Are Your Sure To Change Book Image')) {
                                var id = $(this).attr('data-id');
                                var input = $('.book-image-input-'+id);
                                var loader = $('.add-book-image-loader-'+id);

                                input.trigger('click');
                                input.change(function(event) {
                                    loader.removeClass('d-none').fadeIn();
                                    var files = event.target.files
                                    var formData = new FormData();
                                    formData.append('bookimage', files[0]);

                                    var request = $.ajax({
                                        method: 'post',
                                        url: input.attr('data-url'),
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        dataType: 'json'
                                    });

                                    request.done(function(response){
                                        if (response.status === 1) {
                                            var imagePreview = $('.book-image-preview-'+id);
                                            imagePreview.file = files[0];    
                                            var reader = new FileReader();
                                            reader.onload = (function(picture) { 
                                                return (function(event) { 
                                                    picture.attr('src', event.target.result);
                                                    loader.addClass('d-none').fadeOut(); 
                                                });
                                            })(imagePreview);
                                            reader.readAsDataURL(files[0]);
                                        }else {
                                            loader.addClass('d-none').fadeOut();
                                            alert(response.info);
                                        }
                                    });

                                    request.fail(function(response) {
                                        loader.addClass('d-none').fadeOut();
                                        alert('Network Error. Try Again');
                                    });
                                });
                            }
                        });
                    }
                <?php endforeach; ?>
            <?php endif; ?>
        </script>
    </body>
</html>