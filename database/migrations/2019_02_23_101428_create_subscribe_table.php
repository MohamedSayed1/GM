<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubscribeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subscribe', function(Blueprint $table)
		{
			$table->integer('subscribe_id', true);
			$table->integer('travel_id')->nullable()->index('Travel_ID_idx');
			$table->integer('partner_id')->nullable()->index('Partner_ID_idx');
			$table->integer('id_level')->nullable()->index('Level_idx');
			$table->integer('count_of_travel')->nullable();
			$table->integer('prices')->nullable();
			$table->integer('total')->nullable();
			$table->integer('current_paid')->nullable();
			$table->integer('remaining_payment')->nullable();
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
		Schema::drop('subscribe');
	}

}
