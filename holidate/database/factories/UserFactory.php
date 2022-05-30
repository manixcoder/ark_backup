<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('Ravi@1234'), // password
        'remember_token' => Str::random(10),
        'users_role' => '2',
        'phone' => '84789456123',
        'web' => 'www.your-url.com',
        'country_id' => '103',
        'age' => '23',
        'current_company' => 'Demo Company',
        'marital_status' => 'Single',
        'city' => 'Delhi',
        // 'profile_image' => 'noimage.jpeg',
        'profile_image' => $faker->randomElement($array = array ('people1.png', 'people2.png', 'people3.jpg', 'people4.jpg', 'people5.jpg', 'people6.jpg', 'people7.jpg', 'people8.jpg')),
        'vacation_city' => 'Noida',
        'address' => $faker->city,
        'score' => '100',
        'latitude' => '29.116492',
        'longitude' => '76.929634'
    ];
});
