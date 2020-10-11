<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;

class StatusTest extends TestCase
{
	public function setUp(): void
	{
		// Create a status globally
		parent::setUp();

		$this->status = create('English\Status');
	}

	/**
	 * Test that a status can have comments.
	 *
	 * @return void
	 */
	public function test_a_status_has_comments()
	{
		$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->status->comments);
	}

	public function test_a_status_has_an_owner()
	{
		$this->assertInstanceOf('English\User', $this->status->owner);
	}

	public function test_a_status_can_have_a_comment()
	{
		$this->status->addComment([
			'body'    => 'Foobar',
			'user_id' => 1,
		]);
		$this->assertCount(1, $this->status->comments);
	}

	public function test_a_status_has_a_tag()
	{
		$status = create('English\Status');
		$status->tags()->attach(create('English\Tag'));
		$this->assertInstanceOf('English\Tag', $status->tags()->first());
	}
}
