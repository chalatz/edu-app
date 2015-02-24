<?php

class GamaCriterion extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['main_title', 
                           'gk1_title', 'gk2_title', 'gk3_title', 'gk4_title', 'gk5_title',
                           'gk1_1_title', 'gk1_2_title', 'gk1_3_title', 'gk1_4_title', 'gk1_5_title', 
                           'gk2_1_title', 'gk2_2_title', 'gk2_3_title', 'gk2_4_title', 'gk2_5_title', 
                           'gk3_1_title', 'gk3_2_title', 'gk3_3_title', 'gk3_4_title', 'gk3_5_title',
                           'gk4_1_title', 'gk4_2_title', 'gk4_3_title', 'gk4_4_title', 'gk4_5_title',
                           'gk5_1_title', 'gk5_2_title', 'gk5_3_title', 'gk5_4_title', 'gk5_5_title',
                           'weight', 'gk1_weight', 'gk2_weight', 'gk3_weight', 'gk4_weight', 'gk5_weight'];

}