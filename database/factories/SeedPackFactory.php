<?php

use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

$factory->define(Seeds\SeedPack::class, function (Faker $faker) {

    $qty = $faker->numberBetween(6,36);
    return [
        'uuid'          => $faker->uuid,
        'strain_id'     => $faker->numberBetween(1,6),
        'qty_per_pack'  => $qty,
        'price'         =>  $qty * 10,
        'inventory' => $faker->numberBetween(0,100)

    ];
});
