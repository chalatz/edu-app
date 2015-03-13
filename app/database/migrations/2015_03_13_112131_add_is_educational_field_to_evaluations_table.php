<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddIsEducationalFieldToEvaluationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('evaluations', function(Blueprint $table)
		{
		    $table->string('is_educational', 10)->nullable()->default('na')->after('phase');
            $table->text('why_not_educational')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('evaluations', function(Blueprint $table)
		{
			$table->dropColumn('is_educational');
            $table->dropColumn('why_not_educational');
		});
	}

}
