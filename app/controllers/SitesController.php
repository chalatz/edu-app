<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class SitesController extends \BaseController {

	/**
	 * Display a listing of sites
	 *
	 * @return Response
	 */
	public function index()
	{
		$sites = Site::all();

		return View::make('sites.index', compact('sites'));
	}

	/**
	 * Show the form for creating a new site
	 *
	 * @return Response
	 */
	public function create()
	{
        if(Auth::guest()){
            return Redirect::home();
        } else {
            if(Auth::user()->has_site == 1) {
                return Redirect::home();
            }
        }
        
		return View::make('sites.create');
	}

	/**
	 * Store a newly created site in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Site::$rules, Site::$error_messages);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
        
        $data = Input::only('title', 'site_url', 'cat_id', 'creator', 'responsible', 'contact_name', 'contact_email', 'phone', 'district_id', 'grader_name', 'grader_email', 'notify_grader');
        
        $user_id = Auth::user()->id;
        
        $data['user_id'] = $user_id;
        
        $user = User::find($user_id);
        
        $user['has_site'] = 1;
        
        $user->save();
        
        $notify_grader = $data['notify_grader'];

        // if the grader is to be notified
        if($notify_grader == 1){

        	$grader_email = $data['grader_email'];

        	// if the email does not exist
        	if(User::where('email', '=', $grader_email)->count() == 0){
    			
	            $confirmation_string = str_random(40);
	            $password = str_random(6);
	            $user_data = [
	                'email' => $grader_email,
	                'password' => $password,
	                'type' => 'grader',
	                'confirmation_string' => $confirmation_string,
	            ];
	            
	            $confirmation_url = route('verify.grader', $confirmation_string);

	            $site_title = $data['title'];
	            
	            Mail::send('emails.grader_verification', ['confirmation_url' => $confirmation_url, 'password' => $password, 'site_title' => $site_title], function($message){
	             $message->to(Input::get('grader_email'))->subject('Επιβεβαιώστε το email σας. Edu Web Awards 2015');
	            });
	            
	            $the_new_user = User::create($user_data);

                // --- Attach role (grader) ---
		        // Get new user's id
		        $new_user_id = $the_new_user->id;
		        // Get the new user
		        $new_user = User::find($new_user_id);
				// Attach to the user the Role with id:2 (grader)
				$new_user->roles()->attach(2);

				Session::flash('flash_message', '<i class="fa fa-info-circle"></i> Έχει σταλεί ένα e-mail στον αξιολογητή που έχετε προτείνει.');
        		Session::flash('alert-class', 'flash-info');

        	} else {
        		// The user's email and the proposed email are the same (The site has proposed itself as a grader)
        		if($grader_email == $user->email) {
        			// --- Attach role (grader) ---
        			$user->roles()->attach(2);
        			Session::flash('flash_message', '<i class="fa fa-info-circle"></i> Έχετε προσθέσει τον ευατό σας ως αξιολογητή.');
        			Session::flash('alert-class', 'flash-info');
        		}
        		
        	}

        }

		Site::create($data);

		return Redirect::home();
	}

	/**
	 * Display the specified site.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($userid)
	{
		try {
            $user = User::with('site')->whereId($userid)->firstOrFail(); 
        }
        
        catch(ModelNotFoundException $e){
            return Redirect::home();
        }
        
        return View::make('sites.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified site.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($userid)
	{
        try {
            $user = User::with('site')->whereId($userid)->firstOrFail();   
        }
        
        catch(ModelNotFoundException $e){
            return Redirect::home();
        }
        
        return View::make('sites.edit', compact('user'));
	}

	/**
	 * Update the specified site in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($userid)
	{
        $validator = Validator::make($data = Input::all(), Site::$rules, Site::$error_messages);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
        
		try {
            $user = User::with('site')->whereId($userid)->firstOrFail();   
        }
        
        catch(ModelNotFoundException $e){
            return Redirect::home();
        }
        
        $input = Input::only('title', 'site_url', 'cat_id', 'creator', 'responsible', 'contact_name', 'contact_email', 'phone', 'district_id', 'grader_name', 'grader_email', 'notify_grader');
        
        $notify_grader = $input['notify_grader'];
        
        // if the grader is to be notified
        if($notify_grader == 1){

        	$grader_email = $input['grader_email'];

        	// if the email does not exist
        	if(User::where('email', '=', $grader_email)->count() == 0){
    			
	            $confirmation_string = str_random(40);
	            $password = str_random(6);
	            $user_data = [
	                'email' => $grader_email,
	                'password' => $password,
	                'type' => 'grader',
	                'confirmation_string' => $confirmation_string,
	            ];
	            
	            $confirmation_url = route('verify.grader', $confirmation_string);

	            $site_title = $user->site->title;
	            
	            Mail::send('emails.grader_verification', ['confirmation_url' => $confirmation_url, 'password' => $password, 'site_title' => $site_title], function($message){
	             $message->to(Input::get('grader_email'))->subject('Επιβεβαιώστε το email σας. Edu Web Awards 2015');
	            });
	            
	            $the_new_user = User::create($user_data);

                // --- Attach role (grader) ---
		        // Get new user's id
		        $new_user_id = $the_new_user->id;
		        // Get the new user
		        $new_user = User::find($new_user_id);
				// Attach to the user the Role with id:2 (grader)
				$new_user->roles()->attach(2);

				Session::flash('flash_message', '<i class="fa fa-info-circle"></i> Έχει σταλεί ένα e-mail στον αξιολογητή που έχετε προτείνει.');
        		Session::flash('alert-class', 'flash-info');

        	} else {
        		// The user's email and the proposed email are the same (The site has proposed itself as a grader)
        		if($grader_email == $user->email && $user->roles->count() <= 1) {
        			// --- Attach role (grader) ---
        			$user->roles()->attach(2);
        			Session::flash('flash_message', '<i class="fa fa-info-circle"></i> Έχετε προσθέσει τον ευατό σας ως αξιολογητή.');
        			Session::flash('alert-class', 'flash-info');
        		}
        		
        	}

        }
        
        $user->site->fill($input)->save();
        
        return Redirect::route('site.show', $user->id);
	}

	/**
	 * Remove the specified site from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Site::destroy($id);

		return Redirect::route('sites.index');
	}

}
