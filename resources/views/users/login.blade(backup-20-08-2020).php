@extends('layouts.login_app')
@section('content')
<div class="row">
   <div class="col-lg-12">
     
      <div class="panel panel-default">
         <div class="panel-heading">
            <div class="row">
               <div class="col-lg-12 margin-tb">
                  <div class="pull-left">
                     <h2>Login</h2>
                  </div>
                  <div class="pull-right">
                  </div>
               </div>
            </div>
         </div>
         <div class="panel-body">
            <form id="login_form" action="{{ route('user.checklogin')}}" method="post" class="form-horizontal" >
               {{ csrf_field() }}
               <span id="login_form_result">
                   @if(Session::has('error_msg'))
         <div class="alert alert-danger">{{Session::get('error_msg')}}</div>
         @endif
      @if($errors->all())        
         <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
         </div>
      @endif
               </span>
               <div class="form-group">
                  <label class="control-label col-sm-2">Email</label>
                  <div class="col-sm-10">
                     <input type="text" name="user_email" id="user_email" class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-sm-2">Password</label>
                  <div class="col-sm-10">
                     <input type="password" name="password" id="password" class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-sm-2">&nbsp;</label>
                  <div class="col-sm-2">
                     <label class="check-inline"><input type="checkbox" name="remember" id="remember">Remember Me 
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                     <input type="submit" class="btn btn-primary" value="Login" id="login_submit_button">
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection