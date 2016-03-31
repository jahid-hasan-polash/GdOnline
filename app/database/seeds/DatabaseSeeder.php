<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('PsTableSeeder');
		$this->call('AreaTableSeeder');
		$this->call('OfficerTableSeeder');
		$this->call('AdminRoleTableSeeder');
		$this->call('DefaultRangeTableSeeder');
	}

}
