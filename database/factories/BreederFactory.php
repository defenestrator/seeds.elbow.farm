<?php

use Faker\Generator as Faker;

$factory->define(Seeds\Breeder::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName(),
        'description' => $faker->sentence(),
        'image' => 'https://picsum.photos/' .  '640'
    ];
});
