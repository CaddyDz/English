<?php

declare(strict_types=1);

namespace Database\Factories\English;

use English\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $name = $this->faker->word;

        return [
            'name' => $name,
            'slug' => $name,
        ];
    }
}
