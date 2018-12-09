<?php

use Faker\Generator as Faker;

$factory->define(English\Comment::class, function (Faker $faker) {
    return [
        'status_id' => function () {
            return factory('English\Status')->create()->id;
        },
        'user_id' => function () {
            return factory('English\User')->create()->id;
        },
        'body' => $faker->paragraph,
    ];
});
