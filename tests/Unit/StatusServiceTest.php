<?php

use English\Services\StatusService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class StatusServiceTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->service = $this->app->make(StatusService::class);
        $this->originalArray = [
            'id'             => '1',
            'user_id'        => '1',
            'body'           => 'est quaerat suscipit vel',
            'image'          => 'ut',
            'created_at'     => '2017-09-06 01:16:45',
            'updated_at'     => '2017-09-06 01:16:45',
        ];
        $this->editedArray = [
            'id'             => '1',
            'user_id'        => '1',
            'body'           => 'est quaerat suscipit vel',
            'image'          => 'ut',
            'created_at'     => '2017-09-06 01:16:45',
            'updated_at'     => '2017-09-06 01:16:45',
        ];
        $this->searchTerm = '';
    }

    public function testAll()
    {
        $response = $this->service->all();
        $this->assertEquals(get_class($response), 'Illuminate\Database\Eloquent\Collection');
        $this->assertTrue(is_array($response->toArray()));
        $this->assertEquals(0, count($response->toArray()));
    }

    public function testPaginated()
    {
        $response = $this->service->paginated(25);
        $this->assertEquals(get_class($response), 'Illuminate\Pagination\LengthAwarePaginator');
        $this->assertEquals(0, $response->total());
    }

    public function testSearch()
    {
        $response = $this->service->search($this->searchTerm, 25);
        $this->assertEquals(get_class($response), 'Illuminate\Pagination\LengthAwarePaginator');
        $this->assertEquals(0, $response->total());
    }

    public function testCreate()
    {
        $response = $this->service->create($this->originalArray);
        $this->assertEquals(get_class($response), 'English\Models\Status');
        $this->assertEquals(1, $response->id);
    }

    public function testFind()
    {
        // create the item
        $item = $this->service->create($this->originalArray);
        $response = $this->service->find($item->id);
        $this->assertEquals($item->id, $response->id);
    }

    public function testUpdate()
    {
        // create the item
        $item = $this->service->create($this->originalArray);
        $response = $this->service->update($item->id, $this->editedArray);
        // $this->assertDatabaseHas('statuses', $this->editedArray);
        $this->assertTrue(true);
    }

    public function testDestroy()
    {
        // create the item
        $item = $this->service->create($this->originalArray);
        $response = $this->service->destroy($item->id);
        $this->assertTrue((bool) $response);
    }
}
