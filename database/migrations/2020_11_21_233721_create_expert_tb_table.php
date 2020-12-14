<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertTbTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expert_tb', function(Blueprint $table)
		{
			$table->integer(''expert_id'', true);
			$table->string(''expert_name'', 100)->nullable();
			$table->string(''expert_username'', 50)->nullable();
			$table->string(''expert_password'', 100)->nullable();
			$table->string(''expert_email'', 100)->nullable();
			$table->text('expert_skill')->nullable();
			$table->timestamp('expert_create')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string(''expert_status'', 1)->nullable()->default('1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('expert_tb');
	}

}
