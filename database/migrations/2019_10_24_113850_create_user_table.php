<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('username', 300)->nullable();
			$table->string('password', 300)->nullable();
			$table->string('name', 300)->nullable();
			$table->boolean('is_actvie')->nullable();
			$table->integer('group_id')->nullable()->index('User_gorup_id_idx');
			$table->string('remember_token', 250)->nullable();
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
		Schema::drop('user');
	}

}
