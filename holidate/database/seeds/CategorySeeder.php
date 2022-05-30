<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::truncate();
        // Category::create([
        //     'category_name' => 'Join a movement',
        // ]);
        // Category::create([
        //     'category_name' => 'Hike a mountain',
        // ]);
        // Category::create([
        //     'category_name' => 'Photography',
        // ]);
        // Category::create([
        //     'category_name' => 'Weekend groups',
        // ]);
        // Category::create([
        //     'category_name' => 'Practice a language',
        // ]);
        Category::create([
            'category_name' => 'Outdoors & Adventure',
            'image' => '20200707183121-category1.png',
        ]);
        Category::create([
            'category_name' => 'Nightlife',
            'image' => '20200707183209-category2.png',
        ]);
        Category::create([
            'category_name' => 'Food & Drink',
            'image' => '20200707183251-category3.png',
        ]);
        Category::create([
            'category_name' => 'Sports & Fitness',
            'image' => '20200707183323-category4.png',
        ]);
        Category::create([
            'category_name' => 'Music',
            'image' => '20200707183400-category5.png',
        ]);
        Category::create([
            'category_name' => 'Movements',
            'image' => '20200707183426-category6.png',
        ]);
        Category::create([
            'category_name' => 'Film',
            'image' => '20200707183451-category7.png',
        ]);
        Category::create([
            'category_name' => 'Video Games',
            'image' => '20200707183518-category8.png',
        ]);
        Category::create([
            'category_name' => 'LGBTQ',
            'image' => '20200707183555-category9.png',
        ]);
        Category::create([
            'category_name' => 'Arts',
            'image' => '20200707183621-category10.png',
        ]);
        Category::create([
            'category_name' => 'Social',
            'image' => '20200707183652-category11.png',
        ]);
        Category::create([
            'category_name' => 'Career & Business',
            'image' => '20200707183726-category12.png',
        ]);
    }
}
