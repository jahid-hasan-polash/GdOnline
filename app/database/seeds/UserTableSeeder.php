<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		$users = [
					[
								'n_id'		 => '123456789',
								'username'	 => 'Polash',
								'address'	 => 'Alipara',
								'phone'		 => '01929796984',
								'email'      => 'polash@mail.com',
								'password'   => Hash::make('12345'),
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s')
					]
		];

		DB::table('users')->insert($users);
	}

}