<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    public function test_main_page()
    {
        $response = $this->followingRedirects()
            ->get("/");
        $response->assertStatus(200);
        $response->assertSee("Zaloguj się");
    }

    public function test_login_page()
    {
        $response = $this->get("/login");
        $response->assertStatus(200);
    }

    public function test_register_page()
    {
        $response = $this->get("/register");
        $response->assertStatus(200);
    }

    public function test_settings_page()
    {
        $this->withoutMiddleware()
                ->get("/settings")
                ->assertStatus(500);

        $this->withMiddleware()
            ->get("/settings")
            ->assertRedirect("/login");
    }

    public function test_posts_page()
    {
        $this->withoutMiddleware()
            ->get("/posts")
            ->assertStatus(500);

        $this->withMiddleware()
            ->get("/posts")
            ->assertRedirect("/login");
    }

    public function test_friends_invite_page()
    {
        $this->withoutMiddleware()
            ->get("/friends/invite")
            ->assertStatus(500);

        $this->withMiddleware()
            ->get("/friends/invite")
            ->assertRedirect("/login");
    }

    public function test_messages_invite_page()
    {
        $this->withoutMiddleware()
            ->get("/messages")
            ->assertStatus(200);

        $this->withMiddleware()
            ->get("/messages")
            ->assertRedirect("/login");
    }
}
