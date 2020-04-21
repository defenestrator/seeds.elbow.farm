<?php

use Faker\Generator as Faker;

$factory->define(Seeds\Profile::class, function (Faker $faker) {
    return [
        'avatar' => 'http://i.thecheebashack.com/images/heisenhead.png',
        'user_id' => $faker->numberBetween(1,6),
        'riu_username' => 'Uncle Buck',
        'user_title' => 'Seed Addict',
        'instagram_handle' => 'myspacetom',
        'facebook_url' => 'myspacetom',
        'chuckers_paradise' => 'Uncle Buck'
    ];
});
