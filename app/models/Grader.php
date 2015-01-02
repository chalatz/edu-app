<?php

class Grader extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'grader_name' => 'required',
        'district_id' => 'required',
        'cat_id' => 'required',
	];
    
    public static $error_messages = [
        'required' => 'Το πεδίο είναι υποχρεωτικό.',
        'email' => 'Το πεδίο δεν περιέχει έγκυρη διεύθυνση e-mail.',
        'url' => 'Το πεδίο δεν περιέχει έγκυρη διεύθυνση url.',
        'unique' => 'To :attribute αυτό δεν είναι διαθέσιμο.',
    ];

	// Don't forget to fill this array
	protected $fillable = ['grader_name','user_id', 'district_id', 'cat_id', 'from_who', 'past_grader', 'site_1', 'site_2', 'has_agreed'];
    
    public function user(){
        $this->belongsTo('User');
    }
    
    public function sites(){
        return $this->belongsToMany('Site');
    }

}