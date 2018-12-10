<?php

namespace Tests\Feature;

use Illuminate\Support\Carbon;
use Tests\TestCase;

class ReadStatusesTest extends TestCase
{
    public function setUp()
    {
        // Create a status globally
        parent::setUp();

        $this->status = create('English\Status');
    }

    /** @test */
    public function a_user_can_view_all_statuses()
    {
        // Hit the root route and assert that the created status body can be seen
        $this->get('/')
          ->assertSee($this->status->body);
    }

    /** @test */
    public function they_can_read_a_single_status()
    {
        // Create a status
        $this->get($this->status->path())
          ->assertSee($this->status->body);
    }

    /*
     * Given we have a status
     * And that status includes comments
     * When we visit a status page
     * Then we should see the comments.
     */

    /** @test */
    public function they_can_read_comments_that_are_associated_with_a_status()
    {
        $comment = create('English\Comment', ['status_id' => $this->status->id]);

        $this->get($this->status->path())
          ->assertSee($comment->body);
    }

    /** @test */
    public function a_user_can_filter_statuses_according_to_a_tag()
    {
        $tag = create('English\Tag');
        $statusInTag = create('English\Status');
        $statusInTag->tags()->attach($tag);
        $statusNotInTag = create('English\Status');
        $this->get('/tags/'.$tag->slug)
             ->assertSee($statusInTag->body)
             ->assertDontSee($statusNotInTag->body);
    }

    /** @test */
    public function a_user_can_filter_statuses_according_to_a_user()
    {
        $this->login(create('English\User', ['username' => 'JohnDoe']));

        $statusByJhon = create('English\Status', ['user_id' => auth()->id()]);

        $statusNotByJohn = create('English\Status');

        $this->get('?by=JohnDoe')
             ->assertSee($statusByJhon->body)
             ->assertDontSee($statusNotByJohn->body);
    }

    /** @test */
    public function a_user_can_filter_statuses_by_popularity()
    {
        // This way we don't get a false green caused by all three threads getting created in the same second.
        $statusWithTwoComments = create('English\Status', ['created_at' => new Carbon('-2 minutes')]);
        create('English\Comment', ['status_id' => $statusWithTwoComments->id], 'create', 2);

        $statusWithThreeComments = create('English\Status', ['created_at' => new Carbon('-1 minutes')]);
        create('English\Comment', ['status_id' => $statusWithThreeComments->id], 'create', 3);

        $statusWithZeroComments = $this->status;

        $response = $this->getJson('/?popular');
        $response->assertSeeInOrder([
            '3 comments',
            '2 comments',
            '0 comments',
        ]);
    }
}
