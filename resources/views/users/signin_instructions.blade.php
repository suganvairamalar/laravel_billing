@extends('layouts.user_app')
@section('content')

<div class="jumbotron">
	@if(Session::has('success_msg'))
			<div class="alert alert-success">{{ Session::get('success_msg')}}</div>
			@endif
   <h1>Email Verification Tutorial</h1>
    <p>
        Welcome to the premiere email verification demo application.
    </p>  
    
   
</div>

@endsection