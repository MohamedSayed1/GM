<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSubscribeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subscribe', function(Blueprint $table)
		{
			$table->foreign('partner_id', 'Partner_ID')->references('partner_id')->on('partner')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('travel_id', 'Travel_ID')->references('travel_id')->on('travel')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('subscribe', function(Blueprint $table)
		{
			$table->dropForeign('Partner_ID');
			$table->dropForeign('Travel_ID');
		});
	}

}
