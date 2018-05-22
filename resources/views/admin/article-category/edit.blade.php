@extends('layouts.admin')
@section('content')
<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="row">
         <div class="col-md-8">
            <h2 class="unicode">Article Category</h2>
         </div>
         <div class="col-md-4" style="padding: 0px;">
             
         </div>
      </div>
      <div class="x_panel">

         <div class="x_title">
            <h2 class="unicode">Create</h2>  

            <div class="clearfix"></div>
         </div>

         <div class="x_content">

            @include('includes.status')

            <form class="form form-horizontal" method="POST" action="{{url('admin/article-categories')}}/{{$category->id}}" enctype="multipart/form-data">
               {{csrf_field()}}
               <input type="hidden" name="_method" value="PUT">

               <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                  <label for="avatar" class="col-md-2 control-label unicode">Upload Photo</label>

                  <div class="col-md-6">

                    @if($category->image_id != null)
                    <img src="{{asset('')}}/{{$category->image->path}}/{{$category->image->name}}" class="img-responsive">
                    @endif
                     <input id="avatar" type="file" class="form-control" name="avatar" >

                    @if ($errors->has('avatar'))
                        <span class="help-block">
                            <strong>{{ $errors->first('avatar') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>
               
               <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                  <label for="title" class="col-md-2 control-label unicode">Title</label>

                  <div class="col-md-6">
                     <input id="title" type="text" class="form-control" name="title" value="{{ $category->title }}" required>

                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>

               <div class="form-group{{ $errors->has('title_en') ? ' has-error' : '' }}">
                  <label for="title_en" class="col-md-2 control-label unicode">Title(En)</label>

                  <div class="col-md-6">
                     <input id="title_en" type="text" class="form-control" name="title_en" value="{{ $category->title_en }}" required>

                    @if ($errors->has('title_en'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title_en') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>

               <div class="form-group{{ $errors->has('keyword') ? ' has-error' : '' }}">
                  <label for="keyword" class="col-md-2 control-label unicode">Meta Keyword</label>

                  <div class="col-md-6">
                     <input id="keyword" type="text" class="form-control" name="keyword" value="{{ $category->keyword }}">

                    @if ($errors->has('keyword'))
                        <span class="help-block">
                            <strong>{{ $errors->first('keyword') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>

               <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
                  <label for="desc" class="col-md-2 control-label unicode">Meta Description</label>

                  <div class="col-md-6">
                     <textarea id="desc" class="form-control" name="desc" rows="5">
                        {{ $category->desc }}
                     </textarea>

                    @if ($errors->has('desc'))
                        <span class="help-block">
                            <strong>{{ $errors->first('desc') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>

               <div class="form-group">
                  <div class="col-md-6 col-md-offset-2">
                     <button type="submit" class="btn btn-sm btn-success">
                        <i class="fa fa-save"></i> <span class="unicode">Save</span>
                     </button>
                     <a href="{{url('admin/article-categories')}}" class="btn btn-sm btn-danger"><i class="fa fa-reply"></i> <span class="unicode">Back</span></a>
                  </div>
               </div>

            </form>
            
         </div>

      </div>

   </div>
</div>

@endsection
