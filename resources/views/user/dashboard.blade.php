@extends('layouts.base')

@section('content')
    dashboard
    <form action="{{ route('user.avatar') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" class="form-control-file" id="image" name="avatar">
        <button type="submit">submit</button>
    </form>
@endsection
