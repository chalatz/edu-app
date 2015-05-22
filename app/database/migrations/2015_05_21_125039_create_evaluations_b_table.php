<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvaluationsBTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('evaluations_b', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('grader_id')->default(0);
			$table->integer('site_id')->default(0);

			$table->string('phase', 10)->default('b');

			$table->string('can_evaluate', 10)->nullable()->default('na');
            $table->text('why_not')->nullable();

			$table->string('is_educational', 10)->nullable()->default('na');
            $table->text('why_not_educational')->nullable();

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

			$table->string('finalized', 10)->nullable()->default('na');
			$table->dateTime('finalized_at')->nullable();

			$table->dateTime('assigned_at')->default('2015-01-01 10:00:00');
			$table->dateTime('assigned_until')->default('2015-01-01 10:00:00');

			$table->text('site_comment')->nullable();

			$table->text('bk1_comment')->nullable();
			$table->text('bk2_comment')->nullable();
			$table->text('bk3_comment')->nullable();

			$table->text('gk1_comment')->nullable();
			$table->text('gk2_comment')->nullable();
			$table->text('gk3_comment')->nullable();
			$table->text('gk4_comment')->nullable();
			$table->text('gk5_comment')->nullable();

			$table->text('dk1_comment')->nullable();
			$table->text('dk2_comment')->nullable();
			$table->text('dk3_comment')->nullable();
			$table->text('dk4_comment')->nullable();
			$table->text('dk5_comment')->nullable();

			$table->text('ek1_comment')->nullable();
			$table->text('ek2_comment')->nullable();

			$table->text('stk1_comment')->nullable();
			$table->text('stk2_comment')->nullable();
			$table->text('stk3_comment')->nullable();

			$table->text('beta_comment')->nullable();
			$table->text('gama_comment')->nullable();
			$table->text('delta_comment')->nullable();
			$table->text('epsilon_comment')->nullable();
			$table->text('st_comment')->nullable();

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
		Schema::drop('evaluations_b');
	}

}
