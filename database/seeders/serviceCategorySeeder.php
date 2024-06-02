<?php

namespace Database\Seeders;

use App\Models\service\ServiceCatagory;
use Illuminate\Database\Seeder;

class serviceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceCatagory::create([
            'title' => 'It Support',
            'status' => 'publish',
        ]);

        ServiceCatagory::create([
            'title' => 'Business Management',
            'status' => 'publish'
        ]);

    }
}
