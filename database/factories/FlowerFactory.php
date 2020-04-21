<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Cheeba\Flower;
use Faker\Generator as Faker;

$factory->define(Flower::class, function (Faker $faker) {
    return [
        'image_id' => $faker->numberBetween(1,6),
        'strain_id' => $faker->numberBetween(1,6),
        'image' => 'https://picsum.photos/' .  '640',
        'name'=> $faker->unique()->name(),
        'description'=> $faker->paragraph(),
        'published' => $faker->boolean,
        'available' => $faker->boolean,
        'harvest_date' =>$faker->date(now(days(-21)))
    ];
});
