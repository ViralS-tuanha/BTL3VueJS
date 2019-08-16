<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Store;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Store::class, function (Faker $faker) {
    return [
        'code' => Str::random(5),
        'name' => $faker->name,
        'address' => $faker->address,
    ];
});
