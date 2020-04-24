<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Shoreline\Flower;
use Faker\Generator as Faker;

$factory->define(Flower::class, function (Faker $faker) {
    return [
        'strain_id' => factory(Shoreline\Strain::class)->create(),
        'description'=> $faker->paragraph(),
        'published' => $faker->boolean,
        'available' => $faker->boolean,
        'price_per_gram' => $faker->numberBetween(5,15),
        'inventory_grams' => $faker->numberBetween(0,454),
        'harvest_date' =>$faker->date(now()->subDays(21))
    ];
});
