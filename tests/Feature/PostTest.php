<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function SetUp(): void
    {
        parent::setUp();
        $this->user = $this->createUser();
    }

    private function createUser($role = 'user'): User
    {
        return User::factory()->create(
            [
                'role' => $role,
            ]
        );
    }

    public function test_non_user_can_not_access_post_create_page()
    {
        $response = $this->get('/post/creat');
        $this->assertGuest();
    }

    public function test_user_can_access_post_create_page()
    {
        $response = $this->actingAs($this->user)->get('/post/creat');
        $this->assertAuthenticated();
    }



    public function test_create_post_successfuly()
    {
        $tag = Tag::factory()->create();
        $user = User::factory()->create([
            'id' => 1
        ]);
        $data['titel'] = 'TEST POST';
        $data['slug'] = Str::slug($data['titel']);
        $data['content'] = 'TEST POST Content testing unite';
        $data['bio'] = ' TEST POST bio testing unit';
        $data['image'] = UploadedFile::fake()->image('log.jpg');
        $data['category_id'] = 1;
        $data['user_id'] = $user->id;

        $response = $this->followingRedirects()->actingAs($this->user)->post('/post/store', $data);
        $response->assertStatus(200);
        $post = new Post();
        //   $this->assertInstanceOf(Post::class, $post->tags()->first());
        $this->assertDatabaseHas('posts', $data);
    }
    // public function test_show_post_successfuly()
    // {
    //     // $user = User::factory()->create([
    //     //     'id' => 2
    //     // ]);
    //     // $data['titel'] = 'TEST POST';
    //     // $data['slug'] = Str::slug($data['titel']);
    //     // $data['content'] = 'TEST POST Content testing unite';
    //     // $data['bio'] = ' TEST POST bio testing unit';
    //     // $data['image'] = UploadedFile::fake()->image('log.jpg');
    //     // $data['category_id'] = 2;
    //     // $data['user_id'] = $user->id;
    //     // $post = Post::create($data);
    //     $post = Post::factory()->create();

    //     $response = $this->get('/post/show/' . $post->id);

    //     $response->assertOk();
    // }
}
