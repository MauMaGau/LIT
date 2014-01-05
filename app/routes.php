<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as'=>'home', 'uses'=>'HomeController@showWelcome']);

Route::get('register', ['as'=>'user.register', 'uses'=>'UserController@getRegister']);
Route::post('register', ['as'=>'user.register.post', 'uses'=>'UserController@postRegister']);

Route::get('login', ['as'=>'user.login', 'uses'=>'UserController@getLogin']);
Route::post('login', ['as'=>'user.login.post', 'uses'=>'UserController@postLogin']);

Route::get('logout', ['as'=>'user.logout', 'uses'=>'UserController@logout']);

Route::get('forgot', ['as'=>'user.forgot', 'uses'=>'RemindersController@getRemind']);
Route::post('forgot', ['as'=>'user.forgot.post', 'uses'=>'RemindersController@postRemind']);

Route::get('reset/{id}', ['as'=>'user.reset', 'uses'=>'RemindersController@getReset']);
Route::post('reset', ['as'=>'user.reset.post', 'uses'=>'RemindersController@postReset']);


Route::group(['prefix'=>'admin', 'before'=>'authAdmin'], function(){
    Route::resource('users', 'UsersController');
});