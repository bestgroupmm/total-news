@extends('layouts.admin')
@section('content')
<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="row">
         <div class="col-md-8">
            <h2 class="unicode">Social Links</h2>
         </div>
         <div class="col-md-4" style="padding: 0px;">
             
         </div>
      </div>
      <div class="x_panel">

         <div class="x_title">
            <h2 class="unicode">Lists</h2>  

            <a href="{{url('admin/social-links/create')}}" class="btn btn-sm btn-success pull-right">
               <i class="fa fa-plus-circle"></i> <span class="unicode" style="color: white;">Add New</span>
            </a>
            <div class="clearfix"></div>
         </div>

         <div class="x_content">

            @include('includes.status')

            <table class="table table-stripped table-bordered table-horver">
                <tr>
                  <th width="50px">No</th>
                  <th>Title</th>
                  <th>Icon</th>
                  <th>Class</th>
                  <th>Link</th>
                  <th>Action</th>
                </tr>
                <?php $x = 1; ?>
                @foreach($socials as $social)
                <tr>
                  <td>{{$x}}</td>
                  <td>{{$social->title}}</td>
                  <td><i class="{{$social->icon}}"></i></td>
                  <td>{{$social->class}}</td>
                  <td>{{$social->link}}</td>
                  <td>
                    <a href="{{url('/admin/social-links')}}/{{$social->id}}" class="btn btn-xs btn-success"><i class="fa fa-eye-open"></i>View</a>
                    <a href="{{url('/admin/social-links')}}/{{$social->id}}/edit" class="btn btn-xs btn-primary"><i class="fa fa-eye-open"></i>Edit</a>

                    <form class="form" method="POST" action="{{url('/admin/social-links')}}/{{$social->id}}">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="id" value="{{$social->id}}">
                      
                      <button type="submit" class="btn btn-danger btn-xs" >Delete</button>
                    </form>
                  </td>
                </tr>
               
                <?php $x++; ?>
                @endforeach

              </table>
         </div>

      </div>

   </div>
</div>

@endsection
