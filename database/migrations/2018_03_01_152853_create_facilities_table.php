<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFacilitiesTable extends Migration {

	public function up()
	{
		Schema::create('facilities', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 50);
			$table->string('email', 50)->unique();
			$table->string('address', 120);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('facilities');
	}
}