<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminController extends \BaseController {
    
    
    public function index(){
         
        return View::make('admin.index');    
	}
    
    public function sites(){

        Session::put('ninja_id', Auth::user()->id);

        $sites = Site::all();
        return View::make('admin.sites', compact('sites'));
        
    }
    
    public function graders(){
        
        $graders = Grader::all();

        return View::make('admin.graders', compact('graders'));
        
    }
    
    public function masquerade($user_id){

        // store the id of the ninja user
        Session::put('ninja_id', Auth::user()->id);
        
        $user = User::find($user_id);
        
        Auth::login($user);
        
        return Redirect::home();
    }

    public function switch_back(){

        if(Session::has('ninja_id')) {

            $ninja = User::find(Session::get('ninja_id'));
            Auth::logout();
            Auth::login($ninja);

            Session::forget('ninja_id');
        }

        return Redirect::home();

    }
    
    
    public function isAdmin(){
        if(!Auth::guest()){
            if(Auth::user()->type == 'admin'){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
        
        return false;
    }
    
}