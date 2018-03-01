<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesProductsTable extends Migration {

	public function up()
	{
		Schema::create('sales_products', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('sale_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->integer('quantity')->unsigned();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('sales_products');
	}
}