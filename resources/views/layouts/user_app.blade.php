<!DOCTYPE html>
<html lang="en">
   <head>
      <title>USER LOGIN REGISTRATION</title>
      <script type="text/javascript" src="{{URL::asset('js/jqueryv3.min.js')}}"></script> 
      <script type="text/javascript" src="{{URL::asset('js/bootstrapv3.min.js')}}"></script>
      <script type="text/javascript" src="{{URL::asset('js/select2.full.js')}}"></script> 
      <link rel="stylesheet" href="{{URL::asset('css/bootstrapv3.min.css')}}" type="text/css"/>
      <link rel="stylesheet" href="{{URL::asset('css/webfonts.css')}}" type="text/css"/>
      <link rel="stylesheet" href="{{URL::asset('css/select2.css')}}" type="text/css"/>
      <!-- CRUD JS -->
      <script type="text/javascript" src="{{URL::asset('js/forms/user_form.js')}}"></script>
      <style>
         /* @import url("https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css");*/
         /* @import url('https://fonts.googleapis.com/css?family=Montserrat|Open+Sans');*/
         .glyphicon {
         position: relative;
         top: 1px;
         display: inline-block;
         font-family: 'Glyphicons Halflings';
         font-style: normal;
         font-weight: normal;
         line-height: 1;
         -webkit-font-smoothing: antialiased;
         -moz-osx-font-smoothing: grayscale;
         }
         .glyphicon-asterisk:before {
         content: "\2a";
         }
         body {
         /*font-family: 'Open Sans', sans-serif;
         font-family: 'Montserrat', sans-serif;
         font-family: 'Poppins', sans-serif;*/
         }
         body {
         color: #fff;
         background: #63738a;
         /*font-family: 'Roboto', sans-serif;*/
         font-family: 'Poppins', sans-serif;
         }
         .form-control{
         height: 40px;
         box-shadow: none;
         color: #969fa4;
         }
         .form-control:focus{
         border-color: #5cb85c;
         }
         .form-control, .btn{        
         border-radius: 3px;
         }
         .signup-form{
         width: 400px;
         margin: 0 auto;
         padding: 30px 0;
         }
         .signup-form h2{
         color: #636363;
         margin: 0 0 15px;
         position: relative;
         text-align: center;
         }
         .signup-form h2:before, .signup-form h2:after{
         content: "";
         height: 2px;
         width: 30%;
         background: #d4d4d4;
         position: absolute;
         top: 50%;
         z-index: 2;
         } 
         .signup-form h2:before{
         left: 0;
         }
         .signup-form h2:after{
         right: 0;
         }
         .signup-form .hint-text{
         color: #999;
         margin-bottom: 30px;
         text-align: center;
         }
         .signup-form form{
         color: #999;
         border-radius: 3px;
         margin-bottom: 15px;
         background: #f2f3f7;
         box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
         padding: 30px;
         }
         .signup-form .form-group{
         margin-bottom: 20px;
         }
         .signup-form input[type="checkbox"]{
         margin-top: 3px;
         }
         .signup-form .btn{        
         font-size: 16px;
         font-weight: bold;    
         min-width: 140px;
         outline: none !important;
         }
         .signup-form .row div:first-child{
         padding-right: 10px;
         }
         .signup-form .row div:last-child{
         padding-left: 10px;
         }     
         .signup-form a{
         color: #fff;
         text-decoration: underline;
         }
         .signup-form a:hover{
         text-decoration: none;
         }
         .signup-form form a{
         color: #5cb85c;
         text-decoration: none;
         } 
         .signup-form form a:hover{
         text-decoration: underline;
         }  
         .optional_has_click
         {
           color:white;
           text-decoration:underline;
         }
      </style>
   </head>
   <body class="">
      <div class="container">
      
         </div>
         @yield('content')
      </div>
   </body>
</html>