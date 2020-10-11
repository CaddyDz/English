<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;

class CommentTest extends TestCase
{
	public function test_a_comment_has_an_owner()
	{
		$this->assertInstanceOf('English\User', create('English\Comment')->owner);
	}
}
