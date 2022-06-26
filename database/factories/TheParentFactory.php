<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parent>
 */
class TheParentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "link" => Arr::random(["father", "mother"]),
            "name" => $this->faker->firstName(),
            "lname" => $this->faker->lastName(),
            "user_id" => $this->faker->numberBetween(1, 10),
        ];
    }
}
