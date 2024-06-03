<?php

namespace Database\Seeders;

use App\Models\pages;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        pages::create([
            'order_id' => 1,
            'title' => 'Home',
            'slug' => '/',
            'route' =>'',
            'status' => 'publish'

        ]);

        pages::create([
            'order_id' => 2,
            'title' => 'About Us',
            'slug' => 'about-us',
            'route' =>'',
            'status' => 'publish'
        ]);

        pages::create([
            'order_id' => 3,
            'title' => 'Service',
            'slug' => 'service',
            'route' =>'',
            'status' => 'publish'
        ]);

        pages::create([
            'order_id' => 4,
            'title' => 'Gallery',
            'slug' => 'gallery',
            'route' =>'',
            'status' => 'publish'
        ]);

        pages::create([
            'order_id' => 5,
            'title' => 'news',
            'slug' => 'news',
            'route' =>'',
            'status' => 'publish',
        ]);

        pages::create([
            'order_id' => 6,
            'title' => 'Contact Us',
            'slug' => 'contact-us',
            'route' =>'',
            'status' => 'publish',
        ]);


    }
}
