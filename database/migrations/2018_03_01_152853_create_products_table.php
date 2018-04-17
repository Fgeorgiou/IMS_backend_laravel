<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('category_id')->unsigned();
			$table->integer('supplier_id')->unsigned();
			$table->string('name', 50);
			$table->string('barcode', 20)->unique();
			$table->integer('unit_per_pack')->unsigned();
			$table->integer('unit_net_weight_gr')->unsigned();
			$table->integer('unit_gross_weight_gr')->unsigned();
			$table->integer('lead_days')->unsigned();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}