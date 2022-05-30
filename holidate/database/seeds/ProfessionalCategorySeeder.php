<?php

use App\ProfessionalCategory;
use Illuminate\Database\Seeder;

class ProfessionalCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfessionalCategory::create(['name' => 'Doctor',]);
        ProfessionalCategory::create(['name' => 'Nurse',]);
        ProfessionalCategory::create(['name' => 'Pilot',]);
        ProfessionalCategory::create(['name' => 'Web Developer',]);
        ProfessionalCategory::create(['name' => 'Plumber',]);
        ProfessionalCategory::create(['name' => 'Student',]);
    }
}
