<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminController extends \BaseController {
    
    
    public function index(){
         
        return View::make('admin.index');    
	}
    
    public function sites(){

        $sites = Site::all();
        return View::make('admin.sites', compact('sites'));
        
    }
    
    public function sites_grades_a(){
        
        $sites = Site::orderBy('cat_id')->get();
        
        $max_evals = 0;
        
        foreach($sites as $site){
            $evals_count = Evaluation::where('site_id', $site->id)->count();
            if($evals_count > $max_evals){
                $max_evals = $evals_count;
            }
        }
        
        return View::make('admin.sites_grades_a', compact('sites', 'max_evals'));
        
    }

    public function sites_grades_b(){

        //$evaluations = Evaluation_b::distinct()->select('site_id')->groupBy('site_id')->get();
        // foreach ($evaluations as $evaluation) {
        // }

        $evaluations = Evaluation_b::all();

        $site_ids = [];

        foreach ($evaluations as $evaluation) {
            $site_ids[] = $evaluation->site_id;
        }

        // echo "<pre>";
        // echo count($site_ids);
        // print_r($site_ids);
        // echo "</pre>";
        // dd();
        
        $sites = Site::orderBy('cat_id')->get();
        
        $max_evals = 0;
        
        foreach($sites as $site){
            $evals_count = Evaluation_b::where('site_id', $site->id)->count();
            if($evals_count > $max_evals){
                $max_evals = $evals_count;
            }
        }
        
        return View::make('admin.sites_grades_b', compact('sites', 'max_evals', 'site_ids'));
        
    }    

    public function sites_grades_c(){

        $evaluations = Evaluation_c::all();

        $site_ids = [];

        foreach ($evaluations as $evaluation) {
            $site_ids[] = $evaluation->site_id;
        }
        
        $sites = Site::orderBy('cat_id')->get();
        
        $max_evals = 0;
        
        foreach($sites as $site){
            $evals_count = Evaluation_c::where('site_id', $site->id)->count();
            if($evals_count > $max_evals){
                $max_evals = $evals_count;
            }
        }
        
        return View::make('admin.sites_grades_c', compact('sites', 'max_evals', 'site_ids'));
        
    }    

    public function sites_grades_a_ok(){
        
        $sites = Site::orderBy('cat_id')->get();
        
        $max_evals = 0;

        foreach($sites as $site){
            $evals_count = Evaluation::where('site_id', $site->id)->count();
            if($evals_count > $max_evals){
                $max_evals = $evals_count;
            }
        }
        
        return View::make('admin.sites_grades_a_ok', compact('sites', 'max_evals'));
        
    }

    public function sites_grades_a_ok_print(){
        
        $sites = Site::orderBy('cat_id')->get();
        
        $max_evals = 0;

        foreach($sites as $site){
            $evals_count = Evaluation::where('site_id', $site->id)->count();
            if($evals_count > $max_evals){
                $max_evals = $evals_count;
            }
        }
        
        return View::make('admin.sites_grades_a_ok_print', compact('sites', 'max_evals'));
        
    }    

    public function a_list($cat_id){

        $sites = Site::where('cat_id', $cat_id)->get();

        $max_evals = 0;
        
        foreach($sites as $site){
            $evals_count = Evaluation::where('site_id', $site->id)->count();
            if($evals_count > $max_evals){
                $max_evals = $evals_count;
            }
        }

        return View::make('admin.a_list', compact('sites', 'max_evals', 'cat_id'));

    }

    public function b_list($cat_id){

        $sites = Site::where('cat_id', $cat_id)->get();

        $max_evals = 0;
        
        foreach($sites as $site){
            $evals_count = Evaluation_b::where('site_id', $site->id)->count();
            if($evals_count > $max_evals){
                $max_evals = $evals_count;
            }
        }

        return View::make('admin.b_list', compact('sites', 'max_evals', 'cat_id'));

    }    

    public function a_list_print($cat_id){

        $sites = Site::where('cat_id', $cat_id)->get();

        $max_evals = 0;
        
        foreach($sites as $site){
            $evals_count = Evaluation::where('site_id', $site->id)->count();
            if($evals_count > $max_evals){
                $max_evals = $evals_count;
            }
        }

        return View::make('admin.a_list_print', compact('sites', 'max_evals', 'cat_id'));

    }

    public function b_list_print($cat_id){

        $sites = Site::where('cat_id', $cat_id)->get();

        $max_evals = 0;
        
        foreach($sites as $site){
            $evals_count = Evaluation_b::where('site_id', $site->id)->count();
            if($evals_count > $max_evals){
                $max_evals = $evals_count;
            }
        }

        return View::make('admin.b_list_print', compact('sites', 'max_evals', 'cat_id'));

    }    
    
    public function graders(){
        
        $graders = Grader::all();

        return View::make('admin.graders', compact('graders'));
        
    }

    public function graders_b(){
        
        $graders = Grader::with('user')->get();

        return View::make('admin.graders_b', compact('graders'));
        
    }

    public function evaluations_report(){

        // $evaluations = Evaluation::simplePaginate(10);
        $evaluations = Evaluation::all();

        return View::make('admin.evaluations_report', compact('evaluations'));

    }

    public function evaluations_report_b(){

        // $evaluations = Evaluation::simplePaginate(10);
        $evaluations = Evaluation_b::all();

        return View::make('admin.evaluations_report_b', compact('evaluations'));

    }

    public function evaluations_report_c(){

        // $evaluations = Evaluation::simplePaginate(10);
        $evaluations = Evaluation_c::all();

        return View::make('admin.evaluations_report_c', compact('evaluations'));

    }    

    public function evaluations_report_print(){

        // $evaluations = Evaluation::simplePaginate(10);
        $evaluations = Evaluation::all();

        return View::make('admin.evaluations_report_print', compact('evaluations'));

    }

    public function evaluations_report_print_b(){

        // $evaluations = Evaluation::simplePaginate(10);
        $evaluations = Evaluation_b::all();

        return View::make('admin.evaluations_report_print_b', compact('evaluations'));

    }    
    
    public function not_graded(){
        
        $evaluations = Evaluation::where('beta_grade', '>', 0)
            ->Where('gama_grade', '>', 0)
            ->Where('delta_grade', '>', 0)
            ->Where('epsilon_grade', '>', 0)
            ->Where('st_grade', '>', 0)
            ->orderBy('grader_id')
            ->distinct()->groupBy('grader_id')
            ->get();

        return View::make('admin.not_graded', compact('evaluations'));
        
    }
    
    public function sites_that_graded(){
        
        $sites = Site::all();
        
        $graders = Grader::all(); 
        
        $evaluations = Evaluation::where('total_grade', '>=', 20)
                        ->Where('can_evaluate', '=', 'yes')
                        ->Where('is_educational', '=', 'yes')
                        ->orderBy('grader_id')
                        ->get();

        return View::make('admin.sites_that_graded', compact('sites', 'graders', 'evaluations'));
        
    }
        
    public function sites_bye_bye(){
        
        $evaluations = Evaluation::where('total_grade', '<', 20)
                        ->Where('can_evaluate', '=', 'na')
                        ->distinct()
                        ->groupBy('grader_id')
                        ->orderBy('grader_id')
                        ->get();

        return View::make('admin.sites_bye_bye', compact('evaluations'));
        
    }
    
    public function assignments(){
        
        $evaluations = Evaluation::all();

        return View::make('admin.assignments', compact('evaluations'));
        
    }

    public function assignments_b(){
        
        $evaluations = Evaluation_b::all();

        return View::make('admin.assignments_b', compact('evaluations'));
        
    }    
    
    public function masquerade($user_id){

        // store the id of the ninja user
        Session::put('ninja_id', Auth::user()->id);
        
        $user = User::find($user_id);
        
        Auth::login($user);
        
        return Redirect::home();
    }
    
    public function approve($grader_id, $user_id){
        
        $user = User::find($user_id);
        $grader = Grader::find($grader_id);
        
        if($user->hasRole('admin')){
            
            //-------------- Save current time --------
            $objDateTime = new DateTime('NOW');
            
            $grader->approved_at = $objDateTime;
            $grader->approver = $user->id;
            $grader->approved = 'yes';
            
            $grader->save();
            
            return Redirect::back();
            
        } else {
            return Redirect::home();
        }
        
    }

    public function switch_back(){

        if(Session::has('ninja_id')) {

            $ninja = User::find(Session::get('ninja_id'));
            Auth::logout();
            Auth::login($ninja);

            Session::forget('ninja_id');
        }

        return Redirect::home();

    }
    
    public function stats(){
        
        $sites = Site::all();
        $cats = Category::all();
        $districts = District::all();
        
        $cats_total = 0;

        foreach($cats as $cat){
            $cats_total += Site::where('cat_id', '=', $cat->id)->count(); 
        }
        
        return View::make('admin.stats', compact(['sites', 'cats', 'districts', 'cats_total']));
        
    }

    public function sites_print(){

        $sites = Site::all();
        return View::make('admin.sites_print', compact('sites'));
        
    }

    public function graders_print(){
        
        $graders = Grader::all();

        return View::make('admin.graders_print', compact('graders'));
        
    }    
    
    public function graders_b_print(){
        
        $graders = Grader::all();

        return View::make('admin.graders_b_print', compact('graders'));
        
    }

    public function manual_cron(){

        if(Auth::user()->id != 59) {
            return Redirect::home();
        }

        $evaluations_all = Evaluation::where('beta_grade', '=', 0)
                                ->orWhere('gama_grade', '=', 0)
                                ->orWhere('delta_grade', '=', 0)
                                ->orWhere('epsilon_grade', '=', 0)
                                ->orWhere('st_grade', '=', 0)
                                ->distinct()->groupBy('grader_id')
                                ->get();

        $today = new DateTimeImmutable('NOW');

        foreach($evaluations_all as $evaluation){
            
            if($evaluation->is_educational != 'no' && $evaluation->can_evaluate != 'no'){

                $assigned_until = new DateTimeImmutable($evaluation->assigned_until);

                $days_diff = $today->diff($assigned_until)->format('%R%a');

                if($days_diff == '+0' || $days_diff == '-0') {
                    $grader_id = $evaluation->grader_id;
                    $grader = Grader::find($grader_id);
                    $site = Site::find($evaluation->site_id);
                    $site_sitle = $site->title;
                    $site_url = $site->site_url;
                    $grader_email = $grader->user->email;
                    $grader_last_name = $grader->grader_last_name;
                    $grader_first_name = $grader->grader_name;

                    $new_date = $today->modify('+2 days');
                    $new_date_formatted = $new_date->format('d / m / Y');

                    Mail::send('emails.expires_today',['grader_last_name' => $grader_last_name, 'grader_first_name' => $grader_first_name, 'site_sitle' => $site_sitle, 'site_url' => $site_url, 'new_date_formatted' => $new_date_formatted], function($message) use ($grader_email){
                        $message->to($grader_email)->subject('ΠΑΡΑΤΑΣΗ ΓΙΑ ΟΛΟΚΛΗΡΩΣΗ ΚΡΙΣΗΣ - Edu Web Awards 2015');
                    });
                }

                if($days_diff == '+2'){
                    $grader_id = $evaluation->grader_id;
                    $grader = Grader::find($grader_id);
                    $site = Site::find($evaluation->site_id);
                    $site_sitle = $site->title;
                    $site_url = $site->site_url;
                    $grader_email = $grader->user->email;
                    $grader_last_name = $grader->grader_last_name;
                    $grader_first_name = $grader->grader_name;

                    $assigned_until_formatted = $assigned_until->format('d / m / Y');

                    Mail::send('emails.expires_in_two_days',['grader_last_name' => $grader_last_name, 'grader_first_name' => $grader_first_name, 'site_sitle' => $site_sitle, 'site_url' => $site_url, 'assigned_until_formatted' => $assigned_until_formatted], function($message) use ($grader_email){
                        $message->to($grader_email)->subject('ΥΠΕΝΘΥΜΙΣΗ ΓΙΑ ΟΛΟΚΛΗΡΩΣΗ ΚΡΙΣΗΣ - Edu Web Awards 2015');
                    });
                }
            }    

        } // end foreach

        Session::flash('flash_message', '<i class="fa fa-check-circle"></i> Job OK.');
        Session::flash('alert-class', 'flash-success');

        return Redirect::home();

    }
    
    public function notify_late_graders(){
        
        //$evaluations = Evaluation::all();
        
//         $today = new DateTime('NOW');
//         $ev = Evaluation::find(1);
//         $assigned_until = $today->modify('+10 days');
//         $ev->assigned_until = $assigned_until;
//         $ev->save();
//         $thedate = $assigned_until->format('Y-m-d H:i:s');
//         dd($thedate);
        
        $evaluations = Evaluation::where('beta_grade', '=', 0)
                                        ->orWhere('gama_grade', '=', 0)
                                        ->orWhere('delta_grade', '=', 0)
                                        ->orWhere('epsilon_grade', '=', 0)
                                        ->orWhere('st_grade', '=', 0)
                                        ->distinct()->groupBy('grader_id')->get(); 
        
        $evaluations_all = Evaluation::where('beta_grade', '=', 0)
                                        ->orWhere('gama_grade', '=', 0)
                                        ->orWhere('delta_grade', '=', 0)
                                        ->orWhere('epsilon_grade', '=', 0)
                                        ->orWhere('st_grade', '=', 0)
                                        ->get(); 
        
        $today = new DateTimeImmutable('NOW');
        
        $default_date = new DateTime('2015-01-01 10:00:00');
        $holy_tuesday_2015 = new DateTime('2015-04-07 23:59:00');
        
        $expires_today = [];
        $expires_in_two_days = [];
        
        foreach($evaluations_all as $evaluation) {                   
            
            $assigned_until = new DateTimeImmutable($evaluation->assigned_until);

            $days_diff = $today->diff($assigned_until)->format('%R%a');

            // echo $assigned_until->format('d / m / Y') ." , ". $days_diff ."<br>";
            
            // if($assigned_until < $holy_tuesday_2015 && $assigned_until > $default_date) {
            //     $grader_id = $evaluation->grader_id;
            //     $grader = Grader::find($grader_id);
            //     $grader_email = $grader->user->email;
            //     $grader_last_name = $grader->grader_last_name;
            //     $grader_first_name = $grader->grader_name;
            //     echo $grader->user->email ." , ". $assigned_until->format('d / m / Y') ."<br>";
                
            //     $evaluation->assigned_until = $holy_tuesday_2015;
            //     $evaluation->save();
                
            //     Mail::send('emails.expires_then',['grader_last_name' => $grader_last_name, 'grader_first_name' => $grader_first_name], function($message) use ($grader_email){
            //         $message->to($grader_email)->subject('ΠΑΡΑΤΑΣΗ ΓΙΑ ΟΛΟΚΛΗΡΩΣΗ ΚΡΙΣΗΣ - 7ος Διαγωνισμός Ελληνόφωνων Εκπαιδευτικών Ιστότοπων 2015');
            //     });
                
            // }

            if($days_diff == '+0' || $days_diff == '-0') {
                $grader_id = $evaluation->grader_id;
                $grader = Grader::find($grader_id);
                $site = Site::find($evaluation->site_id);
                $site_sitle = $site->title;
                $site_url = $site->site_url;
                $grader_email = $grader->user->email;
                $grader_last_name = $grader->grader_last_name;
                $grader_first_name = $grader->grader_name;
                
                $new_date = $today->modify('+2 days');
                $new_date_formatted = $new_date->format('d / m / Y');
                
                // Mail::send('emails.expires_today',['grader_last_name' => $grader_last_name, 'grader_first_name' => $grader_first_name, 'site_sitle' => $site_sitle, 'site_url' => $site_url, 'new_date_formatted' => $new_date_formatted], function($message) use ($grader_email){
                //     $message->to($grader_email)->subject('ΠΑΡΑΤΑΣΗ ΓΙΑ ΟΛΟΚΛΗΡΩΣΗ ΚΡΙΣΗΣ - Edu Web Awards 2015');
                // });

            }

            if($days_diff == '+2'){
                $grader_id = $evaluation->grader_id;
                $grader = Grader::find($grader_id);
                $site = Site::find($evaluation->site_id);
                $site_sitle = $site->title;
                $site_url = $site->site_url;
                $grader_email = $grader->user->email;
                $grader_last_name = $grader->grader_last_name;
                $grader_first_name = $grader->grader_name;

                $assigned_until_formatted = $assigned_until->format('d / m / Y');

                // Mail::send('emails.expires_in_two_days',['grader_last_name' => $grader_last_name, 'grader_first_name' => $grader_first_name, 'site_sitle' => $site_sitle, 'site_url' => $site_url, 'assigned_until_formatted' => $assigned_until_formatted], function($message) use ($grader_email){
                //     $message->to($grader_email)->subject('ΥΠΕΝΘΥΜΙΣΗ ΓΙΑ ΟΛΟΚΛΗΡΩΣΗ ΚΡΙΣΗΣ - Edu Web Awards 2015');
                // });

            }
            
        }
        
        // foreach($evaluations_all as $evaluation) {
        //     $assigned_until = new DateTime($evaluation->assigned_until);
            
        //     if($assigned_until < $holy_tuesday_2015 && $assigned_until > $default_date) {
                
        //         echo $grader->user->email ." , ". $assigned_until->format('d / m / Y') ."user_id:". $grader->user->id . "<br>";
                
        //         $grader_id = $evaluation->grader_id;
        //         $grader = Grader::find($grader_id);
        //         $grader_email = $grader->user->email;
        //         $grader_last_name = $grader->grader_last_name;
        //         $grader_first_name = $grader->grader_name;                
                
        //         $evaluation->assigned_until = $holy_tuesday_2015;
        //         $evaluation->save();                
        //     }
        // }

        //return View::make('admin.notify_late_graders', compact('expires_today','expires_in_two_days'));
        
    }    
    
    public function assign_to_site($site_id){
        
        $site = Site::find($site_id);
        
        $evaluations_count = Evaluation::where('site_id', $site_id)->count();
        
        if($evaluations_count > 0){
            $evaluations = Evaluation::where('site_id', $site_id)->get();
            
            return View::make('admin.assign_to_site', compact('site', 'evaluations'));
        }
        
        return View::make('admin.assign_to_site', compact('site'));
        
    }

    public function assign_b_to_site($site_id){
        
        $site = Site::find($site_id);
        
        $evaluations_count = Evaluation::where('site_id', $site_id)->count();
        
        if($evaluations_count > 0){
            $evaluations = Evaluation::where('site_id', $site_id)->get();
            
            return View::make('admin.assign_b_to_site', compact('site', 'evaluations'));
        }
        
        return View::make('admin.assign_b_to_site', compact('site'));
        
    }

    public function assign_b_to_site_b($site_id){

        // $grader_ids = [];
        // $all_of_grader_ids = [];
        // $rest_of_graders_ids = [];
        // $the_grader_ids = [];

        // $g_evaluations = Evaluation_b::distinct()->select('grader_id')->groupBy('grader_id')->get();

        // $g_graders = Grader::where('approved', 'yes')->get();

        // foreach ($g_graders as $g_grader) {
        //     if(!$g_grader->user->hasRole('admin')){
        //         $all_of_grader_ids[] = $g_grader->id;
        //     }
        // }

        // foreach ($g_evaluations as $g_evaluation) {
        //     $grader_ids[] = $g_evaluation->grader_id;
        // }

        // $rest_of_graders_ids = array_diff($all_of_grader_ids, $grader_ids);

        // foreach ($rest_of_graders_ids as $rg) {
        //     $g = Grader::find($rg);
        //     if(!$g->user->hasRole('grader')){
        //         $the_grader_ids[] = $g->id;
        //     }
        // }

        // ----------------------------
        
        $site = Site::find($site_id);
        
        $evaluations_count = Evaluation_b::where('site_id', $site_id)->count();
        
        if($evaluations_count > 0){
            $evaluations = Evaluation_b::where('site_id', $site_id)->get();
            
            // return View::make('admin.assign_b_to_site_b', compact('site', 'evaluations', 'the_grader_ids'));
            return View::make('admin.assign_b_to_site_b', compact('site', 'evaluations'));            
        }
        
        return View::make('admin.assign_b_to_site_b', compact('site'));
        
    }

  public function assign_b_with_sites_to_site_b($site_id){

        $site = Site::find($site_id);
        
        $evaluations_count = Evaluation_b::where('site_id', $site_id)->count();
        
        if($evaluations_count > 0){
            $evaluations = Evaluation_b::where('site_id', $site_id)->get();
            
            return View::make('admin.assign_b_with_sites_to_site_b', compact('site', 'evaluations'));            
        }
        
        return View::make('admin.assign_b_with_sites_to_site_b', compact('site'));
        
    }

    public function assign_b_to_site_c($site_id){
        
        $site = Site::find($site_id);
        
        $evaluations_count = Evaluation_c::where('site_id', $site_id)->count();
        
        if($evaluations_count > 0){
            $evaluations = Evaluation_c::where('site_id', $site_id)->get();
            
            // return View::make('admin.assign_b_to_site_b', compact('site', 'evaluations', 'the_grader_ids'));
            return View::make('admin.assign_b_to_site_c', compact('site', 'evaluations'));            
        }
        
        return View::make('admin.assign_b_to_site_c', compact('site'));
        
    }

    public function assign_b_with_sites_to_site_c($site_id){

        $site = Site::find($site_id);
        
        $evaluations_count = Evaluation_c::where('site_id', $site_id)->count();
        
        if($evaluations_count > 0){
            $evaluations = Evaluation_c::where('site_id', $site_id)->get();
            
            return View::make('admin.assign_b_with_sites_to_site_c', compact('site', 'evaluations'));            
        }
        
        return View::make('admin.assign_b_with_sites_to_site_c', compact('site'));
        
    }        
    
    public function confirm_delete_evaluation_site_grader($evaluation_id) {
        
        $evaluation = Evaluation::find($evaluation_id);
        
        $grader = Grader::find($evaluation->grader_id);
        $site = Site::find($evaluation->site_id);
        
        return View::make('admin.confirm_delete_evaluation_site_grader', compact('evaluation', 'grader', 'site'));
        
    }

    public function confirm_delete_evaluation_site_grader_b($evaluation_id) {
        
        $evaluation = Evaluation::find($evaluation_id);
        
        $grader = Grader::find($evaluation->grader_id);
        $site = Site::find($evaluation->site_id);
        
        return View::make('admin.confirm_delete_evaluation_site_grader_b', compact('evaluation', 'grader', 'site'));
        
    }

    public function confirm_delete_evaluation_b_site_grader_b($evaluation_id) {
        
        $evaluation = Evaluation_b::find($evaluation_id);
        
        $grader = Grader::find($evaluation->grader_id);
        $site = Site::find($evaluation->site_id);
        
        return View::make('admin.confirm_delete_evaluation_b_site_grader_b', compact('evaluation', 'grader', 'site'));
        
    }

    public function confirm_delete_evaluation_c_site_grader_b($evaluation_id) {
        
        $evaluation = Evaluation_c::find($evaluation_id);
        
        $grader = Grader::find($evaluation->grader_id);
        $site = Site::find($evaluation->site_id);
        
        return View::make('admin.confirm_delete_evaluation_c_site_grader_b', compact('evaluation', 'grader', 'site'));
        
    } 
    
    
    // Assign a grader to a site
    public function assign_evaluation_grader_site($evaluation_id, $site_id, $grader_id){
        
        
        
    }
    
    public function send_to_late_graders() {
        
        $evaluations = Evaluation::distinct()->select('grader_id')->where('can_evaluate', '=', 'na')->groupBy('grader_id')->get();

        foreach($evaluations as $evaluation){
            $grader = Grader::find($evaluation->grader_id);
            if($grader->user->hasRole('grader')){
                echo $grader->user->email . "<br>";
                
                $grader_email = $grader->user->email;
                
//                 Mail::send('emails.send_to_late_graders',[], function($message) use ($grader_email){
//                     $message->to($grader_email)->subject('Αποδοχή συμμετοχής ως Αξιολογητής Α - Edu Web Awards 2015');
//                 }); 
                
            }
        }             
        
    }
    
    public function send_to_graders_a_to_accept(){        
        
        $graders = Grader::all();       
        
        foreach ($graders as $grader){
            if($grader->user->hasRole('grader') && !$grader->user->hasRole('grader_b')){
                if($grader->user->email != $grader->from_who_email && $grader->has_agreed == 'na' && $grader->from_who_email != '2006@windtools.gr'){
                    $grader_email = $grader->user->email;
                    $grader_last_name = $grader->grader_last_name;
                    $grader_first_name = $grader->grader_name;
                    $site_title = $grader->sites->first()->title;
                    $site = $grader->sites->first();
                    $from_who_email = $grader->from_who_email;
                    
                    echo $from_who_email . "<br>";

//                     Mail::send('emails.send_to_graders_a_to_accept', ['grader_last_name' => $grader_last_name, 'grader_first_name' => $grader_first_name, 'site_title' => $site_title], function($message) use ($grader_email){
//                         $message->to($grader_email)->subject('Αποδοχή συμμετοχής ως Αξιολογητής Α - Edu Web Awards 2015');
//                     });

//                         Mail::send('emails.send_to_sites_a_to_accept', ['grader_last_name' => $grader_last_name, 'grader_first_name' => $grader_first_name], function($message) use ($from_who_email){
//                             $message->to($from_who_email)->subject('Σχετικά με τον Αξιολογητή Α που έχετε προτείνει - Edu Web Awards 2015');
//                         });                        

                }
            }
        }       
        
    }
    
    public function send_to_graders_a_to_begin(){
        
        $graders = Grader::all();
        
        $from = 0;
        $to = 0;
        
        $evals = array();
        $c = 0;

        foreach($graders as $grader){
            if($grader->user->hasRole('grader')){
                $grader_id = $grader->id;                
                if($grader_id > $from && $grader_id <= $to){
                    $grader_email = $grader->user->email;
                    $grader_last_name = $grader->grader_last_name;
                    $grader_first_name = $grader->grader_name;
                    
                    $evaluations = Evaluation::where('grader_id', $grader_id)->get();                    

                    $i = 0;
                    foreach($evaluations as $evaluation) {
                        $site = Site::find($evaluation->site_id);
                        $evals['site_title'][$i] = $site->title;
                        $evals['site_url'][$i] = $site->site_url;
                        $i++;
                    }                    
                    
                    // echo "last name: " . $grader_last_name . "<br>";
                    // echo "first name: " . $grader_first_name . "<br>";
                    // echo "|||||||||||||||||||||" . "<br>";
                    
                    // for($j = 0; $j<sizeof($evals); $j++){                
                    //     echo "site title: " . $evals['site_title'][$j] . "<br>";
                    //     echo "site url: " . $evals['site_url'][$j] . "<br>";
                    //     echo "*********************" . "<br>";
                    // }                    
                    // echo "----------------------------" . "<br>";
                    
                    $the_evals =  json_encode($evals);
                    
                    Mail::send('emails.send_to_graders_a_to_begin', ['grader_last_name' => $grader_last_name, 'grader_first_name' => $grader_first_name, 'the_evals' => $the_evals], function($message) use ($grader_email){
                        $message->to($grader_email)->subject('ΠΡΟΣΚΛΗΣΗ ΓΙΑ ΚΡΙΣΗ - ΑΝΑΘΕΣΗ ΙΣΤΟΤΟΠΩΝ ΣΕ ΑΞΙΟΛΟΓΗΤΗ Α - Edu Web Awards 2015');
                    });

                    $c++;
                    echo $c . " | ". $grader_email ."<br>";                 
                                                                 
                }
            }
        }
        
    }

    public function send_to_graders_b_to_begin(){

        $evaluations = Evaluation_b::distinct()->select()->groupBy('grader_id')->get();

        //dd($evaluations);

        $i = 0;

        foreach ($evaluations as $evaluation) {

            if($evaluation->can_evaluate == 'na'){ // a reminder

                $i++;

                $grader_id = $evaluation->grader_id;

                $gids[] = $grader_id;

                $grader = Grader::find($grader_id);

                $grader_email = $grader->user->email;
                $grader_last_name = $grader->grader_last_name;
                $grader_first_name = $grader->grader_name;

                // Mail::send('emails.send_reminder_to_grader_b_to_begin', ['grader_last_name' => $grader_last_name, 'grader_first_name' => $grader_first_name], function($message) use ($grader_email){
                //     $message->to($grader_email)->subject('ΠΡΟΣΚΛΗΣΗ ΓΙΑ ΚΡΙΣΗ - ΑΝΑΘΕΣΗ ΙΣΤΟΤΟΠΩΝ ΣΕ ΑΞΙΟΛΟΓΗΤΗ B - Edu Web Awards 2015');
                // });

                // Mail::send('emails.send_to_graders_b_to_begin', ['grader_last_name' => $grader_last_name, 'grader_first_name' => $grader_first_name], function($message) use ($grader_email){
                //     $message->to($grader_email)->subject('ΠΡΟΣΚΛΗΣΗ ΓΙΑ ΚΡΙΣΗ - ΑΝΑΘΕΣΗ ΙΣΤΟΤΟΠΩΝ ΣΕ ΑΞΙΟΛΟΓΗΤΗ B - Edu Web Awards 2015');
                // });

                echo $i . " | ". $grader_id . " | ". $grader_email . " | " . $grader_last_name . " | " . $grader_first_name. "<br>";

            }

        };

    }
    
    public function isAdmin(){
        if(!Auth::guest()){
            if(Auth::user()->type == 'admin'){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
        
        return false;
    }
    
}