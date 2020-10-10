<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class ReadStatusesTest extends TestCase
{
    public function setUp(): void
    {
        // Create a status globally
        parent::setUp();

        $this->status = create('English\Status');
    }

    public function test_a_user_can_view_all_statuses()
    {
        // Hit the root route and assert that the created status body can be seen
        $this->get('/')
             ->assertSee($this->status->body);
    }

    public function test_a_user_can_read_a_single_status()
    {
        // Create a status
        $this->get($this->status->path())
             ->assertSee($this->status->body);
    }

    public function test_a_user_can_filter_statuses_by_tag()
    {
        $tag = create('English\Tag');
        $statusInTag = create('English\Status');
        $statusInTag->tags()->attach($tag);
        $statusNotInTag = create('English\Status');
        $this->get('/tags/'.$tag->slug)
             ->assertSee($statusInTag->body)
             ->assertDontSee($statusNotInTag->body);
    }

    public function test_a_user_can_filter_statuses_by_user()
    {
        $this->login(create('English\User', ['username' => 'JohnDoe']));

        $statusByJhon = create('English\Status', ['user_id' => auth()->id()]);

        $statusNotByJohn = create('English\Status');

        $this->get('?by=JohnDoe')
             ->assertSee($statusByJhon->body)
             ->assertDontSee($statusNotByJohn->body);
    }

    public function test_a_user_can_filter_statuses_by_popularity()
    {
        // This way we don't get a false green caused by all three statuses getting created in the same second.
        $statusWithTwoComments = create('English\Status', ['created_at' => now()->subMinutes(2)]);
        create('English\Comment', ['status_id' => $statusWithTwoComments->id], 'create', 2);

        $statusWithThreeComments = create('English\Status', ['created_at' => now()->subMinute()]);
        create('English\Comment', ['status_id' => $statusWithThreeComments->id], 'create', 3);

        $response = $this->getJson('/?popular');
        $response->assertSeeInOrder([
            '3 comments',
            '2 comments',
            '0 comments', // Status created in constructor
        ]);
    }
}
