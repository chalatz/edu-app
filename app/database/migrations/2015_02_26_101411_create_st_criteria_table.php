<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStCriteriaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('st_criteria', function(Blueprint $table)
		{
			$table->increments('id');
            $table->text('main_title');
            $table->text('stk1_title');
            $table->text('stk2_title');
            $table->text('stk3_title');
            $table->text('stk1_1_title');
            $table->text('stk1_2_title');
            $table->text('stk1_3_title');
            $table->text('stk1_4_title');
            $table->text('stk1_5_title');
            $table->text('stk2_1_title');
            $table->text('stk2_2_title');
            $table->text('stk2_3_title');
            $table->text('stk2_4_title');
            $table->text('stk2_5_title');
            $table->text('stk3_1_title');
            $table->text('stk3_2_title');
            $table->text('stk3_3_title');
            $table->text('stk3_4_title');
            $table->text('stk3_5_title');
            $table->integer('weight');
            $table->integer('stk1_weight');
            $table->integer('stk2_weight');
            $table->integer('stk3_weight');
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
		Schema::drop('st_criteria');
	}

}
