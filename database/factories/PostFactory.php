<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Post::class, function (Faker $faker) {
    $userIds = User::pluck('id');

    return [
        'title' => $faker->text(100),
        'content' => $faker->text(1000),
        'views' => $faker->numberBetween(10, 1000),
        'description' => $faker->text(200),
        'user_id' => $faker->randomElement($userIds),
    ];
});
