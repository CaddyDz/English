<?php

namespace Tests\Feature;

use Tests\TestCase;

class CreateStatusesTest extends TestCase
{
    /**
     * Test non authenticated users
     * can not post statuses.
     *
     * @param none
     *
     * @throws ExpectationFailedException
     *
     * @return PHPUnit\Framework::expectException
     */
    public function test_guests_shall_not_create_statuses()
    {
        $this->get('/')->assertDontSee('Write status');
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $this->post('/', []);
    }

    /**
     * Test users can post statuses
     * Given we have an authenticated user
     * When we hit the endpoint to create a status
     * and visit the statuses index page
     * we should see the new status.
     *
     * @param none
     *
     * @throws ExpectationFailedException
     *
     * @return PHPUnit\Framework\Assert::assertContains
     */
    public function test_users_can_create_statuses()
    {
        $this->login();
        $status = create('English\Status', [], 'raw');
        $response = $this->post('/', $status);
        $this->get($response->headers->get('Location'))
             ->assertSee($status['body']);
    }

    public function test_a_status_requires_a_body()
    {
        $this->publishStatus(['body' => null])
             ->assertSessionHasErrors('body');
    }

    public function test_a_status_requires_a_tag()
    {
        factory('English\Tag', 2)->create();

        $this->publishStatus(['tags[]' => []])
             ->assertSessionHasErrors('tags');

        $this->publishStatus(['tags[]' => [999]])
             ->assertSessionHasErrors('tags');
    }

    public function publishStatus($overrides = [])
    {
        $this->login();
        $status = create('English\Status', $overrides, 'raw');

        return $this->post('/', $status);
    }
}
