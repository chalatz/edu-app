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
Route::get('admin/change-password/{user_id}', ['before' => 'auth|admin|ninja', 'as' => 'change_password_ninja', 'uses' => 'SessionsController@change_password_ninja']);
Route::post('admin/change-password', ['before' => 'auth|admin|ninja', 'as' => 'do_change_password_ninja', 'uses' => 'SessionsController@do_change_password_ninja']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

# Profile
Route::resource('profile', 'ProfilesController', ['only' => ['update']]);
Route::get('/profile/{profile}',['as' => 'profile', 'uses' => 'ProfilesController@show' ]);
Route::get('/profile/{profile}/edit', ['as' => 'profile.edit', 'uses' => 'ProfilesController@edit']);

# Sites
Route::get('/summary/', ['before' => 'auth', 'as' => 'site.summary', 'uses' => 'SitesController@summary']);
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
Route::get('/admin/assignments/', ['before' => 'auth|admin', 'as' => 'admin.assignments', 'uses' => 'AdminController@assignments']);
Route::get('/admin/assignments/b/', ['before' => 'auth|admin', 'as' => 'admin.assignments_b', 'uses' => 'AdminController@assignments_b']);
Route::get('/admin/evaluations-report/', ['before' => 'auth|admin', 'as' => 'admin.evaluations_report', 'uses' => 'AdminController@evaluations_report']);
Route::get('/admin/evaluations-report/b/', ['before' => 'auth|admin', 'as' => 'admin.evaluations_report_b', 'uses' => 'AdminController@evaluations_report_b']);
Route::get('/admin/evaluations-report/c/', ['before' => 'auth|admin', 'as' => 'admin.evaluations_report_c', 'uses' => 'AdminController@evaluations_report_c']);
Route::get('/admin/evaluations-report/print/', ['before' => 'auth|admin', 'as' => 'admin.evaluations_report_print', 'uses' => 'AdminController@evaluations_report_print']);
Route::get('/admin/evaluations-report/print/b/', ['before' => 'auth|admin', 'as' => 'admin.evaluations_report_print_b', 'uses' => 'AdminController@evaluations_report_print_b']);
Route::get('/admin/sites/grades/a/', ['before' => 'auth|admin', 'as' => 'admin.sites_grades_a', 'uses' => 'AdminController@sites_grades_a']);
Route::get('/admin/sites/grades/b/', ['before' => 'auth|admin', 'as' => 'admin.sites_grades_b', 'uses' => 'AdminController@sites_grades_b']);
Route::get('/admin/sites/grades/c/', ['before' => 'auth|admin', 'as' => 'admin.sites_grades_c', 'uses' => 'AdminController@sites_grades_c']);
Route::get('/admin/sites/grades/a/ok', ['before' => 'auth|admin', 'as' => 'admin.sites_grades_a_ok', 'uses' => 'AdminController@sites_grades_a_ok']);
Route::get('/admin/sites/grades/a/ok/print', ['before' => 'auth|admin', 'as' => 'admin.sites_grades_a_ok_print', 'uses' => 'AdminController@sites_grades_a_ok_print']);
Route::get('/admin/not-graded', ['before' => 'auth|admin', 'as' => 'admin.not_graded', 'uses' => 'AdminController@not_graded']);
Route::get('/admin/sites-that-graded', ['before' => 'auth|admin', 'as' => 'admin.sites_that_graded', 'uses' => 'AdminController@sites_that_graded']);
Route::get('/admin/sites-bye-bye', ['before' => 'auth|admin', 'as' => 'admin.sites_bye_bye', 'uses' => 'AdminController@sites_bye_bye']);
// the grades from phase a
Route::get('/admin/a-list/{cat_id}', ['before' => 'auth|admin', 'as' => 'admin.a_list', 'uses' => 'AdminController@a_list']);
Route::get('/admin/a-list/print/{cat_id}', ['before' => 'auth|admin', 'as' => 'admin.a_list_print', 'uses' => 'AdminController@a_list_print']);

// the grades from phase b
Route::get('/admin/b-list/{cat_id}', ['before' => 'auth|admin', 'as' => 'admin.b_list', 'uses' => 'AdminController@b_list']);
Route::get('/admin/b-list/print/{cat_id}', ['before' => 'auth|admin', 'as' => 'admin.b_list_print', 'uses' => 'AdminController@b_list_print']);

// the grades from phase c
Route::get('/admin/c-list/{cat_id}', ['before' => 'auth|admin', 'as' => 'admin.c_list', 'uses' => 'AdminController@c_list']);

// Send email to graders_a to accept
// Route::get('/admin/send-to-graders-a-to-accept', ['before' => 'auth|admin|ninja', 'as' => 'admin.send_to_graders_a_to_accept', 'uses' => 'AdminController@send_to_graders_a_to_accept']);
// Emails to Graders A to start grading
// Route::get('/admin/send-to-graders-a-to-begin', ['before' => 'auth|admin|ninja', 'as' => 'admin.send_to_graders_a_to_begin', 'uses' => 'AdminController@send_to_graders_a_to_begin']);
// Emails to Graders A that have not yet accepted
// Route::get('/admin/send-to-late-graders', ['before' => 'auth|admin|ninja', 'as' => 'admin.send_to_late_graders', 'uses' => 'AdminController@send_to_late_graders']);
Route::get('/admin/send-to-graders-b-to-begin', ['before' => 'auth|admin|ninja', 'as' => 'admin.send_to_graders_b_to_begin', 'uses' => 'AdminController@send_to_graders_b_to_begin']);

# Notify late graders
Route::get('/admin/notify/late/graders/', ['before' => 'auth|admin|ninja', 'as' => 'admin.notify_late_graders', 'uses' => 'AdminController@notify_late_graders']);
Route::get('/admin/manual-cron/', ['before' => 'auth|admin|ninja', 'as' => 'admin.manual_cron', 'uses' => 'AdminController@manual_cron']);

# Manual Assignments - Phase A
// Assignments to graders A
Route::get('/admin/assign/site/{site_id}', ['before' => 'auth|admin', 'as' => 'admin.assign_to_site', 'uses' => 'AdminController@assign_to_site']);
// Assignments to purely graders B
Route::get('/admin/assign/site/b/{site_id}', ['before' => 'auth|admin', 'as' => 'admin.assign_b_to_site', 'uses' => 'AdminController@assign_b_to_site']);
// Assignments to graders B with sites
Route::get('/admin/assign/b-with-sites/site/{site_id}', ['before' => 'auth|admin', 'as' => 'admin.assign_b_with_sites_to_site', 'uses' => 'AdminController@assign_b_with_sites_to_site']);
Route::get('/admin/confirm/delete/evaluation/{id}/site/grader/', ['before' => 'auth|admin', 'as' => 'admin.confirm_delete_evaluation_site_grader', 'uses' => 'AdminController@confirm_delete_evaluation_site_grader']);
Route::get('/admin/confirm/delete/evaluation/{id}/site/grader/b/', ['before' => 'auth|admin', 'as' => 'admin.confirm_delete_evaluation_site_grader_b', 'uses' => 'AdminController@confirm_delete_evaluation_site_grader_b']);
Route::get('/admin/confirm/assign/evaluation/{evaluation_id}/site/{site_id}/to/grader/{grader_id}/', ['before' => 'auth|admin', 'as' => 'admin.assign_evaluation_grader_site', 'uses' => 'AdminController@assign_evaluation_grader_site']);

# Manual Assignments - Phase B
// Assignments to purely graders B
Route::get('/admin/assign/b/site/b/{site_id}', ['before' => 'auth|admin', 'as' => 'admin.assign_b_to_site_b', 'uses' => 'AdminController@assign_b_to_site_b']);
// Assignments to graders B with sites
Route::get('/admin/assign/b-with-sites/site/b/{site_id}', ['before' => 'auth|admin', 'as' => 'admin.assign_b_with_sites_to_site_b', 'uses' => 'AdminController@assign_b_with_sites_to_site_b']);
// Delete Evaluation B
Route::get('/admin/confirm/delete/evaluation/b/{id}/site/grader/b/', ['before' => 'auth|admin', 'as' => 'admin.confirm_delete_evaluation_b_site_grader_b', 'uses' => 'AdminController@confirm_delete_evaluation_b_site_grader_b']);

# Manual Assignments - Phase C
// Assignments to purely graders B
Route::get('/admin/assign/b/site/c/{site_id}', ['before' => 'auth|admin', 'as' => 'admin.assign_b_to_site_c', 'uses' => 'AdminController@assign_b_to_site_c']);
// Assignments to graders B with sites
Route::get('/admin/assign/b-with-sites/site/c/{site_id}', ['before' => 'auth|admin', 'as' => 'admin.assign_b_with_sites_to_site_c', 'uses' => 'AdminController@assign_b_with_sites_to_site_c']);
// Delete Evaluation C
Route::get('/admin/confirm/delete/evaluation/c/{id}/site/grader/b/', ['before' => 'auth|admin', 'as' => 'admin.confirm_delete_evaluation_c_site_grader_b', 'uses' => 'AdminController@confirm_delete_evaluation_c_site_grader_b']);

# Evaluation Forms
//Phase A complete, no more evaluations allowed
Route::group(['before' => 'auth|admin'], function(){
    Route::get('/evaluate/show', ['before' => 'auth', 'as' =>'grader.evaluate_show', 'uses' => 'EvaluationController@show']);
    Route::get('/evaluate/user/{user_id}/criterion/{criterion}/grader/{grader_id}/site/{site_id}', ['before' => 'auth', 'as' =>'grader.evaluate_edit', 'uses' => 'EvaluationController@edit']);
    Route::put('/comments_submit/{id}', ['as' => 'do_comments_submit', 'uses' => 'EvaluationController@do_comments_submit']);
    Route::put('/is_educational_submit/{id}', ['as' => 'do_is_educational_submit', 'uses' => 'EvaluationController@do_is_educational_submit']);
    Route::put('/can_evaluate/{id}', ['as' => 'do_can_evaluate_submit', 'uses' => 'EvaluationController@do_can_evaluate_submit']);
    Route::get('evaluation/finalize/{id}', ['before' => 'auth', 'as' => 'evaluation.finalize', 'uses' => 'EvaluationController@finalize']);
    Route::resource('evaluation', 'EvaluationController');
});

# Evaluation B Forms
//Phase B complete, no more evaluations allowed
Route::group(['before' => 'auth|admin'], function(){
    Route::get('/evaluate/b/show', ['as' =>'grader.evaluate_b_show', 'uses' => 'Evaluation_bController@show']);
    Route::get('/evaluate/b/user/{user_id}/criterion/{criterion}/grader/{grader_id}/site/{site_id}', ['as' =>'grader.evaluate_b_edit', 'uses' => 'Evaluation_bController@edit']);
    Route::put('/can_evaluate/b/{id}', ['as' => 'do_can_evaluate_b_submit', 'uses' => 'Evaluation_bController@do_can_evaluate_submit']);
    Route::put('/is_educational_submit/b/{id}', ['as' => 'do_is_educational_b_submit', 'uses' => 'Evaluation_bController@do_is_educational_submit']);
    Route::put('/comments_submit/b/{id}', ['as' => 'do_comments_b_submit', 'uses' => 'Evaluation_bController@do_comments_submit']);
    Route::get('evaluation/b/finalize/{id}', ['before' => 'auth', 'as' => 'evaluation_b.finalize', 'uses' => 'Evaluation_bController@finalize']);
    Route::resource('evaluation_b', 'Evaluation_bController');
});

# Evaluation C Forms
# //Phase C complete, no more evaluations allowed
Route::group(['before' => 'auth|admin|ninja'], function(){
    Route::get('/evaluate/c/show', ['as' =>'grader.evaluate_c_show', 'uses' => 'Evaluation_cController@show']);
    Route::get('/evaluate/c/user/{user_id}/criterion/{criterion}/grader/{grader_id}/site/{site_id}', ['as' =>'grader.evaluate_c_edit', 'uses' => 'Evaluation_cController@edit']);
    Route::put('/can_evaluate/c/{id}', ['as' => 'do_can_evaluate_c_submit', 'uses' => 'Evaluation_cController@do_can_evaluate_submit']);
    Route::put('/is_educational_submit/c/{id}', ['as' => 'do_is_educational_c_submit', 'uses' => 'Evaluation_cController@do_is_educational_submit']);
    Route::put('/comments_submit/c/{id}', ['as' => 'do_comments_c_submit', 'uses' => 'Evaluation_cController@do_comments_submit']);
    Route::get('evaluation/c/finalize/{id}', ['before' => 'auth', 'as' => 'evaluation_c.finalize', 'uses' => 'Evaluation_cController@finalize']);
    Route::resource('evaluation_c', 'Evaluation_cController');
});

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

    $sites = DB::table('sites')
             ->join('grader_site', 'grader_site.site_id', '=', 'sites.id')
             ->select('grader_site.grader_id', 'sites.id', 'sites.cat_id', 'sites.district_id')
             ->get();

    //dd(count($graders));

    echo "<pre>";
    print_r($graders);
    echo "</pre>";

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

    // echo "<pre>";
    // print_r($graders);
    // echo "</pre>";
    //var_dump($graders);

    //dd(count($sites));

});

