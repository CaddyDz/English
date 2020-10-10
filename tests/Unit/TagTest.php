<?php

declare(strict_types=1);

namespace Tests\Unit;

use English\Status;
use English\Tag;
use Tests\TestCase;

class TagTest extends TestCase
{
    public function test_a_tag_consists_of_many_statuses()
    {
        $tag = create(Tag::class);
        $status = create(Status::class);
        $status->tags()->attach($tag);
        $this->assertTrue($tag->statuses->contains($status));
    }
}
