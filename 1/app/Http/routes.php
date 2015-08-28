<?php

use App\Http\Controllers\HomeController;
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
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
	Route::get('/','AdminController@index');
	Route::get('create','AdminController@create');
	Route::post('store','AdminController@store');
	Route::get('edit/{id}','AdminController@edit');
	Route::post('update/{id}','AdminController@update');
	Route::get('destroy/{id}','AdminController@destroy');
});

Route::get('/', 'HomeController@index');
Route::get('show/{id}', 'HomeController@show');
Route::post('store/{id}','HomeController@store');

Route::get('welcome', 'WelcomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
