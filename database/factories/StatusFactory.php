<?php

use Faker\Generator as Faker;

$factory->define(English\Status::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory('English\User')->create()->id;
        },
        'body' => $faker->realText($maxNbChars = 500, $indexSize = 2),
    ];
});
