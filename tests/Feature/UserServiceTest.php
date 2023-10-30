<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserService $userService;
    public function setUp(): void
    {
        parent::setUp();
        $this->userService = $this->app->make(UserService::class);
    }

    public function testSample()
    {
        self::assertTrue(true);
    }

    public function testLoginSuccess()
    {
        self::assertTrue($this->userService->login("aswin", "rahasia"));
    }

    public function testLoginUserNotFound()
    {
        self::assertFalse($this->userService->login("aswinzzz", "rahasia"));
    }

    public function testLoginWrongPassword()
    {
        self::assertFalse($this->userService->login("aswin", "rahasia123"));
    }
}
