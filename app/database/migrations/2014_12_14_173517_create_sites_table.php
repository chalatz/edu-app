<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sites', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('site_url', 60);
            $table->string('title');
            $table->tinyInteger('cat_id');
            $table->tinyInteger('district_id');
            $table->string('creator');
            $table->string('responsible');
            $table->string('contact_name');
            $table->string('contact_email', 60);
            $table->string('phone', 60);
            $table->string('grader_name');
            $table->string('grader_email', 60);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sites');
	}

}
