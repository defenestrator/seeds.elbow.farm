<?php

use Faker\Generator as Faker;

$factory->define(Heisen\Strain::class, function (Faker $faker) {
    return [
        'breeder_id' => $faker->numberBetween(1,2),
        'seed_type_id' => $faker->numberBetween(1,3),
        'name'=> $faker->unique()->name(),
        'image'=> $faker->imageUrl(),
        'genetics'=> $faker->sentence(),
        'description'=> $faker->paragraph(),
        'retail_price'=> $faker->numberBetween(4000,20000),
        'flowering_time_min_weeks'=> $faker->numberBetween(6,8),
        'flowering_time_max_weeks'=> $faker->numberBetween(8,12),
    ];
});
