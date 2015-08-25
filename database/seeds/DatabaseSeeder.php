<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

// add all seeds here
// run artisan config:clear after adding a new seed
use database\seeds\PottoDemoBoardsSeeder;
use database\seeds\PottoDemoSectionsSeeder;


class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call(PottoDemoSectionsSeeder::class);
		$this->call(PottoDemoBoardsSeeder::class);

	}

}
