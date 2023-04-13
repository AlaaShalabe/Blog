<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(3)->create();

        User::factory()->times(3)->create()->each(function ($user) {
            Post::factory()->times(2)->create([
                'user_id' => $user->id,
            ])->each(function ($post) {
                $tags = Tag::factory()->times(3)->create();
                $post->tags()->attach($tags);
            })->each(function ($post) use ($user) {
                Comment::factory(3)->create([
                    'user_id' => $user->id,
                    'commentable_id' => $post->id,
                    'commentable_type' => Post::class,
                ]);
            });
        });
    }
}
