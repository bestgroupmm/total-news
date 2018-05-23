@extends('layouts.admin')
@section('content')
<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="row">
         <div class="col-md-8">
            <h2 class="unicode">Article</h2>
         </div>
         <div class="col-md-4" style="padding: 0px;">
             
         </div>
      </div>
      <div class="x_panel">

         <div class="x_title">
            <h2 class="unicode">Edit</h2>  

            <div class="clearfix"></div>
         </div>

         <div class="x_content">

            @include('includes.status')

            <form class="form form-horizontal" method="POST" action="{{url('admin/articles')}}/{{$article->id}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">

               <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                  <label for="avatar" class="col-md-2 control-label unicode">Upload Photo</label>

                  <div class="col-md-6">
                    <img src="{{asset('')}}/{{$article->img_path}}/{{$article->img_name}}" class="img-responsive">
                     <input id="avatar" type="file" class="form-control" name="avatar">

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
                     <input id="title" type="text" class="form-control" name="title" value="{{$article->title}}" required>

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
                     <input id="title_en" type="text" class="form-control" name="title_en" value="{{$article->title_en}}" required>

                    @if ($errors->has('title_en'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title_en') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>

               <div class="form-group{{ $errors->has('video_link') ? ' has-error' : '' }}">
                  <label for="video_link" class="col-md-2 control-label unicode">Video</label>

                  <div class="col-md-6">
                     <input id="video_link" type="text" class="form-control" name="video_link" value="{{$article->video_link}}" required>

                    @if ($errors->has('video_link'))
                        <span class="help-block">
                            <strong>{{ $errors->first('video_link') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>

               <div class="form-group{{ $errors->has('keyword') ? ' has-error' : '' }}">
                  <label for="keyword" class="col-md-2 control-label unicode">Category</label>

                  <div class="col-md-6">
                      <select name="category" class="form-control unicode">
                        @foreach($categories as $category)
                          @if($article->category_id == $category->id)
                          <option value="{{$category->id}}" selected>{{$category->title}}</option>
                          @else
                          <option value="{{$category->id}}">{{$category->title}}</option>
                          @endif
                        @endforeach
                      </select>

                    @if ($errors->has('keyword'))
                        <span class="help-block">
                            <strong>{{ $errors->first('keyword') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>

               <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
                  <label for="desc" class="col-md-2 control-label unicode">Description</label>

                  <div class="col-md-6">
                     <textarea id="summernote" class="form-control" name="desc" rows="5">
                        {{ $article->desc }}
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
                     <a href="{{url('admin/articles')}}" class="btn btn-sm btn-danger"><i class="fa fa-reply"></i> <span class="unicode">Back</span></a>
                  </div>
               </div>

            </form>
            
         </div>

      </div>

   </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
    $('#summernote').summernote({
      height: 200,                 // set editor height
      minHeight: null,             // set minimum height of editor
      maxHeight: null,             // set maximum height of editor
      focus: true                  // set focus to editable area after initializing summernote
    });
</script>
@endsection
