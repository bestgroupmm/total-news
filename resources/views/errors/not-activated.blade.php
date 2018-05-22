@extends('layouts.public')

@section('head')
<title>Account Not Activated</title>
@endsection

@section('content')
    <div class="container" style="padding:100px 0;color:#888;text-align: center;">
        <img src="{{asset('/assets/img/503error.png')}}" width="200px" height="auto">
        <h3 class="title">Your account is not activated, please verify your email.</h3>
    </div>
@endsection