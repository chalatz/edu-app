<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddGraderLastNameToGradersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('graders', function(Blueprint $table)
		{
			$table->string('grader_last_name', 100)->after('grader_name')->nullable();
            $table->tinyInteger('wants_to_be_grader_b')->default(100);
            $table->string('languages', 200)->nullable();
            $table->string('languages_level', 200)->nullable();
            $table->string('from_who_email', 200)->after('from_who')->nullable();
            $table->tinyInteger('desired_category')->default(0);
            $table->tinyInteger('past_grader_more')->after('past_grader')->default(100);
            $table->string('grader_district_text', 200)->after('district_id')->nullable();
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
			$table->dropColumn('grader_last_name');
            $table->dropColumn('wants_to_be_grader_b');
            $table->dropColumn('languages');
            $table->dropColumn('languages_level');
            $table->dropColumn('from_who_email');
            $table->dropColumn('desired_category');
            $table->dropColumn('past_grader_more');
            $table->dropColumn('grader_district_text');
		});
	}

}
