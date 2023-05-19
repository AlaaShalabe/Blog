<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RigesterTest extends TestCase
{
    use RefreshDatabase;
    public function test_rigester()
    {
        $response = $this->get('/user/signUp');
        $response->assertStatus(200);
    }
    public function test_new_users_can_register()
    {
        $attributes = [
            'name' => 'test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $response = $this->post('/user/rigester', $attributes);
        $results = [
            'name' => $attributes['name'],
            'email' => $attributes['email'],
        ];
        $this->assertDatabaseHas('users', $results);
    }
}
