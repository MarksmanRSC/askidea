@extends('layouts.agent')

@section('pc_css')
    <style>
        .amazon-params > div {
            margin-bottom: 8px;
        }
    </style>
@endsection

@section('pc_js')
    <script>
        $(document).ready(function() {
            $('input[data-toggle="tooltip"]').tooltip({
                animated: 'fade',
                placement: 'bottom',
                html: true
            });
        });
    </script>
@endsection


@section('pc_content')
    <div class="row">
        <div class="col-xs-4">
            Request ID: {{ $requestInfo['pc_request_id'] }}
        </div>
        <div class="col-xs-4">
            Requester: {{ $requestInfo['user_name'] }}
        </div>
        <div class="col-xs-4">
            Status: {{ $requestInfo['status'] }}
        </div>
    </div>

    <div class="row" style="margin-top: 16px;">
        <div class="col-xs-12">
            <h4>Amazon Parameters</h4>
        </div>
        {{Form::open(['route' => ['user.update', 1]])}}
        @foreach($requestInfo['requests'] as $request)
            <div class="col-xs-12">
                <h5>Item: {{ $request['pc_amazon_item_id'] }}</h5>
                <input type="hidden" name="pc_amazon_item_id" id="pc_amazon_item_id" value="{{ $request['pc_amazon_item_id'] }}">
                <div class="col-xs-12 amazon-params" style="border: 1px solid #DDDDDD; padding: 8px;">
                    <div class="col-xs-6">
                        {{Form::label('product_name', 'Product Name')}}
                        <input type="text" class="form-control"  value="{{ $request['product_name'] }}"
                               id="product_name" data-toggle="tooltip" title="<img src='{{ $request['image_url'] }}' />">
                    </div>
                    <div class="col-xs-6">

                        {{Form::label('aisn', 'ASIN Number')}}
                        <input type="text" class="form-control" disabled="disabled" value="{{ $request['asin'] }}"
                               id="aisn">

                    </div>
                    <div class="col-xs-3">
                        {{Form::label('list_price', 'list_price')}}
                        {{Form::text('list_price', $request['amazon_list_price'], ['class' => 'form-control'])}}
                    </div>
                    <div class="col-xs-3">
                        {{Form::label('rank', 'Rank')}}
                        {{Form::text('rank', $request['amazon_rank'], ['class' => 'form-control'])}}
                    </div>
                    <div class="col-xs-3">
                        {{Form::label('estimated_sales', 'Estimated Sales')}}
                        {{Form::text('estimated_sales', $request['amazon_estimated_sales'], ['class' => 'form-control'])}}
                    </div>
                    <div class="col-xs-3">
                        {{Form::label('amazon_fee', 'Amazon Fee')}}
                        {{Form::text('amazon_fee', $request['amazon_fee'], ['class' => 'form-control'])}}
                    </div>
                    <div class="col-xs-3">
                        {{Form::label('number_of_review', 'Number Of Reviews')}}
                        {{Form::text('number_of_review', $request['amazon_number_of_review'], ['class' => 'form-control'])}}
                    </div>
                    <div class="col-xs-12">
                        <h5>Alibaba Parameters:</h5>
                        <div class="col-xs-12" style="border: 1px solid #DDDDDD; padding: 8px;">
                            @foreach($request['alibabaParameters'] as $alibabaParameter)
                                <div class="col-xs-12" style="border: 1px solid #DDDDDD;">

                                </div>
                            @endforeach
                            <a href="#" class="btn"><i class="fa fa-plus-square-o fa-2x" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-xs-12 text-right" style="margin-top: 16px;">
            <a href="" class="btn btn-default" style="margin-right: 8px;">Cancel</a>
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        </div>
        {{Form::close()}}

    </div>
@endsection