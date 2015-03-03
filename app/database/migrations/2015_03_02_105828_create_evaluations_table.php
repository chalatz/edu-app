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

			$table->integer('grader_id')->default(0);
			$table->integer('site_id')->default(0);

			$table->string('phase', 10)->default('a');

			$table->integer('bk1')->default(0);
            $table->integer('bk2')->default(0);
            $table->integer('bk3')->default(0);
            

			$table->integer('gk1')->default(0);
            $table->integer('gk2')->default(0);
            $table->integer('gk3')->default(0);
            $table->integer('gk4')->default(0);
            $table->integer('gk5')->default(0);

            $table->integer('dk1')->default(0);
            $table->integer('dk2')->default(0);
            $table->integer('dk3')->default(0);
            $table->integer('dk4')->default(0);
            $table->integer('dk5')->default(0);

            $table->integer('ek1')->default(0);
            $table->integer('ek2')->default(0);

            $table->integer('stk1')->default(0);
            $table->integer('stk2')->default(0);
            $table->integer('stk3')->default(0);

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
