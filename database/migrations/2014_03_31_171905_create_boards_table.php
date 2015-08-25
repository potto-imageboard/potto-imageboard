<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBoardsTable extends Migration {

	public function up()
	{
		Schema::create('boards', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('section_id');


			$table->integer('current_post_get')->default('1');

			$table->string('name', 50);
			$table->string('description', 255);
			$table->text('header_content');

			$table->integer('max_replies')->default('200');
			$table->integer('max_upload_size')->default('1337');
			$table->string('default_name')->default('Anonymous');


			$table->boolean('is_nsfw');
			$table->boolean('is_locked');
			$table->boolean('is_staff_only');
			$table->boolean('is_forced_anon');

			$table->tinyInteger('pages')->default('15');

			$table->integer('order_id');
			
		});
	}

	public function down()
	{
		Schema::drop('boards');
	}
}