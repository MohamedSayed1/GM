<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('payment', function(Blueprint $table)
		{
			$table->foreign('id_partner', 'Partner_Pay_id')->references('partner_id')->on('partner')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_travel', 'Travel_Payment_id')->references('travel_id')->on('travel')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_sub', 'sub_pay_id')->references('subscribe_id')->on('subscribe')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('payment', function(Blueprint $table)
		{
			$table->dropForeign('Partner_Pay_id');
			$table->dropForeign('Travel_Payment_id');
			$table->dropForeign('sub_pay_id');
		});
	}

}
