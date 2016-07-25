<?php

/**
 * @author Levent Yumerov <yumerov.levent@gmail.com>
 */
class Dog extends \Eloquent
{
    use SearchableTrait;

    protected $fillable = ['name', 'description', 'breed_id'];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'dogs.name' => 10,
            'dogs.description' => 10,
            'dog_breeds.name' => 20,
            'dog_breeds.description' => 20,
        ],
        'joins' => [
            'dog_breeds' => ['dog_breeds.id','dogs.breed_id'],
        ],
    ];

    public function dog_breed()
    {
        return $this->belongsTo('DogBreed');
    }
}