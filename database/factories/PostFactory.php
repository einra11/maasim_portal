<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        //
        'annc_title' => $faker->text(50),
        'annc_content' => $faker->text(500),
        'user_id' => '1',
        'cover_image'=>'noimage.jpg'
    ];
});
