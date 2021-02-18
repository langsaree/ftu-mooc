<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTbTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('question_tb', function(Blueprint $table)
		{
			$table->integer('question_id', true);
			$table->integer('question_type')->nullable();
			$table->integer('question_instructor')->nullable();
			$table->integer('question_course')->nullable();
			$table->text('question_name')->nullable();
			$table->string('question_status')->nullable()->default('1');
			$table->timestamp('question_create')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('question_tb');
	}

}
