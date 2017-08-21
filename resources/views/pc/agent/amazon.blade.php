@extends('layouts.agent')

@section('pc_css')
    <style>
        form div {
            margin-bottom: 16px;
        }
    </style>
@endsection

@section('pc_js')
    <script>
        $(document).ready(function() {
            $('a[data-toggle="tooltip"]').tooltip({
                animated: 'fade',
                placement: 'bottom',
                html: true
            });

            @if($view)
                $('input').prop('disabled', true);
            @endif
        });
    </script>
@endsection


@section('pc_content')
    @include('pc.agent.warning', [
        'id' => "amazonEditBtn",
        'msg' => "User will be able to see status change",
        'routeName' => "pc_agent.amazon",
        'routeParams' => ['request_id' => $requestId, 'amazon_item_id' => $amazon->id]
    ])

    @include('pc.agent.warning', [
        'id' => "markCompletedBtn",
        'msg' => "User will be able to view the result of this item",
        'routeName' => "pc_agent.amazon_mark_completed",
        'routeParams' => ['request_id' => $requestId, 'amazon_item_id' => $amazon->id]
    ])

    @include('pc.agent.warning', [
        'id' => "saveChangeBtn",
        'msg' => "Your change will be saved",
        'formId' => "amazonEditForm"
    ])

    <div class="row">
        <div class="col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('pc_agent.home') }}">All</a></li>
                <li><a href="{{ route('pc_agent.request', ['request_id' => $requestId]) }}">Request #{{ $requestId }}</a></li>
                <li class="active">Amazon Item #{{ $amazon->id }} (ASIN: {{ $amazon->asin }})
                @if($view)
                &nbsp;- VIEW ONLY MODE
                @endif
                </li>
            </ol>
        </div>
    </div>

    <div class="row" style="margin-top: 16px;">
        <div class="col-xs-12">
            {{Form::open(['route' => ['pc_agent.amazon_update', $requestId, $amazon->id], 'id' => 'amazonEditForm'])}}
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-xs-8">

                </div>
                @if($view)
                    <div class="col-xs-4 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#amazonEditBtn">Edit</button>
                    </div>
                @else
                    <div class="col-xs-4 text-right">
                        <p>Click "Mark Completed" if you have completed filling information for this item:</p>
                        <button type="button" data-toggle="modal" data-target="#markCompletedBtn" class="btn btn-danger {{ $userRequestAmazonItem->status === 'Completed' ? 'disabled' : '' }}">Mark Completed</button>
                    </div>
                @endif
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-6">
                            {{Form::label('asin', 'ASIN Number')}}
                            <p>{{ $amazon->asin }}</p>
                        </div>
                        <div class="col-xs-6">
                            {{Form::label('status', 'Status')}}
                            <p>{{ $userRequestAmazonItem->status }}</p>
                        </div>
                        <div class="col-xs-12">
                            {{Form::label('product_name', 'Product Name')}}
                            <p><a class="btn-link" href="https://www.amazon.com/dp/{{$amazon->asin}}" data-toggle="tooltip" title="<img src='{{ $amazon->image_url }}' />">{{ $amazon->product_name }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                    {{Form::label('list_price', 'List Price ($)')}}
                    {{Form::number('list_price', $amazon->list_price, ['class' => 'form-control'])}}
                    @if ($errors->has('list_price'))
                        <span style="color: red;">
                        <strong style="color: red;">{!! $errors->first('list_price') !!}</strong>
                    </span>
                    @endif
                </div>
                <div class="col-xs-3">
                    {{Form::label('rank', 'Rank')}}
                    {{Form::number('rank', $amazon->rank, ['class' => 'form-control'])}}
                    @if ($errors->has('rank'))
                        <span style="color: red;">
                        <strong style="color: red;">{!! $errors->first('rank') !!}</strong>
                    </span>
                    @endif
                </div>
                <div class="col-xs-3">
                    {{Form::label('estimated_sales', 'Estimated Sales (Units)')}}
                    {{Form::number('estimated_sales', $amazon->estimated_sales, ['class' => 'form-control'])}}
                    @if ($errors->has('estimated_sales'))
                        <span style="color: red;">
                        <strong style="color: red;">{!! $errors->first('estimated_sales') !!}</strong>
                    </span>
                    @endif
                </div>
                <div class="col-xs-3">
                    {{Form::label('amazon_fee', 'Total FBA Fee ($)')}}
                    {{Form::number('amazon_fee', $amazon->amazon_fee, ['class' => 'form-control'])}}
                    @if ($errors->has('amazon_fee'))
                        <span style="color: red;">
                        <strong style="color: red;">{!! $errors->first('amazon_fee') !!}</strong>
                    </span>
                    @endif
                </div>
                <div class="col-xs-3">
                    {{Form::label('number_of_review', 'Number Of Reviews')}}
                    {{Form::number('number_of_review', $amazon->number_of_review, ['class' => 'form-control'])}}
                    @if ($errors->has('number_of_review'))
                        <span style="color: red;">
                        <strong style="color: red;">{!! $errors->first('number_of_review') !!}</strong>
                    </span>
                    @endif
                </div>

                @if(!$view)
                <div class="col-xs-12 text-right" style="margin-top: 16px;">
                    <a href="{{ route('pc_agent.request', ['request_id' => $requestId]) }}" class="btn btn-default" style="margin-right: 8px;">Cancel</a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#saveChangeBtn">Submit</button>
                </div>
                @endif
            </div>
            {{Form::close()}}
        </div>
    </div>

    <div class="row" style="margin-top: 16px;">
        <div class="col-xs-12">
            <hr>
            <h4>Alibaba Parameters</h4>
        </div>
        @if(!$view)
        <div class="col-xs-12 text-right" style="margin-top: 16px;">
            <a href="{{ route('pc_agent.get_link_alibaba', ['request_id' => $requestId, 'amazon_item_id' => $amazon->id]) }}" class="btn btn-primary">Link Existing Alibaba Item</a>
            <a href="{{ route('pc_agent.create_alibaba', ['request_id' => $requestId, 'amazon_item_id' => $amazon->id]) }}" class="btn btn-primary">Create New Alibaba Item</a>
        </div>
        @endif
        <div class="col-xs-12" style="margin-top: 16px;">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        @if(!$view)
                        <th>Action</th>
                        @endif
                        <th>URL</th>
                        <th>Price Max ($)</th>
                        <th>Price Min ($)</th>
                        {{--<th>Length</th>--}}
                        {{--<th>Width</th>--}}
                        {{--<th>Height</th>--}}
                        <th>Gold Supplier Year</th>
                        <th>Weight (KG)</th>
                        <th>MOQ</th>
                        <th>Lead Time (Days)</th>
                        {{--<th>Estimated FBA Cost By Local</th>--}}
                        <th>Similarity</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($alibabaItems as $index => $alibabaItem)

                        @include('pc.agent.warning', [
                            'id' => "deleteAlibabaItemBtn{$index}",
                            'msg' => "This Alibaba parameter will be un-linked with current Amazon item",
                            'routeName' => "pc_agent.delete_alibaba",
                            'routeParams' => ['request_id' => $requestId, 'amazon_item_id' => $amazon->id, 'alibaba_item_id' => $alibabaItem->id]
                        ])

                        <tr>
                            @if(!$view)
                            <td>
                                <a href="{{ route('pc_agent.edit_alibaba', ['request_id' => $requestId, 'amazon_item_id' => $amazon->id, 'alibaba_item_id' => $alibabaItem->id]) }}" class="btn btn-sm" style="color: #296091;">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 1.5em;"></i>
                                </a>
                                <a href='' class="btn btn-sm" data-toggle="modal" data-target="#deleteAlibabaItemBtn{{$index}}" style="color: #CD403C;">
                                    <i class="fa fa-trash-o" aria-hidden="true" style="font-size: 1.5em;"></i>
                                </a>
                            </td>
                            @endif
                            <td>
                                <a target="_blank" href="{{ $alibabaItem->alibaba_url }}" class="btn-link">{{ $alibabaItem->alibaba_url }}</a>
                            </td>
                            <td>{{ $alibabaItem->alibaba_price_max }}</td>
                            <td>{{ $alibabaItem->alibaba_price_min }}</td>
                            {{--<td>{{ $alibabaItem->length }}</td>--}}
                            {{--<td>{{ $alibabaItem->width }}</td>--}}
                            {{--<td>{{ $alibabaItem->height }}</td>--}}
                            <td>{{ $alibabaItem->gold_supplier_year }}</td>
                            <td>{{ $alibabaItem->weight }}</td>
                            <td>{{ $alibabaItem->moq }}</td>
                            <td>{{ $alibabaItem->lead_time }}</td>
                            {{--<td>{{ $alibabaItem->estimated_fba_cost_by_lcl }}</td>--}}
                            <td>{{ $alibabaItem->similarity }}</td>
                            <td>{{ $alibabaItem->created_at }}</td>
                            <td>{{ $alibabaItem->updated_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection