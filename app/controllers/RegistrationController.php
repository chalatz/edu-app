<?php

class RegistrationController extends \BaseController {


	/**
	 * Show the form for creating a new resource.
	 * GET /registration/create
	 *
	 * @return Response
	 */
	public function create()
	{
        //if(Auth::check()) return Redirect::home();
        
		return View::make('registration.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /registration
	 *
	 * @return Response
	 */
	public function store()
	{
        $validator = Validator::make($data = Input::only(['email', 'password', 'password_confirmation']), User::$rules, User::$error_messages);
        
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        $confirmation_string = str_random(40);
        $confirmation_url = route('verify', $confirmation_string);
        
        Mail::send('emails.verification', ['confirmation_url' => $confirmation_url], function($message){
             $message->to(Input::get('email'))->subject('Επιβεβαιώστε το email σας. Edu Web Awards 2015');
         });
        
        $user_data = Input::only('email', 'password');
        $user_data['confirmation_string'] = $confirmation_string;
        
        $user = User::create($user_data);

        Session::flash('flash_message', '<i class="fa fa-info-circle"></i> Έχει σταλεί ένα e-mail στον λογαριασμό που έχετε δηλώσει. <br>Παρακαλούμε ανοίξτε αυτό το e-mail και πατήστε στον σύνδεσμο που θα βρείτε, προκειμένου να επιβεβαιώσετε το e-mail σας.');
        Session::flash('alert-class', 'flash-info');
		return Redirect::home();
	}


}