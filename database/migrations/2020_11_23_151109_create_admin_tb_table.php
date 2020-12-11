<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTbTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin_tb', function(Blueprint $table)
		{
			$table->integer('admin_id', true);
			$table->string('admin_name', 50)->nullable();
			$table->string('admin_username', 50)->nullable();
			$table->string('admin_password', 70)->nullable();
			$table->string('admin_status', 1)->nullable()->default('1');
			$table->timestamp('admin_create')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('admin_tb');
	}

}
