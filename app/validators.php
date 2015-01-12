<?php

Validator::extend('check_grader', function($attribute, $value, $parameters)
{
    $pass = true;
    
    $user = User::where('email', '=', $value)->first();
    
    if($user && !Auth::guest()){
        if(Auth::user()->site){
            if(Auth::user()->site->grader_email != $value){
                foreach($user->roles as $role){
                    if($role->id == 2){
                        $pass = false;
                    }
                }
            }
        } else {
            foreach($user->roles as $role){
                    if($role->id == 2){
                        $pass = false;
                    }
                }
        }
    }
    
    return $pass;
    
});