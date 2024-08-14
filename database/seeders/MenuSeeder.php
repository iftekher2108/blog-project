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
            'status' => 'publish'

        ]);

        Menu::create([
            'order_id' => 2,
            'title' => 'About Us',
            'slug' => 'about-us',
            'status' => 'publish'
        ]);

        Menu::create([
            'order_id' => 3,
            'title' => 'Services',
            'slug' => 'services',
            'status' => 'publish'
        ]);

        Menu::create([
            'order_id' => 4,
            'title' => 'Gallery',
            'slug' => 'gallery',
            'status' => 'publish'
        ]);

        Menu::create([
            'order_id' => 5,
            'title' => 'news',
            'slug' => 'news',
            'status' => 'publish',
        ]);

        Menu::create([
            'order_id' => 6,
            'title' => 'Contact Us',
            'slug' => 'contact-us',
            'status' => 'publish',
        ]);

        Menu::create([
            'order_id' => 7,
            'title' => 'name',
            'slug' => 'name',
            'status' => 'unpublish',
        ]);

        Menu::create([
            'order_id' => 8,
            'title' => 'demo',
            'slug' => 'demo',
            'status' => 'unpublish',
        ]);

        Menu::create([
            'order_id' => 9,
            'title' => 'sp',
            'slug' => 'sp',
            'status' => 'unpublish',
        ]);

        Menu::create([
            'order_id' => 10,
            'title' => 'sn',
            'slug' => 'sn',
            'status' => 'unpublish',
        ]);


    }
}
