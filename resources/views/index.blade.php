@extends('layouts.public')

@section('css')
<title>Myanmar Total News | ျမန္မာသတင္းစုံ</title>
<meta name="description" content="Myanmar Total News is a myanmar media webist.Myanmar Total News has upload Health News, ">
<meta name="keyword" content="myanmar news, news, myanmar, Myanmar Total News, myanmar total news, myanmar education, technology, education">
<meta name="author" content="Myanmar Total News">
@endsection


@section('head')

<div class="container">
  	@include('partials.header')

  	@include('partials.ads')

  	@include('partials.lastest')
</div>

@endsection

@section('content')

<main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            favourite News
          </h3>

          <div class="blog-post">
            
            @if($favourites)
            @foreach($favourites as $article)

            <div class="col">
              <div class="row mb-2 box-shadow bg-light p-2">
              
                <div class="col-md-3">
                  <a href="{{url('')}}/articles/{{$article->category->slug}}/{{$article->slug}}" title="{{$article->title_en}}">
                    <img class="card-img flex-auto d-none d-md-block" src="{{asset('')}}/{{$article->img_path}}/{{$article->img_name}}" alt="{{$article->title}}">
                  </a>
                </div>
                <div class="col-md-9">
                  <h4 class="blog-post-title" style="font-size: 18px;" title="{{$article->title_en}}">  
                     <a href="{{url('')}}/articles/{{$article->category->slug}}/{{$article->slug}}" title="{{$article->title_en}}" class="text-dark">{{$article->title}}</a>
                  </h4>
                  <p class="blog-post-meta">
                    <small>{{showTime($article->created_at)}}</small> ,
                    <span class="badge badge-pill badge-primary p-1">{{$article->view}}</span>
                  </p>

                  <p>{!! substr($article->desc, 0, 140) !!} .. <a href="{{url('')}}/articles/{{$article->category->slug}}/{{$article->slug}}" title="{{$article->title_en}}" class="text-primary">see more</a> </p>
                </div>

              </div>
            </div>
            <br/>

            @endforeach
            @endif
           
          </div><!-- /.blog-post -->

          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="{{url('/articles/newer-news')}}">သတင္းအသစ္မ်ားသုိ႔</a>
            <a class="btn btn-outline-secondary " href="{{url('/articles/all-news')}}">သတင္းမ်ားအားလုံးသုိ႔</a>
            <a class="btn btn-outline-danger" href="{{url('/articles/older-news')}}">သတင္းအေဟာင္းမ်ားသုိ႔</a>
          </nav>

          @if($random)
          <div class="blog-post">
            <h2 class="blog-post-title" style="font-size: 20px;">
              <a href="{{url('')}}/articles/{{$random->category->slug}}/{{$random->slug}}" title="{{$random->title_en}}" class="text-dark">
                {{ $random->title }}
              </a>
            </h2>
            <p class="blog-post-meta"><small>{{showTime($random->created_at)}}</small></p>

            <p>{!! substr($random->desc, 0, 300) !!} .. <a href="{{url('')}}/articles/{{$random->category->slug}}/{{$random->slug}}" title="{{$random->title_en}}" class="text-primary">see more</a> </p>
            
          </div><!-- /.blog-post -->
          @endif

          <div class="blog-post p-3 bg-light rounded">
            Google Ads
          </div>

        </div><!-- /.blog-main -->

        @include('partials.aside')

      </div><!-- /.row -->

    </main><!-- /.container -->

@endsection

@section('js')

@endsection