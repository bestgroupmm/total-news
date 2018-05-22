@extends('layouts.public')

@section('head')
<title>503 Error</title>
@endsection

@section('content')
    <div class="container" style="padding:100px 0;color:#888;text-align: center;">
        <img src="{{asset('/assets/img/503error.png')}}" width="200px" height="auto">
    </div>
@endsection