<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddAssignedUntilFieldToEvaluationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('evaluations', function(Blueprint $table)
		{
			$table->dateTime('assigned_until')->default('2015-01-01 10:00:00')->after('assigned_at');
            $table->string('finalized', 10)->nullable()->default('na');
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
			$table->dropColumn('assigned_until');
            $table->dropColumn('finalized');
		});
	}

}
