<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TagTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_tag_consist_of_statuses()
    {
        $tag = create('English\Tag');
        $status = create('English\Status');
        $status->tags()->attach($tag);
        $this->assertTrue($tag->statuses->contains($status));
    }
}
