<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderProductAnomaliesTable extends Migration {

	public function up()
	{
		Schema::create('order_product_anomalies', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('order_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->integer('quantity')->unsigned();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('order_product_anomalies');
	}
}