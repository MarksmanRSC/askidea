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
            <ol class="breadcrumb">
                <li><a href="{{ route('pc_agent.home') }}">All</a></li>
                <li class="active">Request #{{ $request[0]->pc_request_id }}</li>
            </ol>
        </div>
    </div>

    <div class="row" style="margin-top: 16px;">
        <div class="col-xs-12">
            <h4>Request ID: {{ $request[0]->pc_request_id }}</h4>
            <h4>Requester: {{ $request[0]->user_name }}</h4>
            <h4>Agent (last action): {{ $request[0]->request_agent_name or 'N/A' }}</h4>
            <h4>Status: {{ $request[0]->status }}</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <h4>Amazon Parameters</h4>
        </div>
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ASIN</th>
                        <th>Product Name</th>
                        <th>Status</th>
                        <th>Agent (Last Action)</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($request as $index => $item)
                        <tr>
                            <td>{{ $item->asin }}</td>
                            <td><a href="https://www.amazon.com/dp/{{$item->asin}}" data-toggle="tooltip" title="<img src='{{ $item->image_url }}' />">{{ $item->product_name }}</a></td>
                            <td>{{ $item->amazon_status }}</td>
                            <td>{{ $item->amazon_agent_name or 'N/A' }}</td>
                            <td>
                                @if($item->amazon_status == 'Completed')
                                <a href="{{ route('pc_agent.amazon_view', ['request_id' => $item->pc_request_id, 'amazon_item_id' => $item->pc_amazon_item_id]) }}" class="btn btn-success">View</a>
                                @endif

                                @if(in_array($item->amazon_status, ['Modifying', 'In Progress']))
                                        <a href="{{ route('pc_agent.amazon', ['request_id' => $item->pc_request_id, 'amazon_item_id' => $item->pc_amazon_item_id]) }}" class="btn btn-primary">Edit</a>
                                @else
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#amazonEditBtn{{$index}}">Edit</button>
                                    @include('pc.agent.warning', [
                                        'id' => "amazonEditBtn{$index}",
                                        'msg' => "User will be able to see status change",
                                        'routeName' => "pc_agent.amazon",
                                        'routeParams' => ['request_id' => $item->pc_request_id, 'amazon_item_id' => $item->pc_amazon_item_id]
                                    ])
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection