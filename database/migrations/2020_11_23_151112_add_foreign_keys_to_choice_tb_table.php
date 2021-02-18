<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToChoiceTbTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('choice_tb', function(Blueprint $table)
		{
			$table->foreign('choice_question', 'choice_tb_ibfk_1')->references('question_id')->on('question_tb')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('choice_tb', function(Blueprint $table)
		{
			$table->dropForeign('choice_tb_ibfk_1');
		});
	}

}
