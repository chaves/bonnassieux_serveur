<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActorsTable extends Migration {

	public function up()
	{
		Schema::create('actors', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('actor', 255);
		});
	}

	public function down()
	{
		Schema::drop('actors');
	}
}