<?php

use Faker\Generator as Faker;

$factory->define(App\Click::class, function (Faker $faker) {
    return [
        'referrer' => $faker->domainName
    ];
});
