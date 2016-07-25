<?php

/**
 * @author Levent Yumerov <yumerov.levent@gmail.com>
 */
class DogsTableSeeder extends Seeder
{

    protected $data = [
        'breeds' => [
            'Husky' => 'Cute wolf',
            'Beagle' => 'Cute hunger helper'
        ],
        'dogs' => [
            'Luke' => [
                'description' => 'White and big.',
                'breed_id' => 1,
            ],
            'Thor' => [
                'description' => 'Black wolf with blue eyes.',
                'breed_id' => 1,
            ],
            'Monster' => [
                'description' => 'Chehul destroyer.',
                'breed_id' => 2,
            ]
        ],
    ]; # protected $data

    public function run()
    {
        foreach ($this->data['breeds'] as $name => $description) {
            DogBreed::create(compact('name', 'description'));
        }

        foreach ($this->data['dogs'] as $name => $data) {
            Dog::create([
                'name' => $name,
                'description' => $data['description'],
                'breed_id' => $data['breed_id'],
            ]);
        }
    } # public function run()

}