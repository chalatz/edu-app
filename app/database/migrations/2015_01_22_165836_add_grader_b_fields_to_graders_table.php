<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddGraderBFieldsToGradersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('graders', function(Blueprint $table)
		{
			$table->string('self_proposed', 10)->nullable();
			$table->string('why_self_proposed', 250)->nullable();
			$table->string('approver', 250)->nullable();
			$table->dateTime('approved_at')->default('2015-01-01 10:00:00');
			$table->dateTime('confirmed_at')->default('2015-01-01 10:00:00');
			$table->string('was_proposed', 10)->nullable();
			$table->string('proposer', 250)->nullable();
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
			$table->dropColumn('self_proposed');	
			$table->dropColumn('why_self_proposed');	
			$table->dropColumn('approver');	
			$table->dropColumn('approved_at');	
			$table->dropColumn('confirmed_at');	
			$table->dropColumn('was_proposed');	
			$table->dropColumn('proposer');	

		});
	}

}
