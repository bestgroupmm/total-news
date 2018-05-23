
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <!-- <div class="col pt-1">
        <a class="text-muted" href="#">Subscribe</a>
      </div> -->
      <div class="col text-center">
        <a class="blog-header-logo text-dark" href="{{url('/')}}"></a>
      </div>
      
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2" style="display: none;">
    <nav class="nav d-flex justify-content-between">
      <?php  
        $categories = \App\ArticleCategory::all();
      ?>
      @if($categories)
      @foreach($categories as $category)
      <a class="p-2 text-muted" href="{{url('')}}/articles/{{$category->slug}}">{{$category->title}}</a>
      @endforeach
      @endif
      <!-- <a class="p-2 text-muted" href="#">U.S.</a>
      <a class="p-2 text-muted" href="#">Technology</a>
      <a class="p-2 text-muted" href="#">Design</a>
      <a class="p-2 text-muted" href="#">Culture</a>
      <a class="p-2 text-muted" href="#">Business</a>
      <a class="p-2 text-muted" href="#">Politics</a>
      <a class="p-2 text-muted" href="#">Opinion</a>
      <a class="p-2 text-muted" href="#">Science</a>
      <a class="p-2 text-muted" href="#">Health</a>
      <a class="p-2 text-muted" href="#">Style</a>
      <a class="p-2 text-muted" href="#">Travel</a> -->
    </nav>
  </div>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="{{url('/')}}">Myanmar Total News</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">

        <?php  
          $categories = \App\ArticleCategory::all();
        ?>
        @foreach($categories as $category)
        <li class="nav-item">
          <a class="nav-link text-white" href="{{url('')}}/articles/{{$category->slug}}">{{$category->title}}</a>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</nav>