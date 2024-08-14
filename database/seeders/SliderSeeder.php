<?php

namespace Database\Seeders;
use App\Models\slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        slider::create([
            'title' => 'welcome to website',
            'sub_title' => 'this is 1st slider',
            'picture' => 'slider-1.jpg',
            'status' => 'publish'
        ]);

       slider::create([
            'title' => 'welcome to nice',
            'sub_title' => 'this is 2nd slider',
            'picture' => 'slider-2.jpg',
            'status' => 'publish'
        ]);


    }
}
