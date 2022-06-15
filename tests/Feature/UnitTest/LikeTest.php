<?php

namespace Tests\Feature\UnitTest;

use App\Tweet;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LikeTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function a_user_can_like_a_tweet()
    {
        $tweet = factory(Tweet::class)->create();

        $user = factory(User::class)->create();

        $this->actingAs($user);

        $tweet->like();

        $this->assertDatabaseHas('likes',[
            'user_id' => $user->id,
            'tweet_id' => $tweet->id,
            'liked' => true
        ]);

        $this->assertEquals(1,$tweet->countLikes());
    }

    /** @test */
    public function a_user_can_dislike_a_tweet()
    {
        $tweet = factory(Tweet::class)->create();

        $user = factory(User::class)->create();

        $this->actingAs($user);

        $tweet->dislike();

        $this->assertDatabaseHas('likes',[
            'user_id' => $user->id,
            'tweet_id' => $tweet->id,
            'liked' => false
        ]);

        $this->assertEquals(1,$tweet->countDislikes());
    }

    /** @test */
    public function a_user_can_dislike_a_liked_tweet()
    {
        $tweet = factory(Tweet::class)->create();

        $user = factory(User::class)->create();

        $this->actingAs($user);

        $tweet->like();
        $this->assertEquals(1,$tweet->countLikes());
        $this->assertDatabaseHas('likes',[
            'user_id' => $user->id,
            'tweet_id' => $tweet->id,
            'liked' => true
        ]);
        $tweet->dislike();

        $this->assertDatabaseHas('likes',[
            'user_id' => $user->id,
            'tweet_id' => $tweet->id,
            'liked' => false
        ]);

        $this->assertEquals(0,$tweet->countLikes());
        $this->assertEquals(1,$tweet->countdisLikes());
    }

    /** @test */
    public function like_a_liked_tweet()
    {
        $tweet = factory(Tweet::class)->create();

        $user = factory(User::class)->create();

        $this->actingAs($user);

        $tweet->like();
        $this->assertDatabaseHas('likes',[
            'user_id' => $user->id,
            'tweet_id' => $tweet->id,
            'liked' => true
        ]);
        $this->assertEquals(1,$tweet->countLikes());
        $tweet->like();
        $this->assertDatabaseMissing('likes',[
            'user_id' => $user->id,
            'tweet_id' => $tweet->id,
            'liked' => true
        ]);
        $this->assertEquals(0,$tweet->countLikes());
    }
}
