<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class SessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 * GET /sessions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sessions
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::only(['email', 'password']), User::$login_rules);
        
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        $login_data = Input::only(['email', 'password']);
        $login_data['confirmed'] = 1;
        
        if(Auth::attempt($login_data)){
            
            return Redirect::intended('/');
            
        }
        
        return Redirect::back()->withInput()->withFlashMessage('Invalid credentials provided');
        
	}
    
    public function verify() {
        
        $parameters = Route::getCurrentRoute()->parameters();
        $confirmation_string = $parameters['confirmation_string'];
        
        try {
            $user = User::whereConfirmation_string($confirmation_string)->firstOrFail();  
        }
        
        catch(ModelNotFoundException $e){
            return Redirect::home();
        }
        
        return 'verified';
        
        
        
    }

	/**
	 * Remove the specified resource from storage.
	 * DELETE /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id = null)
	{
		Auth::logout();

		return Redirect::home();
	}

}