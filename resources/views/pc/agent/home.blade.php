@extends('layouts.agent')

@section('pc_css')

@endsection

@section('pc_js')
    <script>
        $(function () {
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
                <li class="active">All</li>
            </ol>
        </div>
    </div>

    <div class="row" style="margin-top: 16px;">
        <div class="col-xs-12">
            @if(count($requests) === 0)
                <p>There is no any requests.</p>
            @else
                <div class="table-responsive">
                    <table id="request-table">
                        <thead>
                        <tr>
                            <th>Request ID</th>
                            <th>Requester Name</th>
                            <th>Requester Email</th>
                            <th>Requester Role</th>
                            <th>Progress</th>
                            <th>Status</th>
                            <th>Number of Requested Items</th>
                            <th>Agent (Last Action)</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($requests as $request)
                            <tr>
                                <td>{{ $request->pc_request_id }}</td>
                                <td>{{ $request->user_name }}</td>
                                <td>{{ $request->user_email }}</td>
                                <td>{{ $request->user_role }}</td>
                                <td>{{ number_format($request->number_of_completed_items/$request->number_of_requested_items*100, 2) }}%
                                    ({{ $request->number_of_completed_items }}/{{ $request->number_of_requested_items }})
                                </td>
                                <td>{{ $request->status }}</td>
                                <td>{{ $request->number_of_requested_items }}</td>
                                <td>{{ $request->agent_name or 'N/A' }}</td>
                                <td>{{ $request->pc_request_created_at }}</td>
                                <td>
                                    <a href="{{ route('pc_agent.request', ['id' => $request->pc_request_id]) }}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection