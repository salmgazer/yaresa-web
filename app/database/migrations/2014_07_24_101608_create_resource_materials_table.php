<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResourceMaterialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resource_materials', function(Blueprint $table)
		{
			$table->integer('resource_id', true);
			$table->integer('resource_type')->nullable();
			$table->integer('resource_category_id')->nullable()->index('`category_id`');
			$table->text('content')->nullable();
			$table->text('description')->nullable();
			$table->string('tag', 30)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resource_materials');
	}

}
