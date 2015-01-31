<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		Category::create([
			'id' => 1,
			'category_name' => '1. Νηπιαγωγεία, Δημοτικά Σχολεία, Δημοτικά Ειδικά Σχολεία',
		]);
		Category::create([
			'id' => 2,
			'category_name' => '2. Γυμνάσια, ΕΕΕΕΚ, ΣΔΕ',
		]);
		Category::create([
			'id' => 3,
			'category_name' => '3. Γενικά Λύκεια, ΕΠΑΛ, ΕΚ, ΤΕΕ Ειδικής Αγωγής',
		]);
		Category::create([
			'id' => 4,
			'category_name' => '4. Υποστηρικτικές δομές εκπαίδευσης **',
		]);
		Category::create([
			'id' => 5,
			'category_name' => '5. Διοικητικές μονάδες Διευθύνσεων Εκπαίδευσης και Περιφερειακών Διευθύνσεων Εκπαίδευσης',
		]);
		Category::create([
			'id' => 6,
			'category_name' => '6. Προσωπικοί ιστότοποι ατομικοί ή ομάδων εκπαιδευτικών',
		]);
	}

}