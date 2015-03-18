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

    public function graders_b(){
        
        $graders = Grader::all();

        return View::make('admin.graders_b', compact('graders'));
        
    }
    
    public function assignments(){
        
        $evaluations = Evaluation::all();

        return View::make('admin.assignments', compact('evaluations'));
        
    }
    
    public function masquerade($user_id){

        // store the id of the ninja user
        Session::put('ninja_id', Auth::user()->id);
        
        $user = User::find($user_id);
        
        Auth::login($user);
        
        return Redirect::home();
    }
    
    public function approve($grader_id, $user_id){
        
        $user = User::find($user_id);
        $grader = Grader::find($grader_id);
        
        if($user->hasRole('admin')){
            
            //-------------- Save current time --------
            $objDateTime = new DateTime('NOW');
            
            $grader->approved_at = $objDateTime;
            $grader->approver = $user->id;
            $grader->approved = 'yes';
            
            $grader->save();
            
            return Redirect::back();
            
        } else {
            return Redirect::home();
        }
        
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
    
    public function stats(){
        
        $sites = Site::all();
        $cats = Category::all();
        $districts = District::all();
        
        $cats_total = 0;

        foreach($cats as $cat){
            $cats_total += Site::where('cat_id', '=', $cat->id)->count(); 
        }
        
        return View::make('admin.stats', compact(['sites', 'cats', 'districts', 'cats_total']));
        
    }

    public function sites_print(){

        $sites = Site::all();
        return View::make('admin.sites_print', compact('sites'));
        
    }

    public function graders_print(){
        
        $graders = Grader::all();

        return View::make('admin.graders_print', compact('graders'));
        
    }    
    
    public function graders_b_print(){
        
        $graders = Grader::all();

        return View::make('admin.graders_b_print', compact('graders'));
        
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