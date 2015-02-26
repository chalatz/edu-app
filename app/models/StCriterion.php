<?php

class StCriterion extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
    protected $fillable = ['main_title', 
                           'stk1_title', 'stk2_title', 'stk3_title', 
                           'stk1_1_title', 'stk1_2_title', 'stk1_3_title', 'stk1_4_title', 'stk1_5_title', 
                           'stk2_1_title', 'stk2_2_title', 'stk2_3_title', 'stk2_4_title', 'stk2_5_title', 
                           'stk3_1_title', 'stk3_2_title', 'stk3_3_title', 'stk3_4_title', 'stk3_5_title', 
                           'weight', 'stk1_weight', 'stk2_weight', 'stk3_weight'];

}