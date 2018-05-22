<div class="row mb-3">
  <?php 

    $daily = \App\Article::where('category_id','=','1')->OrderBy('created_at','DESC')->first(); 

  ?>

  @if($daily)
  <div class="col-md-4">
    <div class="card flex-md-row mb-4 box-shadow h-md-300">
      <div class="card-body d-flex flex-column align-items-start">
        <strong class="d-inline-block mb-2 text-danger">Daily News</strong>
        <h6 class="mb-0">
          <a class="text-dark" href="{{url('')}}/articles/{{$daily->category->slug}}/{{$daily->slug}}">{{$daily->title}}</a>
        </h6>
        <div class="mb-1 text-muted"><small>{{showTime($daily->created_at)}}</small></div>
        <a href="{{url('')}}/articles/{{$daily->category->slug}}/{{$daily->slug}}" title="{{$daily->title}}">
        <img class="card-img flex-auto d-md-block" src="{{asset('')}}/{{$daily->img_path}}/{{$daily->img_name}}" alt="{{$daily->title}}">
        </a>
        <p class="card-text mb-auto">{!! substr($daily->desc, 0, 140) !!} ..</p>
        <a href="{{url('')}}/articles/{{$daily->category->slug}}/{{$daily->slug}}">Continue reading</a>
      </div>
    </div>
  </div>
  @endif

  <?php $popular = \App\Article::inRandomOrder()->where('category_id','!=','1')->orderBy('created_at','DESC')->first(); ?>

  @if($popular)
  <div class="col-md-4">
    <div class="card flex-md-row mb-4 box-shadow h-md-300">
      <div class="card-body d-flex flex-column align-items-start">
        <strong class="d-inline-block mb-2 text-primary">{{$popular->category->title}}</strong>
        <h6 class="mb-0">
          <a class="text-dark" href="{{url('')}}/articles/{{$popular->category->slug}}/{{$popular->slug}}">{{$popular->title}}</a>
        </h6>
        <div class="mb-1 text-muted"><small>{{showTime($popular->created_at)}}</small></div>
        <a href="{{url('')}}/articles/{{$popular->category->slug}}/{{$popular->slug}}" title="{{$popular->title}}">
        <img class="card-img flex-auto d-none d-md-block" src="{{asset('')}}/{{$popular->img_path}}/{{$popular->img_name}}" alt="{{$popular->title}}">
        </a>
        <p class="card-text mb-auto">{!! substr($popular->desc, 0, 140) !!} ..</p>
        <a href="{{url('')}}/articles/{{$popular->category->slug}}/{{$popular->slug}}">Continue reading</a>
      </div>
    </div>
  </div>
  @endif

  <?php $lastest = \App\Article::orderBy('created_at','desc')->first(); ?>
  
  @if($lastest)
  <div class="col-md-4">
    <div class="card flex-md-row mb-4 box-shadow h-md-300">
      <div class="card-body d-flex flex-column align-items-start">
        <strong class="d-inline-block mb-2 text-success">Latest News</strong>
        <h6 class="mb-0">
          <a class="text-dark" href="{{url('')}}/articles/{{$lastest->category->slug}}/{{$lastest->slug}}">{{$lastest->title}}</a>
        </h6>
        <div class="mb-1 text-muted"><small>{{showTime($lastest->created_at)}}</small></div>
        <a href="{{url('')}}/articles/{{$lastest->category->slug}}/{{$lastest->slug}}" title="{{$lastest->title}}">
        <img class="card-img flex-auto d-none d-md-block" src="{{asset('')}}/{{$lastest->img_path}}/{{$lastest->img_name}}" alt="{{$lastest->title}}">
        </a>
        <p class="card-text mb-auto">{!! substr($lastest->desc, 0, 140) !!} ..</p>
        <a href="{{url('')}}/articles/{{$lastest->category->slug}}/{{$lastest->slug}}">Continue reading</a>
      </div>
    </div>
  </div>
  @endif

</div>