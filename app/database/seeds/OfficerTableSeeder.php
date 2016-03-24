<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class OfficerTableSeeder extends Seeder {

	public function run()
	{
		DB::table('officer')->delete();
		$officer= array(
			[
			'ps_id' => 101,
			'name' => 'Ashrafur Rahman',
			'email' => 'Ashrafur@mail.com',
			'phone_number' => '01877777777',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			],

			[
			'ps_id' => 101,
			'name' => 'Moin mia',
			'email' => 'Moin@mail.com',
			'phone_number' => '01866666666',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			],

			[
			'ps_id' => 101,
			'name' => 'Rafiq hasan',
			'email' => 'Rafiq@mail.com',
			'phone_number' => '01855555555',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			]
			);
		DB::table('officer')->insert($officer);
	}

}