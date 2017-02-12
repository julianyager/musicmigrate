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

// Home Routes
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

// -- Admin Related --
// Route::get('admin', 'UsersController@index');
// Route::post('admin', 'UsersController@store');
Route::resource("users","UserController");
Route::resource("ads", "AdsController");

//search controller
Route::get('search', 'SearchController@index');

// http://stackoverflow.com/questions/26373850/filters-in-laravel-5
Route::post('search', 'SearchController@postIndex')->middleware('search');

Route::get('layout', function (){
	return view('layout');
});


// -- Authorization / Login Routes --
Route::auth();
Route::get('login', function (){
	return view('auth/login');
});

// -- Ad Related Routes --
Route::get('ad/{id}', 'AdsController@show');
Route::get('myads', 'AdsController@showMyAds')->middleware('auth');
