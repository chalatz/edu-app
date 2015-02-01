<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddGraderAgreesFieldToSitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sites', function(Blueprint $table)
		{
			$table->string('grader_agrees', 10)->nullable()->default('na')->after('phone');
			$table->text('purpose')->nullable();
			$table->integer('country_id')->default(1);
			$table->integer('language_id')->default(100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sites', function(Blueprint $table)
		{
			$table->dropColumn('grader_agrees');
			$table->dropColumn('purpose');
			$table->dropColumn('country_id');
			$table->dropColumn('language_id');
		});
	}

}
