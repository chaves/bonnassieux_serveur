<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActorSourceTable extends Migration {

	public function up()
	{
		Schema::create('actor_source', function(Blueprint $table) {
			$table->timestamps();
			$table->integer('actor_id')->unsigned()->index();
			$table->integer('source_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('actor_source');
	}
}