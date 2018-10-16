<?php

use Faker\Generator as Faker;

$factory->define(App\Entities\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->biasedNumberBetween(300, 5000)
    ];
});
