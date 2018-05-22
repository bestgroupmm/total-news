@extends('layouts.public')

@section('css')
<title>Myanmar Total News | Welcome</title>
@endsection


@section('head')

<div class="container">
  	@include('partials.header')

  	@include('partials.ads')

</div>

@endsection

@section('content')
    <div class="container" style="color:#888;text-align: center;">
        <img src="{{asset('/img/errors.png')}}" >
        <br>
        <!-- <h1 class="unicode">၀င်ရောက်ရန် ခွင့်ပြုချက် မရရှိနိုင်ပါ</h1> -->
    </div>
@endsection