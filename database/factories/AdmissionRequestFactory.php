<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdmissionRequest>
 */
class AdmissionRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'session' => Arr::random(["autumn", "winter", "summer"]),
            'cycle' => Arr::random(["first", "second", "third"]),
            'user_id' => $this->faker->numberBetween(1, 10),
            'school_id' => $this->faker->numberBetween(1, 10),
            'program_id' => $this->faker->numberBetween(1, 20),
        ];
    }
}
