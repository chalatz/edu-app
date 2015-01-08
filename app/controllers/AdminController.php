<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminController extends \BaseController {
    
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
    
    public function index(){
        
        if($this->isAdmin()){
		    return View::make('admin.index');
        } else {
            return Redirect::home();
        }
	}
    
    public function sites(){
        
        if($this->isAdmin()){
            
            $sites = Site::all();
            
		    return View::make('admin.sites', compact('sites'));
            
        } else {
            return Redirect::home();
        }
        
    }
    
}