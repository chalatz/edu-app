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

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

Route::get('users/login', ['as' => 'users.login', 'uses' => 'UsersController@login']);
Route::post('users/login', ['as' => 'users.logmein', 'uses' => 'UsersController@logmein']);

Route::resource('users', 'UsersController');

Route::get('/register', 'RegistrationController@create');
Route::resource('registration', 'RegistrationController');

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');