<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerCourseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('answer_course', function(Blueprint $table)
		{
			$table->integer('answer_id', true);
			$table->text('answer_name')->nullable();
			$table->integer('answer_question')->nullable();
			$table->timestamp('answer_create')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('answer_student')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('answer_course');
	}

}
