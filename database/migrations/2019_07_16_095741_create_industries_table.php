<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIndustriesTable extends Migration {

	public function up()
	{
		Schema::create('industries', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('industry', 255);
		});
	}

	public function down()
	{
		Schema::drop('industries');
	}
}