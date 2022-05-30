<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'category_id' => $faker->randomElement($array = array ('1','2','3','4','5','6','7','8','9','10','11','12')),
        'heading' => $faker->sentence,
        'comment' => $faker->paragraph . $faker->randomElement($array = array ('Outdoors & Adventure','Nightlife','Food & Drink','Sports & Fitness','Music','Movements','Film','Video Games','LGBTQ','Arts','Social','Career & Business')),
    ];
});
