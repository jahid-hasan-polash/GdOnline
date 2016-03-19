<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class OfficerTableSeeder extends Seeder {

	public function run()
	{
		DB::table('officer')->delete();
		$officer= array(
			[
			'name' => 'Ashrafur Rahman',
			'email' => 'Ashrafur@mail.com',
			'phone_number' => '01877777777',
			'password' => Hash::make('Ashrafur'),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			],

			[
			'name' => 'Moin mia',
			'email' => 'Moin@mail.com',
			'phone_number' => '01866666666',
			'password' => Hash::make('Moin'),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			],

			[
			'name' => 'Rafiq hasan',
			'email' => 'Rafiq@mail.com',
			'phone_number' => '01855555555',
			'password' => Hash::make('Rafiq'),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			]
			);
		DB::table('officer')->insert($officer);
	}

}