<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoiceTbTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('choice_tb', function(Blueprint $table)
		{
			$table->integer('choice_id', true);
			$table->integer('choice_question')->nullable()->index('choice_question');
			$table->text('choice_name')->nullable();
			$table->string('choice_low', 1)->nullable();
			$table->timestamp('choice_create')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('choice_tb');
	}

}
