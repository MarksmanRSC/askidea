@extends('layouts.main')

@section('css')
    <style>

    </style>
@endsection

@section('js')
    <script>

    </script>
@endsection


@section('content')

<div class="container background-white">
    {{Form::open(['route' => 'promo_code.redeem'])}}
    <div class="row">
        <div class="col-xs-12 text-center">
            <h3>Promo Code</h3>
            <div class="col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-3">
                {{Form::text('promo_code', '', ['class' => 'form-control'])}}
                @if ($errors->has('promo_code'))
                    <span style="color: red;">
                        <strong style="color: red;">{{ $errors->first('promo_code') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-2 col-md-offset-5 col-xs-4 col-xs-offset-4" style="margin-top: 16px;">
                {{Form::submit('Redeem', ['class' => 'btn btn-primary btn-block'])}}
            </div>
        </div>
    </div>
    {{Form::close()}}
</div>

@endsection