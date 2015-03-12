<?php

class EvaluationController extends \BaseController {

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
		//
	}

	/**
	 * Display the specified resource.
	 * GET /evaluation/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(){
        
        $user_id = Auth::user()->id;
		
        $user = User::find($user_id);
        
        $grader = Grader::where('user_id', '=', $user_id)->first();
        
        $grader_id = $grader->id;
        
        $evaluations = Evaluation::where('grader_id', '=', $grader_id)->get();
                
        return View::make('evaluations.show', compact('user', 'grader', 'evaluations'));
        
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
        
        $user_id = Auth::user()->id;
		
        $user = User::find($user_id);
        
        $grader = Grader::where('user_id', '=', $user_id)->first();
        
        //$evaluation = Evaluation::where('grader_id', '=', $grader_id, 'and', 'site_id', '=', $site_id)->get();
        $evaluation = Evaluation::whereGrader_id($grader_id)->whereSite_id($site_id)->first();

        return View::make('evaluations.edit', compact('evaluation', 'criterion'));
        
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
        
        $evaluation = Evaluation::find($id);
        
        $total_grade = $evaluation->total_grade;
        
        // ----- Beta Form
        if(isset($input['bk1']) && isset($input['bk2']) && isset($input['bk3'])){
            
            $validator = Validator::make($data = Input::all(), Evaluation::$beta_rules, Evaluation::$error_messages);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }
            
            $input['beta_grade'] = $input['bk1'] * (25/5) + $input['bk2'] * (25/5) + $input['bk3'] * (50/5);
            
        } // Beta Form
        
        // ----- Gama Form
        if(isset($input['gk1']) && isset($input['gk2']) && isset($input['gk3']) &&
            isset($input['gk4']) && isset($input['gk5'])){

            $validator = Validator::make($data = Input::all(), Evaluation::$gama_rules, Evaluation::$error_messages);

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

            $validator = Validator::make($data = Input::all(), Evaluation::$delta_rules, Evaluation::$error_messages);

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

            $validator = Validator::make($data = Input::all(), Evaluation::$epsilon_rules, Evaluation::$error_messages);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }

            $input['epsilon_grade'] = $input['ek1'] * (50/5) + 
                                      $input['ek2'] * (50/5);
            
            $total_grade += $input['epsilon_grade'] * .15;
            
        } // Epsilon Form

        // ----- St Form
        if(isset($input['stk1']) && isset($input['stk2']) && isset($input['stk3'])){

            $validator = Validator::make($data = Input::all(), Evaluation::$st_rules, Evaluation::$error_messages);

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
		return Redirect::route('grader.evaluate_show');
        
	}
    
    public function do_comments_submit($id) {
        
        $input = Input::all();
        
        $evaluation = Evaluation::find($id);
        
        $evaluation->fill($input)->save();
        
        Session::flash('flash_message', '<i class="fa fa-check-circle"></i> Επιτυχής καταχώριση Σχολίου.');
        Session::flash('alert-class', 'flash-success');
        return Redirect::route('grader.evaluate_show');
        
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
		//
	}
    

}