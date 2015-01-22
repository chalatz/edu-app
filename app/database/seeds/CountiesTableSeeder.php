<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CountiesTableSeeder extends Seeder {

	public function run()
	{
		County::create(['district_id' => '1', 'district_name' => 'Αττική', 'county_name' => 'Βορείου Τομέα',]);
		County::create(['district_id' => '1', 'district_name' => 'Αττική', 'county_name' => 'Δυτικού Τομέα',]);
		County::create(['district_id' => '1', 'district_name' => 'Αττική', 'county_name' => 'Κεντρικού Τομέα',]);
		County::create(['district_id' => '1', 'district_name' => 'Αττική', 'county_name' => 'Νοτίου Τομέα',]);
		County::create(['district_id' => '1', 'district_name' => 'Αττική', 'county_name' => 'Πειραιώς',]);
		County::create(['district_id' => '1', 'district_name' => 'Αττική', 'county_name' => 'Νήσων',]);
		County::create(['district_id' => '1', 'district_name' => 'Αττική', 'county_name' => 'Ανατολικής Αττικής',]);
		County::create(['district_id' => '1', 'district_name' => 'Αττική', 'county_name' => 'Δυτικής Αττικής',]);
		
		County::create(['district_id' => '2', 'district_name' => 'Βόρειο Αιγαίο', 'county_name' => 'Ικαρίας',]);
		County::create(['district_id' => '2', 'district_name' => 'Βόρειο Αιγαίο', 'county_name' => 'Λέσβου',]);
		County::create(['district_id' => '2', 'district_name' => 'Βόρειο Αιγαίο', 'county_name' => 'Λήμνου',]);
		County::create(['district_id' => '2', 'district_name' => 'Βόρειο Αιγαίο', 'county_name' => 'Σάμου',]);
		County::create(['district_id' => '2', 'district_name' => 'Βόρειο Αιγαίο', 'county_name' => 'Χίου',]);

		County::create(['district_id' => '3', 'district_name' => 'Νότιο Αιγαίο', 'county_name' => 'Μυκόνου',]);
		County::create(['district_id' => '3', 'district_name' => 'Νότιο Αιγαίο', 'county_name' => 'Θήρας',]);
		County::create(['district_id' => '3', 'district_name' => 'Νότιο Αιγαίο', 'county_name' => 'Νάξου',]);
		County::create(['district_id' => '3', 'district_name' => 'Νότιο Αιγαίο', 'county_name' => 'Καλύμνου',]);
		County::create(['district_id' => '3', 'district_name' => 'Νότιο Αιγαίο', 'county_name' => 'Πάρου',]);
		County::create(['district_id' => '3', 'district_name' => 'Νότιο Αιγαίο', 'county_name' => 'Καρπάθου',]);
		County::create(['district_id' => '3', 'district_name' => 'Νότιο Αιγαίο', 'county_name' => 'Ρόδου',]);
		County::create(['district_id' => '3', 'district_name' => 'Νότιο Αιγαίο', 'county_name' => 'Κέας-Κύθνου',]);
		County::create(['district_id' => '3', 'district_name' => 'Νότιο Αιγαίο', 'county_name' => 'Σύρου',]);
		County::create(['district_id' => '3', 'district_name' => 'Νότιο Αιγαίο', 'county_name' => 'Κω',]);
		County::create(['district_id' => '3', 'district_name' => 'Νότιο Αιγαίο', 'county_name' => 'Τήνου  ',]);
		County::create(['district_id' => '3', 'district_name' => 'Νότιο Αιγαίο', 'county_name' => 'Άνδρου',]);
		County::create(['district_id' => '3', 'district_name' => 'Νότιο Αιγαίο', 'county_name' => 'Μήλου',]);

		County::create(['district_id' => '4', 'district_name' => 'Δυτική Ελλάδα', 'county_name' => 'Αιτωλοακαρνανίας',]);
		County::create(['district_id' => '4', 'district_name' => 'Δυτική Ελλάδα', 'county_name' => 'Αχαΐας',]);
		County::create(['district_id' => '4', 'district_name' => 'Δυτική Ελλάδα', 'county_name' => 'Ηλείας',]);

		County::create(['district_id' => '5', 'district_name' => 'Θεσσαλία', 'county_name' => 'Καρδίτσας',]);
		County::create(['district_id' => '5', 'district_name' => 'Θεσσαλία', 'county_name' => 'Λάρισας',]);
		County::create(['district_id' => '5', 'district_name' => 'Θεσσαλία', 'county_name' => 'Μαγνησίας',]);
		County::create(['district_id' => '5', 'district_name' => 'Θεσσαλία', 'county_name' => 'Σποράδων',]);
		County::create(['district_id' => '5', 'district_name' => 'Θεσσαλία', 'county_name' => 'Τρικάλων',]);

		County::create(['district_id' => '6', 'district_name' => 'Ήπειρος', 'county_name' => 'Άρτας',]);
		County::create(['district_id' => '6', 'district_name' => 'Ήπειρος', 'county_name' => 'Θεσπρωτίας',]);
		County::create(['district_id' => '6', 'district_name' => 'Ήπειρος', 'county_name' => 'Ιωαννίνων',]);
		County::create(['district_id' => '6', 'district_name' => 'Ήπειρος', 'county_name' => 'Πρέβεζας',]);

		County::create(['district_id' => '7', 'district_name' => 'Ιόνιο', 'county_name' => 'Ζακύνθου',]);
		County::create(['district_id' => '7', 'district_name' => 'Ιόνιο', 'county_name' => 'Ιθάκης',]);
		County::create(['district_id' => '7', 'district_name' => 'Ιόνιο', 'county_name' => 'Κέρκυρας',]);
		County::create(['district_id' => '7', 'district_name' => 'Ιόνιο', 'county_name' => 'Κεφαλληνίας',]);
		County::create(['district_id' => '7', 'district_name' => 'Ιόνιο', 'county_name' => 'Λευκάδας',]);

		County::create(['district_id' => '8', 'district_name' => 'Κρήτη', 'county_name' => 'Ηρακλείου',]);
		County::create(['district_id' => '8', 'district_name' => 'Κρήτη', 'county_name' => 'Λασιθίου',]);
		County::create(['district_id' => '8', 'district_name' => 'Κρήτη', 'county_name' => 'Ρεθύμνης',]);
		County::create(['district_id' => '8', 'district_name' => 'Κρήτη', 'county_name' => 'Χανίων',]);

		County::create(['district_id' => '9', 'district_name' => 'Ανατολική Μακεδονία και Θράκη', 'county_name' => 'Δράμας',]);
		County::create(['district_id' => '9', 'district_name' => 'Ανατολική Μακεδονία και Θράκη', 'county_name' => 'Έβρου',]);
		County::create(['district_id' => '9', 'district_name' => 'Ανατολική Μακεδονία και Θράκη', 'county_name' => 'Θάσου',]);
		County::create(['district_id' => '9', 'district_name' => 'Ανατολική Μακεδονία και Θράκη', 'county_name' => 'Καβάλας',]);
		County::create(['district_id' => '9', 'district_name' => 'Ανατολική Μακεδονία και Θράκη', 'county_name' => 'Ξάνθης',]);
		County::create(['district_id' => '9', 'district_name' => 'Ανατολική Μακεδονία και Θράκη', 'county_name' => 'Ροδόπης',]);

		County::create(['district_id' => '10', 'district_name' => 'Δυτική Μακεδονία', 'county_name' => 'Γρεβενών',]);
		County::create(['district_id' => '10', 'district_name' => 'Δυτική Μακεδονία', 'county_name' => 'Καστοριάς',]);
		County::create(['district_id' => '10', 'district_name' => 'Δυτική Μακεδονία', 'county_name' => 'Κοζάνης',]);
		County::create(['district_id' => '10', 'district_name' => 'Δυτική Μακεδονία', 'county_name' => 'Φλώρινας',]);

		County::create(['district_id' => '11', 'district_name' => 'Κεντρική Μακεδονία', 'county_name' => 'Ημαθίας',]);
		County::create(['district_id' => '11', 'district_name' => 'Κεντρική Μακεδονία', 'county_name' => 'Θεσσαλονίκης',]);
		County::create(['district_id' => '11', 'district_name' => 'Κεντρική Μακεδονία', 'county_name' => 'Κιλκίς',]);
		County::create(['district_id' => '11', 'district_name' => 'Κεντρική Μακεδονία', 'county_name' => 'Πελλας',]);
		County::create(['district_id' => '11', 'district_name' => 'Κεντρική Μακεδονία', 'county_name' => 'Πιερίας',]);
		County::create(['district_id' => '11', 'district_name' => 'Κεντρική Μακεδονία', 'county_name' => 'Σερρών',]);
		County::create(['district_id' => '11', 'district_name' => 'Κεντρική Μακεδονία', 'county_name' => 'Χαλκιδικής',]);

		County::create(['district_id' => '12', 'district_name' => 'Πελοπόννησος', 'county_name' => 'Αργολίδος',]);
		County::create(['district_id' => '12', 'district_name' => 'Πελοπόννησος', 'county_name' => 'Αρκαδίας',]);
		County::create(['district_id' => '12', 'district_name' => 'Πελοπόννησος', 'county_name' => 'Κορινθίας',]);
		County::create(['district_id' => '12', 'district_name' => 'Πελοπόννησος', 'county_name' => 'Λακωνίας',]);
		County::create(['district_id' => '12', 'district_name' => 'Πελοπόννησος', 'county_name' => 'Μεσσηνίας',]);

		County::create(['district_id' => '13', 'district_name' => 'Στερεά Ελλάδα', 'county_name' => 'Βοιωτίας',]);
		County::create(['district_id' => '13', 'district_name' => 'Στερεά Ελλάδα', 'county_name' => 'Εύβοιας',]);
		County::create(['district_id' => '13', 'district_name' => 'Στερεά Ελλάδα', 'county_name' => 'Ευρυτανίας',]);
		County::create(['district_id' => '13', 'district_name' => 'Στερεά Ελλάδα', 'county_name' => 'Φθιώτιδας',]);
		County::create(['district_id' => '13', 'district_name' => 'Στερεά Ελλάδα', 'county_name' => 'Φωκίδας',]);

	}

}