<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class DistrictsTableSeeder extends Seeder {

	public function run()
	{
		District::create([
			'id' => 1,
			'district_name' => 'Αττική',
		]);
		District::create([
			'id' => 2,
			'district_name' => 'Βόρειο Αιγαίο',
		]);
		District::create([
			'id' => 3,
			'district_name' => 'Νότιο Αιγαίο',
		]);
		District::create([
			'id' => 4,
			'district_name' => 'Δυτική Ελλάδα',
		]);
		District::create([
			'id' => 5,
			'district_name' => 'Θεσσαλία',
		]);
		District::create([
			'id' => 6,
			'district_name' => 'Ήπειρος',
		]);
		District::create([
			'id' => 7,
			'district_name' => 'Ιόνιο',
		]);
		District::create([
			'id' => 8,
			'district_name' => 'Κρήτη',
		]);
		District::create([
			'id' => 9,
			'district_name' => 'Ανατολική Μακεδονία και Θράκη',
		]);
		District::create([
			'id' => 10,
			'district_name' => 'Δυτική Μακεδονία',
		]);
		District::create([
			'id' => 11,
			'district_name' => 'Κεντρική Μακεδονία',
		]);
		District::create([
			'id' => 12,
			'district_name' => 'Πελοπόννησος',
		]);
		District::create([
			'id' => 13,
			'district_name' => 'Στερεά Ελλάδα',
		]);
		District::create([
			'id' => 14,
			'district_name' => 'Άλλη...',
		]);
	}

}