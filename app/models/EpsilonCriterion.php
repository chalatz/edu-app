<?php

class EpsilonCriterion extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
    protected $fillable = ['main_title', 
                           'ek1_title', 'ek2_title', 
                           'ek1_1_title', 'ek1_2_title', 'ek1_3_title', 'ek1_4_title', 'ek1_5_title', 
                           'ek2_1_title', 'ek2_2_title', 'ek2_3_title', 'ek2_4_title', 'ek2_5_title', 
                           'weight', 'ek1_weight', 'ek2_weight',];


}