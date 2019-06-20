<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOutlayTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('outlay', function(Blueprint $table)
		{
			$table->integer('outlay_id', true);
			$table->string('outlay_name', 400)->nullable();
			$table->float('value', 10, 0)->nullable();
			$table->integer('count')->nullable()->default(1);
			$table->float('total', 10, 0)->nullable();
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
		Schema::drop('outlay');
	}

}
