@extends('layouts.agent')

@section('pc_css')

@endsection

@section('pc_js')
    <script>
        $(function () {

            @if ($errors->has('similarity'))
            $('#modal').modal('show');
            @endif

            $('.selectBtn').click(function(e) {
                var alibabaItemId = $(this).attr('data-id');
                $('#modal input#pc_alibaba_item_id').val(alibabaItemId);
                $('#modal input#similarity').val('');
                $('span > strong').css('display', 'none');
            });

            $.tablesorter.themes.bootstrap = {
                table: 'table table-bordered table-striped',
                caption: 'caption',
                header: 'bootstrap-header',
                sortNone: '',
                sortAsc: '',
                sortDesc: '',
                active: '',
                hover: '',
                // icon class names
                icons: '',
                iconSortNone: 'bootstrap-icon-unsorted',
                iconSortAsc: 'glyphicon glyphicon-chevron-up',
                iconSortDesc: 'glyphicon glyphicon-chevron-down',
                filterRow: '',
                footerRow: '',
                footerCells: '',
                even: '',
                odd: ''
            };

            $("table").tablesorter({
                theme: "bootstrap",
                widthFixed: true,
                headerTemplate: '{content} {icon}',
                widgets: ["uitheme", "filter", "columns", "zebra"],
                widgetOptions: {
                    zebra: ["even", "odd"],
                    columns: ["primary", "secondary", "tertiary"],
                    filter_reset: ".reset",
                    filter_cssFilter: "form-control",
                }
            })

        });
    </script>
@endsection


@section('pc_content')
    <div class="row">
        <div class="col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('pc_agent.home') }}">All</a></li>
                <li><a href="{{ route('pc_agent.request', ['request_id' => $requestId]) }}">Request #{{ $requestId }}</a></li>
                <li><a href="{{ route('pc_agent.amazon', ['request_id' => $requestId, 'amazon_item_id' => $amazonItemId]) }}">Amazon Item #{{ $amazonItemId }}</a></li>
                <li class="active">Link Existing Alibaba Item</li>
            </ol>
        </div>
    </div>

    <div class="row" style="margin-top: 16px;">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table id="request-table">
                    <thead>
                    <tr>
                        <th>Action</th>
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
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($alibabaItems as $alibabaItem)
                        <tr>
                            <td>
                                <a href="#" class="btn btn-primary selectBtn" data-id="{{ $alibabaItem->id }}" data-toggle="modal" data-target="#modal">Select</a>
                            </td>
                            <td>{{ $alibabaItem->alibaba_url }}</td>
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
                            <td>{{ $alibabaItem->created_at }}</td>
                            <td>{{ $alibabaItem->updated_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{Form::open(['route' => ['pc_agent.store_link_alibaba', $requestId, $amazonItemId]])}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Similarity & Potential Opportunity</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-xs-12">
                                {{Form::label('pc_alibaba_item_id', 'pc_alibaba_item_id', ['class' => 'sr-only'])}}
                                {{Form::hidden('pc_alibaba_item_id', '', ['class' => 'form-control'])}}
                            </div>
                            <div class="col-xs-6">
                                {{Form::label('similarity', 'Similarity')}}
                                {{Form::text('similarity', $alibabaItem->similarity, ['class' => 'form-control'])}}
                                @if ($errors->has('similarity'))
                                    <span style="color: red;">
                                        <strong style="color: red;">{!! $errors->first('similarity') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {{Form::submit('Link To Amazon Item', ['class' => 'btn btn-primary'])}}
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection