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
            if(Auth::user()->site) {
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
        
        $input = Input::all();
        $validator->sometimes('district_text', 'required', function($input){
            return $input->district_id == 14;
        });

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
        
        $data = Input::only('title', 'site_url', 'cat_id', 'creator', 'responsible', 'contact_name', 'contact_email', 'phone', 'district_id', 'grader_name', 'grader_email', 'notify_grader','mobile_phone', 'district_text', 'responsible_type', 'restricted_access', 'restricted_access_details', 'received_permission');
        
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

		$the_new_site = Site::create($data);

		// ---------- Create the Grader ---
		if($notify_grader == 1){
            
            $grader_data = [
                'grader_name' => $data['grader_name'],
                'district_id' => $data['district_id'],
                'cat_id' => $data['cat_id'],
                'from_who' => $data['title'],
            ];
            
            if($data['grader_email'] != $user->email){
                $grader_data['user_id'] = $new_user_id;
            } else {
                $grader_data['user_id'] = $user_id;
            }

            $new_grader = Grader::create($grader_data);

            // ----- Attach to site ------------
            $the_new_grader = Grader::find($new_grader->id);
            $the_new_grader->sites()->attach($the_new_site->id);
            
            if($data['grader_email'] == $user->email) {
                
                $grader_data['user_id'] = $user_id;

            }
            
        }

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
        
        $check_grader_site = '';
        if($this->check_grader_site()){
            $check_grader_site = 'disabled';
        } else {
            $check_grader_site = '';
        }
        
        return View::make('sites.edit', compact('user', 'check_grader_site'));
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

        $input = Input::all();
        $validator->sometimes('district_text', 'required', function($input){
            return $input->district_id == 14;
        });
        
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
        
        $input = Input::only('title', 'site_url', 'cat_id', 'creator', 'responsible', 'contact_name', 'contact_email', 'phone', 'district_id', 'grader_name', 'grader_email', 'notify_grader','mobile_phone', 'district_text', 'county', 'grader_district', 'responsible_type', 'restricted_access', 'restricted_access_details', 'received_permission');
        
        $notify_grader = $input['notify_grader'];
        
        $grader_email = $input['grader_email'];
        
        //check if the user exists
        if(User::where('email', '=', $grader_email)->count() == 0){
            $user_exists = false;
        } else {
            $user_exists = true;
        }
        
        // Check if the site and the grader are the same user
        if($grader_email == $user->email){
            $same_user = true;
        } else {
            $same_user = false;
        }
        
        // if the grader is to be notified
        if($notify_grader == 1){

        	// if the email does not exist
        	if(!$user_exists){
    			
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
        		if($same_user && $user->roles->count() <= 1) {
        			// --- Attach role (grader) ---
        			$user->roles()->attach(2);
        			Session::flash('flash_message', '<i class="fa fa-info-circle"></i> Έχετε προσθέσει τον ευατό σας ως αξιολογητή.');
        			Session::flash('alert-class', 'flash-info');
        		}
        		
        	}

        }
        
        $user->site->fill($input)->save();
        
		// ---------- Create the Grader ---
		if($notify_grader == 1 && !$user_exists){
            
            $grader_data = [
                'grader_name' => $input['grader_name'],
                'district_id' => $input['district_id'],
                'cat_id' => $input['cat_id'],
                'from_who' => $input['title'],
            ];
            
            if($input['grader_email'] != $user->email){
                $grader_data['user_id'] = $new_user_id;
            } else {
                $grader_data['user_id'] = $user->id;
            }

            $new_grader = Grader::create($grader_data);

            // ----- Attach to site ------------
            $the_new_grader = Grader::find($new_grader->id);
            $the_new_grader->sites()->attach($user->site->id);
            
            if($input['grader_email'] == $user->email) {
                
                $grader_data['user_id'] = $user->id;

            }
            
        }
        
        return Redirect::route('site.show', $user->id);
	}
    
    private function check_grader_site(){
        
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $site_id = $user->site->id;
        $site = Site::find($site_id);
        $graders = $site->graders;
        
        foreach($graders as $grader){
            if($grader->id = $grader->pivot->grader_id && $site_id == $grader->pivot->site_id){
                return true;
            } else {
                return false;
            }
        }
            
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
