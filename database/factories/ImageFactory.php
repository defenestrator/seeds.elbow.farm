<?php

use Faker\Generator as Faker;

$factory->define(Cheeba\Image::class, function (Faker $faker) {
    return [
        'id'            => $faker->unique->numberBetween(1,15),
        'imageable_id' => $faker->numberBetween(1,6),        'imageable_type'    => 'Cheeba\Strain',
        'large'         => 'https://picsum.photos/' .  '640',
        'small'         => 'https://picsum.photos/' . '400',
        'thumb'         => 'https://picsum.photos/'.  '200'
    ];
});
