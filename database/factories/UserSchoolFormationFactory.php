<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolFormation>
 */
class UserSchoolFormationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'state' => $this->faker->state(),
            'country' => $this->faker->country(),
            "type" => "Type " . $this->faker->numberBetween(1, 10),
            "program_name" => Str::random(10),
            "status" => Arr::random(["abandoned", "in_progress", "terminated"]),
            "start_date" => $this->faker->dateTimeBetween('-15 years', '-10 years'),
            "end_date" => $this->faker->dateTimeBetween('-10 years', 'now'),
            "user_id" => $this->faker->numberBetween(1, 10),
        ];
    }
}
