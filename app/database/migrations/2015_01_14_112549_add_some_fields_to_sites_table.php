<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddSomeFieldsToSitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sites', function(Blueprint $table)
		{
			$table->string('mobile_phone', 20)->nullable()->after('phone');
            $table->string('district_text', 200)->nullable()->after('district_id');
            $table->string('county', 200)->nullable()->after('district_text');
            $table->string('grader_district', 200)->nullable()->after('grader_email');
            $table->string('responsible_type', 200)->nullable()->after('responsible');
            $table->tinyInteger('restricted_access')->default(0);
            $table->text('restricted_access_details')->nullable()->after('restricted_access');
            $table->tinyInteger('received_permission')->default(0);
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
			$table->dropColumn('mobile_phone');
            $table->dropColumn('district_text');
            $table->dropColumn('county');
            $table->dropColumn('grader_district');
            $table->dropColumn('responsible_type');
            $table->dropColumn('restricted_access');
            $table->dropColumn('restricted_access_details');
            $table->dropColumn('received_permission');
		});
	}

}
