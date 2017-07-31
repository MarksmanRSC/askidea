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
        <div class="col-xs-12">
            <h3>Promo Code</h3>
            <hr>
            <p>Please enter your code below to redeem your service.</p>


            <div class="row">
                <div class="col-xs-6 col-sm-4 col-md-3">
                    {{Form::label('promo_code', 'Promo Code:')}}
                    {{Form::text('promo_code', '', ['class' => 'form-control'])}}
                </div>
                <div class="col-xs-12" style="margin-top: 8px;">
                    @if ($errors->has('promo_code'))
                        <span style="color: red;">
                        <strong style="color: red;">{!! $errors->first('promo_code') !!}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="row" style="margin-top: 16px;">
                <div class="col-xs-12">
                    {{Form::submit('Redeem', ['class' => 'btn btn-primary'])}}
                </div>
            </div>

            <div class="row" style="margin-top: 32px;">
                <div class="col-xs-12">
                    <p>Below are all the services you have redeemed with AskIdeaSourcing. </p>
                </div>
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Redeemed At</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($userPromoCodes as $userPromoCode)
                                    <tr>
                                        <td>{{ $userPromoCode->created_at }}</td>
                                        <td>{{ $userPromoCode->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{Form::close()}}
</div>

@endsection