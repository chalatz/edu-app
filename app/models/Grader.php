<?php

class Grader extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'grader_name' => 'required',
        'grader_last_name' => 'required',
        //'district_id' => 'required',
        //'cat_id' => 'required',
	];

    public static $grader_b_rules = [
        'grader_name' => 'required',
        'grader_last_name' => 'required',
        'grader_district_id' => 'required',
        'specialty' => 'required',
    ];

    public static $error_messages = [
        'required' => 'Το πεδίο είναι υποχρεωτικό.',
        'email' => 'Το πεδίο δεν περιέχει έγκυρη διεύθυνση e-mail.',
        'url' => 'Το πεδίο δεν περιέχει έγκυρη διεύθυνση url.',
        'unique' => 'To :attribute αυτό δεν είναι διαθέσιμο.',
    ];

    public static $can_evaluate_rules = [
		'can_evaluate' => 'required',
	];

	// Don't forget to fill this array
	protected $fillable = ['grader_name', 'grader_last_name', 'specialty', 'address', 'user_id', 'district_id', 'cat_id', 'from_who', 'past_grader', 'site_1', 'site_2', 'has_agreed', 'wants_to_be_grader_b', 'languages', 'languages_level', 'from_who_email', 'desired_category', 'past_grader_more','grader_district_id', 'grader_district_text', 'level_english_check', 'level_french_check', 'level_german_check', 'level_italian_check', 'level_english', 'level_french', 'level_german', 'level_italian', 'self_proposed', 'why_self_proposed', 'can_evaluate', 'why_not', 'personal_url', 'personal_xp', 'personal_cv', 'comments'];

    public function user(){
        return $this->belongsTo('User');
    }

    public function sites(){
        return $this->belongsToMany('Site')->withTimestamps();
    }

    public function graders(){
        return $this->belongsToMany('Grade');
    }

}
