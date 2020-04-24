<?php

use Faker\Generator as Faker;

$factory->define(Shoreline\Strain::class, function (Faker $faker) {
    return [
        'breeder_id' => $faker->numberBetween(1,2),
        'image_id' => $faker->numberBetween(1,6),
        'image' => 'https://picsum.photos/' .  '640',
        'name'=> $faker->unique()->name(),
        'genetics'=> $faker->word() . ' x ' . $faker->word,
        'description'=> $faker->paragraph(),
        'flowering_time_min_weeks'=> $faker->numberBetween(6,8),
        'flowering_time_max_weeks'=> $faker->numberBetween(8,12),
        'published' => $faker->boolean
    ];
});
