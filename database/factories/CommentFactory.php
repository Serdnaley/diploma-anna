<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'topic_id' => 1,
        'author_id' => 0,
        'text' => $faker->text(200),
    ];
});
