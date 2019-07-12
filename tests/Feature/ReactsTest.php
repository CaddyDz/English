<?php

namespace Tests\Feature;

use English\Status;
use Tests\TestCase;

class ReactsTest extends TestCase
{
    /**
     * Assert guests can't like anything.
     *
     * @return void
     */
    public function testGuestsCanNotLikeAnything()
    {
        $this->post('/api/statuses/1/likes')
             ->assertRedirect('login');
    }

    /**
     * Assert users can like a status.
     *
     * @return void
     */
    public function testUsersCanLikeStatuses()
    {
        $this->withoutExceptionHandling();
        $status = create(Status::class);
        $this->login();
        $this->post("/api/statuses/$status->id/likes");
        $this->assertCount(1, $status->likes);
    }

    public function testAnAuthenticatedUserMayOnlyReactToAStatusOnce()
    {
        $this->withoutExceptionHandling();
        $status = create(Status::class);
        $this->login();

        try {
            $this->post("/api/statuses/$status->id/likes");
            $this->post("/api/statuses/$status->id/likes");
        } catch (\Exception $ex) {
            $this->fail('Did not expect to insert the same record set twice');
        }
        $this->assertCount(1, $status->likes);
    }
}
