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

    <div class="container">
        @if(!Auth::guest() && Auth::user()->isAdmin())
            <div class="row">
                <div class="col-xs-12 text-right">
                    <a href="{{ route('blog.create') }}" class="btn blogBtn">Create a blog</a>
                </div>
            </div>
        @endif

        @foreach($blogs as $blog)
                <div class="row" style="margin-top: 32px;">
                    <div class="col-xs-12">
                        <strong style="font-size: 20px; letter-spacing: 2px;">
                            <a href="{{ route('blog.show', $blog) }}">{{ $blog->title }}</a>
                        </strong>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12" style="margin-top: 24px;">
                                <a href="{{ route('blog.show', $blog) }}">
                                    <img src="{{ route("image.show", ['filename' => $blog->cover_image]) }}"
                                         alt="{{ $blog->cover_image }}" style="width: 100%; ">
                                </a>
                            </div>
                            <div class="col-xs-12" style="margin-top: 16px;">
                                <p style="font-size: 17px;">
                                    {{ $blog->content }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <a href="{{ route('blog.show', $blog) }}" class="btn blogBtn">Read More</a>
                        @if(!Auth::guest() && Auth::user()->isAdmin())
                            <a href="{{ route('blog.edit', $blog) }}" class="btn blogBtn">Edit</a>
                            <a href="#" class="btn blogBtn" data-toggle="modal" data-target="#deleteModal{{$blog->id}}">Delete</a>

                            <div class="modal fade" id="deleteModal{{$blog->id}}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="exampleModalLabel">Warning</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Are you sure you want to delete this blog?</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-danger"
                                               onclick="event.preventDefault(); document.getElementById('deleteModalForm{{$blog->id}}').submit();">Delete</a>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <form id="deleteModalForm{{$blog->id}}" action="{{route('blog.destroy', ['blog' => $blog])}}" method="POST" style="display: none;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                        @yield('other')
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
        @endforeach

    </div>
@section('content')














@endsection