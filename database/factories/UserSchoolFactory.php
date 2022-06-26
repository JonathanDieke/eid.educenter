<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserSchool>
 */
class UserSchoolFactory extends Factory
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
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
