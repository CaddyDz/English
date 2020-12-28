<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class StatusAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
        $this->Status = factory(English\Models\Status::class)->make([
            'id'             => '1',
            'user_id'        => '1',
            'body'           => 'sed a consequatur libero',
            'image'          => 'eos',
            'created_at'     => '2017-09-06 01:16:45',
            'updated_at'     => '2017-09-06 01:16:45',
        ]);
        $this->StatusEdited = factory(English\Models\Status::class)->make([
            'id'             => '1',
            'user_id'        => '1',
            'body'           => 'sed a consequatur libero',
            'image'          => 'eos',
            'created_at'     => '2017-09-06 01:16:45',
            'updated_at'     => '2017-09-06 01:16:45',
        ]);
        $user = factory(English\Models\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'statuses');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('statuses');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'statuses/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    // Test if statuses can be posted
    public function testStore()
    {
        $response = $this->actor->call('POST', 'statuses', $this->Status->toArray());
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'statuses', $this->Status->toArray());
        $response = $this->actor->call('GET', '/statuses/'.$this->Status->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('status');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'statuses', $this->Status->toArray());
        $response = $this->actor->call('PATCH', 'statuses/1', $this->StatusEdited->toArray());
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertDatabaseHas('statuses', $this->StatusEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    // test if statuses can be deleted
    public function testDelete()
    {
        $this->actor->call('POST', 'statuses', $this->Status->toArray());
        $response = $this->call('DELETE', 'statuses/'.$this->Status->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(302, $response->getStatusCode());
    }
}
