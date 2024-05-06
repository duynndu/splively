<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\Room;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'duynnz@gmail.com',
            'password'=> bcrypt('11111111'),
            'role' => 'admin'
        ]);
        Room::factory(10)->create();
        Film::factory(10)->create();
    }
}
