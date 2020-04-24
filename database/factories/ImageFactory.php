<?php

use Faker\Generator as Faker;

$factory->define(Shoreline\Image::class, function (Faker $faker) {
    return [
        'imageable_id'      => factory(Shoreline\Strain::class)->create(),
        'imageable_type'    => 'Shoreline\Strain',
        'large'             => 'https://picsum.photos/' .  '640',
        'small'             => 'https://picsum.photos/' . '400',
        'thumb'             => 'https://picsum.photos/'.  '200'
    ];
});
