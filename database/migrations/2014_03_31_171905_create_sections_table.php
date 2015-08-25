<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionsTable extends Migration {

	public function up()
	{
		Schema::create('sections', function(Blueprint $table) {
			$table->increments('id');

			$table->string('name');
			$table->string('description');

			$table->integer('order_id');
		});
	}

	public function down()
	{
		Schema::drop('sections');
	}
}