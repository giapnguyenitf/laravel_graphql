<?php

use Faker\Generator as Faker;
use App\User;
use App\Post;

$factory->define(App\Comment::class, function (Faker $faker) {
    $userIds = User::pluck('id');
    $postIds = Post::pluck('id');

    return [
        'user_id' => $faker->randomElement($userIds),
        'post_id' => $faker->randomElement($postIds),
        'content' => $faker->text(50),
    ];
});
