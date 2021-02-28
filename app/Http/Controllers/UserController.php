<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Session;
use Input;
use Hash;
use Mail;
use Flash;
use Redirect;
use DB;
use Validator;


class UserController extends Controller
{
    public function register(){
    	return view('users.register');
    }

    public function login(){
        return view('users.login');
    }

     public function home(){
        return view('users.signin_instructions');
    }

    public function insert(Request $request){
    	$rules = array(  'first_name'    => 'required',
                         'last_name' 	 => 'required',
                         'name' 	 => 'required|unique:users|min:6', 
                         'email' 	 => 'required|email|unique:users',
                         'user_mobile' 	 => 'required|unique:users',
                         'password'		 => 'required|confirmed|min:6',
                         'accept'		 => 'required|in:1');
    	$error = Validator::make($request->all(),$rules);
    	if($error->fails()){
    		return response()->json(['errors'=>$error->errors()->all()]);
    	}

        $confirmation_code = str_random(30);
    
    	$form_data = array( 'first_name'        => $request->first_name,
                            'last_name' 	    => $request->last_name,
                            'name' 	    => $request->name,
                            'email' 	    => $request->email,
                            'user_mobile' 	    => $request->user_mobile,
                            'password'		    => Hash::make($request->password),
                            'accept'		    => $request->accept,
                            'confirmation_code' => $confirmation_code
                             );   

        User::create($form_data);


        Mail::send('users.email_verify', compact('confirmation_code'), function($message) {
        $message->to(Input::get('email'), Input::get('user_name'))->subject('Verify your email address');
        });

       
        Session::flash('success_msg','Thanks for signing up! Please check your registered email account, a verification link has been sent to your email and follow the instructions to complete the sign up process');

    	return response()->json(['success' => 'Data Inserted Successfully.']);  

    }

    public function confirm($confirmation_code)
    {

        //dd($confirmation_code);

         if (!$confirmation_code)
        {
             return redirect()->route('user.signin_instructions');
        }


        //$confirmation_code = User::whereConfirmationCode($confirmation_code)->first();

        $user = User::whereConfirmationCode($confirmation_code)->first();
        //dd($user->confirmation_code);
        if (!$user)
        {
             return redirect()->route('user.signin_instructions');
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        Session::flash('success_msg','You have successfully verified your account. You can now login.');

        return redirect()->route('user.login');


    }


    /*public function checklogin(Request $request){
        $this->validate($request,[
                'user_email' => 'required|email',
                'password' => 'required|alphaNum|min:3'
            ]);
        $user_data = array(
            'user_email' => $request->get('user_email'),
            'password' => $request->get('password')
        );

       
        if(Auth::attempt($user_data)){

            
            $user = User::where('user_email',$request->user_email)->first();

            if($user->is_confirmed()){
               
                        return redirect()->route('product.index');
                  
                }
                else {
                   return back()->with('error_msg',"please check your mail & verify your email"); 
                }           
        }
        else{
            return back()->with('error_msg',"Wrong Credentials");
        }
    }*/

    public function checklogin(Request $request){
        
       /* $rules = array( 'user_email'    => 'required|email',
                         'password'     => 'required|min:6',
                         );
        $error = Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors'=>$error->errors()->all()]);
        }*/

        $this->validate($request,[
                'email' => 'required|email',
                'password' => 'required|alphaNum|min:6'
            ]);

        $user_data = array( 'email' => $request->get('email'),
                            'password' => $request->get('password')
                            );   

        if(Auth::attempt($user_data)){
            $user = User::where('email',$request->email)->first();
             if($user->is_confirmed()){                
                        return redirect()->route('product.index');                   
                }
                else {
                   return back()->with('error_msg',"please check your mail & verify your email"); 
                }   

        }
        else{
            return back()->with(['error_msg' => 'Wrong Credentials']); 
        }

    }



    
}
