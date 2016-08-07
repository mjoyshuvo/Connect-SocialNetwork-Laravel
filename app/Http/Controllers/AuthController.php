<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Auth;

class AuthController extends Controller
{
    public function getSignup(){
    	return view('auth.signup');
    }

    public function postSignup(Request $request){
    	/**
    	 * validation of form
    	 */
    	$this-> validate($request, [
			'email'=>'required|unique:users|email|max:255',
			'username'=>'required|unique:users|alpha_dash|max:20',
			'password' =>'required|min:6',
		]);

		/**
		 * Create User
		 */
		User::create([
			'email'=> $request->input('email'),
			'username'=> $request->input('username'),
			'password'=> bcrypt($request->input('password')) ,
		]);

		return redirect()->route('home')->with('success', 'Your account has been created');
    }

    public function getSignin(){
    	return view('auth.signin');
    }

    public function postSignin(Request $request){
    	/**
    	 * Sign in form validation
    	 */
    	$this-> validate($request, [
    			'email'=>'required',
    			'password' =>'required',
    	]);

    	/**
    	 * Check for Authentication
    	 */
    	if (!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))) {
    		return redirect()->back()->with('fail', 'Wrong email or password');
    	}
    	return redirect()->route('home')->with('success', 'You are now Signed in');
    }

    public function getSignout(){
    	Auth::logout();

    	return redirect()->route("signin")->with('info', 'You are Signed out.');
    }
}
