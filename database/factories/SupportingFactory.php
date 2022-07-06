<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supporting>
 */
class SupportingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'filename' => "supportings/1657037013_bx-ok.pdf",
            'comment' => $this->faker->text(32),
            'user_school_formation_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
