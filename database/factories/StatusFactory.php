<?php

declare(strict_types=1);

namespace Database\Factories\English;

use English\Status;
use English\User;
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
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => fn () => User::factory()->create()->id,
            'body'    => $this->faker->text($maxNbChars = 500),
        ];
    }
}
