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

# Home
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

Route::get('users/login', ['as' => 'users.login', 'uses' => 'UsersController@login']);
Route::post('users/login', ['as' => 'users.logmein', 'uses' => 'UsersController@logmein']);

Route::resource('users', 'UsersController');

# Registration
Route::get('/register', 'RegistrationController@create');
Route::post('/register', ['as' => 'registration.store', 'use' => 'RegistrationController@store']);

# Authentication
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout',['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);