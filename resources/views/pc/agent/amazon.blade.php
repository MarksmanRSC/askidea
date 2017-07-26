@extends('layouts.agent')

@section('pc_css')

@endsection

@section('pc_js')
    <script>
        $(document).ready(function() {
            $('a[data-toggle="tooltip"]').tooltip({
                animated: 'fade',
                placement: 'bottom',
                html: true
            });
        });
    </script>
@endsection


@section('pc_content')

    <div class="row">
        <div class="col-xs-12">
            {{Form::open(['route' => ['pc_agent.amazon_update', $amazon->id]])}}
            <input type="hidden" name="_method" value="PUT">
            <div class="col-xs-4">
                {{Form::label('asin', 'ASIN Number')}}
                <p>{{ $amazon->asin }}</p>
            </div>
            <div class="col-xs-8">
                {{Form::label('product_name', 'Product Name')}}
                <p><a class="btn-link" href="https://www.amazon.com/dp/{{$amazon->asin}}" data-toggle="tooltip" title="<img src='{{ $amazon->image_url }}' />">{{ $amazon->product_name }}</a></p>
            </div>

            <div class="col-xs-3">
                {{Form::label('list_price', 'list_price')}}
                {{Form::text('list_price', $amazon->list_price, ['class' => 'form-control'])}}
            </div>
            <div class="col-xs-3">
                {{Form::label('rank', 'Rank')}}
                {{Form::text('rank', $amazon->rank, ['class' => 'form-control'])}}
            </div>
            <div class="col-xs-3">
                {{Form::label('estimated_sales', 'Estimated Sales')}}
                {{Form::text('estimated_sales', $amazon->estimated_sales, ['class' => 'form-control'])}}
            </div>
            <div class="col-xs-3">
                {{Form::label('amazon_fee', 'Amazon Fee')}}
                {{Form::text('amazon_fee', $amazon->amazon_fee, ['class' => 'form-control'])}}
            </div>
            <div class="col-xs-3">
                {{Form::label('number_of_review', 'Number Of Reviews')}}
                {{Form::text('number_of_review', $amazon->number_of_review, ['class' => 'form-control'])}}
            </div>

            <div class="col-xs-12 text-right" style="margin-top: 16px;">
                <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-default" style="margin-right: 8px;">Cancel</a>
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>

@endsection