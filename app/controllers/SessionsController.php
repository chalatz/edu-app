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
        $login_data = Input::only(['email', 'password']);
        $login_data['confirmed'] = 1;
        
        if(Auth::attempt($login_data)){
            
            return Redirect::intended('/');
            
        }
        
        Session::flash('flash_message', '<i class="fa fa-exclamation-triangle"></i> Λανθασμένο email ή κωδικός πρόσβασης');
        Session::flash('alert-class', 'flash-error');
        
        return Redirect::back()->withInput();
        
	}
    
    public function verify() {
        
        Auth::logout();
        
        // get ver_string from url
        $parameters = Route::getCurrentRoute()->parameters();
        $confirmation_string = $parameters['confirmation_string'];
        
        // try to find a user that has that string
        try {
            $user = User::whereConfirmation_string($confirmation_string)->firstOrFail();  
        }
        
        // if no such user is found, return to the home page
        catch(ModelNotFoundException $e){
            return Redirect::home();
        }
        
        // the user is found but is already verified
        if($user->confirmed == 1) {
            Session::flash('flash_message', '<i class="fa fa-info-circle"></i> Το email σας έχει ήδη επιβεβαιωθεί. Μπορείτε να συνδεθείτε.');
            Session::flash('alert-class', 'flash-info');
            return Redirect::route('login');
        }
        
        // the user is found and ready to be verified
        $user->confirmed = 1;
        $user->save();

        Session::flash('flash_message', '<i class="fa fa-check-circle"></i> Το email σας έχει επιβεβαιωθεί με επιτυχία!<br> Μπορείτε τώρα να συνδεθείτε.');
        Session::flash('alert-class', 'flash-sucess');
		return Redirect::route('login');
        
    }
    
    public function verify_grader() {
        
        Auth::logout();
        
        // get ver_string from url
        $parameters = Route::getCurrentRoute()->parameters();
        $confirmation_string = $parameters['confirmation_string'];
        
        // try to find a user that has that string
        try {
            $user = User::whereConfirmation_string($confirmation_string)->firstOrFail();  
        }
        
        // if no such user is found, return to the home page
        catch(ModelNotFoundException $e){
            return Redirect::home();
        }
        
        // the user is found but is already verified
        if($user->confirmed == 1) {
            Session::flash('flash_message', '<i class="fa fa-info-circle"></i> Το email σας έχει ήδη επιβεβαιωθεί. Μπορείτε να συνδεθείτε.');
            Session::flash('alert-class', 'flash-info');
            return Redirect::route('login');
        }
        
        // the user is found and ready to be verified
        $user->confirmed = 1;
        $user->save();

        Session::flash('flash_message', '<i class="fa fa-check-circle"></i> Το email σας έχει επιβεβαιωθεί με επιτυχία!<br> Μπορείτε τώρα να συνδεθείτε.');
        Session::flash('alert-class', 'flash-success');
		return Redirect::route('login');
        
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