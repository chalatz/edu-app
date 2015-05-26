<?php

class Evaluation_bController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /evaluation
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /evaluation/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /evaluation
	 *
	 * @return Response
	 */
	public function store()
	{

        $validator = Validator::make($data = Input::only('grader_id'), Evaluation_b::$grader_a_rules, Evaluation_b::$error_messages);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $input = Input::all();                     

        $grader_id = $input['grader_id'];
        $site_id = $input['site_id'];
        $grader_type = $input['grader_type'];
        
        //dd($grader_id);

        $evaluation = new Evaluation;

        $evaluation->grader_id = $grader_id;
        $evaluation->site_id = $site_id;

        $evaluation->save();
        
        if(isset($input['send_to_grader'])){
            $grader = Grader::find($grader_id);
            $grader_email = $grader->user->email;
            $grader_last_name = $grader->grader_last_name;
            $grader_first_name = $grader->grader_name;
            $site = Site::find($site_id);
            $site_title = $site->title;
            $site_url = $site->site_url;
            
            if($grader_type == 'a'){
                Mail::send('emails.send_to_new_grader_a',['grader_last_name' => $grader_last_name, 'grader_first_name' => $grader_first_name, 'site_title' => $site_title, 'site_url' => $site_url], function($message) use ($grader_email){
                    $message->to($grader_email)->subject('Νέα Ανάθεση Υποψήφιου Ιστότοπου σε Αξιολογητή Α - Edu Web Awards 2015');
                });
            }
            if($grader_type == 'b'){
                Mail::send('emails.send_to_new_grader_b',['grader_last_name' => $grader_last_name, 'grader_first_name' => $grader_first_name, 'site_title' => $site_title, 'site_url' => $site_url], function($message) use ($grader_email){
                    $message->to($grader_email)->subject('ΑΝΑΘΕΣΗ ΙΣΤΟΤΟΠΩΝ ΣΕ ΤΡΙΤΟ ΑΞΙΟΛΟΓΗΤΗ - Edu Web Awards 2015');
                });
            } 
        }
        
        Session::flash('flash_message', '<i class="fa fa-check-circle"></i> Επιτυχής καταχώριση Ανάθεσης.');
        Session::flash('alert-class', 'flash-success');

        if($grader_type == 'a'){
            return Redirect::route('admin.assign_to_site', $site_id);
        }

        if($grader_type == 'b'){
            return Redirect::route('admin.assign_b_to_site', $site_id);
        }

        return Redirect::home();

	}

	/**
	 * Display the specified resource.
	 * GET /evaluation/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(){       
            
        if( !(Auth::user()->hasRole('grader_b')) ){
            return Redirect::home();
        }   
        
        $user_id = Auth::user()->id;
		
        $user = User::find($user_id);
        
        $grader = Grader::where('user_id', '=', $user_id)->first();       
        
        $grader_id = $grader->id;
        
        $evaluations = Evaluation_b::where('grader_id', '=', $grader_id)->get();
                
        return View::make('evaluations_b.show', compact('user', 'grader', 'evaluations'));
        
	}
    

	/**
	 * Show the form for editing the specified resource.
	 * GET /evaluate/{criterion}/user/{user_id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($user_id, $criterion, $grader_id, $site_id){
        
        if(Auth::user()->id != $user_id){
            return Redirect::home();
        }
        
        $evaluation = Evaluation_b::whereGrader_id($grader_id)->whereSite_id($site_id)->first();        
        
        if($evaluation->can_evaluate =='no' || $evaluation->finalized == 'yes'){
            return Redirect::home();
        }
        
        $user_id = Auth::user()->id;
		
        $user = User::find($user_id);
        
        $grader = Grader::where('user_id', '=', $user_id)->first();
        
        //$evaluation = Evaluation_b::where('grader_id', '=', $grader_id, 'and', 'site_id', '=', $site_id)->get();
        //$evaluation = Evaluation_b::whereGrader_id($grader_id)->whereSite_id($site_id)->first();

        return View::make('evaluations_b.edit', compact('evaluation', 'criterion'));
        
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /evaluation/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
        
        $input = Input::all();
        
        $evaluation = Evaluation_b::find($id);
        
        $total_grade = $evaluation->total_grade;
        
        // ----- Beta Form
        if(isset($input['bk1']) && isset($input['bk2']) && isset($input['bk3'])){
            
            $validator = Validator::make($data = Input::all(), Evaluation_b::$beta_rules, Evaluation_b::$error_messages);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }
            
            $input['beta_grade'] = $input['bk1'] * (25/5) + $input['bk2'] * (25/5) + $input['bk3'] * (50/5);
            
        } // Beta Form
        
        // ----- Gama Form
        if(isset($input['gk1']) && isset($input['gk2']) && isset($input['gk3']) &&
            isset($input['gk4']) && isset($input['gk5'])){

            $validator = Validator::make($data = Input::all(), Evaluation_b::$gama_rules, Evaluation_b::$error_messages);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }

            $input['gama_grade'] = $input['gk1'] * (20/5) + 
                                   $input['gk2'] * (20/5) + 
                                   $input['gk3'] * (20/5) +
                                   $input['gk4'] * (20/5) +
                                   $input['gk5'] * (20/5);
            
            $total_grade += $input['gama_grade'] * .3;
            
        } // Gama Form
        
        // ----- Delta Form
        if(isset($input['dk1']) && isset($input['dk2']) && isset($input['dk3']) &&
            isset($input['dk4']) && isset($input['dk5'])){

            $validator = Validator::make($data = Input::all(), Evaluation_b::$delta_rules, Evaluation_b::$error_messages);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }

            $input['delta_grade'] = $input['dk1'] * (20/5) + 
                                    $input['dk2'] * (20/5) + 
                                    $input['dk3'] * (20/5) +
                                    $input['dk4'] * (20/5) +
                                    $input['dk5'] * (20/5);
            
            $total_grade += $input['delta_grade'] * .2;
            
        } // Delta Form

        // ----- Epsilon Form
        if(isset($input['ek1']) && isset($input['ek2'])){

            $validator = Validator::make($data = Input::all(), Evaluation_b::$epsilon_rules, Evaluation_b::$error_messages);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }

            $input['epsilon_grade'] = $input['ek1'] * (50/5) + 
                                      $input['ek2'] * (50/5);
            
            $total_grade += $input['epsilon_grade'] * .15;
            
        } // Epsilon Form

        // ----- St Form
        if(isset($input['stk1']) && isset($input['stk2']) && isset($input['stk3'])){

            $validator = Validator::make($data = Input::all(), Evaluation_b::$st_rules, Evaluation_b::$error_messages);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }

            $input['st_grade'] = $input['stk1'] * (28/5) + $input['stk2'] * (32/5) + $input['stk3'] * (40/5);
            
            $total_grade += $input['st_grade'] * .2;

        } // St Form
        
        $evaluation->fill($input)->save();
        
        $beta_grade = $evaluation->beta_grade * .15;
        $gama_grade = $evaluation->gama_grade * .3;
        $delta_grade = $evaluation->delta_grade * .2;
        $epsilon_grade = $evaluation->epsilon_grade * .15;
        $st_grade = $evaluation->st_grade * .2;
        
        $evaluation->total_grade = $beta_grade + $gama_grade + $delta_grade + $epsilon_grade + $st_grade;
        $evaluation->save();
        
        Session::flash('flash_message', '<i class="fa fa-check-circle"></i> Επιτυχής καταχώριση Βαθμολογίας.');
        Session::flash('alert-class', 'flash-success');
		return Redirect::route('grader.evaluate_b_show');
        
	}
    
    public function do_comments_submit($id) {
        
        $input = Input::all();
        
        $evaluation = Evaluation_b::find($id);
        
        $evaluation->fill($input)->save();
        
        Session::flash('flash_message', '<i class="fa fa-check-circle"></i> Επιτυχής καταχώριση Σχολίου.');
        Session::flash('alert-class', 'flash-success');
        return Redirect::route('grader.evaluate_b_show');
        
    }
    
    public function do_is_educational_submit($id) {
        
        $validator = Validator::make($data = Input::all(), Evaluation_b::$is_educational_rules, Evaluation_b::$error_messages);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $input = Input::all();
        
        $evaluation = Evaluation_b::find($id);

        if($input['is_educational'] == 'no'){
            $evaluation->total_grade = 1;
        }

        $evaluation->total_grade = 0;
        
        $evaluation->fill($input)->save();
        
        Session::flash('flash_message', '<i class="fa fa-check-circle"></i> Επιτυχής καταχώριση Απάντησης.');
        Session::flash('alert-class', 'flash-success');
        return Redirect::route('grader.evaluate_b_show');
        
    }  
    
    public function do_can_evaluate_submit($id) {
        
        $validator = Validator::make($data = Input::all(), Evaluation_b::$can_evaluate_rules, Evaluation_b::$error_messages);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        $input = Input::all();
        
        //-------------- Save current time --------                
        $today = new DateTime('NOW');
        $input['assigned_at'] = $today;
        $today2 = new DateTime('NOW');
        $input['assigned_until'] = $today2->modify('+7 days');
        
        $evaluation = Evaluation_b::find($id);
        
        if($input['can_evaluate'] == 'yes'){
            Session::flash('flash_message', '<i class="fa fa-check-circle"></i> Ευχαριστούμε για την αποδοχή.');
            Session::flash('alert-class', 'flash-success');
        }

        if($input['can_evaluate'] == 'no'){
            $evaluation->total_grade = -1;
        }

        $evaluation->fill($input)->save();
        
        return Redirect::route('grader.evaluate_b_show');
        
    }
    
    public function finalize($id){
        
        $evaluation = Evaluation_b::find($id);
        
        $grader_id = $evaluation->grader_id;
        
        $grader = Grader::find($grader_id);
        
        $user = $grader->user;
        
        if(Auth::user()->id != $user->id){
            return Redirect::home();
        }

        $today = new DateTime('NOW');
        
        $evaluation->finalized = 'yes';
        $evaluation->finalized_at = $today;

        $evaluation->save();
        
        Session::flash('flash_message', '<i class="fa fa-check-circle"></i> Επιτυχής καταχώριση Οριστικής Υποβολής Βαθμολογίας.');
        Session::flash('alert-class', 'flash-success');
        return Redirect::route('grader.evaluate_b_show');
        
    }    

	/**
	 * Remove the specified resource from storage.
	 * DELETE /evaluation/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        
		$evaluation = Evaluation_b::find($id);
        
        $site_id = $evaluation->site_id;

        $input = Input::all();
        
        $evaluation->delete();
        
        Session::flash('flash_message', '<i class="fa fa-check-circle"></i> Επιτυχής διαγραφή Ανάθεσης.');
        Session::flash('alert-class', 'flash-success');        

        return Redirect::route('admin.assign_b_to_site_b', [$site_id]);

	}
    

}