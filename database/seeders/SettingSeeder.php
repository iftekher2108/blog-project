<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Settings::create([
            'data_name' => 'logo',
            'title' => 'company name',
            'picture' => 'https://st2.depositphotos.com/4035913/6124/i/450/depositphotos_61243733-stock-illustration-business-company-logo.jpg',
            'status' => 'publish'
        ]);

        Settings::create([
            'data_name' => 'home-slide',
            'title' => 'Wellcome to website.',
            'sub_title' => 'lorem ispam hello to your name what is it.',
            'link' => 'http://iftekher2108.github.io/iftekher-portfolio'


        ]);
    }
}
