<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommunitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('communities', function(Blueprint $table)
		{
			$table->integer('community_id')->primary();
			$table->text('community_name')->nullable();
			$table->integer('subdistrict_id')->nullable();
			$table->text('latitude')->nullable();
			$table->text('longitude')->nullable();
			$table->integer('population')->nullable();
			$table->integer('household')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('communities');
	}

}
