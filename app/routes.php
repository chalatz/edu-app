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

# Registration
Route::get('/register', 'RegistrationController@create')->before('guest');
Route::post('/register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);

# Authentication
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout',['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::get('verify/{confirmation_string}', ['as' => 'verify', 'uses' => 'SessionsController@verify']);
Route::get('change-password', ['as' => 'change_password', 'uses' => 'SessionsController@change_password']);
Route::post('change-password', ['as' => 'do_change_password', 'uses' => 'SessionsController@do_change_password']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

# Profile
Route::resource('profile', 'ProfilesController', ['only' => ['update']]);
Route::get('/profile/{profile}',['as' => 'profile', 'uses' => 'ProfilesController@show' ]);
Route::get('/profile/{profile}/edit', ['as' => 'profile.edit', 'uses' => 'ProfilesController@edit']);

# Sites
Route::resource('site', 'SitesController');

# Graders
Route::get('/verify/grader/{confirmation_string}', ['as' => 'verify.grader', 'uses' => 'SessionsController@verify_grader']);
Route::resource('grader', 'GradersController');

// Test Pivot
Route::get('pivot', function(){
   
    $grader = Grader::find(1);
    
    //$grader->sites()->attach(3);
    
    
    $grader_id = $grader->id;
    $user_id = $grader->user_id;
    
    $user = User::with('grader')->whereId($user_id)->first();
    $user_email = $user->email; 
    
    echo "Grader email (or id): " . $user_email ."<br>";
    echo "<p>will grade this(these) site(s): </p>";
    
    foreach($grader->sites as $site) {
        echo $site->site_url . "<br>";
    }
    
});

// Test Flash
Route::get('flash', function(){
    Session::flash('flash_message', 'Yo');
    Session::flash('alert-class', 'flash-info');
    return Redirect::home();
});


# Test Email
// Route::get('testemail', function(){
//     Mail::send('emails.test', [], function($message){
//         $message->to('chalatz@yahoo.gr')->subject('Hello from Laravel and Mandrill');
//     });
// });

// Route::get('users/login', ['as' => 'users.login', 'uses' => 'UsersController@login']);
// Route::post('users/login', ['as' => 'users.logmein', 'uses' => 'UsersController@logmein']);
// Route::resource('users', 'UsersController');