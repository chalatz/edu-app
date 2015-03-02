<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvaluationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('evaluations', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('grader_id');
			$table->integer('site_id');

			$table->string('phase', 10);

			$table->integer('bk1_1')->default(0);
            $table->integer('bk1_2')->default(0);
            $table->integer('bk1_3')->default(0);
            $table->integer('bk1_4')->default(0);
            $table->integer('bk1_5')->default(0);
            $table->integer('bk2_1')->default(0);
            $table->integer('bk2_2')->default(0);
            $table->integer('bk2_3')->default(0);
            $table->integer('bk2_4')->default(0);
            $table->integer('bk2_5')->default(0);
            $table->integer('bk3_1')->default(0);
            $table->integer('bk3_2')->default(0);
            $table->integer('bk3_3')->default(0);
            $table->integer('bk3_4')->default(0);
            $table->integer('bk3_5')->default(0);

			$table->integer('gk1_1')->default(0);
			$table->integer('gk1_2')->default(0);
			$table->integer('gk1_3')->default(0);
			$table->integer('gk1_4')->default(0);
			$table->integer('gk1_5')->default(0);
			$table->integer('gk2_1')->default(0);
			$table->integer('gk2_2')->default(0);
			$table->integer('gk2_3')->default(0);
			$table->integer('gk2_4')->default(0);
			$table->integer('gk2_5')->default(0);
			$table->integer('gk3_1')->default(0);
			$table->integer('gk3_2')->default(0);
			$table->integer('gk3_3')->default(0);
			$table->integer('gk3_4')->default(0);
			$table->integer('gk3_5')->default(0);
			$table->integer('gk4_1')->default(0);
			$table->integer('gk4_2')->default(0);
			$table->integer('gk4_3')->default(0);
			$table->integer('gk4_4')->default(0);
			$table->integer('gk4_5')->default(0);
			$table->integer('gk5_1')->default(0);
			$table->integer('gk5_2')->default(0);
			$table->integer('gk5_3')->default(0);
			$table->integer('gk5_4')->default(0);
			$table->integer('gk5_5')->default(0);

			$table->integer('dk1_1')->default(0);
			$table->integer('dk1_2')->default(0);
			$table->integer('dk1_3')->default(0);
			$table->integer('dk1_4')->default(0);
			$table->integer('dk1_5')->default(0);
			$table->integer('dk2_1')->default(0);
			$table->integer('dk2_2')->default(0);
			$table->integer('dk2_3')->default(0);
			$table->integer('dk2_4')->default(0);
			$table->integer('dk2_5')->default(0);
			$table->integer('dk3_1')->default(0);
			$table->integer('dk3_2')->default(0);
			$table->integer('dk3_3')->default(0);
			$table->integer('dk3_4')->default(0);
			$table->integer('dk3_5')->default(0);
			$table->integer('dk4_1')->default(0);
			$table->integer('dk4_2')->default(0);
			$table->integer('dk4_3')->default(0);
			$table->integer('dk4_4')->default(0);
			$table->integer('dk4_5')->default(0);
			$table->integer('dk5_1')->default(0);
			$table->integer('dk5_2')->default(0);
			$table->integer('dk5_3')->default(0);
			$table->integer('dk5_4')->default(0);
			$table->integer('dk5_5')->default(0);

			$table->integer('ek1_1')->default(0);
            $table->integer('ek1_2')->default(0);
            $table->integer('ek1_3')->default(0);
            $table->integer('ek1_4')->default(0);
            $table->integer('ek1_5')->default(0);
            $table->integer('ek2_1')->default(0);
            $table->integer('ek2_2')->default(0);
            $table->integer('ek2_3')->default(0);
            $table->integer('ek2_4')->default(0);
            $table->integer('ek2_5')->default(0);

            $table->integer('stk1_1')->default(0);
			$table->integer('stk1_2')->default(0);
			$table->integer('stk1_3')->default(0);
			$table->integer('stk1_4')->default(0);
			$table->integer('stk1_5')->default(0);
			$table->integer('stk2_1')->default(0);
			$table->integer('stk2_2')->default(0);
			$table->integer('stk2_3')->default(0);
			$table->integer('stk2_4')->default(0);
			$table->integer('stk2_5')->default(0);
			$table->integer('stk3_1')->default(0);
			$table->integer('stk3_2')->default(0);
			$table->integer('stk3_3')->default(0);
			$table->integer('stk3_4')->default(0);
			$table->integer('stk3_5')->default(0);

			$table->integer('beta_grade')->default(0);
			$table->integer('gama_grade')->default(0);
			$table->integer('delta_grade')->default(0);
			$table->integer('epsilon_grade')->default(0);
			$table->integer('st_grade')->default(0);

			$table->integer('total_grade')->default(0);

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
		Schema::drop('evaluations');
	}

}
