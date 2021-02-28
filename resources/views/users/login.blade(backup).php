@extends('layouts.login_app')
@section('content')

<div class="row">
    <div class="col-lg-12">
         @if(Session::has('success_msg'))
         <div class="alert alert-info">{{ Session::get('success_msg')}}</div>
         @endif
         @if(Session::has('error_msg'))
         <div class="alert alert-danger">{{Session::get('error_msg')}}</div>
         @endif
   </div>
   <div class="login-form">
      <form action="{{ route('user.checklogin')}}" method="get">
         {{ csrf_field() }}        
         <span id="login_form_result"></span>
         <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
         <div class="col-md-8 col-md-offset-2">
            <!-- login_wrapper -->
            <div class="login_wrapper">
               <div class="row">
                  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6"> <a href="#" class="btn btn-primary google-plus"> Login with Google <i class="fa fa-google-plus"></i> </a> </div>
                  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6"> <a href="#" class="btn btn-primary facebook"> <span>Login with Facebook</span> <i class="fa fa-facebook"></i> </a> </div>
               </div>
               <h2>or</h2>
               <div class="formsix-pos">
                  <div class="form-group i-email"> <input type="user_email" class="form-control"  id="user_email" placeholder="Email Address *"> </div>
               </div>
               <div class="formsix-e">
                  <div class="form-group i-password"> <input type="password" class="form-control" id="password" placeholder="Password *"> </div>
               </div>
               <div class="login_remember_box"> <label class="control control--checkbox">Remember me <input type="checkbox"> <span class="control__indicator"></span> </label> <a href="#" class="forget_password"> Forgot Password </a> </div>
               <div class="login_btn_wrapper"> <!-- <a href="#" class="btn btn-primary login_btn"> Login </a> --> 
               <!-- <button type="submit" class="btn btn-primary btn-lg btn-block login_btn" name="login_submit_button" id="login_submit_button" value="LOGIN">Login</button> -->

               <input type="submit" class="btn btn-primary btn-lg btn-block login_btn" value="LOGIN">
               </div>
               <div class="login_message">
                  <p>
                     Don’t have an account ? <!-- <a href="{{route('user.register')}}"> Sign up </a> --> 
                     <a id="sign_up" class="optional_has_click">Sign up</a>
                  </p>
               </div>
            </div>
            <!-- /.login_wrapper-->
         </div>
      </form>
   </div>
</div>
@endsection