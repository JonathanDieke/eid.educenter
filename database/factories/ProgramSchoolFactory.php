<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProgramSchool>
 */
class ProgramSchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "program_id" => $this->faker->numberBetween(1, 10),
            "school_id" => $this->faker->numberBetween(1, 10)
        ];
    }
}
