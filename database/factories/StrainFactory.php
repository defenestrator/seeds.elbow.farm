<?php

use Faker\Generator as Faker;

$factory->define(Heisen\Strain::class, function (Faker $faker) {
    return [
        'breeder_id' => $faker->numberBetween(1,2),
        'feminized' => $faker->boolean,
        'name'=> $faker->unique()->name(),
        'image'=> $faker->imageUrl(),
        'genetics'=> $faker->sentence(),
        'description'=> $faker->paragraph(),
        'retail_price'=> $faker->numberBetween(30,200),
        'flowering_time_min_weeks'=> $faker->numberBetween(6,8),
        'flowering_time_max_weeks'=> $faker->numberBetween(8,12),
        'qty_per_pack' => 12,
        'inventory' => 10,
        'published' => true
    ];
});
