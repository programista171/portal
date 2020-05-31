<?php

namespace Tests\Feature;

use App\Profile;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{

    use DatabaseMigrations;

    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/posts');
    }

    public function test_user_can_login_with_correct_credentials()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_incorrect_password()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt('i-love-laravel'),
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'invalid-password',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function test_user_can_view_a_register_form()
    {
        $response = $this->get('/register');

        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    public function test_user_cannot_view_a_register_form_when_authenticated()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('/register');

        $response->assertRedirect('/posts');
    }

    public function test_user_can_register()
    {
        $user = [
            'login' => 'joe_smith12',
            'firstname' => 'Joe',
            'lastname' => 'Smith',
            'email' => 'testemail@test.com',
            'password' => 'passwordtest',
            'password_confirmation' => 'passwordtest'
        ];

        $response = $this->post('/register', $user);

        $response
            ->assertRedirect('/posts');

        array_splice($user,4, 2);

        $this->assertDatabaseHas('users', $user);

        $profile = [
            'user_id' => 1,
            'image' => 'profile_images/default.jpg'
        ];

        $this->assertDatabaseHas("profiles", $profile);
    }
}
