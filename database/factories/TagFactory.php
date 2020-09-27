<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tag;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    $data = [
        'en' => [
            'name'  => $faker->word()
        ],
        'slug'      => $faker->slug(),
    ];

    $faker->addProvider(new \Faker\Provider\ar_JO\Person($faker));
    $data = data_set(
        $data,
        'ar.name',
        $faker->firstName()
    );

    return $data;
});
