<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\UserService;
class UserServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function __construct(private UserService $userService){

    }
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

