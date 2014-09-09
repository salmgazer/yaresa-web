<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVaccineRecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vaccine_records', function(Blueprint $table)
		{
			$table->string('vaccine_rec_id', 30)->primary();
			$table->integer('vaccine_id')->nullable();
			$table->string('community_member_id', 30)->nullable();
			$table->date('vaccine_date')->nullable();
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
		Schema::drop('vaccine_records');
	}

}
