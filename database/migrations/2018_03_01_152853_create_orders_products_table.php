<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersProductsTable extends Migration {

	public function up()
	{
		Schema::create('orders_products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('order_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->integer('quantity')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('orders_products');
	}
}