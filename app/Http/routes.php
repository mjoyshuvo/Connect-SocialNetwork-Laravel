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