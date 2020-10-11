<?php

declare(strict_types=1);

namespace English;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cog\Laravel\Love\Reacterable\Models\Traits\Reacterable;
use Cog\Contracts\Love\Reacterable\Models\Reacterable as ReacterableContract;

class User extends Authenticatable implements ReacterableContract
{
	use Notifiable;
	use Reacterable;
	use HasFactory;

	public function shouldRegisterAsLoveReacterOnCreate(): bool
	{
		return true;
	}

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'username', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];
}
