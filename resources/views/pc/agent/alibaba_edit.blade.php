@extends('layouts.agent')

@section('pc_css')
    <style>
        form div {
            margin-bottom: 16px;
        }
    </style>
@endsection

@section('pc_js')

@endsection


@section('pc_content')
    <div class="row">
        <div class="col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('pc_agent.home') }}">All</a></li>
                <li><a href="{{ route('pc_agent.request', ['request_id' => $requestId]) }}">Request #{{ $requestId }}</a></li>
                <li><a href="{{ route('pc_agent.amazon', ['request_id' => $requestId, 'amazon_item_id' => $amazonItemId]) }}">Amazon Item #{{ $amazonItemId }}</a></li>
                <li class="active">Alibaba Item #{{$alibabaItem->id}}</li>
            </ol>
        </div>
    </div>

    <div class="row" style="margin-top: 16px;">
        <div class="col-xs-12">
            {{Form::open(['route' => ['pc_agent.update_alibaba', $requestId, $amazonItemId, $alibabaItem->id]])}}
            <input type="hidden" name="_method" value="PUT">
            <div class="col-xs-6">
                {{Form::label('alibaba_url', 'URL')}}
                {{Form::text('alibaba_url', $alibabaItem->alibaba_url, ['class' => 'form-control'])}}
                @if ($errors->has('alibaba_url'))
                    <span style="color: red;">
                        <strong style="color: red;">{!! $errors->first('alibaba_url') !!}</strong>
                    </span>
                @endif
            </div>
            <div class="col-xs-6">
                {{Form::label('alibaba_price_max', 'Price Max ($)')}}
                {{Form::text('alibaba_price_max', $alibabaItem->alibaba_price_max, ['class' => 'form-control'])}}
                @if ($errors->has('alibaba_price_max'))
                    <span style="color: red;">
                        <strong style="color: red;">{!! $errors->first('alibaba_price_max') !!}</strong>
                    </span>
                @endif
            </div>
            <div class="col-xs-6">
                {{Form::label('alibaba_price_min', 'Price Min ($)')}}
                {{Form::text('alibaba_price_min', $alibabaItem->alibaba_price_min, ['class' => 'form-control'])}}
                @if ($errors->has('alibaba_price_min'))
                    <span style="color: red;">
                        <strong style="color: red;">{!! $errors->first('alibaba_price_min') !!}</strong>
                    </span>
                @endif
            </div>
            {{--<div class="col-xs-6">--}}
                {{--{{Form::label('length', 'Length')}}--}}
                {{--{{Form::text('length', $alibabaItem->length, ['class' => 'form-control'])}}--}}
                {{--@if ($errors->has('length'))--}}
                    {{--<span style="color: red;">--}}
                        {{--<strong style="color: red;">{!! $errors->first('length') !!}</strong>--}}
                    {{--</span>--}}
                {{--@endif--}}
            {{--</div>--}}
            {{--<div class="col-xs-6">--}}
                {{--{{Form::label('width', 'Width')}}--}}
                {{--{{Form::text('width', $alibabaItem->width, ['class' => 'form-control'])}}--}}
                {{--@if ($errors->has('width'))--}}
                    {{--<span style="color: red;">--}}
                        {{--<strong style="color: red;">{!! $errors->first('width') !!}</strong>--}}
                    {{--</span>--}}
                {{--@endif--}}
            {{--</div>--}}
            {{--<div class="col-xs-6">--}}
                {{--{{Form::label('height', 'Height')}}--}}
                {{--{{Form::text('height', $alibabaItem->height, ['class' => 'form-control'])}}--}}
                {{--@if ($errors->has('height'))--}}
                    {{--<span style="color: red;">--}}
                        {{--<strong style="color: red;">{!! $errors->first('height') !!}</strong>--}}
                    {{--</span>--}}
                {{--@endif--}}
            {{--</div>--}}
            <div class="col-xs-6">
                {{Form::label('weight', 'Weight (KG)')}}
                {{Form::text('weight', $alibabaItem->weight, ['class' => 'form-control'])}}
                @if ($errors->has('weight'))
                    <span style="color: red;">
                        <strong style="color: red;">{!! $errors->first('weight') !!}</strong>
                    </span>
                @endif
            </div>
            <div class="col-xs-6">
                {{Form::label('moq', 'MOQ')}}
                {{Form::text('moq', $alibabaItem->moq, ['class' => 'form-control'])}}
                @if ($errors->has('moq'))
                    <span style="color: red;">
                        <strong style="color: red;">{!! $errors->first('moq') !!}</strong>
                    </span>
                @endif
            </div>
            <div class="col-xs-6">
                {{Form::label('lead_time', 'Lead Time (Days)')}}
                {{Form::text('lead_time', $alibabaItem->lead_time, ['class' => 'form-control'])}}
                @if ($errors->has('lead_time'))
                    <span style="color: red;">
                        <strong style="color: red;">{!! $errors->first('lead_time') !!}</strong>
                    </span>
                @endif
            </div>
            {{--<div class="col-xs-6">--}}
                {{--{{Form::label('estimated_fba_cost_by_lcl', 'Estimated FBA Cost By Local')}}--}}
                {{--{{Form::text('estimated_fba_cost_by_lcl', $alibabaItem->estimated_fba_cost_by_lcl, ['class' => 'form-control'])}}--}}
                {{--@if ($errors->has('estimated_fba_cost_by_lcl'))--}}
                    {{--<span style="color: red;">--}}
                        {{--<strong style="color: red;">{!! $errors->first('estimated_fba_cost_by_lcl') !!}</strong>--}}
                    {{--</span>--}}
                {{--@endif--}}
            {{--</div>--}}
            <div class="col-xs-6">
                {{Form::label('similarity', 'Similarity')}}
                {{Form::text('similarity', $alibabaItem->similarity, ['class' => 'form-control'])}}
                @if ($errors->has('similarity'))
                    <span style="color: red;">
                        <strong style="color: red;">{!! $errors->first('similarity') !!}</strong>
                    </span>
                @endif
            </div>
            <div class="col-xs-6">
                {{Form::label('potential_opportunity', 'Potential Opportunity')}}
                {{Form::text('potential_opportunity', $alibabaItem->potential_opportunity, ['class' => 'form-control'])}}
                @if ($errors->has('potential_opportunity'))
                    <span style="color: red;">
                        <strong style="color: red;">{!! $errors->first('potential_opportunity') !!}</strong>
                    </span>
                @endif
            </div>
            <div class="col-xs-12">
                <a href="{{ route('pc_agent.amazon', ['request_id' => $requestId, 'amazon_item_id' => $amazonItemId]) }}" class="btn btn-default" style="margin-right: 8px;">Cancel</a>
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>

@endsection