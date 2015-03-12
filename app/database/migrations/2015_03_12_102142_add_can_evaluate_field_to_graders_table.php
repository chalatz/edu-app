<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddCanEvaluateFieldToGradersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('graders', function(Blueprint $table)
		{
			$table->string('can_evaluate', 10)->nullable()->default('na');
            $table->text('why_not')->nullable();
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
			$table->dropColumn('can_evaluate');
            $table->dropColumn('why_not');
		});
	}

}
