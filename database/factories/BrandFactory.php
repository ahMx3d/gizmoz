<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    $data = [
        'en' => [
            'name'  => $faker->word()
        ],
        'status'    => $faker->boolean(),
        'image'  => $faker->imageUrl(640, 480, 'technics'),
    ];

    $faker->addProvider(new \Faker\Provider\ar_JO\Person($faker));
    $data = data_set(
        $data,
        'ar.name',
        $faker->firstName()
    );

    return $data;
});
