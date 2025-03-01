<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\JobPosting;
use Faker\Factory as Faker;

class JobPostingSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $companies = Company::all();

        
        for ($i = 0; $i < 100; $i++) {
            JobPosting::create([
                'title' => $faker->jobTitle,
                'company_id' => $companies->random()->id,
                'type' => $faker->randomElement(['Remote', 'In-person', 'Hybrid']),
                'salary' => $faker->randomNumber(5),
                'location' => $faker->city,
                'description' => $faker->paragraph,
            ]);
        }
    }
}
