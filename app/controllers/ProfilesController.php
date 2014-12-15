<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProfilesController extends \BaseController {

	/**
	 * Display the specified resource.
	 * GET /profiles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($userid)
	{
        try {
            $user = User::with('profile')->whereId($userid)->firstOrFail();   
        }
        
        catch(ModelNotFoundException $e){
            return Redirect::home();
        }
        
        return View::make('profiles.show', compact('user'));
		
	}
    
    public function edit($userid) {
        
        try {
            $user = User::with('profile')->whereId($userid)->firstOrFail();   
        }
        
        catch(ModelNotFoundException $e){
            return Redirect::home();
        }
        
        return View::make('profiles.edit', compact('user'));
        
    }
    
    public function update($userid){    
        
        try {
            $user = User::with('profile')->whereId($userid)->firstOrFail();   
        }
        
        catch(ModelNotFoundException $e){
            return Redirect::home();
        }
        
        $input = Input::only('location', 'bio', 'twitter_username');
        
        $user->profile->fill($input)->save();
        
        return Redirect::route('profile', $user->id);
        
    }


}