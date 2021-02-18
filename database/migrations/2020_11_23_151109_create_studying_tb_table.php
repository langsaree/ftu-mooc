<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyingTbTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('studying_tb', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('lecture_id');
			$table->integer('user_id');
			$table->time('studying_time')->nullable();
			$table->timestamp('studying_create')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('course_id')->nullable();
			$table->timestamps(10);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('studying_tb');
	}

}
