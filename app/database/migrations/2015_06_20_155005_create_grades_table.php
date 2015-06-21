<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGradesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grades', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('site_id')->default(0);
			$table->integer('a1_grade')->default(0);
			$table->integer('a2_grade')->default(0);
			$table->integer('b1_grade')->default(0);
			$table->integer('b2_grade')->default(0);
			$table->integer('c1_grade')->default(0);
			$table->integer('c2_grade')->default(0);
			$table->integer('final_grade')->default(0);

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
		Schema::drop('grades');
	}

}
