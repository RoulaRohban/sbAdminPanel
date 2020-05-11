<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 1000000.0),
        'quantity' => $faker->randomNumber(),
        'available' =>$faker->boolean,
    ];
});
