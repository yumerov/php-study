<?php

use Carbon\Carbon as Carbon;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 25) as $index) {
            Post::create([
                'title' => $faker->sentence(),
                'body' => $faker->text(),
                'created_at' => Carbon::now()
                    ->month(rand(1, 10))->day(rand(1, 25))->toDateTimeString(),
                'updated_at' => Carbon::now()
                    ->month(rand(1, 10))->day(rand(1, 25))->toDateTimeString(),
            ]);
        }
    }

}
