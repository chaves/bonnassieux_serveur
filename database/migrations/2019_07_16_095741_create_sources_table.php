<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSourcesTable extends Migration {

	public function up()
	{
		Schema::create('sources', function(Blueprint $table) {
			$table->increments('id');
            $table->date('date');
            $table->text('source');
			$table->integer('location_id')->unsigned()->default(0)->index();
			$table->integer('industry_id')->unsigned()->default(0)->index();
			$table->integer('t_case_id')->unsigned()->default(0)->index();
			$table->integer('t_decision_id')->unsigned()->default(0)->index();
		});
	}

	public function down()
	{
		Schema::drop('sources');
	}
}