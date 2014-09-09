<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('answers', function(Blueprint $table)
		{
			$table->integer('answer_id', true);
			$table->text('answer')->nullable();
			$table->integer('user_id')->nullable()->index('`user_id`');
			$table->string('question_id', 36)->nullable()->unique('`question_id`');
			$table->dateTime('answer_date')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('answers');
	}

}
