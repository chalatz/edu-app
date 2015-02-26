<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEpsilonCriteriaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('epsilon_criteria', function(Blueprint $table)
		{
			$table->increments('id');
            $table->text('main_title');
            $table->text('ek1_title');
            $table->text('ek2_title');
            $table->text('ek1_1_title');
            $table->text('ek1_2_title');
            $table->text('ek1_3_title');
            $table->text('ek1_4_title');
            $table->text('ek1_5_title');
            $table->text('ek2_1_title');
            $table->text('ek2_2_title');
            $table->text('ek2_3_title');
            $table->text('ek2_4_title');
            $table->text('ek2_5_title');
            $table->integer('weight');
            $table->integer('ek1_weight');
            $table->integer('ek2_weight');
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
		Schema::drop('epsilon_criteria');
	}

}
