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
        
        $evaluation = Evaluation::where('grader_id', '=', $grader_id, 'and', 'site_id', '=', $site_id)->first();
        
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
        
		if(isset($input['bk1'])){
            $evaluation->bk1 = $input['bk1'];
        }
        if(isset($input['bk2'])){
            $evaluation->bk2 = $input['bk2'];
        }
        if(isset($input['bk3'])){
            $evaluation->bk3 = $input['bk3'];
        }
        
        if(isset($input['gk1'])){
            $evaluation->gk1 = $input['gk1'];
        }
        
        $evaluation->save();
        
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