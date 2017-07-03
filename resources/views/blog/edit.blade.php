@extends('layouts.main')

@section('css')
    <style>
        h1, h2, h3, h4, h5, p {
            color: black;
        }

        body {
            background: white;
        }

        .modal-lg {
            width: 700px;
        }

        .modal-content {
            padding: 0 50px;
        }
    </style>
@endsection

@section('js')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>

    <script>
        var isCoverImageChanged = false;

        $(document).ready(function () {
            $('#blogEdit').summernote({
                height: '50vh',                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true,                  // set focus to editable area after initializing summernote
                callbacks: {
                    onImageUpload: function (files) {
                        processImage(files[0], function (filename) {
                            var node = document.createElement('img');

                            node.setAttribute("src", '/image/' +filename);
                            node.setAttribute("width", "100%");

                            $('#blogEdit').summernote('insertNode', node);
                        });
                    }
                }
            });

            $('input#cover_image_tmp').change(function(e) {
                isCoverImageChanged = true;
            });

            $('input[type="submit"]').click(function (e) {
                e.preventDefault();
                $(this).prop('disabled', 'true');
                var file = $('input#cover_image_tmp')[0].files[0];
                if(isCoverImageChanged && file) {
                    processImage(file, function(filename) {
                        $('input#cover_image_tmp').remove();
                        $('input#cover_image').val(filename);
                        $('input#content').val($('#blogEdit').summernote('code'));
                        $('form').submit();
                    });
                } else {
                    $('input#content').val($('#blogEdit').summernote('code'));
                    $('form').submit();
                }
            });
        });

        function processImage(file, callback) {
            var data = new FormData();
            data.append("image", file);

            $.ajax({
                url: '{{ route('image.store') }}',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST'
            }).done(function (data) {
                data = JSON.parse(data);
                if(data.error) {
                    $('input[type="submit"]').prop('disabled', false);
                    alert(data.error);
                } else {
                    callback(data.filename);
                }
            }).fail(function (data) {
                $('input[type="submit"]').prop('disabled', false);
                alert("Error: unable to upload image");
            });
        }
    </script>
@endsection


@section('content')


    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1 style="color: black;">Edit Blog</h1>
            </div>
        </div>
        {{ Form::open(['route' => ['blog.update', $blog], 'files' => true]) }}
        <input type="hidden" name="_method" value="PUT">
        <div class="row" style="margin-top: 32px;">
            <div class="col-xs-12">
                {{ Form::label('title', 'Title', ['style' => 'color: black !important;']) }}
                {{ Form::text('title', $blog->title, ['class' => 'form-control']) }}
            </div>
        </div>

        <div class="row" style="margin-top: 16px;">
            <div class="col-lg-6 col-xs-12">
                {{ Form::label('cover_image_tmp', 'Cover Image', ['style' => 'color: black !important;']) }}
                {{ Form::file('cover_image_tmp', ['class' => 'form-control']) }}

                {{ Form::label('cover_image', 'Cover Image', ['style' => 'color: black !important;', 'class' => 'sr-only']) }}
                {{ Form::hidden('cover_image', $blog->cover_image) }}
            </div>
            <div class="col-lg-6 col-xs-12">
                <img src="{{ route('image.show', ['filename' => $blog->cover_image]) }}" alt="{{ $blog->cover_image }}" style="width: 100%;">
            </div>
        </div>

        <div class="row" style="margin-top: 16px;">
            <div class="col-xs-12">
                {{ Form::label('content', 'Content', ['style' => 'color: black !important;']) }}
                {{ Form::hidden('content', '') }}
                <div id="blogEdit">{!! $blog->content !!}</div>
            </div>
            <div class="col-xs-12">
                {{ Form::submit('Submit', ['class' => 'btn blogBtn', 'style' => 'cursor: pointer;']) }}
                <a href="{{ route('blog.index') }}" class="btn blogBtn" style="margin-left: 15px;">Cancel</a>
            </div>
        </div>

        {{ Form::close() }}
    </div>


@endsection