<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Iftekher Mahmud',
            'email' => 'iftekhermahmud@gmail.com',
            'password' => Hash::make('21082002'),
            'role' => 'super-admin',
        ]);

        $this->call([
            SettingSeeder::class,
            MenuSeeder::class,
            SliderSeeder::class,
            ContentSeeder::class,   
        ]);


    }
}
