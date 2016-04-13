<?php

use Carbon\Carbon as Carbon;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        $categories = Category::lists('id');

        foreach (range(1, 25) as $index) {
            Post::create([
                'title' => $faker->sentence(),
                'body' => $faker->text(),
                'category_id' => $faker->randomElement($categories),
                'created_at' => Carbon::now()
                    ->month(rand(1, 10))->day(rand(1, 25))->toDateTimeString(),
                'updated_at' => Carbon::now()
                    ->month(rand(1, 10))->day(rand(1, 25))->toDateTimeString(),
            ]);
        }
    }

}
