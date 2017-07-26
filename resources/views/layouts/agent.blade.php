@extends('layouts.main')

@section('css')
    @yield('pc_css')
@endsection

@section('js')
    @yield('pc_js')
@endsection

@section('content')
<div class="container background-white">
    <div class="row" style="margin-bottom: 16px;">
        <div class="col-xs-12">
            <ul class="nav nav-tabs">
                <li role="presentation" class="{{ Request::is('pc_agent/home') ? 'active' : '' }}"><a href="#">Home</a></li>
            </ul>
        </div>
    </div>
    @yield('pc_content')
</div>
@endsection