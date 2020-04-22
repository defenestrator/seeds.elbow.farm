<?php

use Faker\Generator as Faker;

$factory->define(Cheeba\Image::class, function (Faker $faker) {
    return [
        'imageable_id'      => factory(Cheeba\Strain::class)->create(),
        'imageable_type'    => 'Cheeba\Strain',
        'large'             => 'https://picsum.photos/' .  '640',
        'small'             => 'https://picsum.photos/' . '400',
        'thumb'             => 'https://picsum.photos/'.  '200'
    ];
});
