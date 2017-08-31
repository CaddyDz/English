<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Team Factory
|--------------------------------------------------------------------------
*/

$factory->define(English\Models\Team::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'name' => $faker->name
    ];
});
