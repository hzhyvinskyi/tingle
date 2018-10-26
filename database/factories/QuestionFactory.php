<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence(rand(4, 12)), '.'),
        'text' => $faker->paragraphs(rand(1, 7), true),
        'views' => rand(0, 10000),
        'votes' => rand(-20, 100),
        'answers' => rand(0, 15)
    ];
});
