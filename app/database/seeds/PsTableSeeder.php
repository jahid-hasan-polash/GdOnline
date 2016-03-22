<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('ps')->delete();
		$records= array(
			[
				'id' => 101,
				'ps_name' => 'Jalalabad'
			],

			[
				'id' => 102,
				'ps_name' => 'Kotowali'
			]
			);
		DB::table('ps')->insert($records);
	}

}