<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        //
        'name'   => $faker->word(),
        'status' => $faker->boolean(),
        'image'  => $faker->imageUrl(640, 480, 'technics'),
    ];
});
