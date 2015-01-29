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
        
        $grader = Grader::find($user->grader->id);
        
        return View::make('graders.edit', compact('user', 'grader'));
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

        if(!isset($input['level_english_check'])){
        	$input['level_english_check'] = null;
        	$input['level_english'] = '';
        }
        if(!isset($input['level_french_check'])){
        	$input['level_french_check'] = null;
        	$input['level_french'] = '';
        }
        if(!isset($input['level_german_check'])){
        	$input['level_german_check'] = null;
        	$input['level_german'] = '';
        }
        if(!isset($input['level_italian_check'])){
        	$input['level_italian_check'] = null;
        	$input['level_italian'] = '';
        }

        $user->grader->fill($input)->save();
        
        return Redirect::home();
        
	}
    
    public function agrees($grader_id, $answer){
        
        $grader = Grader::find($grader_id);
        
        $grader->has_agreed = $answer;        
        
        $grader->save();
        
        if($answer == 'no'){
            $this->notify_site($grader);
            User::destroy(Auth::user()->id);
            $grader->delete();
            Auth::logout();
            return Redirect::home();
        }
        
        return View::make('graders.agrees', compact('grader'));
        
    }
    
    private function notify_site($grader) {
        
        $last_name = $grader->grader_last_name;
        $name = $grader->grader_name;
        $email= $grader->from_who_email;
        
        $data = ['last_name' => $last_name, 'name' => $name];
        
        Mail::send('emails.notify_site', $data, function($message) use ($email){
            $message->to($email)->subject('Αλλάξτε αξιολογητή');
        });
        
    }
    
    private function update_site() {
        
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
