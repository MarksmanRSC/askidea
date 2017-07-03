@extends('layouts.main')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">

    <style>
        body {
            background: white;
        }

        strong {
            font-family: 'Cinzel', serif;
        }

        h1, h2, h3, h4, h5, p, a, a:hover {
            color: black;
        }

        @media screen and (min-width: 661px) {
            body > .container {
                width: 600px;
            }
        }
    </style>
@endsection

@section('js')
    <script>

    </script>
@endsection


@section('content')
    <div class="container">
        @if(!Auth::guest())
            <div class="row">
                <div class="col-xs-12 text-right">
                    <a class="btn blogBtn" href="{{ route('blog.edit', $blog) }}">Edit</a>
                </div>
            </div>
        @endif
        <div class="row" style="margin-top: 32px;">
            <div class="col-xs-12">
                <strong style="font-size: 20px; letter-spacing: 2px;">
                    {{ $blog->title }}
                </strong>
            </div>
            <div class="col-xs-12">
                <spam style="font-size: 14px; letter-spacing: 2px;">
                    {{ date_format(date_create($blog->updated_at),"F j, Y") }}
                </spam>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-12" style="margin-top: 24px;">
                    <img src="{{ route("image.show", ['filename' => $blog->cover_image]) }}"
                         alt="{{ $blog->cover_image }}" style="width: 100%; ">
                </div>
                <div class="col-xs-12" style="margin-top: 16px;">
                    <p style="font-size: 17px;">
                        {!! $blog->content !!}
                    </p>
                </div>
            </div>
        </div>
    </div>



@endsection