<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTDecisionsTable extends Migration {

	public function up()
	{
		Schema::create('t_decisions', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('decision', 255);
		});
	}

	public function down()
	{
		Schema::drop('t_decisions');
	}
}