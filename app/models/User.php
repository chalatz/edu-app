<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	// Add your validation rules here
	public static $rules = [
		'email' => 'required|email|unique:users',
		'password' => 'required|confirmed',
	];
    
    public static $change_password_rules = [
        'current_password' => 'required',
        'new_password' => 'required|confirmed',
    ];
    
    public static $change_password_ninja_rules = [
        'new_password' => 'required|confirmed',
    ];
    
    public static $login_rules= [
		'email' => 'required|email',
		'password' => 'required',
	];
    
    public static $error_messages = [
        'required' => 'Το πεδίο είναι υποχρεωτικό.',
        'confirmed' => 'Οι κωδικοί πρόσβασης δε συμφωνούν.',
        'email' => 'Το πεδίο δεν περιέχει έγκυρη διεύθυνση e-mail.',
        'unique' => 'To :attribute αυτό δεν είναι διαθέσιμο.',
    ];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	// Don't forget to fill this array
	protected $fillable = ['email', 'password', 'confirmation_string', 'type'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
    
    public function setPasswordAttribute($password){
        
        $this->attributes['password'] = Hash::make($password);
        
    }
    
    public function profile(){
        return $this->hasOne('Profile');
    }
    
    public function site(){
        return $this->hasOne('Site');
    }
    
    public function grader(){
        return $this->hasOne('Grader');
    }

    public function roles(){
    	return $this->belongsToMany('Role')->withTimestamps();
    }

    /**
     * Find out if user has a specific role
     *
     * $return boolean
     */
    public function hasRole($check)
    {
        return in_array($check, array_fetch($this->roles->toArray(), 'role'));
    }

}
