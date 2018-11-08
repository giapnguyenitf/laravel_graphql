<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Comment::class, function (Faker $faker) {
    $userIds = User::pluck('id');

    return [
        'user_id' => $faker->randomElement($userIds),
        'content' => $faker->text(50),
    ];
});
