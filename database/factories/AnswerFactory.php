<?php

use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph(rand(1, 5), true),
        'user_id' => App\User::pluck('id')->random,
        'votes_count' => rand(0, 100)
    ];
});
