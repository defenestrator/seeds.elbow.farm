<?php

use Faker\Generator as Faker;

$factory->define(Heisen\Breeder::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName(),
        'description' => $faker->sentence(),
        'image' => $faker->imageUrl()
    ];
});
