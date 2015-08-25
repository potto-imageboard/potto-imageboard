<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');

			$table->integer('thread_id');
			$table->integer('upload_id');
			$table->integer('post_get');
			// uploaded image is spoiler?
			$table->boolean('is_spoiler');


			$table->string('name');
			$table->string('tripcode');
			$table->text('content');


			$table->bigInteger('ip');

			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}