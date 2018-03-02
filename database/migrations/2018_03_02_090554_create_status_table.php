<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStatusTable extends Migration {

	public function up()
	{
		Schema::create('status', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 20);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('status');
	}
}