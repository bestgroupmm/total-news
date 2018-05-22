@extends('layouts.admin')
@section('content')
<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="row">
         <div class="col-md-8">
            <h2 class="unicode">Advisters</h2>
         </div>
         <div class="col-md-4" style="padding: 0px;">
             
         </div>
      </div>
      <div class="x_panel">

         <div class="x_title">
            <h2 class="unicode">Advisters</h2>  

            <a href="{{url('admin/ads/create')}}" class="btn btn-sm btn-success pull-right">
               <i class="fa fa-plus-circle"></i> <span class="unicode" style="color: white;">Add New</span>
            </a>
            <div class="clearfix"></div>
         </div>

         <div class="x_content">

            @include('includes.status')

            <table class="table table-bordered">
               <tr class="unicode">
                  <th style="width: 30px;">No</th>
                  <th>Company</th>
                  <th>Phone</th>
                  <th>End Date</th>
                  <th>Expire</th>
                  <th style="width: 180px;">Action</th>
               </tr>
             
               @if(count($adves) > 0)
                  <?php $x = 0; ?>
                  @foreach($adves as $ads)
                     <?php $x++; ?>
                     <tr>
                        <td>{{$x}}</td>
                        <td>{{$ads->company}}</td>
                        <td>{{$ads->phone}}</td>
                        <td>{{$ads->end}}</td>
                        <td>{{$ads->expire}}</td>
                        <td>
                           <a href="{{url('')}}/admin/ads/{{$ads->id}}/edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                        
                           <form action="{{url('admin/ads')}}/{{$ads->id}}" method="POST" style="display: inline;">
                              {{csrf_field()}}
                              <input type="hidden" name="_method" value="DELETE">
                              <button type="submit" class="btn btn-sm btn-danger" >
                                 <i class="fa fa-trash"> Delete</i>
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
