@extends('layouts.admin')
@section('content')
<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="row">
         <div class="col-md-8">
            <h2 class="unicode">Socail Link</h2>
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

            <form class="form col-md-7" action="{{url('/admin/social-links')}}" method="POST">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="title" >{{ __('Title:') }}</label>

                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                    @if ($errors->has('title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="icon" >{{ __('Icon:') }}</label>

                    <input id="icon" type="text" class="form-control{{ $errors->has('icon') ? ' is-invalid' : '' }}" name="icon" value="{{ old('icon') }}" required >

                    @if ($errors->has('icon'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('icon') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="class" >{{ __('Class:') }}</label>

                    <input id="class" type="text" class="form-control{{ $errors->has('class') ? ' is-invalid' : '' }}" name="class" value="{{ old('class') }}" required >

                    @if ($errors->has('class'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('class') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="link" >{{ __('Link:') }}</label>

                    <input id="link" type="text" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" value="{{ old('link') }}" required autofocus>

                    @if ($errors->has('link'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('link') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Save</button>
                  <a href="{{url('admin/social-links')}}" class="btn btn-danger"> <i class="fa fa-reply"></i> Back </a>
                </div>

              </form>
            
         </div>

      </div>

   </div>
</div>

@endsection

