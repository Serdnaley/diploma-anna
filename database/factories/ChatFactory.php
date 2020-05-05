<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chat;
use Faker\Generator as Faker;

$factory->define(Chat::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(50),
        'user_ids' => [],
        'author_id' => 0,
    ];
});