Route::get('panormighty_b', function(){

    $graders = Grader::where('approved', 'yes')->get();

    $g = array();
    $i = 0;

    foreach ($graders as $grader) {

        if(!$grader->user->hasRole('admin')){

            $g[$i]['id'] = $grader->id;
            $g[$i]['district'] = $grader->grader_district_id;
            $g[$i]['desired_cats'] = explode('|', $grader->desired_category);
            $evaluations = Evaluation::where('grader_id', $grader->id)->get();
            $past_evals = [];
            foreach ($evaluations as $evaluation) {
                $past_evals[] = $evaluation->site_id;
            }
            $g[$i]['past_evals'] = $past_evals;

            $i++;

        }

    }

    $winners='364|59|312|207|16|88|276|488|144|453|82|111|383|6|361|426|414|509|456|208|146|289|449|239|491|130|440|336|167|295|444|2|47|441|236|277|246|362|391|388|358|512|235|342|273|263|294|14|371|394|188|204|473|281|475|327|499|253|285|500|379|249|151|331|64|61|149|382|32|40|237|34|179|173|30|129|185|166|3|71|202|380|165|224|39';
    $site_ids = explode('|', $winners);
    $s = [];
    $j = 0;

    foreach($site_ids as $id){
        $site = Site::find($id);
        $the_grader = $site->graders->first();
        $s[$j]['grader'] = $the_grader->id;
        $s[$j]['id'] = $id;
        $s[$j]['cat'] = $site->cat_id;
        $s[$j]['district'] = $site->district_id;
        $j++;
    }

    echo "<pre>";
    print_r($s);
    echo "</pre>";

    // file_put_contents('/var/www/html/eduapp/the_b_graders.inc', serialize($g));
    // file_put_contents('/var/www/html/eduapp/the_b_sites.inc', serialize($s));

});

