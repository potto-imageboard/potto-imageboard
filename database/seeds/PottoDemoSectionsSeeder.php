<?php namespace database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PottoDemoSectionsSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		$sections = [
			['id' => 1, 'name' => 'SFW', 'description' => 'Safe For Work', 'order_id' => 1],
			['id' => 2, 'name' => 'NSFW', 'description' => 'Not Safe For Work', 'order_id' => 2],
			['id' => 3, 'name' => 'Meta', 'description' => 'Other Boards', 'order_id' => 3],
		];


		DB::table('sections')->insert($sections);

		$this->command->info('Sections table seeded!');

	}
}