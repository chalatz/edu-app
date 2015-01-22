<?php

class County extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['county_name', 'district_id', 'district_name'];
    
    public function counties_array(){

        $result = array();

        foreach(County::all() as $county){
            if(!array_key_exists($county->district_name, $result)){
                $result[$county->district_name] = array();
            }
            $result[$county->district_name][$county->id] = $county->county_name;
        }

        return $result;

    }

}