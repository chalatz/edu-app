<?php

class Evaluation extends \Eloquent {
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