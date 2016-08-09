<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\User;

use App\Http\Requests;

class FriendController extends Controller
{
    public function getIndex(){
    	$friends = Auth::user()->friends();
    	$requests = Auth::user()->friendRequests();
    	return view('friends.index')
    		->with('friends', $friends)
    		->with('requests', $requests);
    }

    public function getAdd($username){
    	$user = User::where('username', $username)->first();
    	if (!$user) {
    		return redirect()->route('home')->with('info', 'That user could not be found');
    	}
    	if (Auth::user()->hasFriendRequestPending($user) || $user->hasFriendRequestPending(Auth::user())) {
    		return redirect()->route('profile.index', ['username'=> $user->username])->with('info', 'Friend Request already pending');
    	}
    	if (Auth::user()->isFriendsWith($user)) {
    		return redirect()->route('profile.index', ['username'=>$user->username])->with('info', 'You are already friends');
    	}
    	Auth::user()->addFriend($user);
    	return redirect()->route('profile.index',['username'=> $username])->with('info', 'Friend requsest sent');
    }
}
