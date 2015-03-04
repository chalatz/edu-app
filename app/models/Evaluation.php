<?php

class Evaluation extends \Eloquent {
    
    public static $beta_rules = [
		'bk1' => 'required',
        'bk2' => 'required',
        'bk3' => 'required',
	];
    
    public static $gama_rules = [
		'gk1' => 'required',
        'gk2' => 'required',
        'gk3' => 'required',
        'gk4' => 'required',
        'gk5' => 'required',
	];
    
    public static $delta_rules = [
        'dk1' => 'required',
        'dk2' => 'required',
        'dk3' => 'required',
        'dk4' => 'required',
        'dk5' => 'required',
    ];

    public static $epsilon_rules = [
        'ek1' => 'required',
        'ek2' => 'required',
    ];

    public static $st_rules = [
        'stk1' => 'required',
        'stk2' => 'required',
        'stk3' => 'required',
    ];
    
    public static $error_messages = [
        'required' => 'Το πεδίο είναι υποχρεωτικό.',
    ];
    
	protected $fillable = [
        'grader_id', 'site_id',
        'phase',
        'bk1', 'bk2', 'bk3',
        'gk1', 'gk2', 'gk3', 'gk4', 'gk5',
        'dk1', 'dk2', 'dk3', 'dk4', 'dk5',
        'ek1', 'ek2',
        'stk1', 'stk2', 'stk3',
        'beta_grade','gama_grade','delta_grade','epsilon_grade','st_grade',
        'total_grade',
    ];
    
}