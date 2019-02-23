<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTravelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('travel', function(Blueprint $table)
		{
			$table->integer('travel_id', true);
			$table->string('travel_name', 300)->nullable();
			$table->date('start_day')->nullable();
			$table->date('end_day')->nullable();
			$table->string('transportaion', 300)->nullable();
			$table->string('hotel_name', 300)->nullable();
			$table->boolean('is_active')->nullable();
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
		Schema::drop('travel');
	}

}
