<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateThreadsTable extends Migration {

	public function up()
	{
		Schema::create('threads', function(Blueprint $table) {

			$table->increments('id');

			$table->integer('board_id');
			$table->integer('upload_id');

			$table->integer('post_get');
			// uploaded image is spoiler?
			$table->boolean('is_spoiler')->default(0);

			$table->boolean('is_pinned')->default(0);
			$table->boolean('is_locked')->default(0);
			$table->boolean('is_archived')->default(0);

			$table->string('name');
			$table->string('tripcode');
			$table->string('subject')->default('');
			$table->text('content');

			$table->bigInteger('ip');

			$table->timestamps();
			$table->softDeletes();

		});
	}

	public function down()
	{
		Schema::drop('threads');
	}
}