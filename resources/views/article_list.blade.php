@extends('layouts.public')

@section('css')
<title>Myanmar Total News | {{$slug}}</title>
<meta name="keyword" content="{{$category->keyword}}">
<meta name="description" content="{{$category->desc}}">
@endsection


@section('head')

<div class="container">
  	@include('partials.header')

  	@include('partials.ads')
</div>

@endsection

@section('content')

<main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{$slug}}
          </h3>

          <div class="row mb-2">

            @foreach($articles as $article)
            <div class="col-md-6">
              <div class="card flex-md-row mb-4 box-shadow h-md-300">
                <div class="card-body d-flex flex-column align-items-start">
                  <!-- <strong class="d-inline-block mb-2 text-danger">Breaking News</strong> -->
                  <h6 class="mb-0">
                    <a class="text-dark" href="{{url('')}}/articles/{{$article->category->slug}}/{{$article->slug}}">{{$article->title}}</a>
                  </h6>
                  <div class="mb-1 text-muted"><small>{{showTime($article->created_at)}}</small>   <span class="badge badge-pill badge-success"> view {{$article->view}}</span></div>
                  <a href="{{url('')}}/articles/{{$article->category->slug}}/{{$article->slug}}">
                    <img class="card-img flex-auto d-none d-md-block" style="width: 310px;height: 185px;" src="{{asset('')}}/{{$article->img_path}}/{{$article->img_name}}" alt="{{$article->title}}" title="{{$article->title}}">
                  </a>
                  <p class="card-text mb-auto">{!! substr($article->desc, 0, 140) !!} ..</p>
                  <a href="{{url('')}}/articles/{{$article->category->slug}}/{{$article->slug}}">ဆက္လက္ဖတ္ရူ႕ရန္</a>
                </div>
              </div>
            </div>
            @endforeach

          </div>

          <nav class="blog-pagination justify-content-center">
            {{ $articles->links() }}
          </nav>

          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="{{url('/articles/newer-news')}}">သတင္းအသစ္မ်ားသုိ႔</a>
            <a class="btn btn-outline-secondary " href="{{url('/articles/all-news')}}">သတင္းမ်ားအားလုံးသုိ႔</a>
            <a class="btn btn-outline-danger" href="{{url('/articles/older-news')}}">သတင္းအေဟာင္းမ်ားသုိ႔</a>
          </nav>

          <div class="blog-post p-3 bg-light rounded">
            Google Ads
          </div>

        </div><!-- /.blog-main -->

        @include('partials.aside')

      </div><!-- /.row -->

    </main><!-- /.container -->

@endsection