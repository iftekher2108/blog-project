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
            'slug' => 'home.index',
            'status' => 'publish'

        ]);

        Menu::create([
            'order_id' => 2,
            'title' => 'About Us',
            'slug' => 'home.about.index',
            'status' => 'publish'
        ]);

        Menu::create([
            'order_id' => 3,
            'title' => 'Services',
            'slug' => 'home.services.index',
            'status' => 'publish'
        ]);

        Menu::create([
            'order_id' => 4,
            'title' => 'Gallery',
            'slug' => 'home.gallery.index',
            'status' => 'publish'
        ]);

        Menu::create([
            'order_id' => 5,
            'title' => 'news',
            'slug' => 'home.news.index',
            'status' => 'publish',
        ]);


        Menu::create([
            'order_id' => 6,
            'title' => 'Careers',
            'slug' => 'careers',
            'status' => 'unpublish',
        ]);

        Menu::create([
            'order_id' => 7,
            'title' => 'Contact Us',
            'slug' => 'home.contact.index',
            'status' => 'publish',
        ]);

        Menu::create([
            'order_id' => 8,
            'title' => 'Privacy & Policy',
            'slug' => 'privacy-policy',
            'status' => 'unpublish',
        ]);

        Menu::create([
            'order_id' => 9,
            'title' => 'Come soons',
            'slug' => '#',
            'status' => 'unpublish',
        ]);

        Menu::create([
            'order_id' => 10,
            'title' => 'come soona',
            'slug' => '#',
            'status' => 'unpublish',
        ]);


    }
}
