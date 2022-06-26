<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->lastName(),
            "local_rank" => $this->faker->numberBetween(1, 10),
            "international_rank" => $this->faker->numberBetween(1, 500),
            "city" => $this->faker->city(),
            "website" => $this->faker->url(),
        ];
    }
}
