<?php

# Result of "php artisan generate:scaffold navigation"

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class NavigationsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Navigation::create([

			]);
		}
	}

}