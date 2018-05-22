@extends('layouts.admin')
@section('content')
<style type="text/css">
  .pass{
    display: none;
  }
</style>
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
            <h2 class="unicode">Edit</h2>  

            <div class="clearfix"></div>
         </div>

         <div class="x_content">

            @include('includes.status')

            <form class="form form-horizontal" method="POST" action="{{url('admin/users')}}/{{$user->id}}" enctype="multipart/form-data">
               {{csrf_field()}}
               <input type="hidden" name="_method" value="PUT">

               <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">

                  <img src="{{asset('')}}/{{$user->avatar}}" class="img-responsive">

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
                     <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required>

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
                     <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>

               <div class="form-group">
                  <label class="col-md-2 control-label unicode">Change Password ?</label>

                  <div class="col-md-6">
                     <input name="change" id="yes" type="radio" value="yes" > Yes &nbsp;&nbsp;
                     <input name="change" id="no" type="radio" value="no" checked> No &nbsp;&nbsp;
                  </div>
               </div>

               <div class="form-group row pass">
                    <label for="password" class="col-md-2 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row pass">
                    <label for="password-confirm" class="col-md-2 control-label">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>

               <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                  <label for="role" class="col-md-2 control-label unicode">Role</label>

                  <div class="col-md-6">
                    @foreach($roles as $role)
                      @if(in_array($role->name,$ur))
                      <input id="role" type="checkbox" name="role" value="{{$role->name}}" checked > {{$role->display_name}} <br/>
                      @else
                      <input id="role" type="checkbox" name="role" value="{{$role->name}}"> {{$role->display_name}} <br/>
                      @endif
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

@section('js')
<script type="text/javascript">
  $(document).ready(function(){

    $('#yes').click(function(){
      $('.pass').css('display','block');
    });

    $('#no').click(function(){
      $('.pass').css('display','none');
    });

  });
</script>
@endsection
