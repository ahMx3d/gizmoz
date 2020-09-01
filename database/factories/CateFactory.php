<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cate;
use Faker\Generator as Faker;

$factory->define(Cate::class, function (Faker $faker) {
    return [
        //
        'name'      => $faker->word(),
        'slug'      => $faker->slug(),
        'status'    => $faker->boolean(),
    ];
});
