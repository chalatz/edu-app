<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddFinalizedAtFieldToEvaluationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('evaluations', function(Blueprint $table)
		{
			$table->dateTime('finalized_at')->nullable()->after('assigned_at');
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
			$table->dropColumn('finalized_at');
		});
	}

}
