<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AreaTableSeeder extends Seeder {

	public function run()
	{
		DB::table('area')->delete();
		$areas = array(
			[
			'ps_id' => 101,
			'ps_name' => 'Jalalabad',
			'area_name' => 'Pathantula',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			],

			[
			'ps_id' => 101,
			'ps_name' => 'Jalalabad',
			'area_name' => 'Akhalia',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			],

			[
			'ps_id' => 101,
			'ps_name' => 'Jalalabad',
			'area_name' => 'Surma',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			],

			[
			'ps_id' => 101,
			'ps_name' => 'Jalalabad',
			'area_name' => 'Varsity Gate',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			],

			[
			'ps_id' => 101,
			'ps_name' => 'Jalalabad',
			'area_name' => 'Tuker Bajar',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			],

			[
			'ps_id' => 102,
			'ps_name' => 'Kotwali',
			'area_name' => 'Noyashorok',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			],

			[
			'ps_id' => 102,
			'ps_name' => 'Kotwali',
			'area_name' => 'Bondor',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			],

			[
			'ps_id' => 102,
			'ps_name' => 'Kotwali',
			'area_name' => 'Amberkhana',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			],

			[
			'ps_id' => 102,
			'ps_name' => 'Kotwali',
			'area_name' => 'Zindabazar',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			]
			);
		DB::table('area')->insert($areas);
	}

}