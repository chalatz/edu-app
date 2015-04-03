<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddSiteCommentFieldToEvaluationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('evaluations', function(Blueprint $table)
		{
                  
      		$table->dateTime('assigned_at')->default('2015-01-01 10:00:00');

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
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('evaluations', function(Blueprint $table)
		{
			$table->dropColumn('assigned_at');

                  $table->dropColumn('total_grade');

                  $table->dropColumn('bk1_comment');
                  $table->dropColumn('bk2_comment');
                  $table->dropColumn('bk3_comment');


                  $table->dropColumn('gk1_comment');
                  $table->dropColumn('gk2_comment');
                  $table->dropColumn('gk3_comment');
                  $table->dropColumn('gk4_comment');
                  $table->dropColumn('gk5_comment');

                  $table->dropColumn('dk1_comment');
                  $table->dropColumn('dk2_comment');
                  $table->dropColumn('dk3_comment');
                  $table->dropColumn('dk4_comment');
                  $table->dropColumn('dk5_comment');

                  $table->dropColumn('ek1_comment');
                  $table->dropColumn('ek2_comment');

                  $table->dropColumn('stk1_comment');
                  $table->dropColumn('stk2_comment');
                  $table->dropColumn('stk3_comment');

                  $table->dropColumn('beta_comment');
                  $table->dropColumn('gama_comment');
                  $table->dropColumn('delta_comment');
                  $table->dropColumn('epsilon_comment');
                  $table->dropColumn('st_comment');
		});
	}

}