Route::get('give-codes', function(){
    for($i=1; $i <= 100; $i++){
        $s= "i" . sprintf("%03d", $i);
        echo $s . "<br>";
    }
});

Route::get('rest-of-graders-b', function(){

    $grader_ids = [];
    $all_of_grader_ids = [];
    $rest_of_graders_ids = [];
    $the_grader_ids = [];

    $evaluations = Evaluation_b::distinct()->select('grader_id')->groupBy('grader_id')->get();

    $graders = Grader::where('approved', 'yes')->get();

    foreach ($graders as $grader) {
        if(!$grader->user->hasRole('admin')){
            $all_of_grader_ids[] = $grader->id;
        }
    }

    foreach ($evaluations as $evaluation) {
        $grader_ids[] = $evaluation->grader_id;
    }

    $rest_of_graders_ids = array_diff($all_of_grader_ids, $grader_ids);

    foreach ($rest_of_graders_ids as $rg) {
        $g = Grader::find($rg);
        if(!$g->user->hasRole('grader')){
            $the_grader_ids[] = $g->id;
        }
    }

    echo "<p>Graders: " . count($grader_ids) ."</p>";
    echo "<p>All the Graders B: " . count($all_of_grader_ids) ."</p>";
    echo "<p>The rest the Graders B: " . count($rest_of_graders_ids) ."</p>";
    echo "<p>The wanted Graders B: " . count($the_grader_ids) ."</p>";

    echo "<pre>";
    print_r($the_grader_ids);
    echo "</pre>";


});

