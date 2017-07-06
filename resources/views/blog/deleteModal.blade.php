@extends('layouts.modal')

@section('id', $id);

@section('message')
    Are you sure you want to delete this blog?
@endsection

@section('buttons')
    <a href="#" class="btn btn-danger"
       onclick="event.preventDefault(); document.getElementById('deleteModalForm').submit();">Delete</a>
@endsection

@section('other')
    <form id="deleteModalForm" action="{{route('blog.destroy', ['blog' => $blog])}}" method="POST" style="display: none;">
        <input type="hidden" name="_method" value="DELETE">
        {{ csrf_field() }}
    </form>
@endsection