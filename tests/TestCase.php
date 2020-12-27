<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
	use CreatesApplication;
	use DatabaseMigrations;

	/**
	 * Set the currently logged in user for the application.
	 *
	 * @param Illuminate\Contracts\Auth\Authenticatable
	 *
	 * @return English\User authenticated
	 */
	protected function login($user = null)
	{
		$user = $user ?: create('English\User');
		$this->be($user);

		return $this;
	}
}
