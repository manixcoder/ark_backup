<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        User::create([
            'users_role' => '1',
            'name' => 'Admin',
            'surname' => 'User',
            'surname' => 'User',
            'profile_image' => 'noimage.jpeg',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminadmin'),
            'is_paid' => '0',
            'country_id' => 104,
            'vacation_city' => 'Noida',
            'city' => 'Delhi',
            'score' => '32'
        ]);
        User::create([
            'users_role' => '2',
            'name' => 'User',
            'surname' => 'User',
            'profile_image' => 'noimage.jpeg',
            'email' => 'user@user.com',
            'password' => Hash::make('useruser'),
            'is_paid' => '0',
            'country_id' => 104,
            'vacation_city' => 'Noida',
            'city' => 'Delhi',
            'score' => '32'
        ]);
        factory(App\User::class, 200)->create()->each(function($u) {
            $u->hobbies()->sync([1,2]);
            $u->languages()->sync([1,2]);
            $u->posts()->save(factory(App\Post::class)->make());
        });;
    }
}