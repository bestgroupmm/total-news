@extends('layouts.admin')

@section('content')
<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="row">
         <div class="col-md-8">
            <h2 class="unicode">Advertisers</h2>
         </div>
         <div class="col-md-4" style="padding: 0px;">
             
         </div>
      </div>
      <div class="x_panel">

         <div class="x_title">

            <h2 class="unicode">Advertisers</h2>  
            
            <div class="clearfix"></div>
         </div>

         <div class="x_content">

            @include('includes.status')
            
            <form class="form form-horizontal" method="POST" action="{{url('admin/ads')}}/{{$ads->id}}" enctype="multipart/form-data">
               {{csrf_field()}}
               <input type="hidden" name="_method" value="PUT">

               <div class="form-group">
                 <img src="{{asset('')}}/{{$ads->image}}" class="img-responsive">
               </div>

               <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                  <label for="image" class="col-md-2 control-label unicode">Ads Image</label>

                  <div class="col-md-6">
                     <input id="image" type="file" class="form-control" name="image" >

                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>

               <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                  <label for="link" class="col-md-2 control-label unicode">Link :</label>

                  <div class="col-md-6">
                     <input id="link" type="text" class="form-control" name="link" value="{{ $ads->link }}" required>

                    @if ($errors->has('link'))
                        <span class="help-block">
                            <strong>{{ $errors->first('link') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>
               
               <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                  <label for="company" class="col-md-2 control-label unicode">Company :</label>

                  <div class="col-md-6">
                     <input id="company" type="text" class="form-control" name="company" value="{{ $ads->company }}" required>

                    @if ($errors->has('company'))
                        <span class="help-block">
                            <strong>{{ $errors->first('company') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>

               <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                  <label for="phone" class="col-md-2 control-label unicode">Phone :</label>

                  <div class="col-md-6">
                     <input id="phone" type="text" class="form-control" name="phone" value="{{ $ads->phone }}" required>

                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>

               <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email" class="col-md-2 control-label unicode">Email :</label>

                  <div class="col-md-6">
                     <input id="email" type="text" class="form-control" name="email" value="{{ $ads->email }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>

               <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                  <label for="address" class="col-md-2 control-label unicode">Address :</label>

                  <div class="col-md-6">
                     <input id="address" type="text" class="form-control" name="address" value="{{ $ads->address }}" required>

                    @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>

               <div class="form-group">
                  <label class="col-md-2 control-label unicode">Period :</label>

                  <div class="col-md-6">
                     <div class="row">

                       <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }} col-md-4">
                          <label for="start" class="control-label unicode">Start :</label>

                          <div class="col-md-12">
                             <input id="start" type="text" class="form-control row" name="start" value="{{ $ads->start }}" required>

                            @if ($errors->has('start'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('start') }}</strong>
                                </span>
                            @endif
                          </div>
                       </div>

                       <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }} col-md-4">
                          <label for="end" class="control-label unicode">End :</label>

                          <div class="col-md-12">
                             <input id="end" type="text" class="form-control row" name="end" value="{{ $ads->end }}" required>

                            @if ($errors->has('end'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('end') }}</strong>
                                </span>
                            @endif
                          </div>
                       </div>

                       <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }} col-md-4">
                          <label for="duration" class="control-label unicode">Duration :</label>

                          <div class="col-md-12">
                             <input id="duration" type="text" class="form-control row" name="duration" value="{{ $ads->duration }}" required>

                            @if ($errors->has('duration'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('duration') }}</strong>
                                </span>
                            @endif
                          </div>
                       </div>

                     </div>
                  </div>
               </div>

               <div class="form-group{{ $errors->has('contact_person') ? ' has-error' : '' }}">
                  <label for="contact_person" class="col-md-2 control-label unicode">Contact Person :</label>

                  <div class="col-md-6">
                     <input id="contact_person" type="text" class="form-control" name="contact_person" value="{{ $ads->contact_person }}" >

                    @if ($errors->has('contact_person'))
                        <span class="help-block">
                            <strong>{{ $errors->first('contact_person') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>

               <div class="form-group{{ $errors->has('contact_phone') ? ' has-error' : '' }}">
                  <label for="contact_phone" class="col-md-2 control-label unicode">Contact Phone :</label>

                  <div class="col-md-6">
                     <input id="contact_phone" type="text" class="form-control" name="contact_phone" value="{{ $ads->contact_phone }}" >

                    @if ($errors->has('contact_phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('contact_phone') }}</strong>
                        </span>
                    @endif
                  </div>
               </div>

               <div class="form-group">
                  <div class="col-md-6 col-md-offset-2">
                     <button type="submit" class="btn btn-sm btn-success">
                        <i class="fa fa-save"></i> <span class="unicode">Save</span>
                     </button>
                     <a href="{{url('admin/ads')}}" class="btn btn-sm btn-danger"><i class="fa fa-reply"></i> <span class="unicode">Back</span></a>
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
      
      $('#start').mouseenter(function(){
        getDuration();
      });

      $('#end').mouseout(function(){
        getDuration();
      });

      function getDuration(){
        var start = $('#start').val();

        var end = $('#end').val();

        var date1 = new Date(start);
        var date2 = new Date(end);
        var timeDiff = Math.abs(date2.getTime() - date1.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 

        $('#duration').val(diffDays);
      }

    });

</script>
@endsection
