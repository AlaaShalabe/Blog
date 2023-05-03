<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        User::factory()->create([
            'name' => 'Alaa Shalabi',
            'email' => 'al1996sh.9@gmail.com',
            'password' => Hash::make('AlaaShalabi'),
            'email_verified_at' => now(),
            'role' => 'admin',
        ]);
        User::factory()->times(3)->create()->each(function ($user) {
            Post::factory()->times(2)->create([
                'user_id' => $user->id,
            ])->each(function ($post) {
                $tags = Tag::factory()->times(2)->create();
                $post->tags()->attach($tags);
            })->each(function ($post) use ($user) {
                Comment::factory()->times(6)->create([
                    'user_id' => $user->id,
                    'commentable_id' => $post->id,
                    'commentable_type' => Post::class,
                ]);
            });
        });
    }
}
