<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use Faker\Factory as Faker;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Company::create([
                'name' => $faker->company,
                'about' => $faker->paragraph,
                'logo' => $faker->imageUrl(400, 400, 'business', true),
            ]);
        }
    }
}

