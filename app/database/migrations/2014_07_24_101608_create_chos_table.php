<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chos', function(Blueprint $table)
		{
			$table->integer('cho_id')->primary();
			$table->text('cho_name')->nullable();
			$table->integer('subdistrict_id')->nullable();
			$table->string('password', 32);
			$table->string('username', 30);
			$table->integer('supervisor_id');
			$table->integer('userlevel');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chos');
	}

}
