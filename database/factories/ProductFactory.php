<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'code' => Str::random(5),
        'name' => $faker->name,
        'desc' => Str::random(20),

    ];
});
