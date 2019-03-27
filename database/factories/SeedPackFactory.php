<?php

use Faker\Generator as Faker;

$factory->define(Heisen\SeedPack::class, function (Faker $faker) {

    return [
        'strain_id' => $faker->numberBetween(1,6),
        'qty_per_pack' => 6,
        'price' => 60,
        'inventory' => $faker->numberBetween(0,100)
    ];
});
