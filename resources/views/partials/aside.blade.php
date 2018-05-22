<?php  
  $categories = \App\ArticleCategory::all();
?>
<aside class="col-md-4 blog-sidebar">

  <div class="p-3">
    <h4 class="font-italic">Categories</h4>

    @foreach($categories as $c)
    <div class="row mb-2 bg-dark p-2 rounded card flex-md-row box-shadow">
      <a href="{{url('')}}/articles/{{$c->slug}}" title="{{$c->title_en}}">{{$c->title}}</a>
    </div>
    @endforeach
  </div>

  <div class="p-3">
    <h4 class="font-italic">Lastest News</h4>

    <?php $articles = \App\Article::orderBy('created_at','desc')->skip(1)->take(7)->get(); ?>

    @foreach($articles as $article)
    <div class="row mb-2 bg-light p-2 rounded card flex-md-row box-shadow">
              
      <div class="col-md-3">
        <a href="{{url('')}}/articles/{{$article->category->slug}}/{{$article->slug}}">
          <img class="card-img flex-auto d-none d-md-block" src="{{asset('')}}/{{$article->img_path}}/{{$article->img_name}}" alt="{{$article->title}}">
        </a>
      </div>
      <div class="col-md-9">
        <h4 class="blog-post-title" style="font-size: 18px;" title="{{$article->title_en}}">
          <a href="{{url('')}}/articles/{{$article->category->slug}}/{{$article->slug}}">
            {{$article->title}}
          </a>
        </h4>
        <p class="blog-post-meta"><small>{{showTime($article->created_at)}}</small></p>
      </div>

    </div>
    @endforeach
  </div>

  <!-- <div class="p-3 mb-3 bg-light rounded">
    <h4 class="font-italic">About</h4>
    <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
  </div> -->

  <div class="p-3 mb-3 bg-light rounded">
    <div class="fb-page" data-href="https://www.facebook.com/BestJapaneseLanguageCenter/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/BestJapaneseLanguageCenter/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/BestJapaneseLanguageCenter/">BEST Education Center</a></blockquote></div>
  </div>



  <!-- <div class="p-3">
    <h4 class="font-italic">Elsewhere</h4>
    <ol class="list-unstyled">
      <li><a href="#">GitHub</a></li>
      <li><a href="#">Twitter</a></li>
      <li><a href="#">Facebook</a></li>
    </ol>
  </div> -->
</aside><!-- /.blog-sidebar -->