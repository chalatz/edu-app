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
        
        if($notify_grader == 1 && User::where('email', '=', Input::get('grader_email'))->count() == 0) {
            $grader_email = $data['grader_email'];
            $confirmation_string = str_random(40);
            $password = str_random(6);
            $user_data = [
                'email' => $grader_email,
                'password' => $password,
                'type' => 'grader',
                'confirmation_string' => $confirmation_string,
            ];
            
            $confirmation_url = route('verify.grader', $confirmation_string);
            
            Mail::send('emails.grader_verification', ['confirmation_url' => $confirmation_url, 'password' => $password], function($message){
             $message->to(Input::get('grader_email'))->subject('Αξιολογητής: Επιβεβαιώστε το email σας. Edu Web Awards 2015');
            });
            
            User::create($user_data);
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
        
        if($notify_grader == 1 && User::where('email', '=', Input::get('grader_email'))->count() == 0) {
            $grader_email = $input['grader_email'];
            $confirmation_string = str_random(40);
            $password = str_random(6);
            $user_data = [
                'email' => $grader_email,
                'password' => $password,
                'type' => 'grader',
                'confirmation_string' => $confirmation_string,
            ];
            
            $confirmation_url = route('verify.grader', $confirmation_string);
            
            Mail::send('emails.grader_verification', ['confirmation_url' => $confirmation_url, 'password' => $password], function($message){
             $message->to(Input::get('grader_email'))->subject('Επιβεβαιώστε το email σας. Edu Web Awards 2015');
            });
            
            User::create($user_data);
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
