<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('costs', function(Blueprint $table)
		{
			$table->foreign('type_id', 'Costs_Type')->references('type_id')->on('type_of_costs')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('travel_id', 'Travel_Costs_id')->references('travel_id')->on('travel')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('currency_pound', 'pound_id')->references('currency_id')->on('currency_type')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('costs', function(Blueprint $table)
		{
			$table->dropForeign('Costs_Type');
			$table->dropForeign('Travel_Costs_id');
			$table->dropForeign('pound_id');
		});
	}

}
