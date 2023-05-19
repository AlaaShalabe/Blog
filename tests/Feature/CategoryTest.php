<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    public function test_admin_can_view_all_categories()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $this->actingAs($user);
        $response = $this->get('/category/index');
        $this->assertAuthenticated();
        $response->assertStatus(200);
    }
    public function test_admin_can_view_create_new_category()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $this->actingAs($user);
        $response = $this->get('/category/create');
        $this->assertAuthenticated();
        $response->assertStatus(200);
    }
    public function test_admin_can_create_new_category()
    {

        $user = User::factory()->create(['role' => 'admin']);
        $this->actingAs($user);
        $attributes = [
            'name' => 'Sport',
        ];

        $response = $this->post('/category/store', $attributes);
        $results = [
            'name' => $attributes['name'],
        ];
        $this->assertDatabaseHas('categories', $results);
        $this->assertAuthenticated();
    }
    public function test_users_can_show_the_category()
    {
        $category = Category::factory()->create();
        $response = $this->get('/category/show/' . $category->id);
        $response->assertStatus(200);
    }
    public function test_admin_can_view_update_category()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $category = Category::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/category/edit' . $category->id);
        $this->assertAuthenticated();
    }

    public function test_admin_can_update_the_category()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $category = Category::factory()->create();
        $this->actingAs($user);
        $response = $this->put('/category/show/' . $category->id, [
            'name' => 'update'
        ]);
        $response->assertSessionHasNoErrors();
    }
    public function test_admin_can_delete_the_category()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $category = Category::factory()->create();
        $this->actingAs($user);
        $this->assertEquals(1, Category::count());
        $response = $this->delete('/category/delete/' . $category->id);
        $response->assertRedirect(route('categories'));
        $this->assertEquals(0, Category::count());
    }
}
