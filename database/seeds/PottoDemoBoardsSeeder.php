<?php namespace database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PottoDemoBoardsSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		$boards = [
			[	'id' => 1,
				'name' => 'b',
				'description' => 'Random',
				'header_content' => '<h2><em>Some description or html block about the board.</em></h2><p class="board-description small">Some fine print indicating nothing important which nobody really reads.<br>Also nobody reads this line.</p>',
				'is_locked' => 0,
				'is_staff_only' => 0,
				'is_nsfw' => 0,
				'is_forced_anon' => 0,
				'pages' => 15,
				'section_id' => 2,
				'order_id' => 0,
				'max_replies' => 250,
				'max_upload_size' => 5 * 1024,
			],
		];

		DB::table('boards')->insert($boards);
		
        $this->command->info('User table seeded!');

	}

}