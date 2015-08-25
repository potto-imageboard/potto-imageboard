<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUploadsTable extends Migration {

	public function up()
	{
		Schema::create('uploads', function(Blueprint $table) {

			// set true for auto increment
			$table->integer('id', true);

			$table->boolean('is_nsfw');

			$table->string('file_name', 255);
			$table->string('file_thumb', 255);
			$table->string('file_sha1', 20);
			$table->string('file_type', 20);
			$table->string('file_original', 255);

			// set 2nd parameter to false for no auto increment
			$table->integer('file_size', false, 20);

			$table->smallInteger('image_w', false, 5);
			$table->smallInteger('image_h', false, 5);
			$table->smallInteger('thumb_w', false, 5);
			$table->smallInteger('thumb_h', false, 5);

			$table->timestamps();
			$table->softDeletes();

		});
	}

	public function down()
	{
		Schema::drop('uploads');
	}
}