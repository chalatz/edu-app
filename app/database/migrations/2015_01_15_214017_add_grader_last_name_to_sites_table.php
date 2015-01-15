<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddGraderLastNameToSitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sites', function(Blueprint $table)
		{
		    $table->string('grader_last_name', 100)->after('grader_name')->nullable();
            $table->string('grader_district_text', 200)->after('grader_district')->nullable();
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
		    $table->dropColumn('grader_last_name');
            $table->dropColumn('grader_district_text');
		});
	}

}
