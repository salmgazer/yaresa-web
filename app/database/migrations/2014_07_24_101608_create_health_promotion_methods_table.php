<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHealthPromotionMethodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('health_promotion_methods', function(Blueprint $table)
		{
			$table->integer('health_promotion_method_id', true);
			$table->string('health_promotion_method', 30);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('health_promotion_methods');
	}

}
