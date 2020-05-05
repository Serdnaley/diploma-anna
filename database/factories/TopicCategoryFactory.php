<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TopicCategory;
use Faker\Generator as Faker;

$factory->define(TopicCategory::class, function (Faker $faker) {

    $names = [
        'Детективи',
        'Трилери',
        'Драма',
        'Поезія',
        'Пригоди',
        'Фантастика',
        'Фентезі',
        'Жахи',
        'Містика',
    ];

    return [
        'name' => $faker->randomElement($names)
    ];
});