// ninja stuff goes here
Route::group(['before' => 'auth|admin|nonja'], function(){

    Route::get('/admin/finalize/assignments/a', function(){

        $evaluations = Evaluation::all();
        foreach ($evaluations as $evaluation) {
            if($evaluation->finalized != 'yes'){
                $today = new DateTime('NOW');

                $evaluation->finalized = 'yes';
                $evaluation->finalized_at = $today;

                $evaluation->save();
            }
        }

        Session::flash('flash_message', '<i class="fa fa-check-circle"></i> Επιτυχής οριστικοποίηση βαθμολογιών.');
        Session::flash('alert-class', 'flash-success');
        return Redirect::home();

    });

    Route::get('assign', function(){

        //     $assignments = Assignment::all();

        //     foreach($assignments as $assignment){
        //         $evaluation = new Evaluation;
        //         $evaluation->site_id = $assignment->site_id;
        //         $evaluation->grader_id = $assignment->grader1_id;
        //         $evaluation->save();
        //     }

        //     foreach($assignments as $assignment){
        //         $evaluation = new Evaluation;
        //         $evaluation->site_id = $assignment->site_id;
        //         $evaluation->grader_id = $assignment->grader2_id;
        //         $evaluation->save();
        //     }

    });

    Route::get('assign/b', function(){

        // $assignments = Assignment::all();

        // foreach($assignments as $assignment){
        //     $evaluation = new Evaluation_b;
        //     $evaluation->site_id = $assignment->site_id;
        //     $evaluation->grader_id = $assignment->grader1_id;
        //     $evaluation->save();
        // }

        // foreach($assignments as $assignment){
        //     $evaluation = new Evaluation_b;
        //     $evaluation->site_id = $assignment->site_id;
        //     $evaluation->grader_id = $assignment->grader2_id;
        //     $evaluation->save();
        // }

    });

    Route::get('assign/c', function(){

        $assignments = Assignment::all();

        // foreach ($assignments as $assignment) {
        //     echo Site::find($assignment->site_id)->id .' | '. Site::find($assignment->site_id)->title .' // '. Grader::find($assignment->grader1_id)->grader_last_name .' // '. Grader::find($assignment->grader2_id)->grader_last_name . '<br>';
        // }

        // foreach($assignments as $assignment){
        //     $evaluation = new Evaluation_c;
        //     $evaluation->site_id = $assignment->site_id;
        //     $evaluation->grader_id = $assignment->grader1_id;
        //     $evaluation->save();
        // }

        // foreach($assignments as $assignment){
        //     $evaluation = new Evaluation_c;
        //     $evaluation->site_id = $assignment->site_id;
        //     $evaluation->grader_id = $assignment->grader2_id;
        //     $evaluation->save();
        // }

    });


    Route::get('admin/send-to-sites-about-end-of-phase-a', function(){

        $sites = Site::all();

        $from = 500;
        $to = 600;

        foreach ($sites as $site) {

            $site_id = $site->id;

            if($site_id > $from && $site_id <= $to){

                $site_email = $site->contact_email;

                // Mail::send('emails.send_to_sites_about_end_of_phase_a',[], function($message) use ($site_email){
                //     $message->to($site_email)->subject('ΑΠΟΤΕΛΕΣΜΑΤΑ ΦΑΣΗΣ Α - Edu Web Awards 2015');
                // });

                echo $site_id . " | ". $site->contact_email ."<br>";


            }

        }

    });

    Route::get('admin/remind-late-graders-b', function(){

        $g = [329, 48, 506, 145, 642, 338, 61, 402, 599];

        foreach($g as $g_id){
            $grader = Grader::find($g_id);

            $grader_email = $grader->user->email;

            // Mail::send('emails.send_to_late_b_graders',[], function($message) use ($grader_email){
            //     $message->to($grader_email)->subject('Υπενθύμιση για Αξιολόγηση - Edu Web Awards 2015');
            // });

            echo $grader_email . '<br>';
        }

    });

    Route::get('admin/store-grades', function(){

        $grades_a = []; $grades_b = []; $grades_c = [];

        $sites_a = Evaluation::where('beta_grade', '>', 0)
        ->Where('gama_grade', '>', 0)
        ->Where('delta_grade', '>', 0)
        ->Where('epsilon_grade', '>', 0)
        ->Where('st_grade', '>', 0)
        ->Where('is_educational', '=', 'yes')
        ->orderBy('site_id')
        ->distinct()->groupBy('site_id')
        ->get();

        $sites_b = Evaluation_b::where('beta_grade', '>', 0)
        ->Where('gama_grade', '>', 0)
        ->Where('delta_grade', '>', 0)
        ->Where('epsilon_grade', '>', 0)
        ->Where('st_grade', '>', 0)
        ->Where('is_educational', '=', 'yes')
        ->orderBy('site_id')
        ->distinct()->groupBy('site_id')
        ->get();

        $sites_c = Evaluation_c::where('beta_grade', '>', 0)
        ->Where('gama_grade', '>', 0)
        ->Where('delta_grade', '>', 0)
        ->Where('epsilon_grade', '>', 0)
        ->Where('st_grade', '>', 0)
        ->Where('is_educational', '=', 'yes')
        ->orderBy('site_id')
        ->distinct()->groupBy('site_id')
        ->get();

        foreach($sites_a as $site){
            $site_id = $site['site_id'];
            $grade = new Grade;
            $grade->site_id = $site_id;
            $grade->save();
        }

        //--------- Phase A ------------------------------------
        foreach($sites_a as $site_a){

            $site_a_id = $site_a['site_id'];

            $evals_a = Evaluation::where('site_id', $site_a_id)->get();

            if($evals_a->count() >= 2){
                foreach($evals_a as $eval_a){
                    $grades_a[] = $eval_a->total_grade;
                }
            }

            rsort($grades_a);

            $a_grade = Grade::where('site_id', $site_a_id)->first();
            $a_grade->a1_grade = $grades_a[0];
            $a_grade->a2_grade = $grades_a[1];
            $a_grade->save();

            $grades_a = [];

        } // end sites_a


        //--------- Phase B ------------------------------------
        foreach($sites_b as $site_b){

            $grades_b = [];

            $site_b_id = $site_b['site_id'];

            $evals_b = Evaluation_b::where('site_id', $site_b_id)->get();

            if($evals_b->count() >= 2){
                foreach($evals_b as $eval_b){
                    $grades_b[] = $eval_b->total_grade;
                }
            }

            rsort($grades_b);

            $b_grade = Grade::where('site_id', $site_b_id)->first();
            $b_grade->b1_grade = $grades_b[0];
            $b_grade->b2_grade = $grades_b[1];
            $b_grade->save();

        } // end sites_b

         //--------- Phase C ------------------------------------
        foreach($sites_c as $site_c){

            $site_c_id = $site_c['site_id'];

            $evals_c = Evaluation_c::where('site_id', $site_c_id)->get();

            if($evals_c->count() >= 2){
                foreach($evals_c as $eval_c){
                    $grades_c[] = $eval_c->total_grade;
                }
            }

            rsort($grades_c);

            $c_grade = Grade::where('site_id', $site_c_id)->first();
            $c_grade->c1_grade = $grades_c[0];
            $c_grade->c2_grade = $grades_c[1];
            $c_grade->save();

            $grades_c = [];

        } // end sites_c

    });

    Route::get('admin/store-final-grades', function(){

        $grades = Grade::all();

        foreach($grades as $grade){

            if($grade->c1_grade > 0 && $grade->c2_grade > 0){

                $grade->final_grade = 200;
                $grade->phase = 'c';
                $grade->save();

            } elseif($grade->b1_grade > 0 && $grade->b2_grade > 0){

                $grade->final_grade = ($grade->b1_grade + $grade->b2_grade) / 2;
                $grade->phase = 'b';
                $grade->save();

            } elseif($grade->a1_grade > 0 && $grade->a2_grade > 0){

                $grade->final_grade = ($grade->a1_grade + $grade->a2_grade) / 2;
                $grade->phase = 'a';
                $grade->save();

            }

        }

    });

});
