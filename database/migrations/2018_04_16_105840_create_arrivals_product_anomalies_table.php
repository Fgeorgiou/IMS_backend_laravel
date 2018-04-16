<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArrivalsProductAnomaliesTable extends Migration {

	public function up()
	{
		Schema::create('arrivals_product_anomalies', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('arrival_id')->unsigned();
			$table->integer('status_id')->unsigned();
			$table->string('product_barcode', 13);
			$table->integer('quantity')->unsigned();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('arrivals_product_anomalies');
	}
}