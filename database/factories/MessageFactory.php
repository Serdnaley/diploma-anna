<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'chat_id' => 1,
        'author_id' => 0,
        'text' => $faker->realText(200),
    ];
});
