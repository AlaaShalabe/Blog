<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_create_new_tag()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $this->actingAs($user);
        $response = $this->get('/tag/create');
        $this->assertAuthenticated();
        $response->assertStatus(200);
    }
    // public function test_admin_can_create_new_tag()
    // {
    //     $post = Post::factory()->create();
    //     $user = User::factory()->create(['role' => 'admin']);
    //     $this->actingAs($user);
    //     $title = 'Tag_test';
    //     $attributes = [
    //         'name' => 'Tag test',
    //         'slug' => Str::slug($title),
    //     ];
    //     $response = $this->post('/category/store', $attributes);
    //     $results = [
    //         'name' => $attributes['name'],
    //         'slug' => $attributes['slug']
    //     ];
    //     $this->assertInstanceOf('posts', $post->tags()->first());
    //     $this->assertDatabaseHas('tags', $results);
    //     $this->assertAuthenticated();
    // }
    // public function test_users_can_view_the_category()
    // {
    //     $category = Category::factory()->create();
    //     $response = $this->get('/category/show/' . $category->id);
    //     $response->assertStatus(200);
    // }
    // public function test_admin_can_view_update_category()
    // {
    //     $user = User::factory()->create(['role' => 'admin']);
    //     $category = Category::factory()->create();
    //     $this->actingAs($user);
    //     $response = $this->get('/category/edit' . $category->id);
    //     $this->assertAuthenticated();
    // }

    // public function test_admin_can_update_the_category()
    // {
    //     $user = User::factory()->create(['role' => 'admin']);
    //     $category = Category::factory()->create();
    //     $this->actingAs($user);
    //     $response = $this->put('/category/show/' . $category->id, [
    //         'name' => 'update'
    //     ]);
    //     $response->assertSessionHasNoErrors();
    // }
    // public function test_admin_can_delete_the_category()
    // {
    //     $user = User::factory()->create(['role' => 'admin']);
    //     $category = Category::factory()->create();
    //     $this->actingAs($user);
    //     $this->assertEquals(1, Category::count());
    //     $response = $this->delete('/category/delete/' . $category->id);
    //     $response->assertRedirect(route('categories'));
    //     $this->assertEquals(0, Category::count());
    // }
}
