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
			$table->string('type', 300)->nullable();
			$table->integer('count_of_travel')->nullable();
			$table->float('prices', 10, 0)->nullable();
			$table->float('total', 10, 0)->nullable();
			$table->float('current_paid', 10, 0)->nullable();
			$table->boolean('paid')->default(0);
			$table->text('desc', 65535)->nullable();
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
