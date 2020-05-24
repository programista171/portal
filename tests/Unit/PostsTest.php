<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Faker\Provider\Text;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use DatabaseMigrations;

    public function test_user_can_view_a_create_post()
    {
        $user = factory(User::class)->make();

        $response = $this
            ->actingAs($user)
            ->get('/posts/create');

        $response->assertSuccessful();
        $response->assertViewIs('posts.create');
    }

    public function test_user_can_create_post()
    {
        $user = factory(User::class)->create();
        $content = Text::regexify('[A-Za-z]{150}');

        $response = $this
            ->actingAs($user)
            ->followingRedirects()
            ->post("/posts/createpost", [
                "content" => $content
            ]);

        $this->assertDatabaseHas("posts", [
            'content' => $content
        ]);
        $response->assertSeeText($content);
    }

    public function test_anonymous_cannot_view_a_post()
    {
        $user = factory(User::class)->create();
        $response = $this
            ->get('/posts/1');

        $response->assertRedirect("/login");
    }

    public function test_user_can_view_a_post()
    {
        $user = factory(User::class)->create();
        $content = Text::regexify('[A-Za-z]{150}');

        $this
            ->actingAs($user)
            ->followingRedirects()
            ->post("/posts/createpost", [
                "content" => $content
            ]);

        $response = $this
            ->actingAs($user)
            ->get("/posts/1");

        $response
            ->assertSuccessful()
            ->assertViewIs("posts.show")
            ->assertSeeText($content);
    }

    public function test_user_can_create_comment()
    {
        $user = factory(User::class)->create();
        $content = Text::regexify('[A-Za-z]{150}');
        $comment = [
            'postid' => 1,
            'comment' => "fake comment"
        ];

        $this
            ->actingAs($user)
            ->followingRedirects()
            ->post("/posts/createpost", [
                "content" => $content
            ]);

        $response = $this
            ->followingRedirects()
            ->actingAs($user)
            ->post("/posts/createcomment", $comment);

        $response
            ->assertViewIs("posts.show")
            ->assertSeeText($comment["comment"])
            ->assertSeeText("Komentarze 1");

        $this
            ->assertDatabaseHas("comments", [
                "postid" => 1,
                'userid' => 1,
                'content' => $comment["comment"]
            ]);
    }
}
