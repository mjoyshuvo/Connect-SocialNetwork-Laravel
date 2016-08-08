<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Auth;

class ProfileController extends Controller
{
    public function getProfile($username){
    	$user = User::where('username', $username)->first();
    	if (!$user) {
    		abort(404);
    	}
    	return view('profile.index')->with('user', $user);
    }
    
    /**
     * [Update User Profile]
     * @return [view] [page where update form will be included]
     */
    public function getEditProfile(){
    	return view('profile.update');
    }

    public function postEditProfile(Request $request){
    	
    	$this-> validate($request, [
    			'first_name'=>'alpha|max:50',
    			'last_name'=>'alpha|max:50',
    			'location' =>'max:20',
    	]);
    	
    	/**
    	 * Update only the authenticated user
    	 */
    	Auth::user()->update([
    		'first_name' => $request->input('first_name'),
    		'last_name' => $request->input('last_name'),
    		'location' => $request->input('location'),
    		]);
    	return redirect()->route("profile.update")->with('info', 'Your profile has been updated.');
    }
}
