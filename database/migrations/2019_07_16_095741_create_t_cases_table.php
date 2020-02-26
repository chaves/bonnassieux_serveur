<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTCasesTable extends Migration {

	public function up()
	{
		Schema::create('t_cases', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('case', 255);
		});
	}

	public function down()
	{
		Schema::drop('t_cases');
	}
}