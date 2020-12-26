<?php

declare(strict_types=1);

namespace Database\Factories;

use English\{Status, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class StatusFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Status::class;

	/**
	 * Define the model's default state.
	 */
	public function definition(): array
	{
		return [
			'user_id' => fn () => User::factory()->create()->id,
			'body'    => $this->faker->text($maxNbChars = 500),
		];
	}
}
