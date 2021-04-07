<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instructors', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id');
			$table->string('instructor_name', 100)->nullable();
			$table->string('instructor_username', 100)->nullable();
			$table->string('instructor_password', 100)->nullable();
			$table->string('instructor_citicenid', 13)->nullable();
			$table->string('instructor_email', 100)->nullable();
			$table->string('instructor_phone', 15)->nullable();
			$table->date('instructor_birthday')->nullable();
			$table->string('instructor_skill', 250)->nullable();
			$table->text('instructor_edu')->nullable();
			$table->text('instructor_detail')->nullable();
			$table->string('instructor_status', 1)->nullable()->default('1');
			$table->string('instructor_approve', 1)->nullable()->default('1');
			$table->timestamp('instructor_create')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('instructor_pic', 50)->nullable();
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
		Schema::drop('instructors');
	}

}
