<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // User::factory(10)->create();

               $this->call(PostSeeder::class);

=======
        $this->call(PostSeeder::class);
>>>>>>> e4b9422ddb583b9427fd117157814639023a8816
    }
}
