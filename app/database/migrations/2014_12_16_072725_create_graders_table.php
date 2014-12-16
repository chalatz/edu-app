<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGradersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('graders', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('user_id');
            $table->string('grader_name', 100)->nullable();
            $table->tinyInteger('district_id')->nullable();
            $table->tinyInteger('cat_id')->nullable();
            $table->string('from_who', 200)->nullable();
            $table->tinyInteger('past_grader');
            $table->integer('site_1')->default(0);
            $table->integer('site_2')->default(0);
            $table->tinyInteger('has_agreed')->default(0);
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
		Schema::drop('graders');
	}

}
