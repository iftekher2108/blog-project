<?php

namespace Database\Seeders;

use App\Models\menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        menu::create([
            'order_id' => 1,
            'title' => 'Home',
            'slug' => 'home.index',
            'status' => 'publish'

        ]);

        menu::create([
            'order_id' => 2,
            'title' => 'About Us',
            'slug' => 'about.index',
            'status' => 'publish'
        ]);
        menu::create([
            'order_id' => 3,
            'title' => 'Gellery',
            'slug' => 'gallery.index',
            'status' => 'publish'
        ]);
        menu::create([
            'order_id' => 3,
            'title' => 'news',
            'slug' => 'news.index',
            'status' => 'publish',
        ]);
        menu::create([
            'order_id' => 3,
            'title' => 'Contact Us',
            'slug' => 'contact.index',
            'status' => 'publish',
        ]);


    }
}
