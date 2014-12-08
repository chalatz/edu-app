<?php

class YoController extends BaseController {

	public function showme(){
		$var = "Trendy";
		return View::make('yo')->with('var', $var);
	}

}