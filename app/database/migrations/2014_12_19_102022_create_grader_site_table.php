<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGraderSiteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grader_site', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('grader_id')->unsigned()->index();
			$table->foreign('grader_id')->references('id')->on('graders')->onDelete('cascade');
			$table->integer('site_id')->unsigned()->index();
			$table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
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
		Schema::drop('grader_site');
	}

}
