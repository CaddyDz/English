<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class StatusAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
        $this->Status = factory(English\Models\Status::class)->make([
            'id'             => '1',
            'user_id'        => '1',
            'body'           => 'sit excepturi consequatur qui',
            'image'          => 'occaecati',
            'created_at'     => '2017-09-06 01:16:45',
            'updated_at'     => '2017-09-06 01:16:45',
        ]);
        $this->StatusEdited = factory(English\Models\Status::class)->make([
            'id'             => '1',
            'user_id'        => '1',
            'body'           => 'sit excepturi consequatur qui',
            'image'          => 'occaecati',
            'created_at'     => '2017-09-06 01:16:45',
            'updated_at'     => '2017-09-06 01:16:45',
        ]);
        $user = factory(English\Models\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/statuses');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/statuses', $this->Status->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/statuses', $this->Status->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/statuses/1', $this->StatusEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertDatabaseHas('statuses', $this->StatusEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/statuses', $this->Status->toArray());
        $response = $this->call('DELETE', 'api/v1/statuses/'.$this->Status->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'status was deleted']);
    }
}
