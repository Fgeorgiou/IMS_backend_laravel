<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArrivalsProductsTable extends Migration {

	public function up()
	{
		Schema::create('arrivals_products', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('arrival_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->integer('quantity')->unsigned();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('arrivals_products');
	}
}