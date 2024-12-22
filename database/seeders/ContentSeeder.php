<?php

namespace Database\Seeders;

use App\Models\content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        content::create([
            'content_title' => 'about',
            'title' => 'Welcome to our website',
            'title_1' => 'We are here to help you',
            'description' => 'We are here to help you',
            'layout' => 'one_x_col',
            'picture' => 'https://via.placeholder.com/600x400',
            'picture_1' => 'https://via.placeholder.com/600x400',
            'picture_2' => 'https://via.placeholder.com/600x400',
            'picture_3' => 'https://via.placeholder.com/600x400',
            'picture_4' => 'https://via.placeholder.com/600x400',
            'content' => 'We are here to help you',
            'content_1' => 'We are here to help you',
            'link' => 'home.index',
            'link_1' => 'home.index',
            'status' => 'publish',
        ]);

        content::create([
            'content_title' => 'about',
            'title' => 'Welcome to our website',
            'title_1' => 'We are here to help you',
            'description' => 'We are here to help you',
            'layout' => 'four_x_col',
            'picture' => 'https://via.placeholder.com/600x400',
            'picture_1' => 'https://via.placeholder.com/600x400',
            'picture_2' => 'https://via.placeholder.com/600x400',
            'picture_3' => 'https://via.placeholder.com/600x400',
            'picture_4' => 'https://via.placeholder.com/600x400',
            'content' => 'We are here to help you',
            'content_1' => 'We are here to help you',
            'link' => 'home.index',
            'link_1' => 'home.index',
            'status' => 'publish',
        ]);

        content::create([
            'content_title' => 'service',
            'title' => 'Welcome to our website',
            'title_1' => 'We are here to help you',
            'description' => 'We are here to help you',
            'layout' => 'one_x_col',
            'picture' => 'https://via.placeholder.com/600x400',
            'picture_1' => 'https://via.placeholder.com/600x400',
            'picture_2' => 'https://via.placeholder.com/600x400',
            'picture_3' => 'https://via.placeholder.com/600x400',
            'picture_4' => 'https://via.placeholder.com/600x400',
            'content' => 'We are here to help you',
            'content_1' => 'We are here to help you',
            'link' => 'home.index',
            'link_1' => 'home.index',
            'status' => 'publish',
        ]);

        content::create([
            'content_title' => 'service',
            'title' => 'Welcome to our website',
            'title_1' => 'We are here to help you',
            'description' => 'We are here to help you',
            'layout' => 'two_x_col',
            'picture' => 'https://via.placeholder.com/600x400',
            'picture_1' => 'https://via.placeholder.com/600x400',
            'picture_2' => 'https://via.placeholder.com/600x400',
            'picture_3' => 'https://via.placeholder.com/600x400',
            'picture_4' => 'https://via.placeholder.com/600x400',
            'content' => 'We are here to help you',
            'content_1' => 'We are here to help you',
            'link' => 'home.index',
            'link_1' => 'home.index',
            'status' => 'publish',
        ]);

        content::create([
            'content_title' => 'gallery',
            'title' => 'Welcome to our website',
            'title_1' => 'We are here to help you',
            'description' => 'We are here to help you',
            'layout' => 'two_x_col',
            'picture' => 'https://via.placeholder.com/600x400',
            'picture_1' => 'https://via.placeholder.com/600x400',
            'picture_2' => 'https://via.placeholder.com/600x400',
            'picture_3' => 'https://via.placeholder.com/600x400',
            'picture_4' => 'https://via.placeholder.com/600x400',
            'content' => 'We are here to help you',
            'content_1' => 'We are here to help you',
            'link' => 'home.index',
            'link_1' => 'home.index',
            'status' => 'publish',
        ]);
    }
}
