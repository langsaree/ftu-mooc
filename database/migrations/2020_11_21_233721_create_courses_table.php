<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->integer(''id'', true);
			$table->integer('course_code')->nullable();
			$table->string(''course_name'', 250)->nullable();
			$table->string(''course_about'', 250)->nullable();
			$table->text('course_description')->nullable();
			$table->string(''course_languages'', 50)->nullable();
			$table->date('course_date')->nullable();
			$table->integer('group_id')->nullable()->comment('FR groups');
			$table->integer('course_pretest')->nullable()->comment('สอบก่อนเรียน');
			$table->integer('course_posttest')->nullable()->comment('สอบหลังเรียน');
			$table->integer('course_instructor')->nullable();
			$table->integer('user_id');
			$table->date('course_start')->nullable();
			$table->date('course_end')->nullable();
			$table->float(''course_price'', 10, 0)->nullable()->default(0);
			$table->string(''course_pic'', 50)->nullable()->default('rmumooc.jpg');
			$table->timestamp('course_create')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('course_specialist')->nullable();
			$table->dateTime('course_sentmail')->nullable();
			$table->text('course_comment')->nullable();
			$table->integer('course_result')->nullable()->comment('ผลจากผู้เชียวชาญ');
			$table->string(''course_status'', 1)->nullable()->default('1');
			$table->string(''course_approve'', 1)->nullable()->default('0');
			$table->dateTime('course_published')->nullable();
			$table->integer('faculty_id')->nullable();
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
		Schema::drop('courses');
	}

}
