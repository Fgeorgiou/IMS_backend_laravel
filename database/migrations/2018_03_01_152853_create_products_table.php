<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->string('product_name', 50);
			$table->integer('unit_per_pack')->unsigned();
			$table->integer('unit_net_weight_gr')->unsigned();
			$table->integer('unit_gross_weight_gr')->unsigned();
			$table->integer('lead_days')->unsigned();
			$table->timestamps();
			$table->softDeletes();
			$table->integer('category_id')->unsigned();
			$table->integer('supplier_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}