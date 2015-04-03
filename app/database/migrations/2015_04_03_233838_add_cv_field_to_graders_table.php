<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddCvFieldToGradersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('graders', function(Blueprint $table)
		{
			$table->string('personal_url', 150)->nullable();
			$table->string('personal_xp', 250)->nullable();
			$table->string('personal_cv', 250)->nullable();
			$table->text('comments')->nullable();
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
			$table->dropColumn('personal_url');
			$table->dropColumn('personal_xp');
			$table->dropColumn('personal_cv');
			$table->dropColumn('comments');
		});
	}

}
