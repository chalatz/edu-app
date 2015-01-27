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
            $table->string('district_text', 200)->nullable()->after('district_id');
            $table->string('county', 200)->nullable()->after('district_text');
            $table->string('grader_district', 200)->nullable()->after('grader_email');
            $table->string('responsible_type', 200)->nullable()->after('responsible');
            $table->string('restricted_access', 10)->nullable();
            $table->text('restricted_access_details')->nullable()->after('restricted_access');
            $table->string('uses_private_data', 10)->nullable();
            $table->string('received_permission',10)->nullable()->after('restricted_access_details');
            $table->string('contact_last_name', 200)->nullable()->after('contact_name');
            $table->string('proposes_himself', 10)->nullable();
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
            $table->dropColumn('district_text');
            $table->dropColumn('county');
            $table->dropColumn('grader_district');
            $table->dropColumn('responsible_type');
            $table->dropColumn('restricted_access');
            $table->dropColumn('restricted_access_details');
            $table->dropColumn('uses_private_data');
            $table->dropColumn('received_permission');
            $table->dropColumn('contact_last_name');
            $table->dropColumn('proposes_himself');
		});
	}

}
