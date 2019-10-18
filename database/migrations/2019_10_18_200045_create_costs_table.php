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
			$table->string('name_costs', 300)->nullable();
			$table->float('unit_price', 10, 0)->nullable();
			$table->integer('count')->nullable();
			$table->float('pound', 10, 0)->nullable()->default(1);
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
