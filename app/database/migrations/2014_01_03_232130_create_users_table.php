<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('email', 255)->unique();
			$table->string('password', 60);
			$table->enum('active', ['y', 'n'])->default('n');
			$table->enum('type', ['admin', 'user'])->default('user');
			$table->string('confirmation_hash', 128);
			$table->string('recovery_hash', 128);
			$table->datetime('last_seen');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
