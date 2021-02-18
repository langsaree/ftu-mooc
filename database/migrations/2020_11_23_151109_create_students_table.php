<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id');
			$table->string('student_email', 100)->nullable();
			$table->string('student_password', 100)->nullable();
			$table->string('student_fullname', 100)->nullable();
			$table->string('student_nickname', 50)->nullable();
			$table->string('student_sex', 30)->nullable();
			$table->string('student_date', 30)->nullable();
			$table->string('student_edu', 30)->nullable();
			$table->text('student_address')->nullable();
			$table->text('student_reason')->nullable();
			$table->timestamp('student_create')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('student_status', 1)->nullable()->default('1');
			$table->string('student_picture', 100)->nullable();
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
		Schema::drop('students');
	}

}
