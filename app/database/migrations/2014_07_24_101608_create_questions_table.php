<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function(Blueprint $table)
		{
			$table->string('q_id', 30)->primary();
			$table->text('q_content')->nullable();
			$table->integer('category_id')->nullable()->index('`category_id`');
			$table->integer('cho_id')->nullable()->index('`cho_id`');
			$table->dateTime('question_date')->nullable();
			$table->string('guid', 36)->nullable()->unique('`guid`');
			$table->integer('rec_state')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('questions');
	}

}
