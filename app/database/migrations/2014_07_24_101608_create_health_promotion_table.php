<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHealthPromotionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('health_promotion', function(Blueprint $table)
		{
			$table->string('rec_no', 30)->primary();
			$table->date('date')->nullable();
			$table->string('venue', 30)->nullable();
			$table->integer('health_promotion_topic_category_id');
			$table->string('topic')->nullable();
			$table->integer('health_promotion_method_id')->nullable();
			$table->text('target_audience')->nullable();
			$table->integer('number_of_audience')->nullable();
			$table->text('remarks')->nullable();
			$table->integer('month_id')->nullable();
			$table->text('latitude')->nullable();
			$table->text('longitude')->nullable();
			$table->string('image', 30)->nullable();
			$table->integer('cho_id')->nullable();
			$table->integer('subdistrict_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('health_promotion');
	}

}
