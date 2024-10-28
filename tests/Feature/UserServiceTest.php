<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use App\Services\UserService;
class UserServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_user_password_hasher()
    {
        $userService = new UserService();
        $data = $userService->userPasswordHasher(['password' => "password"]);
        $this->assertEquals(true, Hash::check("password", $data['password']));
    }
}

