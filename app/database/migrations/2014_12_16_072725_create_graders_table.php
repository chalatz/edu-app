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
            $table->tinyInteger('district_id')->default(100);
            $table->tinyInteger('cat_id')->default(100);
            $table->string('from_who', 200)->nullable();
            $table->tinyInteger('past_grader')->default(100);
            $table->integer('site_1')->default(0);
            $table->integer('site_2')->default(0);
            $table->tinyInteger('has_agreed')->default(100);
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
