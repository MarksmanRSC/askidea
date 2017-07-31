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
    {{Form::open(['route' => ['user.update', $user->id]])}}
    <input style="display:none" type="text" name="email"/>
    <input style="display:none" type="password" name="password"/>
    <input type="hidden" name="_method" value="PUT">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        {{Form::label('email', 'Email')}}
                        <p><input type="text" class="form-control" disabled="disabled" value="{{$user->email}}" id="email"></p>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        {{Form::label('name', 'Name')}}

                        {{Form::text('name', $user->name, ['class' => 'form-control'])}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    @if(!Auth::user()->isAdmin())
                        <div class="form-group">
                            {{Form::label('oldPassword', 'Old Password')}}
                            {{Form::password('oldPassword', ['class' => 'form-control'])}}
                            @if (session()->has('oldPassword'))
                                <span class="help-block">
                                <strong>{{ session('oldPassword') }}</strong>
                            </span>
                            @endif
                        </div>
                    @else
                        <div class="form-group">
                            {{Form::label('role_id', 'Role')}}
                            <select name="role_id" id="role_id" class="form-control">
                                @foreach($userRoles as $userRole)
                                    <option value="{{ $userRole->id }}">{{ $userRole->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        {{Form::label('password', 'New Password')}}
                        {{Form::password('password', ['class' => 'form-control'])}}
                        @if (session()->has('password'))
                            <span class="help-block">
                                <strong>{{ session('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>



        <div class="col-lg-6 col-lg-offset-3 col-xs-12" style="margin-top: 16px;">
            {{Form::submit('Update', ['class' => 'btn btn-outline-primary'])}}
        </div>

    </div>
    {{Form::close()}}
</div>
@endsection