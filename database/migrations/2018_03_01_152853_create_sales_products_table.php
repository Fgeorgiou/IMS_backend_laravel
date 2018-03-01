<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesProductsTable extends Migration {

	public function up()
	{
		Schema::create('sales_products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('product_id')->unsigned();
			$table->integer('sale_id')->unsigned();
			$table->integer('quantity')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('sales_products');
	}
}