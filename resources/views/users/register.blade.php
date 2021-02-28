@extends('layouts.user_app')
@section('content')
<div class="row">
   <div class="signup-form">
      <form method="post" id="user_form">
         {{ csrf_field() }}
         <span id="user_form_result"></span>
         <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
         <h2>Register</h2>
         <p class="hint-text">Create your account. It's free and only takes a minute.</p>
         <div class="form-group">
            <div class="row">
               <div class="col-xs-6"><input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" ></div>
               <div class="col-xs-6"><input type="text" class="form-control" name="last_name" id="first_name" placeholder="Last Name" ></div>
            </div>
         </div>
         <div class="form-group">
            <input type="text" class="form-control" name="user_name" id="user_name" placeholder="User Name">
         </div>
         <div class="form-group">
            <input type="text" class="form-control" name="user_email" id="user_email" placeholder="Email">
         </div>
         <div class="form-group">
            <input type="text" class="form-control" name="user_mobile" id="user_mobile" placeholder="Mobile">
         </div>
         <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
         </div>
         <div class="form-group">
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
         </div>
         <div class="form-group">
            <label class="checkbox-inline"><input type="checkbox" name="accept" id="accept" value="1"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
         </div>
         <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="user_action_button" id="user_action_button" value="ADD">Register Now</button>
         </div>
      </form>
      <div class="text-center">
         Already have an account? <!-- <a href="{{route('user.login')}}">Sign in</a> -->
         <a id="sign_in" class="optional_has_click">Sign in</a>
      </div>
   </div>
</div>
@endsection