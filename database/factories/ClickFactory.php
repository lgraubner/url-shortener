<?php

use Faker\Generator as Faker;
use App\Models\Click;

$factory->define(Click::class, function (Faker $faker) {
    return [
        'referrer' => $faker->domainName
    ];
});
