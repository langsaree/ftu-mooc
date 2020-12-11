<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewCourseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('review_course', function(Blueprint $table)
		{
			$table->integer('review_id', true);
			$table->integer('review_course')->nullable();
			$table->string('review_name', 200)->nullable();
			$table->text('review_detail')->nullable();
			$table->float('review_score', 10, 0)->nullable();
			$table->integer('review_student')->nullable();
			$table->integer('review_instructor')->nullable();
			$table->timestamp('review_create')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('review_status', 1)->nullable()->default('0');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('review_course');
	}

}
