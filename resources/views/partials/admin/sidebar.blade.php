<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.html" class="site_title"><i class="fa fa-book"></i> <span>Myanmar News</span></a>
    </div>

    <div class="clearfix"></div>

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">

                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('admin/users')}}">Admin Users</a></li>
                    </ul>
                </li>

                <li><a><i class="fa fa-cogs"></i> Setting <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('admin/site-info')}}">Visitors</a></li>
                      <li><a href="{{url('admin/site-info')}}">Subscribers</a></li>
                      <li><a href="{{url('admin/social-links')}}">Social Links</a></li>
                    </ul>
                </li>

                <li><a><i class="fa fa-money"></i> Article <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('admin/article-categories')}}" >Article Category</a></li>
                      <li><a href="{{url('admin/articles')}}" >Articles</a></li>
                      
                    </ul>
                </li>

                <li><a><i class="fa fa-money"></i> <span class="unicode">Advertisings</span> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('admin/ads')}}"><span class="unicode">Ads</span></a></li>
                    </ul>
                </li>

            </ul>
        </div>

    </div>

     <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>
