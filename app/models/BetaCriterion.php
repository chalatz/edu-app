<?php

class BetaCriterion extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['main_title', 
                           'bk1_title', 'bk2_title', 'bk3_title', 
                           'bk1_1_title', 'bk1_2_title', 'bk1_3_title', 'bk1_4_title', 'bk1_5_title', 
                           'bk2_1_title', 'bk2_2_title', 'bk2_3_title', 'bk2_4_title', 'bk2_5_title', 
                           'bk3_1_title', 'bk3_2_title', 'bk3_3_title', 'bk3_4_title', 'bk3_5_title', 
                           'weight', 'bk1_weight', 'bk2_weight', 'bk3_weight'];

}