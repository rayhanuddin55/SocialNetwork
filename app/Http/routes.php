<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => ['web']], function(){

	Route::get('/', function () {
   		return view('welcome');
	})->name('home');

	Route::post('/signup', [ 'as' => 'signup', 'uses' => 'UserController@postSignUp']);

	Route::post('/signin', [ 'as' => 'signin', 'uses' => 'UserController@postSignIn']);

	Route::get('/dashboard', [ 'as' => 'dashboard', 'uses' => 'PostController@getDashboard', 'middleware' => 'auth']);

	Route::post('/createPost', [ 'as' => 'post.create', 'uses' => 'PostController@postCreatePost']);

});





