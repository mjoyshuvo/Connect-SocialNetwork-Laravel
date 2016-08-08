<?php
Route::get('/', [
	'uses' => 'HomeController@index',
	'as' => 'home'
	]);
/**
 * Sign in and Signup
 */
Route::get('/signup', [
	'uses' => 'AuthController@getSignup',
	'as' => 'signup',
	'middleware' => ['guest'],
	]);
Route::post('/signup',[
	'uses'=>'AuthController@postSignup',
	'middleware' => ['guest'],
	]);
Route::get('/signin', [
	'uses' => 'AuthController@getSignin',
	'as' => 'signin',
	'middleware' => ['guest'],
	]);
Route::post('/signin',[
	'uses'=>'AuthController@postSignin',
	'middleware' => ['guest'],
	]);
Route::get('/signout', [
	'uses' => 'AuthController@getSignout',
	'as' => 'signout'
	]);
/**
 * Search Route
 */
Route::get('/search',[
	'uses'=> 'SearchController@getResults',
	'as' => 'search.result'
	]);

/**
 * User Profile
 */
Route::get('/user/{username}',[
	'uses'=> 'ProfileController@getProfile',
	'as' => 'profile.index'
	]);

/**
 * User Profile Update
 */
Route::get('/profile/update', [
	'uses' => 'ProfileController@getEditProfile',
	'as' => 'profile.update',
	'middleware' => ['auth'],
	]);
Route::post('/profile/update', [
	'uses' => 'ProfileController@postEditProfile',
	'middleware' => ['auth'],
	]);