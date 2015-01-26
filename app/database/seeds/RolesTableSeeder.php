<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder {

	public function run()
	{
		// $faker = Faker::create();

		// foreach(range(1, 10) as $index)
		// {
		// 	Role::create([

		// 	]);
		// }
		 
		Role::create([
			'id' => 1,
			'role' => 'site',
		]);
		Role::create([
			'id' => 2,
			'role' => 'grader',
		]);
		Role::create([
			'id' => 3,
			'role' => 'grader_b',
		]);
		Role::create([
			'id' => 4,
			'role' => 'admin',
		]);
		Role::create([
			'id' => 5,
			'role' => 'user',
		]);
	}

}