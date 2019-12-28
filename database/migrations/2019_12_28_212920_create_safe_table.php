<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSafeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('safe', function(Blueprint $table)
		{
			$table->integer('safe_id', true);
			$table->integer('travel_id')->nullable()->index('travel_id_with_cash');
			$table->integer('coust_id')->nullable()->index('cost_id_with_cash');
			$table->integer('payment_id')->nullable();
			$table->integer('partner_id')->nullable()->index('partner_id_with_cash');
			$table->integer('supp_id')->nullable()->index('supp_id_with_cash');
			$table->integer('type')->nullable();
			$table->float('cash', 10, 0)->nullable();
			$table->date('date')->nullable();
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
		Schema::drop('safe');
	}

}
