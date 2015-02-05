<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminController extends \BaseController {
    
    
    public function index(){
         
        return View::make('admin.index');    
	}
    
    public function sites(){

        $sites = Site::all();
        return View::make('admin.sites', compact('sites'));
        
    }
    
    public function graders(){
        
        $graders = Grader::all();

        return View::make('admin.graders', compact('graders'));
        
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