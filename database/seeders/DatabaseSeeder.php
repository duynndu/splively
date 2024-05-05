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
        Room::factory(2)->create();
        Film::factory(2)->create();
    }
}
