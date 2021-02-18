<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sections', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('section_name', 150)->nullable();
			$table->string('section_title', 250)->nullable();
			$table->integer('section_number')->nullable();
			$table->integer('course_id')->nullable();
			$table->integer('user_id')->nullable();
			$table->date('section_date')->nullable();
			$table->timestamp('section_create')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
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
		Schema::drop('sections');
	}

}
