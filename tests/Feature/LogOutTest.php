<?php

namespace Tests\Feature;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogOutTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_users_logout()
    {

        $user = [
            'email' => 'test@example.com',
            'password' => 'password',
        ];
        $response = $this->post('/user/logOut', $user);
        $this->assertGuest();
    }
}
