<?php

use Faker\Generator as Faker;

$factory->define(Heisen\SeedType::class, function (Faker $faker) {
    $seedTypes = ['Femenized','Autoflower','Regular'];
    return [
        'name' => $faker->unique()->randomElement($seedTypes),
        'description' => $faker->sentence()
    ];
});
