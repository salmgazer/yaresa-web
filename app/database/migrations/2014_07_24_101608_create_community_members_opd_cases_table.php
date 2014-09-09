<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommunityMembersOpdCasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('community_members_opd_cases', function(Blueprint $table)
		{
			$table->string('rec_no', 30)->primary();
			$table->string('community_member_id', 30)->nullable();
			$table->integer('opd_case_id')->nullable();
			$table->integer('cho_id')->nullable();
			$table->dateTime('rec_date')->nullable();
			$table->integer('server_rec_no')->nullable();
			$table->integer('rec_state')->nullable();
			$table->boolean('lab')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('community_members_opd_cases');
	}

}
