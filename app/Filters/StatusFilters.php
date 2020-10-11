<?php

declare(strict_types=1);

namespace English\Filters;

use English\User;

class StatusFilters extends Filters
{
	/**
	 * Registered filters to operate upon.
	 *
	 * @var array
	 */
	protected $filters = ['by', 'popular'];

	/**
	 * Filter the query by a given username.
	 *
	 * @param string $username
	 *
	 * @return Builder
	 */
	protected function by($username)
	{
		$user = User::where('username', $username)->firstOrFail();

		return $this->builder->where('user_id', $user->id);
	}

	/**
	 * Filter the query according to most popular statuses.
	 *
	 * @return $this
	 */
	protected function popular()
	{
		// Override the "latest" query filter in getStatuses() method
		$this->builder->getQuery()->orders = [];

		return $this->builder->orderBy('comments_count', 'desc');
	}
}
