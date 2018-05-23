@extends('layouts.public')

@section('css')
<title>{{$article->title_en}}</title>
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
        <a href="{{url('/')}}articles/{{$category->slug}}" class="text-muted" title="{{$category->title_en}}">{{$category->title}}</a>
      </h3>

      <div class="row mb-1">

        <div class="col-md-12">
          <div class="card flex-md-row mb-4 box-shadow h-md-300">
            <div class="card-body d-flex flex-column align-items-start">
              <!-- <strong class="d-inline-block mb-2 text-danger">Breaking News</strong> -->
              <h5 class="mb-0">
                <a class="text-dark" href="#">{{$article->title}}</a>
              </h5>
              <div class="mb-1 text-muted">
                <small>{{date('F d, Y',strtotime($article->created_at))}} ({{$ago}})</small>   <span class="badge badge-pill badge-success"> view {{$article->view}}</span>
              </div>
              <img class="card-img flex-auto d-none d-md-block" src="{{asset('')}}/{{$article->img_path}}/{{$article->img_name}}" alt="{{$article->title}}">
              <br/>
              <p>
                <div class="fb-share-button" data-href="{{url('/articles')}}/{{$category->slug}}/{{$article->slug}}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
              </p>
              <p class="card-text mb-auto">{!!$article->desc!!} </p>
              @if($article->video_link)
               <p>
                <iframe width="500" height="300" src="{{$article->video_url}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
              </p>
              @endif
              <br/><br/>
              <p>
                By : <b>{{$article->post_by}}</b>
              </p>
            </div>
          </div>
        </div>

      </div>

      <nav class="blog-pagination">
      </nav>

      <div class="blog-post p-3 bg-light rounded">
        Google Ads
      </div>

    </div><!-- /.blog-main -->

    @include('partials.related')

  </div><!-- /.row -->

</main><!-- /.container -->

@endsection