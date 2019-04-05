<?php

use Faker\Generator as Faker;

$factory->define(Heisen\Image::class, function (Faker $faker) {
    return [
        'id'            => $faker->unique->numberBetween(1,15),
        'imageable_id' => $faker->numberBetween(1,6),        'imageable_type'    => 'Heisen\Strain',
        'large'         => $faker->imageUrl(1280, 1280),
        'small'         => $faker->imageUrl(640, 640),
        'thumb'         => $faker->imageUrl(200, 200)
    ];
});
