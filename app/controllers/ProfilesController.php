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
    
    


}