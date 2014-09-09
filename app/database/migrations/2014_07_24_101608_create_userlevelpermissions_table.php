<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserlevelpermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userlevelpermissions', function(Blueprint $table)
		{
			$table->integer('userlevelid');
			$table->string('tablename');
			$table->integer('permission');
			$table->primary(['userlevelid','tablename']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('userlevelpermissions');
	}

}
