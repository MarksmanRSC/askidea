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
            <h4>Request ID: {{ $request[0]->pc_request_id }}</h4>
            <h4>Requester: {{ $request[0]->user_name }}</h4>
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
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($request as $item)
                        <tr>
                            <td>{{ $item->asin }}</td>
                            <td><a href="https://www.amazon.com/dp/{{$item->asin}}" data-toggle="tooltip" title="<img src='{{ $item->image_url }}' />">{{ $item->product_name }}</a></td>
                            <td><a href="{{ route('pc_agent.amazon', ['id' => $item->pc_amazon_item_id]) }}" class="btn btn-primary">Edit Amazon Parameters</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection