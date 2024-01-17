<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'OSIS',
            'email' => 'osis-13@gmail.com',
            'password' => Hash::make('osis13vhs'),
        ]);

        User::create([
            'name' => 'MPK',
            'email' => 'mpk-13@gmail.com',
            'password' => Hash::make('mpksispek13'),
        ]);

        User::create([
            'name' => 'Utama',
            'email' => 'coredata@gmail.com',
            'password' => Hash::make('sixthprojects6'),
        ]);
    }
}
