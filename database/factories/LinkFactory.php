<?php

use Faker\Generator as Faker;

$factory->define(App\Link::class, function (Faker $faker) {
    return [
        'long_url' => $faker->url,
        'hash' => str_random(4),
        'domain' => env('APP_URL')
    ];
});
