<?php

use Faker\Generator as Faker;

$factory->define(Heisen\Profile::class, function (Faker $faker) {
    return [
        'avatar' => 'http://i.heisenbeans.com/images/heisenhead.png',
        'user_id' => $faker->numberBetween(1,6),
        'riu_username' => 'Uncle Buck',
        'user_title' => 'Seed Addict',
        'intagram_handle' => 'myspacetom',
        'facebook_url' => 'myspacetom'
    ];
});
