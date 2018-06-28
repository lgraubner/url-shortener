<?php

use Faker\Generator as Faker;
use Tuupola\Base62Proxy as Base62;

$factory->define(App\Link::class, function (Faker $faker) {
    return [
        'long_url' => $faker->url,
        'hash' => Base62::encode($faker->unique()->randomDigit),
        'domain' => host(env('DEFAULT_SHORT_URL'))
    ];
});
