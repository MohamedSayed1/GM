<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment', function(Blueprint $table)
		{
			$table->integer('pay_id', true);
			$table->integer('id_sub')->nullable()->index('sub_pay_id');
			$table->integer('id_travel')->nullable()->index('Travel_Payment_id');
			$table->integer('id_partner')->nullable()->index('Partner_Pay_id');
			$table->float('dues', 10, 0)->nullable();
			$table->float('pay_new', 10, 0)->nullable();
			$table->float('remaining_payment', 10, 0)->nullable();
			$table->date('date')->nullable();
			$table->dateTime('created-at')->nullable();
			$table->dateTime('updated_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payment');
	}

}
