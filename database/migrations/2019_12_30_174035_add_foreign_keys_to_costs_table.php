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
			$table->foreign('travel_id', 'Travel_Costs_id')->references('travel_id')->on('travel')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('supplier_id', 'suppliers_id')->references('su_id')->on('suppliers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
			$table->dropForeign('Travel_Costs_id');
			$table->dropForeign('suppliers_id');
		});
	}

}
