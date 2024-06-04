<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'order_id' => 1,
            'title' => 'Home',
            'slug' => '/',
            'type' => 'main',
            'status' => 'publish'

        ]);

        Menu::create([
            'order_id' => 2,
            'title' => 'About Us',
            'slug' => 'about-us',
            'type' => 'main',
            'status' => 'publish'
        ]);

        Menu::create([
            'order_id' => 3,
            'title' => 'Services',
            'slug' => 'services',
            'type' => 'main',
            'status' => 'publish'
        ]);

        Menu::create([
            'order_id' => 4,
            'title' => 'Gallery',
            'slug' => 'gallery',
            'type' => 'main',
            'status' => 'publish'
        ]);

        Menu::create([
            'order_id' => 5,
            'title' => 'news',
            'slug' => 'news',
            'type' => 'main',
            'status' => 'publish',
        ]);

        Menu::create([
            'order_id' => 6,
            'title' => 'Contact Us',
            'slug' => 'contact-us',
            'type' => 'main',
            'status' => 'publish',
        ]);


    }
}
