<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();
		DB::table('role')->delete();

		$users = [
					[
								'n_id'		 => '123456799',
								'username'	 => 'Super Admin',
								'address'	 => 'Police',
								'phone'		 => '01929796984',
								'email'      => 'superadmin@mail.com',
								'password'   => Hash::make('12345'),
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s')
					],

					[
								'n_id'		 => '123789455',
								'username'	 => 'Polash',
								'address'	 => 'Alipara',
								'phone'		 => '01929796984',
								'email'      => 'polash@gmail.com',
								'password'   => Hash::make('12345'),
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s')
					]
		];

		$roles = [
					[
								'user_id' => 1 ,
								'role' => 4 , 
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s')
					],

					[
								'user_id' => 2 ,
								'role' => 0 ,
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s')
					]
		];

		DB::table('users')->insert($users);
		DB::table('role')->insert($roles);
	}

}