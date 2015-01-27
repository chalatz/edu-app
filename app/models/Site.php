<?php

class Site extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'title' => 'required',
        'site_url' => 'required|url',
        'creator' => 'required',
        'responsible' => 'required',
        'contact_name' => 'required',
        'contact_email' => 'required|email',
        'phone' => 'required',
        'grader_name' => 'required',
        'grader_last_name' => 'required',
        'grader_email' => 'required|email|check_grader',
        'grader_district' => 'required',
        'cat_id' => 'required',
        'district_id' => 'required',
        'contact_last_name' => 'required',
	];
    
    public static $error_messages = [
        'required' => 'Το πεδίο είναι υποχρεωτικό.',
        'email' => 'Το πεδίο δεν περιέχει έγκυρη διεύθυνση e-mail.',
        'url' => 'Το πεδίο δεν περιέχει έγκυρη διεύθυνση url.',
        'unique' => 'To :attribute αυτό δεν είναι διαθέσιμο.',
        'check_grader' => 'Ο αξιολογητής με αυτό το email υπάρχει ήδη.',
    ];

	// Don't forget to fill this array
	protected $fillable = ['user_id', 'title', 'site_url', 'cat_id', 'creator', 'responsible', 'contact_name', 'contact_last_name', 'contact_email', 'phone', 'district_id', 'grader_name', 'grader_email', 'grader_last_name', 'grader_district', 'notify_grader', 'district_text', 'responsible_type', 'restricted_access', 'restricted_access_details', 'received_permission', 'grader_district_text', 'uses_private_data', 'county_id', 'confirmed_at'];
    
    public function user(){
        $this->belongsTo('User');
    }
    
    public function graders(){
        return $this->belongsToMany('Grader')->withTimestamps();
    }

}