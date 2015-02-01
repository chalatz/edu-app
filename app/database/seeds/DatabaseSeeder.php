<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('RolesTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('DistrictsTableSeeder');
		$this->call('CountiesTableSeeder');
		$this->call('SpecialtiesTableSeeder');
		$this->call('CountriesTableSeeder');
	}

}
