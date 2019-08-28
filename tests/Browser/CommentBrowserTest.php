<?php

namespace Tests\Browser;

use Tests\DuskTestCase;

class CommentBrowserTest extends DuskTestCase
{
    private $user;
    private $status;
    private $comment;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = create('English\User');
        $this->status = create('English\Status', ['user_id' => $this->user->id]);
        $this->comment = create('English\Comment', [
            'status_id' => $this->status->id,
            'user_id'   => $this->user->id,
        ]);
    }

    /**
     * Given we have an authenticated user
     * And an existing status
     * When the user adds a comment to the status
     * Then their comment should be visible on the page.
     *
     * @return void
     */
    public function test_an_authenticated_user_may_engage_in_a_status()
    {
        $user = $this->user;
        $status = $this->status;
        $this->browse(function ($browser) use ($user, $status) {
            $browser->loginAs($user)
                    ->visit($status->path())
                    ->type('#comment', 'From Laravel Dusk Browser Testing')
                    ->keys('#comment', '{enter}')
                    ->assertPathIs($status->path())
                    ->pause(1000)
                    ->assertSee('From Laravel Dusk Browser Testing');
        });
    }

    /*
     * Given we have a status
     * And that status includes comments
     * When we visit a status page
     * Then we should see the comments.
     */

    public function test_a_user_can_read_comments_that_are_associated_with_a_status()
    {
        $status = $this->status;
        $comment = create('English\Comment', ['status_id' => $this->status->id]);

        $this->browse(function ($browser) use ($status, $comment) {
            $browser->visit($status->path())
                    ->assertPathIs($status->path())
                    ->pause(1000)
                    ->assertSee($comment->body);
        });
    }
}
