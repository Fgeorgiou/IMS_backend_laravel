<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuppliersTable extends Migration {

	public function up()
	{
		Schema::create('suppliers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 20);
			$table->string('email', 50);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('suppliers');
	}
}