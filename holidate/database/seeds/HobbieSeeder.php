<?php

use App\Hobbie;
use Illuminate\Database\Seeder;

class HobbieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hobbie::truncate();
        Hobbie::create([
            'name' => 'Photography',
        ]);
        Hobbie::create([
            'name' => 'Travelling',
        ]);
        Hobbie::create([
            'name' => 'Movies',
        ]);
    }
}
