@extends('layouts.main')

@section('css')
    <style>
        div.row {
            margin-bottom: 16px;
        }
    </style>
    @yield('pc_css')
@endsection

@section('js')
    @yield('pc_js')
@endsection

@section('content')
<div class="container background-white">
    @yield('pc_content')
</div>
@endsection