<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Myanmar Total News| Admin Panel </title>
    <link rel="shortcut icon" type="image/png" href="{{asset('')}}/images/admin_icon.png"/>

    <!-- Bootstrap -->
    <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('backend/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('backend/css/custom.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/index.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">

    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        @include('partials.admin.sidebar')

        @include('partials.admin.nav')

        <!-- page content -->
        <div class="right_col" role="main">
          @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Myanmar Total News's Admin Panel<a href="https://besteducationacademy.com"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('backend/js/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
  
    <!-- Custom Theme Scripts -->
    <script src="{{asset('backend/js/custom.min.js')}}"></script>
    
    <script src="{{asset('backend/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

    @yield('js')
  </body>
</html>
