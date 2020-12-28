<?php

/*
|--------------------------------------------------------------------------
| Notification Factory
|--------------------------------------------------------------------------
*/

$factory->define(English\Models\Notification::class, function (Faker\Generator $faker) {
    return [
        'id'      => 1,
        'user_id' => 1,
        'flag'    => 'info',
        'uuid'    => 'lksjdflaskhdf',
        'title'   => 'Testing',
        'details' => 'Your car has been impounded!',
        'is_read' => 0,
    ];
});

/*
|--------------------------------------------------------------------------
| Feature Factory
|--------------------------------------------------------------------------
*/

$factory->define(English\Models\Feature::class, function (Faker\Generator $faker) {
    return [
        'id'        => 1,
        'key'       => 'user-signup',
        'is_active' => false,
    ];
});

/*
|--------------------------------------------------------------------------
| Activity Factory
|--------------------------------------------------------------------------
*/

$factory->define(English\Models\Activity::class, function (Faker\Generator $faker) {
    return [
        'id'          => 1,
        'user_id'     => 1,
        'description' => 'Standard User Activity',
        'request'     => [],
    ];
});

/*
|--------------------------------------------------------------------------
| Status Factory
|--------------------------------------------------------------------------
*/

$factory->define(English\Models\Status::class, function (Faker\Generator $faker) {
    return [
        'id'         => '1',
        'user_id'    => '1',
        'body'       => 'vero dolorem atque ratione',
        'image'      => 'non',
        'created_at' => '2017-09-06 01:16:45',
        'updated_at' => '2017-09-06 01:16:45',
    ];
});
