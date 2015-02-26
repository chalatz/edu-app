<?php

class DeltaCriterion extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['main_title', 
                       'dk1_title', 'dk2_title', 'dk3_title', 'dk4_title', 'dk5_title',
                       'dk1_1_title', 'dk1_2_title', 'dk1_3_title', 'dk1_4_title', 'dk1_5_title', 
                       'dk2_1_title', 'dk2_2_title', 'dk2_3_title', 'dk2_4_title', 'dk2_5_title', 
                       'dk3_1_title', 'dk3_2_title', 'dk3_3_title', 'dk3_4_title', 'dk3_5_title',
                       'dk4_1_title', 'dk4_2_title', 'dk4_3_title', 'dk4_4_title', 'dk4_5_title',
                       'dk5_1_title', 'dk5_2_title', 'dk5_3_title', 'dk5_4_title', 'dk5_5_title',
                       'weight', 'dk1_weight', 'dk2_weight', 'dk3_weight', 'dk4_weight', 'dk5_weight'];

}