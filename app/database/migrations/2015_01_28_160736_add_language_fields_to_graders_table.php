<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddLanguageFieldsToGradersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('graders', function(Blueprint $table)
		{
			$table->string('level_english_check', 30)->nullable();
			$table->string('level_english', 30)->nullable()->default('na');
			$table->string('level_french_check', 30)->nullable();
			$table->string('level_french', 30)->nullable()->default('na');
			$table->string('level_german_check', 30)->nullable();
			$table->string('level_german', 30)->nullable()->default('na');
			$table->string('level_italian_check', 30)->nullable();
			$table->string('level_italian', 30)->nullable()->default('na');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('graders', function(Blueprint $table)
		{
			$table->dropColumn('level_english_check');
			$table->dropColumn('level_english');
			$table->dropColumn('level_french_check');
			$table->dropColumn('level_french');
			$table->dropColumn('level_german_check');
			$table->dropColumn('level_german');
			$table->dropColumn('level_italian_check');
			$table->dropColumn('level_italian');
		});
	}

}
