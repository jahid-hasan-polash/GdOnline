<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AdminRoleTableSeeder extends Seeder {

	public function run()
	{
		/*$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			AdminRole::create([

			]);
		}*/
		DB::table('admin_role')->delete();
		$role = array(
			[
			'name' => 'Admin1',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			],

			[
			'name' => 'Admin2',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			],

			[
			'name' => 'Admin3',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			]
			);
		DB::table('admin_role')->insert($role);
	}

}