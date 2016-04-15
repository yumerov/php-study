<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        $posts = Post::lists('id');

        foreach (range(1, 20) as $index) {
            Comment::create([
                'name' => $faker->words(rand(1, 3), true),
                'body' => $faker->sentences(rand(1, 5), true),
                'post_id' => $faker->randomElement($posts),
            ]);
        }
    }

}
