<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionCourseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('question_course', function(Blueprint $table)
		{
			$table->integer(''question_id'', true);
			$table->text('question_name')->nullable();
			$table->integer('question_student')->nullable();
			$table->integer('question_course')->nullable();
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
		Schema::drop('question_course');
	}

}
