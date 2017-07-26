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
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-right">
                <a href="{{ route('user.create') }}" class="btn btn-primary disabled">Create New User</a>
            </div>
        </div>
        <div class="row" style="margin-top: 16px;">
            <div class="col-xs-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Membership Expired At</th>
                            <th>APC Limit</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td>{{ $user->role_expired_at }}</td>
                                <td>{{ $user->pc_limit }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td><a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-primary btn-sm">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
