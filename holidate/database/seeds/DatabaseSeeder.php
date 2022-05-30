<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(ProfessionalCategorySeeder::class);
        $this->call(LanguageTableSeeder::class);
        $this->call(HobbieSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(BusinessCategorySeeder::class);
    }
}
