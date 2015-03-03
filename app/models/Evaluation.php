<?php

class Evaluation extends \Eloquent {
	protected $fillable = [
		'grader_id', 'site_id',
		'phase',
		'bk1_1','bk1_2','bk1_3','bk1_4','bk1_5','bk2_1','bk2_2','bk2_3','bk2_4','bk2_5','bk3_1','bk3_2','bk3_3','bk3_4','bk3_5',
		'gk1_1','gk1_2','gk1_3','gk1_4','gk1_5','gk2_1','gk2_2','gk2_3','gk2_4','gk2_5','gk3_1','gk3_2','gk3_3','gk3_4','gk3_5','gk4_1','gk4_2','gk4_3','gk4_4','gk4_5','gk5_1','gk5_2','gk5_3','gk5_4','gk5_5',
		'dk1_1','dk1_2','dk1_3','dk1_4','dk1_5','dk2_1','dk2_2','dk2_3','dk2_4','dk2_5','dk3_1','dk3_2','dk3_3','dk3_4','dk3_5','dk4_1','dk4_2','dk4_3','dk4_4','dk4_5','dk5_1','dk5_2','dk5_3','dk5_4','dk5_5',
		'ek1_1','ek1_2','ek1_3','ek1_4','ek1_5','ek2_1','ek2_2','ek2_3','ek2_4','ek2_5',
		'stk1_1','stk1_2','stk1_3','stk1_4','stk1_5','stk2_1','stk2_2','stk2_3','stk2_4','stk2_5','stk3_1','stk3_2','stk3_3','stk3_4','stk3_5',
		'beta_grade','gama_grade','delta_grade','epsilon_grade','st_grade',
		'total_grade',
	];
}