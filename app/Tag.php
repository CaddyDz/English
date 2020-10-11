<?php

declare(strict_types=1);

namespace English;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
	use HasFactory;

	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function statuses()
	{
		return $this->belongsToMany(Status::class);
	}
}
