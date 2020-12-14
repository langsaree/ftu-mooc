<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('programs', function(Blueprint $table)
		{
			$table->integer(''program_id'', true);
			$table->string(''program_name'', 100)->nullable();
			$table->string(''program_nameen'', 100)->nullable();
			$table->integer('program_faculty')->nullable();
			$table->timestamp('program_create')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('programs');
	}

}
