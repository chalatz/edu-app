<?php

class Evaluation_b extends \Eloquent {

    protected $table = 'evaluations_b';
    
    public static $can_evaluate_rules = [
		'can_evaluate' => 'required',
	];
    
    public static $is_educational_rules = [
		'is_educational' => 'required',
	];
    
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

    public static $grader_a_rules = [
        'grader_id' => 'required',
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
        'site_comment', 'assigned_at', 'assigned_until',
        'bk1_comment', 'bk2_comment', 'bk3_comment',
        'gk1_comment', 'gk2_comment', 'gk3_comment', 'gk4_comment', 'gk5_comment',
        'dk1_comment', 'dk2_comment', 'dk3_comment', 'dk4_comment', 'dk5_comment',
        'ek1_comment', 'ek2_comment',
        'stk1_comment', 'stk2_comment', 'stk3_comment',
        'beta_grade','gama_grade','delta_grade','epsilon_grade','st_grade',
        'beta_comment','gama_comment','delta_comment','epsilon_comment','st_comment',
        'total_grade',
        'is_educational', 'why_not_educational',
        'can_evaluate', 'why_not',
    ];
    
}