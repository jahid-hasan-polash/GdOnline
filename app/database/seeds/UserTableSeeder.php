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
								'username'	 => 'Admin1',
								'address'	 => 'Police',
								'phone'		 => '01929796984',
								'email'      => 'admin1@mail.com',
								'password'   => Hash::make('12345'),
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s')
					],

					[
								'n_id'		 => '987654321',
								'username'	 => 'Admin2',
								'address'	 => 'Police',
								'phone'		 => '01929796984',
								'email'      => 'admin2@mail.com',
								'password'   => Hash::make('12345'),
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s')
					],

					[
								'n_id'		 => '123789456',
								'username'	 => 'Admin3',
								'address'	 => 'Police',
								'phone'		 => '01929796984',
								'email'      => 'admin3@mail.com',
								'password'   => Hash::make('12345'),
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s')
					],

					[
								'n_id'		 => '123789455',
								'username'	 => 'Polash',
								'address'	 => 'Police',
								'phone'		 => '01929796984',
								'email'      => 'polash@gmail.com',
								'password'   => Hash::make('12345'),
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s')
					]
		];

		DB::table('users')->insert($users);
	}

}