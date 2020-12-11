<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('course_id')->nullable();
			$table->integer('user_id')->nullable();
			$table->timestamp('reg_date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('reg_status', 1)->nullable();
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
		Schema::drop('registers');
	}

}
