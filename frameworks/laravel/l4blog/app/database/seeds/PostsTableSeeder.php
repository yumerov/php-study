<?php

use Carbon\Carbon as Carbon;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    protected function saveImage()
    {
        $toAddImage = (rand(1, 5) === 1);
        if ($toAddImage) {
            try {
                $source = 'http://lorempixel.com/640/400/cats/';
                $dir = public_path() . '/uploads/';
                $name = uniqid(rand(), true) . '.jpg';
                file_put_contents(
                    "{$dir}/{$name}",
                    file_get_contents($source)
                );

                $image = "/uploads/{$name}";
            } catch (Exception $ex) {
                $image = null;
            }
        } else {
            $image = null;
        }

        return $image;
    }

    protected function deleteAllFiles()
    {
        $dir = public_path() . '/uploads/';
        $files = File::allFiles($dir);

        foreach ($files as $file) {
            File::delete("{$file}");
        }
    }

    public function run()
    {
        $faker = Faker::create();
        $categories = Category::lists('id');
        $users = User::lists('id');
        $this->deleteAllFiles();

        foreach (range(1, 25) as $index) {
            Post::create([
                'title' => $faker->sentence(),
                'image' => $this->saveImage(),
                'body' => $faker->text(),
                'author_id' => $faker->randomElement($users),
                'category_id' => $faker->randomElement($categories),
                'created_at' => Carbon::now()
                    ->month(rand(1, 10))->day(rand(1, 25))->toDateTimeString(),
                'updated_at' => Carbon::now()
                    ->month(rand(1, 10))->day(rand(1, 25))->toDateTimeString(),
            ]);
        }
    }
}
