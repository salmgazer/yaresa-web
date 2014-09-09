<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComunityMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comunity_members', function(Blueprint $table)
		{
			$table->string('community_member_id', 30)->primary();
			$table->integer('serial_no')->nullable();
			$table->integer('community_id')->nullable();
			$table->string('community_member_surname', 30)->nullable();
			$table->string('community_member_other_names', 30);
			$table->date('birthdate')->nullable();
			$table->string('gender', 1)->nullable();
			$table->string('card_no', 30)->nullable();
			$table->string('nhis_id', 30)->nullable();
			$table->date('nhis_expiry_date')->nullable();
			$table->integer('rec_state')->nullable();
			$table->integer('is_birthdate_confirmed')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comunity_members');
	}

}
