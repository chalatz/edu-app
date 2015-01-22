<?php

class RegistrationController extends \BaseController {


	/**
	 * Show the form for creating a new resource.
	 * GET /registration/create
	 *
	 * @return Response
	 */
	public function create($user_type)
	{
        //if(Auth::check()) return Redirect::home();
        
        if($user_type == 'site' || $user_type == 'grader'){
    		return View::make('registration.create', compact('user_type'));
        } else {
            return Redirect::home();
        }
            
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /registration
	 *
	 * @return Response
	 */
	public function store()
	{
        $validator = Validator::make($data = Input::only(['email', 'password', 'password_confirmation', 'type']), User::$rules, User::$error_messages);
        
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
  
        $user_type = Input::get('type');
        
        if($user_type == 'site'){
            $thetitle = 'Υποψήφιος';
            $therole_id = 1;
        }
        
        if($user_type == 'grader'){
            $thetitle = 'Αξιολογητής';
            $therole_id = 2;
        }
        
        $confirmation_string = str_random(40);
        $confirmation_url = route('verify', $confirmation_string);
        
        Mail::send('emails.verification', ['confirmation_url' => $confirmation_url, 'thetitle' => $thetitle,], function($message){
             $message->to(Input::get('email'))->subject('Επιβεβαιώστε το email σας. Edu Web Awards 2015');
         });
        
        $user_data = Input::only('email', 'password', 'type');
        $user_data['confirmation_string'] = $confirmation_string;
        
        $user = User::create($user_data);

        // --- Attach roles (site or grader) ---
        
        // Get new user's id
        $new_user_id = $user->id;

        // Get the new user
        $new_user = User::find($new_user_id);
		
		// Attach to the user the Role with id:1 (site) or id:2 (grader)
		$new_user->roles()->attach($therole_id);   
        

        Session::flash('flash_message', '<i class="fa fa-info-circle"></i> Έχει σταλεί ένα e-mail στον λογαριασμό που έχετε δηλώσει. <br>Παρακαλούμε ανοίξτε αυτό το e-mail και πατήστε στον σύνδεσμο που θα βρείτε, προκειμένου να επιβεβαιώσετε το e-mail σας.');
        Session::flash('alert-class', 'flash-info');
		return Redirect::home();
	}


}