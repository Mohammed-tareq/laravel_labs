<?php

namespace Database\Seeders;

use App\Models\Post;
<<<<<<< HEAD
=======
use App\Models\User;
>>>>>>> e4b9422ddb583b9427fd117157814639023a8816
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
<<<<<<< HEAD
         Post::factory()
=======
        Post::factory()
>>>>>>> e4b9422ddb583b9427fd117157814639023a8816
            ->count(50)
            ->create();
    }
}
