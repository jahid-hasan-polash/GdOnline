<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class DefaultRangeTableSeeder extends Seeder {

	public function run()
	{
		DB::table('default_range')->delete();
		$ranges= array(

			[
				'short_range' => 'Sylhet South',
				'long_range' => 'SMP'
			],

			[
				'short_range' => 'Sylhet North',
				'long_range' => 'SMP'
			]
			);

		DB::table('default_range')->insert($ranges);
	}

}