<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddAddressFieldToGradersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('graders', function(Blueprint $table)
		{
			$table->text('address')->nullable()->after('grader_district_text');
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
			$table->dropColumn('address');
		});
	}

}
