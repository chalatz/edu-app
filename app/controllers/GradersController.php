<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class GradersController extends \BaseController {

	/**
	 * Display a listing of graders
	 *
	 * @return Response
	 */
	public function index()
	{
		$graders = Grader::all();

		return View::make('graders.index', compact('graders'));
	}

	/**
	 * Show the form for creating a new grader
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::guest()){
            return Redirect::home();
        } else {
        	//dd(!Auth::user()->grader);
            if(!Auth::user()->hasRole('grader') || Auth::user()->grader) {
                    return Redirect::home();
            }
        }
        
		return View::make('graders.create');
	}

	/**
	 * Store a newly created grader in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Grader::$rules, Grader::$error_messages);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
        
        //$data = Input::only('grader_name', 'district_id', 'cat_id', 'from_who', 'past_grader');
        $data = Input::all();
        
        $user_id = Auth::user()->id;
        
        $data['user_id'] = $user_id;
        
        $user = User::find($user_id);
        
        $user['has_site'] = 1;
        
        
        $user->save();

		$grader = Grader::create($data);

		return Redirect::home();
	}

	/**
	 * Display the specified grader.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($userid)
	{
		try {
            $user = User::with('grader')->whereId($userid)->firstOrFail(); 
        }
        
        catch(ModelNotFoundException $e){
            return Redirect::home();
        }
        
        return View::make('graders.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified grader.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($userid)
	{
		 try {
            $user = User::with('grader')->whereId($userid)->firstOrFail();   
        }
        
        catch(ModelNotFoundException $e){
            return Redirect::home();
        }
        
        return View::make('graders.edit', compact('user'));
	}

	/**
	 * Update the specified grader in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($userid)
	{
		$validator = Validator::make($data = Input::all(), Grader::$rules, Site::$error_messages);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
        
		try {
            $user = User::with('grader')->whereId($userid)->firstOrFail();   
        }
        
        catch(ModelNotFoundException $e){
            return Redirect::home();
        }
        
        //$input = Input::only('grader_name', 'district_id', 'cat_id', 'from_who', 'past_grader');
        $input = Input::all();
        
        $user->grader->fill($input)->save();
        
        return Redirect::route('grader.show', $user->id);
        
	}

	/**
	 * Remove the specified grader from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Grader::destroy($id);

		return Redirect::route('graders.index');
	}

}
