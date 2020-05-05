<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Topic;
use Faker\Generator as Faker;

$factory->define(Topic::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(50),
        'author_id' => 0,
        'category_id' => 0,
        'created_at' => $faker->dateTime(),
    ];
});
