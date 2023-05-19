<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    public function test_users_can_view_the_login()
    {
        $response = $this->get('/user/login');
        $response->assertViewIs('auth.login');
        $response->assertStatus(200);
    }
    public function test_users_can_using_the_login_with_correct_credentials()
    {

        $response = $this->post('/user/storeLogin', [
            'email' => 'test@example.com',
            'password' => 'password',

        ]);
        $response->assertRedirect(route('welcome'));
        $response->assertStatus(302);
    }
    public function test_users_can_not_authenticate_using_the_login_screen()
    {
        $response = $this->post('/user/storeLogin', [
            'email' => 'test@example.com',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}
