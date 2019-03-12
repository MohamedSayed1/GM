<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('costs', function(Blueprint $table)
		{
			$table->integer('costs_id', true);
			$table->integer('travel_id')->nullable()->index('Travel_Costs_id_idx');
			$table->integer('type_id')->nullable()->index('Costs_Type_idx');
			$table->float('unit_price', 10, 0)->nullable();
			$table->integer('count')->nullable();
			$table->integer('currency_pound')->nullable()->index('pound_هي_idx');
			$table->float('total', 10, 0)->nullable();
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
		Schema::drop('costs');
	}

}
