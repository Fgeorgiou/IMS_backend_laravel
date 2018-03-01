<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolesTable extends Migration {

	public function up()
	{
		Schema::create('roles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('description', 20);
			$table->integer('access_level')->unsigned();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('roles');
	}
}