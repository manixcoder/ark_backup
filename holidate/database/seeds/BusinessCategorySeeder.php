<?php

use App\BusinessCategory;
use Illuminate\Database\Seeder;

class BusinessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BusinessCategory::create(['name' => 'Hotel']);
        BusinessCategory::create(['name' => 'Guest House']);
        BusinessCategory::create(['name' => 'Restaurant']);
        BusinessCategory::create(['name' => 'Hostel']);
    }
}
