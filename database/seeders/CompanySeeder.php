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

    $logos = [
        'https://www.reshot.com/preview-assets/icons/LSZVDUKX6M/telegram-LSZVDUKX6M.svg',
        'https://www.reshot.com/preview-assets/icons/CG78KNX46Q/behance-CG78KNX46Q.svg',
        'https://www.reshot.com/preview-assets/icons/GE2JYXASCZ/spotify-GE2JYXASCZ.svg',
        'https://www.reshot.com/preview-assets/icons/UKWGS8QJBT/pinterest-UKWGS8QJBT.svg'
    ];

    for ($i = 0; $i < 10; $i++) {
        $logo = $logos[array_rand($logos)];

        Company::create([
            'name' => $faker->company,
            'about' => $faker->paragraph,
            'logo' => $logo,
        ]);
    }
}

}

