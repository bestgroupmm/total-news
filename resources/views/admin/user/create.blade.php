@extends('layouts.admin')
@section('content')
<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="row">
         <div class="col-md-8">
            <h2 class="unicode">Admin Users</h2>
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

            <form class="form form-horizontal" method="POST" action="{{url('admin/users')}}" enctype="multipart/form-data">
               {{csrf_field()}}

               <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                  <label for="avatar" class="col-md-2 control-label unicode">Photo Upload</label>

                  <div class="col-md-6">
                     <input id="avatar" type="file" class="form-control" name="avatar">

                    @if ($errors->has('avatar'))
                        <span class="help-block">
                            <strong>{{ $errors->first('avatar') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>
               
               <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="name" class="col-md-2 control-label unicode">name</label>

                  <div class="col-md-6">
                     <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>

               <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email" class="col-md-2 control-label unicode">email</label>

                  <div class="col-md-6">
                     <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>

               <div class="form-group row">
                    <label for="password" class="col-md-2 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-2 control-label">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

               <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                  <label for="role" class="col-md-2 control-label unicode">Role</label>

                  <div class="col-md-6">
                    @foreach($roles as $role)
                    <input id="role" type="checkbox" name="role" value="{{$role->name}}"> {{$role->display_name}} <br/>
                    @endforeach

                    @if ($errors->has('role'))
                        <span class="help-block">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>

               <div class="form-group">
                  <div class="col-md-6 col-md-offset-2">
                     <button type="submit" class="btn btn-sm btn-success">
                        <i class="fa fa-save"></i> <span class="unicode"> Save</span>
                     </button>
                     <a href="{{url('admin/users')}}" class="btn btn-sm btn-danger"><i class="fa fa-reply"></i> <span class="unicode">Back</span></a>
                  </div>
               </div>

            </form>
            
         </div>

      </div>

   </div>
</div>

@endsection
