<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddTheFinalGradeFieldToGradesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('grades', function(Blueprint $table)
		{
			$table->decimal('the_final_grade',5,2)->default(0)->after('c2_grade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('grades', function(Blueprint $table)
		{
			$table->dropColumn('the_final_grade');
		});
	}

}
