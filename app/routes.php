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
Route::get('/register/site', function(){ return Redirect::home(); });
Route::get('/register/user', function(){ return Redirect::home(); });
Route::get('/register', 'RegistrationController@create');
Route::post('/register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);

# Reminders
Route::controller('password', 'RemindersController');

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
Route::get('/agrees/grader/{grader_id}/{answer}', ['as' => 'agrees.grader', 'uses' =>'GradersController@agrees']);
Route::get('/grader/create/{grader_type}', ['as' => 'register.grader', 'uses' => 'GradersController@create']);
Route::get('grader/{grader}/b/edit', ['as' => 'grader_b.edit', 'uses' => 'GradersController@edit_b']);
Route::get('grader/show_b', ['as' => 'graders_b.show', 'uses' => 'GradersController@graders_b']);
Route::resource('grader', 'GradersController');

# Admin
Route::get('/admin/home/', ['before' => 'auth|admin', 'as' => 'admin.home', 'uses' => 'AdminController@index']);
Route::get('/admin/sites/', ['before' => 'auth|admin', 'as' => 'admin.sites', 'uses' => 'AdminController@sites']);
Route::get('/admin/sites/print', ['before' => 'auth|admin', 'as' => 'admin.sites_print', 'uses' => 'AdminController@sites_print']);
Route::get('/admin/graders/', ['before' => 'auth|admin', 'as' => 'admin.graders', 'uses' => 'AdminController@graders']);
Route::get('/admin/graders/print', ['before' => 'auth|admin', 'as' => 'admin.graders_print', 'uses' => 'AdminController@graders_print']);
Route::get('/admin/graders_b/', ['before' => 'auth|admin', 'as' => 'admin.graders_b', 'uses' => 'AdminController@graders_b']);
Route::get('/admin/graders_b/print', ['before' => 'auth|admin', 'as' => 'admin.graders_b_print', 'uses' => 'AdminController@graders_b_print']);
Route::get('/admin/grader_b/{grader_id}/approve/{user_id}', ['before' => 'auth|admin', 'as' => 'admin.approve_grader_b', 'uses' => 'AdminController@approve']);

# Statitics
Route::get('/admin/stats/', ['before' => 'auth|admin', 'as' => 'admin.stats', 'uses' => 'AdminController@stats']);

# Masquerade
Route::get('/admin/masquerade/{user_id}', ['before' => 'auth|admin|ninja', 'as' => 'admin.masquerade', 'uses' => 'AdminController@masquerade']);
Route::get('/admin/switch-back', ['after' => 'auth|admin|ninja', 'as' => 'admin.switch_back', 'uses' => 'AdminController@switch_back']);

// Test Pivot
Route::get('pivot', function(){

    //$user = Auth::user();
    $user = User::find(18);
    if($user->site) {
        echo "yes";
    } else {
        echo "no";
    }
   
    //$grader = Grader::find(1);
    
    //$grader->sites()->attach(3);
    
    // $user = User::find(17);
    // $user->roles()->attach(1);
    
    
    // $grader_id = $grader->id;
    // $user_id = $grader->user_id;
    
    // $user = User::with('grader')->whereId($user_id)->first();
    // $user_email = $user->email; 
    
    // echo "Grader email (or id): " . $user_email ."<br>";
    // echo "<p>will grade this(these) site(s): </p>";
    
    // foreach($grader->sites as $site) {
    //     echo $site->site_url . "<br>";
    // }
    
});

// Test Flash
Route::get('flash', function(){
    Session::flash('flash_message', 'Yo');
    Session::flash('alert-class', 'flash-info');
    return Redirect::home();
});

// Test Select Lists from DB
Route::get('selects', function(){
    
    $districts = ['100' => 'Επιλέξτε...'] + District::lists('district_name', 'id');
    dd($districts);
    
    return View::make('tests.select_lists', compact('districts'));
});

Route::get('optgroup', function(){

    $data[ 'province' ] = array(
 
        'Sardegna' => array(
                    'CA' => 'Cagliari',
                    'CI' => 'Carbonia-Iglesias',
                    'NU' => 'Nuoro',
                    'OT' => 'Olbia-Tempio',
                    'OR' => 'Oristano',
                    'VS' => 'Medio Campidano',
                    'OG' => 'Ogliastra',
                    'SS' => 'Sassari' 
            ),
        'Sicilia' => array(
                    'AG' => 'Agrigento',
                    'CL' => 'Caltanissetta',
                    'CT' => 'Catania',
                    'EN' => 'Enna',
                    'ME' => 'Messina',
                    'PA' => 'Palermo',
                    'RG' => 'Ragusa',
                    'SR' => 'Siracusa',
                    'TP' => 'Trapani'
            ),
    );

    echo '<pre>';
    print_r($data);
    echo '</pre>';

    $districts = District::all();

    $result = array();
    
    foreach(County::all() as $county){
        //if(!array_key_exists($county->district_name, $result)){
            //$result[$county->district_name] = array();
        //}
        $result[$county->district_name][$county->id] = $county->county_name;
    }

    echo '<pre>';
    print_r($result);
    echo '</pre>';

    echo Form::select('counties', $result);

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

// $sql = "SELECT `id`,`grader_district_id`,`cat_id` FROM `graders`";
// 
// SELECT grader_site.grader_id, sites.`id` as site_id, sites.`cat_id`,sites.`district_id` FROM `sites` inner join grader_site on grader_site.site_id = sites.id

Route::get('panormighty', function(){
    global $sites, $graders, $l, $gIndex, $sIndex;
    $graders = DB::table('graders')
             ->join('grader_site', 'grader_site.grader_id', '=', 'graders.id')
             ->select('grader_site.grader_id', 'grader_site.site_id', 'graders.cat_id', 
                      'graders.district_id', 'graders.specialty')
             ->get();
    //$sites = Site::all();
    //
    
    $sites = DB::table('sites')
             ->join('grader_site', 'grader_site.site_id', '=', 'sites.id')
             ->select('grader_site.grader_id', 'sites.id', 'sites.cat_id', 'sites.district_id')
             ->get();
    
    
    $s2 = [];
    $sIndex = [];
    foreach ($sites as $s) {
        $s2[$s->id] = ["cat" => $s->cat_id, "district" => $s->district_id,
                      "grader" => $s->grader_id];        
        $sIndex[] = $s->id;
    }
    $sites = $s2;
    
    $g2 = [];
    $gIndex = [];
    foreach ($graders as $g) {
        $g2[$g->grader_id] = ["cat" => $g->cat_id, "district" => $g->district_id,
                      "site" => $g->site_id, "specialty" => $g->specialty];  
        $gIndex[] = $g->grader_id;
    }
    
   
    $graders = $g2;

    //file_put_contents('/home/codio/workspace/the_graders.inc', serialize($graders));
    //file_put_contents('/home/codio/workspace/the_sites.inc', serialize($sites));

    //var_dump($graders);
    
});











