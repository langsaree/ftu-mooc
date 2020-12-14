<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lectures', function(Blueprint $table)
		{
			$table->integer(''id'', true);
			$table->string(''lecture_name'', 250)->nullable();
			$table->integer('lecture_number')->nullable();
			$table->string(''lecture_file'', 100)->nullable()->comment('เก็บ file');
			$table->string('pdf')->nullable();
			$table->string('ppt')->nullable();
			$table->string('mp4')->nullable();
			$table->string('youtube')->nullable();
			$table->string(''lecture_link'', 100)->nullable()->comment('เก็บ link');
			$table->text('lecture_article')->nullable()->comment('เก็บแบบ บทความ');
			$table->string(''lecture_type'', 10)->nullable();
			$table->float(''lecture_size'', 10, 0)->nullable();
			$table->string(''lecture_preview'', 1)->nullable()->comment('1');
			$table->integer('section_id')->nullable();
			$table->text('lecture_comment')->nullable();
			$table->integer('user_id')->nullable();
			$table->timestamp('lecture_create')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string(''lecture_status'', 1)->nullable()->default('1');
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
		Schema::drop('lectures');
	}

}
