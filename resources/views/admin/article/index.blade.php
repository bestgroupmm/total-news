@extends('layouts.admin')
@section('content')
<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="row">
         <div class="col-md-8">
            <h2 class="unicode">Articles</h2>
         </div>
         <div class="col-md-4" style="padding: 0px;">
             
         </div>
      </div>
      <div class="x_panel">

         <div class="x_title">
            <h2 class="unicode">Lists</h2>  

            <a href="{{url('admin/articles/create')}}" class="btn btn-sm btn-success pull-right">
               <i class="fa fa-plus-circle"></i> <span class="unicode" style="color: white;">Add New</span>
            </a>
            <div class="clearfix"></div>
         </div>

         <div class="x_content">

            @include('includes.status')

            <table class="table table-bordered">
               <tr class="unicode">
                  <th style="width: 30px;">No</th>
                  <th>Title</th>
                  <th>Title(En)</th>
                  <th style="width: 180px;">Action</th>
               </tr>
             
               @if(count($articles) > 0)
                  <?php $x = 0; ?>
                  @foreach($articles as $article)
                     <?php $x++; ?>
                     <tr>
                        <td>{{$x}}</td>
                        <td>{{$article->title}}</td>
                        <td>{{$article->title_en}}</td>
                        <td>
                           <a href="{{url('')}}/admin/articles/{{$article->id}}/edit" class="btn btn-sm btn-info">
                              <i class="fa fa-edit"></i> Edit
                           </a>

                           <form action="{{url('')}}/admin/articles/{{$article->id}}" method="POST" style="display: inline;">
                              {{csrf_field()}}
                              <input type="hidden" name="_method" value="DELETE">
                              <button type="submit" class="btn btn-sm btn-danger">
                                 <i class="fa fa-trash"></i> Delete
                              </button>
                           </form>

                        </td>
                     </tr>
                  @endforeach
               @endif

            </table>
         </div>

      </div>

   </div>
</div>

@endsection
