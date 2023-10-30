<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function tesLoginPage()
    {
        $this->get("/login")->assertSeeText("Login");
    }

    public function testLoginPageForMember()
    {
        $this->withSession([
            'user' => 'aswin'
        ])->get("/login")->assertRedirect("/");
    }

    public function testLoginSuccess()
    {
        $this->post("/login", [
            "user" => "aswin",
            "password" => "rahasia"
        ])->assertRedirect("/")->assertSessionHas("user", "aswin");
    }

    public function testLoginValidationError()
    {
        $this->post("/login", [])->assertSeeText("User or Password required!");
    }

    public function testLoginFailed()
    {
        $this->post("/login", [
            "user" => "wrong",
            "password" => "wrong"
        ])->assertSeeText("User or Password wrong");
    }

    public function testLogout()
    {
        $this->withSession([
            "user" => "aswin"
        ])->post("/logout")->assertRedirect("/login")->assertSessionMissing("user");
    }
}
