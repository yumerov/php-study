<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			User::create([
                'username' => $faker->word(),
                'display_name' => $faker->words(rand(1, 3), true),
                'password' => Hash::make('pass'),
			]);
		}
	}

}