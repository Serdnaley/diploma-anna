<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TopicCategory;
use Faker\Generator as Faker;

$factory->define(TopicCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->text(20)
    ];
});
