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
        
        // Disable sites creation
        Session::flash('flash_message', '<i class="fa fa-exclamation"></i> Η υποβολή υποψηφιοτήτων έχει λήξει.');
        Session::flash('alert-class', 'flash-info');
        if(Auth::user()->id != 59 && Auth::user()->id != 273 && Auth::user()->id != 160 ){
            return Redirect::home();
        }
        
        if(Auth::guest()){
            return Redirect::home();
        } else {
            if(Auth::user()->site || Auth::user()->hasRole('grader')) {
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
        if(Auth::guest()){
            return Redirect::home();
        }
        
		$validator = Validator::make($data = Input::all(), Site::$rules, Site::$error_messages);
        
        $input = Input::all();

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
        
        //$data = Input::only('title', 'site_url', 'cat_id', 'creator', 'responsible', 'contact_name', 'contact_email', 'phone', 'district_id', 'grader_name', 'grader_last_name', 'grader_email', 'grader_district', 'notify_grader','mobile_phone', 'district_text', 'responsible_type', 'restricted_access', 'restricted_access_details', 'received_permission');
        $data = Input::all();
        
        $user_id = Auth::user()->id;
        
        $data['user_id'] = $user_id;
        
        $user = User::find($user_id);
        
        $user['has_site'] = 1;
        
        $user->save();
        // --- Attach role (site) ---
        $user->roles()->attach(1);
        

        // if the grader is to be notified
        if(!isset($input['proposes_himself'])){

        	$grader_email = $data['grader_email'];

        	// if the email does not exist
        	if(User::where('email', '=', $grader_email)->count() == 0){
                
                $the_new_site = Site::create($data);
    			
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
                $site_responsible = $data['responsible'];
                $site_responsible_type = $data['responsible_type'];
	            
	            Mail::send('emails.grader_verification', ['confirmation_url' => $confirmation_url, 'password' => $password, 'site_title' => $site_title, 'site_responsible' => $site_responsible, 'site_responsible_type' => $site_responsible_type], function($message){
	             $message->to(Input::get('grader_email'))->subject('Αξιολογητής Α - Επιβεβαίωση Συμμετοχής - Edu Web Awards 2015');
	            });
	            
	            $the_new_user = User::create($user_data);

                // --- Attach role (grader) ---
		        // Get new user's id
		        $new_user_id = $the_new_user->id;
		        // Get the new user
		        $new_user = User::find($new_user_id);
				// Attach to the user the Role with id:2 (grader)
				$new_user->roles()->attach(2);
                
                $grader_data = [
                    'grader_name' => $data['grader_name'],
                    'grader_last_name' => $data['grader_last_name'],
                    'district_id' => $data['grader_district'],
                    'grader_district_id' => $data['grader_district'],
                    'cat_id' => $data['cat_id'],
                    'from_who' => $data['title'],
                    'from_who_email' => $user->email,
                ];
                
                $grader_data['user_id'] = $new_user_id;
                
                // Check if the grader already exists
                $found_grader = Grader::where('user_id', '=', $new_user_id);
                if($found_grader->count() == 0){
                    $new_grader = Grader::create($grader_data);
                    // ----- Attach to site ------------
                    $the_new_grader = Grader::find($new_grader->id);
                    $the_new_grader->sites()->attach($the_new_site->id);
                } else {
                    $found_grader = $found_grader->first();
                    $found_grader->update($data);
                    // ----- Attach to site ------------
                    $found_grader->sites()->attach($the_new_site->id);
                }
                
                //$new_grader = Grader::create($grader_data);                

				Session::flash('flash_message', '<i class="fa fa-info-circle"></i> Έχει σταλεί ένα e-mail στον αξιολογητή που έχετε προτείνει.');
        		Session::flash('alert-class', 'flash-info');                  

        	}

        } else {
            // The site has proposed itself
             
            $the_new_site = Site::create($data);
            
            $grader_data = [
                'grader_name' => $data['contact_name'],
                'grader_last_name' => $data['contact_last_name'],
                'district_id' => $data['district_id'],
                'grader_district_id' => $data['grader_district'],
                'cat_id' => $data['cat_id'],
                'from_who' => $data['title'],
                'from_who_email' => $user->email,
            ];
            
            $grader_data['user_id'] = $user_id;
            
            // Check if the grader already exists
            $found_grader = Grader::where('user_id', '=', $user_id);
            if($found_grader->count() == 0){
                $new_grader = Grader::create($grader_data);
                // ----- Attach to site ------------
                $the_new_grader = Grader::find($new_grader->id);
                $the_new_grader->sites()->attach($the_new_site->id);
            } else {
                $found_grader = $found_grader->first();
                $found_grader->update($data);
                // ----- Attach to site ------------
                $found_grader->sites()->attach($the_new_site->id);
            }
            
            //$new_grader = Grader::create($grader_data);
            
            // ----- Attach to site ------------
            // $the_new_grader = Grader::find($new_grader->id);
            // $the_new_grader->sites()->attach($the_new_site->id);
            
            $user->roles()->attach(2);
    		Session::flash('flash_message', '<i class="fa fa-info-circle"></i> Έχετε προσθέσει τον υπεύθυνο επικοινωνίας σας ως αξιολογητή Α.');
    		Session::flash('alert-class', 'flash-info');
        }
        
        //-------------- Save current time --------
        //$objDateTime = new DateTime('NOW');
        //$input['confirmed_at'] = $objDateTime;

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
        
        $grader = $user->site->graders->first();

        return View::make('sites.edit', compact('user', 'grader'));
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
        
		if ($validator->fails())
		{
			//return Redirect::back()->withErrors($validator)->withInput();
		}
        
		try {
            $user = User::with('site')->whereId($userid)->firstOrFail();   
        }
        
        catch(ModelNotFoundException $e){
            return Redirect::home();
        }

        //$input = Input::only('title', 'site_url', 'cat_id', 'creator', 'responsible', 'contact_name', 'contact_email', 'phone', 'district_id', 'grader_name', 'grader_last_name', 'grader_email', 'grader_district', 'notify_grader','mobile_phone', 'district_text', 'county', 'grader_district', 'responsible_type', 'restricted_access', 'restricted_access_details', 'received_permission');
        $input = Input::all();
        
           $grader_email = $input['grader_email'];
        
//         //check if the user exists
//         if(User::where('email', '=', $grader_email)->count() == 0){
//             $user_exists = false;
//         } else {
//             $user_exists = true;
//         }

        $site = $user->site;
        
        //-------------- Save current time --------
       //$objDateTime = new DateTime('NOW');
        //$input['confirmed_at'] = $objDateTime;
        
        // if the grader is to be notified
        if(!isset($input['proposes_himself'])){

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
                $site_responsible = $data['responsible'];
                $site_responsible_type = $data['responsible_type'];
                
                Mail::send('emails.grader_verification', ['confirmation_url' => $confirmation_url, 'password' => $password, 'site_title' => $site_title, 'site_responsible' => $site_responsible, 'site_responsible_type' => $site_responsible_type], function($message){
                 $message->to(Input::get('grader_email'))->subject('Αξιολογητής Α - Επιβεβαίωση Συμμετοχής - Edu Web Awards 2015');
                });
                
                $the_new_user = User::create($user_data);

                // --- Attach role (grader) ---
                // Get new user's id
                $new_user_id = $the_new_user->id;
                // Get the new user
                $new_user = User::find($new_user_id);
                // Attach to the user the Role with id:2 (grader)
                $new_user->roles()->attach(2);


                // --- Create the Grader
                $grader_data = [
                    'grader_name' => $data['grader_name'],
                    'grader_last_name' => $data['grader_last_name'],
                    'district_id' => $data['grader_district'],
                    'grader_district_id' => $data['grader_district'],
                    'cat_id' => $data['cat_id'],
                    'from_who' => $data['title'],
                    'from_who_email' => $user->email,
                ];

                $grader_data['user_id'] = $new_user_id;

                $new_grader = Grader::create($grader_data);

                // ----- Attach to site ------------
                $the_new_grader = Grader::find($new_grader->id);
                $the_new_grader->sites()->attach($site->id);

                Session::flash('flash_message', '<i class="fa fa-info-circle"></i> Έχει σταλεί ένα e-mail στον αξιολογητή που έχετε προτείνει.');
                Session::flash('alert-class', 'flash-info');                  

            }

        } else {
            // The site has proposed itself
            $grader_data = [
                'grader_name' => $data['contact_name'],
                'grader_last_name' => $data['contact_last_name'],
                'district_id' => $data['district_id'],
                'grader_district_id' => $data['grader_district'],
                'cat_id' => $data['cat_id'],
                'from_who' => $data['title'],
                'from_who_email' => $user->email,
            ];

            $grader_data['user_id'] = $userid;

            $new_grader = Grader::create($grader_data);
            
            // ----- Attach to site ------------
            $the_new_grader = Grader::find($new_grader->id);
            $the_new_grader->sites()->attach($site->id);
            
            $user->roles()->attach(2);

            Session::flash('flash_message', '<i class="fa fa-info-circle"></i> Έχετε προσθέσει τον υπεύθυνο επικοινωνίας σας ως αξιολογητή Α.');
            Session::flash('alert-class', 'flash-info');
        }

        //$the_new_site = Site::create($data);
        
        //-------------- Save current time --------
        //$objDateTime = new DateTime('NOW');
        //$input['confirmed_at'] = $objDateTime;
        
        $user->site->fill($input)->save();

        $site->grader_agrees = 'na';
        $site->save();
        
        return Redirect::home();
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
    
    private function counties_array(){

        $result = array();
    
        foreach(County::all() as $county){
            if(!array_key_exists($county->district_name, $result)){
                $result[$county->district_name] = array();
            }
            $result[$county->district_name][$county->id] = $county->county_name;
        }
        
        return $result;
        
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
