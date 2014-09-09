<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpdCasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('opd_cases', function(Blueprint $table)
		{
			$table->integer('opd_case_id')->primary();
			$table->text('opd_case_name')->nullable();
			$table->integer('opd_case_category')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('opd_cases');
	}

}
