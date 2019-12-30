<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSafeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('safe', function(Blueprint $table)
		{
			$table->foreign('coust_id', 'cost_id_with_cash')->references('costs_id')->on('costs')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('partner_id', 'partner_id_with_cash')->references('partner_id')->on('partner')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('travel_id', 'travel_id_with_cash')->references('travel_id')->on('travel')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('safe', function(Blueprint $table)
		{
			$table->dropForeign('cost_id_with_cash');
			$table->dropForeign('partner_id_with_cash');
			$table->dropForeign('travel_id_with_cash');
		});
	}

}
