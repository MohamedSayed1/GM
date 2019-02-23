<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partner', function(Blueprint $table)
		{
			$table->integer('partner_id', true);
			$table->string('name', 300)->nullable();
			$table->string('phone', 300)->nullable();
			$table->text('address', 65535)->nullable();
			$table->string('mail', 300)->nullable();
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
		Schema::drop('partner');
	}

}
