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
        'grader_email' => 'required|email',
        'cat_id' => 'required',
        'district_id' => 'required',
        'notify_grader' => 'required'
	];
    
    public static $error_messages = [
        'required' => 'Το πεδίο είναι υποχρεωτικό.',
        'email' => 'Το πεδίο δεν περιέχει έγκυρη διεύθυνση e-mail.',
        'url' => 'Το πεδίο δεν περιέχει έγκυρη διεύθυνση url.',
        'unique' => 'To :attribute αυτό δεν είναι διαθέσιμο.',
    ];

	// Don't forget to fill this array
	protected $fillable = ['user_id', 'title', 'site_url', 'cat_id', 'creator', 'responsible', 'contact_name', 'contact_email', 'phone', 'district_id', 'grader_name', 'grader_email', 'notify_grader'];
    
    public function user(){
        $this->belongsTo('User');
    }
    
    public function graders(){
        return $this->belongsToMany('Grader')->withTimestamps();
    }

}