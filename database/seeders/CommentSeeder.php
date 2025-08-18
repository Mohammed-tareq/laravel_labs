<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $x=0;
    while ($x<50) {
        Comment::create([
            'comment' => fake()->sentence(),
            'user_id' => User::inRandomOrder()->first()->id,
            'commentable_id' => Post::inRandomOrder()->first()->id,
            'commentable_type' => Post::class, // أحسن من كتابة App\Models\Post يدوي
        ]);
    $x ++;
    }

    }
}
