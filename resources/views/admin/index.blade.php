@extends('layouts.admin')
@section('content')

<!-- top tiles -->
      <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Today Visitors </span>
          <div class="count green">{{count($todayVisitors)}}</div>
          <span class="count_bottom"><i class="green">4% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-clock-o"></i> Total Visitors</span>
          <div class="count">{{count($visitors)}}</div>
          <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Today Articles</span>
          <div class="count green">{{count($todayArticles)}}</div>
          <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Total Articles</span>
          <div class="count">{{count($articles)}}</div>
          <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Total Subscribers</span>
          <div class="count">2,315</div>
          <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
          <div class="count">7,325</div>
          <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
        </div>
      </div>
      <!-- /top tiles -->

  <div class="row">

    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel tile fixed_height_320">
        <div class="x_title">
          <h2>Admin Users</h2>
          @if(Auth::user()->hasRole('admin'))
          <a class="pull-right btn btn-primary" href="{{url('admin/users/create')}}"><i class="fa fa-plus-circle"></i> Create</a>
          @endif
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <table class='table table-bordered'>

            <tr>
              <th style="width: 50px;">No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
            </tr>
            <?php  $x = 1; ?>
            @foreach($users as $user)
              <tr>
                <td>{{$x}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->roles[0]['display_name']}}</td>
              </tr>
              <?php $x ++; ?>
            @endforeach

          </table>

          <br/>
          <a href="{{url('/admin/users')}}" class="btn btn-success"> <i class="fa fa-arrow-circle-right"></i> Go To Section</a>

        </div>
      </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-6">
      <div class="x_panel tile fixed_height_320">
        <div class="x_title">
          <h2>Article Category</h2>
          @if(Auth::user()->hasRole('admin'))
          <a class="pull-right btn btn-primary" href="{{url('admin/article-categories/create')}}"><i class="fa fa-plus-circle"></i> Create</a>
          @endif
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <table class='table table-bordered'>

            <tr>
              <th style="width: 50px;">No</th>
              <th>Title</th>
              <th>Tile En</th>
            </tr>
            <?php  $x = 1; ?>
            @foreach($articleCategories as $c)
              <tr>
                <td>{{$x}}</td>
                <td>{{$c->title}}</td>
                <td>{{$c->title_en}}</td>
                <td></td>
              </tr>
              <?php $x ++; ?>
            @endforeach

          </table>

          <br/>
          <a href="{{url('/admin/article-categories')}}" class="btn btn-success"> <i class="fa fa-arrow-circle-right"></i> Go To Section</a>
        </div>
      </div>
    </div>

  </div>

<!-- ============================================= -->

  <div class="row">

    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="x_panel tile fixed_height_320">
        <div class="x_title">
          <h2>Visitors</h2>
          @if(Auth::user()->hasRole('admin'))
          <a class="pull-right btn btn-primary" href="{{url('admin/users/create')}}"><i class="fa fa-plus-circle"></i> Create</a>
          @endif
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <table class='table table-bordered'>

            <tr>
              <th style="width: 50px;">No</th>
              <th>IP Adress</th>
              <th>City</th>
            </tr>
            <?php  $x = 1; ?>
            @foreach($todayVisitors as $v)
              <tr>
                <td>{{$x}}</td>
                <td>{{$v->ip_adress}}</td>
                <td>{{$v->city}}</td>
              </tr>
              <?php $x ++; ?>
            @endforeach

          </table>

          <br/>
          <a href="{{url('/admin/visitors')}}" class="btn btn-success"> <i class="fa fa-arrow-circle-right"></i> Go To Section</a>

        </div>
      </div>
    </div>

    <div class="col-md-8 col-sm-8 col-xs-6">
      <div class="x_panel tile fixed_height_320">
        <div class="x_title">
          <h2>Articles</h2>
            <a class="pull-right btn btn-primary" href="{{url('admin/articles/create')}}"><i class="fa fa-plus-circle"></i> Create</a>
          
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <table class='table table-bordered'>

            <tr>
              <th style="width: 50px;">No</th>
              <th>Title</th>
              <th>Post By</th>
            </tr>
            <?php  $x = 1; ?>
            @foreach($todayArticles as $a)
              <tr>
                <td>{{$x}}</td>
                <td>{{$a->title}}</td>
                <td>{{$a->post_by}}</td>
              </tr>
              <?php $x ++; ?>
            @endforeach

          </table>

          <br/>
          <a href="{{url('/admin/articles')}}" class="btn btn-success"> <i class="fa fa-arrow-circle-right"></i> Go To Section</a>
        </div>
      </div>
    </div>

  </div>

@endsection
